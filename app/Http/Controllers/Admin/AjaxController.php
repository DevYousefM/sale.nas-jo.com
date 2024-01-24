<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Category;
use App\Models\Client;
use App\Models\ClientNotify;
use App\Models\Post;
use App\Models\Slider;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function getCities(Request $request)
    {
        $id = $request->id;
        $country = Country::find($id);
        if ($country) {
            return response()->json([
                'data' => $country->cities
            ]);
        }
    } //end of get Cities function

    public function getSubCategories(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        if ($category) {
            return response()->json([
                'data' => $category->subcategories
            ]);
        }
    } //end of get getSubCategories function

    public function getFeatures(Request $request)
    {
        $id = $request->id;
        $category = SubCategory::find($id);

        if ($category) {
            $features = $category->features()->orderBy('inputType', 'DESC')->get();

            // Assuming there is a relationship between Feature and Menu models
            $menuData = $features->flatMap(function ($feature) {
                return $feature->menu ? $feature->menu->toArray() : [];
            });

            return response()->json(['data' => $menuData]);
        }
    } //end of get Features function

    public function changeFeatureStatus(Request $request)
    {
        $post = Post::find($request->id);
        if ($post) {
            $post->feature = $request->feature;
            $post->save();
            return response()->json([
                'status' => true
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }
    } //end of get changeFeatureStatus function

    public function changeStatus(Request $request)
    {
        $post = Post::find($request->id);
        if ($post) {
            $post->status = $request->status;
            $post->save();
            if ($request->status == "1") {
                $player_id = $post->client->player_id;
                $url = null;
                $message =  __('admin.Your ad has been published successfully', [], Config('app.locale')) . ' (' . $post->title . ') ';
                // OneSignalSendPush($player_id,$url,$message);
                $android_channel_id = 'ac437d0f-f098-4418-a7ac-52bef61de7ba';
                $notificationRedirectType = 'realstate';
                $notificationRedirectId = $post->id;
                OneSignalSendPush($player_id, $url, $message, $android_channel_id, $notificationRedirectId, $notificationRedirectType);
                ClientNotify::create([
                    'post_id' => $post->id,
                    'client_id' => $post->client->id,
                    'message:ar' => __('admin.Your ad has been published successfully', [], 'ar') . ' (' . $post->translate('ar')->title . ') ',
                    'message:en' => __('admin.Your ad has been published successfully', [], 'en') . ' (' . $post->translate('en')->title . ') ',
                ]);

                $clients = Client::whereNotNull('player_id')->where('player_id', '!=', $player_id)->get();
                foreach ($clients as $key => $client) {

                    $player_id = $client->player_id;
                    $url = null;
                    $message = $message =  __('admin.A new advertisement has been added', [], Config('app.locale')) . ' (' . $post->title . ') ';
                    $android_channel_id = 'ac437d0f-f098-4418-a7ac-52bef61de7ba';
                    $notificationRedirectType = 'realstate';
                    $notificationRedirectId = $post->id;
                    OneSignalSendPush($player_id, $url, $message, $android_channel_id, $notificationRedirectId, $notificationRedirectType);

                    ClientNotify::create([
                        'post_id' => $post->id,
                        'client_id' => $post->client->id,
                        'message:ar' => __('admin.A new advertisement has been added', [], 'ar'),
                        'message:en' => __('admin.A new advertisement has been added', [], 'en'),
                    ]);

                    // $player_id = $client->player_id;
                    // $url = null;
                    // $message = $message =  __('admin.A new advertisement has been added',[],Config('app.locale')).' ('.$post->title.') ';
                    // OneSignalSendPush($player_id,$url,$message);
                }
            }
            return response()->json([
                'status' => true,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'request' => $request->status,
            ]);
        }
    } //end of get changeStatus function

    public function changeSliderStatus(Request $request)
    {
        $slider = Slider::find($request->id);
        if ($slider) {
            $slider->status = $request->status;
            $slider->save();
            return response()->json([
                'status' => true
            ]);
        } else {
            return response()->json([
                'status' => false
            ]);
        }
    } //end of get changeSliderStatus function

}//end of class
