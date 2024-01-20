<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Photo;
use App\Models\SubCategory;
use App\Traits\GeneralTrait;
use App\Traits\CustomFunctions;
use App;
use App\Models\Admin;
use App\Models\Category;
use Validator;
use Carbon\Carbon;
use Ladumor\OneSignal\OneSignal;
use App\Models\AdminNotify;
use App\Models\AppSetting;
use App\Models\ClientNotify;

class PostController extends Controller
{
    use GeneralTrait;
    use CustomFunctions;

    public function __construct()
    {
        $this->middleware('auth.guard:client-api', ['except' => ['index','show','latestPost','featurePost','getPostByCategoryAndSubcategory','pushOneSginal']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lang = $request->header('Accept-Language');
        if($lang){
            App::setLocale($lang);
        }
        if($this->IsAuthenticated($request) == true){
            $user = auth()->guard('client-api')->user();
            $posts = Post::where('status',1)->with(['country','city','category','subcategory','features','client','favorite' => function ($query) use ($user) {
                $query->where('client_id', $user->id)
                ->where('client_id', $user->id);
            }])->get();
            return $this->returnData('data' , $posts);
        }else{
            // $posts = Post::where('status',1)->with(['country','city','category','subcategory','features','client'])->get();
            $posts = Post::when($request , function($query) use ($request){
                if($request->has('min_price') || $request->has('max_price')){
                    return $query->whereHas('translations', function($query) use ($request){
                        return $query->where('title','like','%'.$request->title.'%');
                    })->whereHas('category', function($query) use ($request){
                        return $query->whereHas('translations' , function($query) use ($request){
                            return $query->where('name','like','%'.$request->category.'%');
                        });
                    })->WhereHas('subcategory', function($query) use ($request){
                        return $query->whereHas('translations' , function($query) use ($request){
                            return $query->where('name','like','%'.$request->subcategory.'%');
                        });
                    })->WhereHas('country', function($query) use ($request){
                        return $query->whereHas('translations' , function($query) use ($request){
                            return $query->where('name','like','%'.$request->country.'%');
                        });
                    })->WhereHas('city', function($query) use ($request){
                        return $query->whereHas('translations' , function($query) use ($request){
                            return $query->where('name','like','%'.$request->city.'%');
                        });
                    })->where('price', '>=', (int)$request->min_price)
                    ->where('price', '<=', (int)$request->max_price);
                    // ->whereBetween('price', [$request->min_price, $request->max_price]);
                    // return $query->where('category_id','like','%'.$request->category_id.'%')
                    // ->orWhere('sub_category_id','like','%'.$request->sub_category_id.'%')
                    // ->where('country_id','like','%'.$request->country_id.'%')
                    // ->orWhere('city_id','like','%'.$request->city_id.'%')
                    // ->where('price', '>=', $request->min_price)
                    // ->where('price', '<=', $request->max_price);
                }else{
                    return $query->whereHas('translations', function($query) use ($request){
                        return $query->where('title','like','%'.$request->title.'%');
                    })->whereHas('category', function($query) use ($request){
                        return $query->whereHas('translations' , function($query) use ($request){
                            return $query->where('name','like','%'.$request->category.'%');
                        });
                    })->WhereHas('subcategory', function($query) use ($request){
                        return $query->whereHas('translations' , function($query) use ($request){
                            return $query->where('name','like','%'.$request->subcategory.'%');
                        });
                    })->WhereHas('country', function($query) use ($request){
                        return $query->whereHas('translations' , function($query) use ($request){
                            return $query->where('name','like','%'.$request->country.'%');
                        });
                    })->WhereHas('city', function($query) use ($request){
                        return $query->whereHas('translations' , function($query) use ($request){
                            return $query->where('name','like','%'.$request->city.'%');
                        });
                    });
                    // return $query->where('category_id','like','%'.$request->category_id.'%')
                    // ->orWhere('sub_category_id','like','%'.$request->sub_category_id.'%')
                    // ->where('country_id','like','%'.$request->country_id.'%')
                    // ->orWhere('city_id','like','%'.$request->city_id.'%');
                }
            })->where('status',1)->with(['country','city','category','subcategory','features','client'])->get();
            return $this->returnData('data' , $posts);
        }
    }//end of index function


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function pushOneSginal(){
        $fields['include_player_ids'] = ['e813a1d0-c279-4af2-9fee-00d74cb1e780'];
        $message = __('api.New_ad_has_been_added');
        OneSignal::sendPush($fields, $message);
    }

    public function store(Request $request)
    {
        $lang = $request->header('Accept-Language');
        if($lang){
            App::setLocale($lang);
        }
        $rules = [
            'type_account' => 'required',
            'desc:ar' => 'required',
            'desc:en' => 'required',
            'title:ar' => 'required',
            'title:en' => 'required',
            'feature_post' =>'اعلانات مميزة',
            'photo' => 'required',
            'mobile' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'price' => 'required',
            'currency' => 'required',
            'photos' => 'required',
            'features.*'=>'required',
        ];
        $messages =  [
            'type_account.required' =>  __('api.type_account_required'),
            'title:ar.required' =>  __('admin.title_ar_required'),
            'title:en.required' =>  __('admin.title_en_required'),
            'desc:ar.required' =>  __('admin.desc_ar_required'),
            'desc:en.required' =>  __('admin.desc_en_required'),
            'photo.required' =>  __('admin.photo_required'),
            'mobile.required' =>  __('admin.mobile_required'),
            'category_id.required' =>  __('admin.category_id_required'),
            'sub_category_id.required' =>  __('admin.sub_category_id_required'),
            'country_id.required' =>  __('admin.country_id_required'),
            'city_id.required' =>  __('admin.city_id_required'),
            'price.required' =>  __('admin.price_required'),
            'currency.required' =>  __('admin.currency_required'),
            'photos.required' =>  __('admin.photos_required'),
            'features.*.required'=> __('admin.features_required'),
        ];
        $validator = Validator::make($request->all() , $rules,$messages);
        if($validator->fails()){
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code,$validator);
        }
        $request_data = $request->except('features','photos','photo');
        if($request->has('photo')){
            $request_data['photo'] = $this->StoreFiles($request->photo , 'assets/files/post/images' , 'post_'.strtotime(Carbon::now()));
        }
        $request_data['status'] = 0;
        if(isset($request->location)){
            $latAndLon = explode ("-", $request->location);
            $request_data['latitude'] = $latAndLon[0];
            $request_data['longitude'] = $latAndLon[1];
        }

        $request_data['client_id'] = auth()->guard('client-api')->user()->id;

        $post = Post::create($request_data);

        $subcategory = SubCategory::find($request->sub_category_id);
        $features_ids = array();
        $features_array = array();
        foreach($subcategory->features as $index=>$feature){
            $features_ids[$index] = $feature->id;
        }
        foreach ($features_ids as $value) {
            if(array_key_exists($value ,$request->features) ){
                $features_array[$value] = ['value' => $request->features["$value"]];
            }else{
                $features_array[$value] = ['value' =>  0];
            }
        }
        $post->features()->sync($features_array);

        foreach ($request->photos as  $index=>$value) {
            $photo = $this->StoreFiles($value , 'assets/files/post/images' , 'post_'.$index.'_'.strtotime(Carbon::now()));
            Photo::create([
                'post_id' => $post->id,
                'value' => $photo,
            ]);
        }

        $admins = Admin::all();
        foreach ($admins as $key => $admin) {
            $player_id = $admin->player_id;
            if(!is_null($player_id)){
                $fields['include_player_ids'] = ["$player_id"];
                $fields['url'] = route('post.show',$post->id);
                $message =  __('admin.added_new_ad',[],$lang).' '.$post->category->translate($lang)->name.' '.$subcategory->translate($lang)->name .' '.__('admin.from_the_client',[],$lang).' '.auth()->guard('client-api')->user()->username;
                OneSignal::sendPush($fields, $message);
                ClientNotify::create([
                    'post_id'=> $post->id,
                    'client_id'=> $post->client->id,
                    'message:ar'=>  __('admin.added_new_ad',[],'ar').' '.$post->category->translate('ar')->name.' '.$subcategory->translate('ar')->name .' '.__('admin.from_the_client',[],'ar').' '.auth()->guard('client-api')->user()->username,
                    'message:en'=>  __('admin.added_new_ad',[],'en').' '.$post->category->translate('en')->name.' '.$subcategory->translate('en')->name .' '.__('admin.from_the_client',[],'en').' '.auth()->guard('client-api')->user()->username,
                ]);
            }
        }
        $player_id = $post->client->player_id;
        $url = null;
        $message =  __('admin.Your ad is under review',[],$lang);
        $android_channel_id = 'ac437d0f-f098-4418-a7ac-52bef61de7ba';
        $notificationRedirectType = 'realstate';
        $notificationRedirectId = $post->id;
        OneSignalSendPush($player_id,$url,$message,$android_channel_id,$notificationRedirectId,$notificationRedirectType);

        ClientNotify::create([
            'post_id'=> $post->id,
            'client_id'=> $post->client->id,
            'message:ar'=>__('admin.Your ad is under review',[],'ar'),
            'message:en'=>__('admin.Your ad is under review',[],'en'),
        ]);

        // $fields['include_player_ids'] = ["$player_id"];
        // $fields['url'] = route('post.show',$post->id);
        // $message =  __('admin.added_new_ad',[],$lang).' '.$post->category->translate($lang)->name.' '.$subcategory->translate($lang)->name .' '.__('admin.from_the_client',[],$lang).' '.auth()->guard('client-api')->user()->username;
        // OneSignal::sendPush($fields, $message);

        AdminNotify::create([
            'client_id' => auth()->guard('client-api')->user()->id,
            'post_id' => $post->id,
            'message:en' => __('admin.added_new_ad',[],'en').' '.$post->category->translate('en')->name.' '.$subcategory->translate('en')->name .' '.__('admin.from_the_client',[],'en').' '.auth()->guard('client-api')->user()->username,
            'message:ar' => __('admin.added_new_ad',[],'ar').' '.$post->category->translate('ar')->name.' '.$subcategory->translate('ar')->name .' '.__('admin.from_the_client',[],'ar').' '.auth()->guard('client-api')->user()->username,
        ]);

        return $this->returnSuccessMessage(__('api.created_successfully'),'000S');
    }//end of store function

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $lang = $request->header('Accept-Language');
        if($lang){
            App::setLocale($lang);
        }
        $post = Post::where('id',$id)->with(['country','city','category','subcategory','features','photos','client'])->first();
        if($post){
            $post->views += 1;
            $post->save();
            $player_id = @$post->client->player_id;
            $url = null;
            $message =  __('admin.View contact information',[],$lang).' ('.$post->title.') ';
            $message_views =  __('admin.post views',[],$lang).' '.$post->title.' ('.$post->views.') '.__('admin.views',[],$lang);
            $android_channel_id = 'ac437d0f-f098-4418-a7ac-52bef61de7ba';
            $notificationRedirectType = 'realstate';
            $notificationRedirectId = $post->id;
            OneSignalSendPush($player_id,$url,$message,$android_channel_id,$notificationRedirectId,$notificationRedirectType);
            OneSignalSendPush($player_id,$url,$message_views,$android_channel_id,$notificationRedirectId,$notificationRedirectType);
            ClientNotify::create([
                'post_id'=> $post->id,
                'client_id'=> $post->client->id,
                'message:ar'=>__('admin.View contact information',[],'ar').' ('.$post->translate('ar')->title.') ',
                'message:en'=>__('admin.View contact information',[],'en').' ('.$post->translate('ar')->title.') ',
            ]);
            // OneSignalSendPush($player_id,$url,$message);
            // OneSignalSendPush($player_id,$url,$message_views);
            return $this->returnData('data' , $post);
        }else{
            return $this->returnError('000F',__('api.item_not_found'));
        }
    }//end of show function


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = [
            'desc:ar' => 'required',
            'desc:en' => 'required',
            'title:ar' => 'required',
            'title:en' => 'required',
            'feature_post' =>'اعلانات مميزة',
            'mobile' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'country_id' => 'required',
            'city_id' => 'required',
            'price' => 'required',
            'currency' => 'required',
            'features.*'=>'required',
        ];
        $messages =  [
            'title:ar.required' =>  __('admin.title_ar_required'),
            'title:en.required' =>  __('admin.title_en_required'),
            'desc:ar.required' =>  __('admin.desc_ar_required'),
            'desc:en.required' =>  __('admin.desc_en_required'),
            'photo.required' =>  __('admin.photo_required'),
            'mobile.required' =>  __('admin.mobile_required'),
            'category_id.required' =>  __('admin.category_id_required'),
            'sub_category_id.required' =>  __('admin.sub_category_id_required'),
            'country_id.required' =>  __('admin.country_id_required'),
            'city_id.required' =>  __('admin.city_id_required'),
            'price.required' =>  __('admin.price_required'),
            'currency.required' =>  __('admin.currency_required'),
            'photos.required' =>  __('admin.photos_required'),
            'features.*.required'=> __('admin.features_required'),
        ];
        $validator = Validator::make($request->all() , $rules,$messages);
        if($validator->fails()){
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code,$validator);
        }

        if(!$request->has('features')){
            return $this->returnError("S000",__('api.features_required'));
        }
        $post = Post::find($id);
        if($post){

            $request_data = $request->except('features','photos','photo');
            if($request->has('location')){
                $latAndLon = explode ("-", $request->location);
                $request_data['latitude'] = $latAndLon[0];
                $request_data['longitude'] = $latAndLon[1];
            }
            if($request->has('photo')){
                $request_data['photo'] = $this->StoreFiles($request->photo , 'assets/files/post/images' , 'post_'.strtotime(Carbon::now()));
            }
            $request_data['status'] = 0;
            $request_data['client_id'] = auth()->guard('client-api')->user()->id;

            $post->update($request_data);

            $subcategory = SubCategory::find($request->sub_category_id);
            $features_ids = array();
            $features_array = array();
            foreach($subcategory->features as $index=>$feature){
                $features_ids[$index] = $feature->id;
            }
            foreach ($features_ids as $value) {
                if(array_key_exists($value ,$request->features) ){
                    $features_array[$value] = ['value' => $request->features["$value"]];
                }else{
                    $features_array[$value] = ['value' =>  0];
                }
            }

            $post->features()->detach();
            $post->features()->sync($features_array);

            if($request->has('photos')){
                $post->photos()->delete();
                foreach ($request->photos as  $index=>$value) {
                    $photo = $this->StoreFiles($value , 'assets/files/post/images' , 'post_'.$index.'_'.strtotime(Carbon::now()));
                    Photo::create([
                        'post_id' => $post->id,
                        'value' => $photo,
                    ]);
                }
            }
            return $this->returnSuccessMessage(__('api.updated_successfully'),'000S');
        }else{
            return $this->returnError("S000",__('api.item_not_found'));
        }//end if

    }//end of update function

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if($post){
            $post->delete();
            return $this->returnSuccessMessage(__('api.deleted_successfully'), "S000");
        }else{
            return $this->returnError('000F',__('api.item_not_found'));
        }
    }//end of destroy function

    public function latestPost(Request $request){
        $lang = $request->header('Accept-Language');
        if($lang){
            App::setLocale($lang);
        }
        if($this->IsAuthenticated($request) == true){
            $user = auth()->guard('client-api')->user();
            $posts = Post::where('status',1)->with(['country','city','category','subcategory','features','client','favorite' => function ($query) use ($user) {
                $query->where('client_id', $user->id)
                ->where('client_id', $user->id);
            }])->orderBy('id', 'asc')->get();
            return $this->returnData('data' , $posts);
        }else{
            $posts = Post::where('status',1)->with(['country','city','category','subcategory','features','client'])->orderBy('id', 'asc')->get();
            return $this->returnData('data' , $posts);
        }

    }//end of latest post function

    public function featurePost(Request $request){
        $lang = $request->header('Accept-Language');
        if($lang){
            App::setLocale($lang);
        }

        if($this->IsAuthenticated($request) == true){
            $user = auth()->guard('client-api')->user();
            $posts = Post::where('status',1)->where('feature',1)->with(['country','city','category','subcategory','features','client','favorite' => function ($query) use ($user) {
                $query->where('client_id', $user->id)
                ->where('client_id', $user->id);
            }])->orderBy('id', 'asc')->get();
            return $this->returnData('data' , $posts);
        }else{
            $posts = Post::where('status',1)->where('feature',1)->with(['country','city','category','subcategory','features','client'])->orderBy('id', 'asc')->get();
            return $this->returnData('data' , $posts);
        }


    }//end of feature post

    public function myPosts(Request $request){
        $lang = $request->header('Accept-Language');
        if($lang){
            App::setLocale($lang);
        }
        $user = auth()->guard('client-api')->user();
        $posts = auth()->guard('client-api')->user()->posts()->with(['country','city','category','subcategory','features','client','photos','favorite' => function ($query) use ($user) {
            $query->where('client_id', $user->id)
            ->where('client_id', $user->id);
        }])->get();
        return $this->returnData('data' , $posts);
    }//end of myposts function

    public function getPostByCategoryAndSubcategory($category_id,$subcategory_id){
        $posts = Post::where('status',1)
                        ->where('category_id',$category_id)
                        ->where('sub_category_id',$subcategory_id)
                        ->with(['country','city','category','subcategory','features'])
                        ->get();
        return $this->returnData('data' , $posts);
    }//end of function

    public  function postAddFavorite($id){
        $post = Post::find($id);
        if($post){
            auth()->guard('client-api')->user()->favorites()->sync([$id]);
            return $this->returnSuccessMessage(__('api.created_successfully'), "S000");
        }else{
            return $this->returnError('000F',__('api.item_not_found'));
        }
    }//end of postAddFavorite function

    public  function postRemoveFavorite($id){
        $post = Post::find($id);
        if($post){
            auth()->guard('client-api')->user()->favorites()->detach([$id]);
            return $this->returnSuccessMessage(__('api.deleted_successfully'), "S000");
        }else{
            return $this->returnError('000F',__('api.item_not_found'));
        }
    }//end of postAddFavorite function

    public function getPostsFavorite(){
        $posts = auth()->guard('client-api')->user()->favorites()->with(['country','city','category','subcategory','features','client','photos'])->get();
        return $this->returnData('data' , $posts);
    }//end of getPostsFavorite function

    public function nearestPosts(Request $request)
    {
        $lang = $request->header('Accept-Language');
        if($lang){
            App::setLocale($lang);
        }
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $distance = AppSetting::first()->nearest_distance;
        // return $request;
        $haversine = "(
            6371 * acos(
                cos(radians(" .$latitude. "))
                * cos(radians(`latitude`))
                * cos(radians(`longitude`) - radians(" .$longitude. "))
                + sin(radians(" .$latitude. ")) * sin(radians(`latitude`))
            )
        )";

        $posts = Post::select("*")
            ->selectRaw("$haversine AS distance")
            ->having("distance", "<=", $distance)
            ->orderby("distance", "desc")
            ->when($request , function($query) use ($request){
                if($request->has('min_price') || $request->has('max_price')){
                    return $query->whereHas('translations', function($query) use ($request){
                        return $query->where('title','like','%'.$request->title.'%');
                    })->whereHas('category', function($query) use ($request){
                        return $query->whereHas('translations' , function($query) use ($request){
                            return $query->where('name','like','%'.$request->category.'%');
                        });
                    })->WhereHas('subcategory', function($query) use ($request){
                        return $query->whereHas('translations' , function($query) use ($request){
                            return $query->where('name','like','%'.$request->subcategory.'%');
                        });
                    })->WhereHas('country', function($query) use ($request){
                        return $query->whereHas('translations' , function($query) use ($request){
                            return $query->where('name','like','%'.$request->country.'%');
                        });
                    })->WhereHas('city', function($query) use ($request){
                        return $query->whereHas('translations' , function($query) use ($request){
                            return $query->where('name','like','%'.$request->city.'%');
                        });
                    })->where('price', '>=', (int)$request->min_price)
                    ->where('price', '<=', (int)$request->max_price);
                    // ->whereBetween('price', [$request->min_price, $request->max_price]);
                    // return $query->where('category_id','like','%'.$request->category_id.'%')
                    // ->orWhere('sub_category_id','like','%'.$request->sub_category_id.'%')
                    // ->where('country_id','like','%'.$request->country_id.'%')
                    // ->orWhere('city_id','like','%'.$request->city_id.'%')
                    // ->where('price', '>=', $request->min_price)
                    // ->where('price', '<=', $request->max_price);
                }else{
                    return $query->whereHas('translations', function($query) use ($request){
                        return $query->where('title','like','%'.$request->title.'%');
                    })->whereHas('category', function($query) use ($request){
                        return $query->whereHas('translations' , function($query) use ($request){
                            return $query->where('name','like','%'.$request->category.'%');
                        });
                    })->WhereHas('subcategory', function($query) use ($request){
                        return $query->whereHas('translations' , function($query) use ($request){
                            return $query->where('name','like','%'.$request->subcategory.'%');
                        });
                    })->WhereHas('country', function($query) use ($request){
                        return $query->whereHas('translations' , function($query) use ($request){
                            return $query->where('name','like','%'.$request->country.'%');
                        });
                    })->WhereHas('city', function($query) use ($request){
                        return $query->whereHas('translations' , function($query) use ($request){
                            return $query->where('name','like','%'.$request->city.'%');
                        });
                    });
                    // return $query->where('category_id','like','%'.$request->category_id.'%')
                    // ->orWhere('sub_category_id','like','%'.$request->sub_category_id.'%')
                    // ->where('country_id','like','%'.$request->country_id.'%')
                    // ->orWhere('city_id','like','%'.$request->city_id.'%');
                }
            })->where('status',1)->with(['country','city','category','subcategory','features','client'])->get();
        return $this->returnData('data' , $posts);

    }//end of nearestPosts function

}//end of class
