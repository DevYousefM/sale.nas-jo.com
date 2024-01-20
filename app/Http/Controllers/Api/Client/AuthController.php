<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminNotify;
use Illuminate\Http\Request;
use Validator;
use App\Traits\GeneralTrait;
use App\Models\Client;
use Auth;
use App\Models\VerifyAccount;
use App\Traits\CustomFunctions;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Ladumor\OneSignal\OneSignal;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use GeneralTrait;
    use CustomFunctions;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register','sendSMS','verify','ForgetPassword','deleteAccount']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        try {
            $rules = [
                'mobile' => 'required',
                'password' => 'required',
            ];
            $messages = [
                'mobile.required' => __('api.mobile_required'),
                'password.required' =>  __('api.password_required'),
            ];
            $validator = Validator::make($request->all() , $rules,$messages);
            if($validator->fails()){
                $code = $this->returnCodeAccordingToInput($validator);
                return $this->returnValidationError($code,$validator);
            }

            // $credentials = request(['mobile', 'password']);
            $credentials['mobile'] = $request->code_country.$request->mobile;
            $credentials['password'] = request('password');
            $token = Auth::guard('client-api')->attempt($credentials);
            if (!$token) {
                return $this->returnError('E001' , 'بيانات الدخول غير صحيحة');
            }

            $client = Auth::guard('client-api')->user();
            if($request->has('player_id')){
                $client->player_id = $request->player_id;
            }
            $client->save();
            $client->api_token = $token;
            return $this->returnData('client' ,$client);


        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode() , $ex->getMessage());
        }

    }

    public function sendSMS($mobileNumber,$code)
    {
        $curl = curl_init();
        $from = "Mkanek";
        $to = $mobileNumber;
        $message = "Confirmation Code : ".$code;
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.releans.com/v2/message",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "sender=$from&mobile=$to&content=$message",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer f023638d763cb8acb44858e0bd6e08f8"
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    public function register(Request $request)
    {
        $rules = [
            'country_id' => 'required',
            'city_id' => 'required',
            // 'type_account' => 'required',
            'username' => 'required|unique:clients,username',
            'fullname' => 'required',
            'gender' => 'required',
            'mobile' => 'required|unique:clients,mobile',
            'email' => 'required',
            'password' => 'required|confirmed',
        ];

        $messages = [
            'country_id.required' =>  __('api.country_id_required'),
            'city_id.required' =>  __('api.city_id_required'),
            // 'type_account.required' =>  __('api.type_account_required'),
            'username.required' =>  __('api.username_required'),
            'fullname.required' =>  __('api.fullname_required'),
            'gender.required' =>  __('api.gender_required'),
            'mobile.required' =>  __('api.mobile_required'),
            'mobile.unique' =>  __('api.mobile_unique'),
            'email.required' =>  __('api.email_required'),
            'password.required' =>  __('api.password_required'),
        ];
        $validator = Validator::make($request->all() , $rules,$messages);
        if($validator->fails()){
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code,$validator);
        }


        $client = Client::where('mobile',$request->code_country.$request->mobile)->first();
        if(!is_null($client)){
            return $this->returnError('E001' , 'المستخدم موجود مسبقا');
        }

        $request_data = $request->except('password','password_confirmation','photo','code_country','mobile');
        if($request->has('photo')){
            $request_data['photo'] = $this->StoreFiles($request->photo , 'assets/files/client/images' , 'client_'.strtotime(Carbon::now()));
        }
        $request_data['password'] = bcrypt($request->password);
        $request_data['mobile'] = $request->code_country.$request->mobile;
        $client = Client::create($request_data);

        //send confirmation code
        $code = rand(1000,9999);
        $VerifyAccount = VerifyAccount::where('email' ,$request->email )->first();
        if($VerifyAccount){
            DB::table("password_resets")->where('email',$request->email)->update(['token' => $code]);
        }else{
            VerifyAccount::create([
                'email'=> $request->email,
                'token' => $code
            ]);
        }
        $result = $this->sendSms($client->mobile,$code);

        $admins = Admin::all();
        foreach ($admins as $key => $admin) {
            $player_id = $admin->player_id;
            if(!is_null($player_id)){
                $fields['include_player_ids'] = ["$player_id"];
                $fields['url'] = route('client.show',$client->id);
                $message =  __('admin.register_new_client',[],Config('app.locale')).' '.$client->username;
                OneSignal::sendPush($fields, $message);
            }
        }

        AdminNotify::create([
            'client_id' => $client->id,
            'message:en' => __('admin.notifiy_new_account',[],'en').$client->username,
            'message:ar' => __('admin.notifiy_new_account',[],'ar').$client->username,
        ]);

        return $this->returnSuccessMessage(__('api.created_successfully'));
    }//end of register function


    public function ForgetPassword(Request $request)
    {
        $rules = [
            'mobile' => 'required',
        ];
        $validator = Validator::make($request->all() , $rules);
        if($validator->fails()){
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code,$validator);
        }
        $mobile = $request->mobile;
        $client = Client::where('mobile' , $mobile)->first();
        if(!$client){
            return $this->returnError('E001' , 'الحساب غير موجود',404);
        }
        $account = DB::table('password_resets')->where('email',$client->email)->first();
        $code =  rand(0,9999);
        if($account){
            DB::table('password_resets')->where('email',$client->email)->update([
                'token' => $code
            ]);
        }else{
            VerifyAccount::create([
                'email' => $client->email,
                'token' => $code
            ]);
        }
        $this->sendSMS($client->mobile,$code);
        return $this->returnSuccessMessage('تم ارسال رمز التاكيد '.$code);
    }//end of ForgetPassword function

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function verify(Request $request){
        $rules = [
            'mobile' => 'required',
            'code' => 'required',
        ];
        $validator = Validator::make($request->all() , $rules);
        if($validator->fails()){
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code,$validator);
        }
        $client = Client::where('mobile',$request->mobile)->first();
        if($client){
            $VerifyAccount = VerifyAccount::where('email' ,$client->email )->first();
            if($VerifyAccount){
                if($VerifyAccount->token == $request->code){
                    $client->verify = true;
                    $client->save();
                    DB::table("password_resets")->where('email',$client->email)->delete();
                    return $this->returnSuccessMessage(__('api.account_successfully_confirmed'));
                }else{
                    return $this->returnSuccessMessage(__('dashboard.verify_code_invaild'));
                }
            }else{
                return $this->returnSuccessMessage(__('dashboard.error'));
            }
        }else{
            return $this->returnSuccessMessage(__('dashboard.error'));
        }
    }//end of verify function

    public function fcmUpdate(Request $request){
        $client = Client::find(auth()->guard('client-api')->user()->id);
        $client->fcm = $request->fcm;
        $client->save();
        return $this->returnSuccessMessage(__('dashboard.updated_successfully'));
    }

    public function deleteAccount(Request $request){
        $id = @auth()->guard('client-api')->user()->id;
        if($id){
            $client = Client::find($id);
            if($client){
                $client->delete();
                JWTAuth::setToken($client->token)->invalidate();
                // Artisan::call('cache:clear');
                return $this->returnSuccessMessage(__('admin_api.account deleted successfully'));
            }
        }
    }
}//end of class

