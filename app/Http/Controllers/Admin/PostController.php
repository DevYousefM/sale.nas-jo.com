<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Http\Requests\PostRequest;
use App\Models\AdminNotify;
use App\Models\Client;
use App\Models\ClientNotify;
use App\Models\Photo;
use App\Models\Post;
use App\Models\SubCategory;
use App\Traits\CustomFunctions;
use Carbon\Carbon;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class PostController extends Controller
{
    use CustomFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();
        // $posts = Post::paginate(15);
        $posts = Post::when($request, function ($query) use ($request) {
            return $query->where('category_id', 'like', '%' . $request->category_id . '%')
                ->where('sub_category_id', 'like', '%' . $request->sub_category_id . '%')
                ->where('country_id', 'like', '%' . $request->country_id . '%')
                ->where('city_id', 'like', '%' . $request->city_id . '%');
        })->paginate(15);

        $categories = Category::all();
        $countries = Country::all();
        return view('admin.post.index', compact('posts', 'countries', 'categories', 'data'));
    } //end of index function

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $countries = Country::all();
        $clients = Client::all();
        return view('admin.post.create', compact('categories', 'countries', 'clients'));
    } //end of create function

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request_data = $request->except('features', 'photos', 'photo', 'status');

        if ($request->has('photo')) {
            $request_data['photo'] = $this->StoreFiles($request->photo, 'assets/files/post/images', 'post_' . strtotime(Carbon::now()));
        }

        if (isset($request->status)) {
            $request_data['status'] = 1;
        } else {
            $request_data['status'] = 0;
        }

        // Create the post
        $post = Post::create($request_data);

        // Process features
        $subcategory = SubCategory::find($request->sub_category_id);
        $features_ids = $subcategory->features->pluck('id')->toArray();
        $features_array = [];

        foreach ($features_ids as $featureId) {
            $featureKey = (string) $featureId;

            if (array_key_exists($featureKey, $request->features)) {
                $featureValue = $request->features[$featureKey];

                // Check if the value is an array
                if (is_array($featureValue)) {
                    $featureValue = json_encode($featureValue);
                }

                $features_array[$featureId] = ['value' => $featureValue];
            } else {
                $features_array[$featureId] = ['value' => 0];
            }
        }

        // Sync features for the post
        $post->features()->sync($features_array);

        // Process photos
        foreach ($request->photos as $index => $value) {
            $photo = $this->StoreFiles($value, 'assets/files/post/images', 'post_' . $index . '_' . strtotime(Carbon::now()));
            Photo::create([
                'post_id' => $post->id,
                'value' => $photo,
            ]);
        }

        session()->flash('success', __('admin.created_successfully'));
        return redirect()->route('post.index');
    } //end of store function

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $clients = Client::all();
        $categories = Category::all();
        $countries = Country::all();
        $cities = $post->country->cities;
        $subcategories = $post->category->subcategories;

        $adminNotify = AdminNotify::where('post_id', $post->id)->first();
        $adminNotify->status = 1;
        $adminNotify->save();
        return view('admin.post.show', compact('categories', 'countries', 'post', 'cities', 'subcategories', 'clients'));
    } //end of show function

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        // return $post->features;
        $clients = Client::all();
        $categories = Category::all();
        $countries = Country::all();
        $cities = $post->country->cities;
        $subcategories = $post->category->subcategories;
        return view('admin.post.edit', compact('categories', 'countries', 'post', 'cities', 'subcategories', 'clients'));
    } //end of edit function

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $request_data = $request->except('features', 'photos', 'photo', 'status');
        if ($request->has('photo')) {
            $request_data['photo'] = $this->StoreFiles($request->photo, 'assets/files/post/images', 'post_' . strtotime(Carbon::now()));
        }
        if (isset($request->status)) {
            $request_data['status'] = 1;
        } else {
            $request_data['status'] = 0;
        }
        $post->update($request_data);

        $subcategory = SubCategory::find($request->sub_category_id);
        $features_ids = array();
        $features_array = array();
        foreach ($subcategory->features as $index => $feature) {
            $features_ids[$index] = $feature->id;
        }
        foreach ($features_ids as $value) {
            if (array_key_exists($value, $request->features)) {
                if ($request->features["$value"] == 'on') {
                    $features_array[$value] = ['value' => 1];
                } else {
                    $features_array[$value] = ['value' => $request->features["$value"]];
                }
            } else {
                $features_array[$value] = ['value' =>  0];
            }
        }
        $post->features()->detach();
        $post->features()->sync($features_array);

        if ($request->has('photos')) {
            $post->photos()->delete();
            foreach ($request->photos as  $index => $value) {
                $photo = $this->StoreFiles($value, 'assets/files/post/images', 'post_' . $index . '_' . strtotime(Carbon::now()));
                Photo::create([
                    'post_id' => $post->id,
                    'value' => $photo,
                ]);
            }
        }
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('post.index');
    } //end of updated function

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('post.index');
    } //end of destroy function


    public function postRefusal(Request $request)
    {
        // return $request;
        $post = Post::find($request->id);
        if ($post) {
            $post->reason_rejecting = $request->reason;
            $player_id = $post->client->player_id;
            $url = null;
            $message =  __('admin.Post Rejected', [], Config('app.locale')) . ' (' . $post->title . ') ' . __('admin.Because', [], Config('app.locale')) . ' ' . $request->reason;
            // OneSignalSendPush($player_id,$url,$message);
            $android_channel_id = 'ac437d0f-f098-4418-a7ac-52bef61de7ba';
            $notificationRedirectType = 'realstate';
            $notificationRedirectId = $post->id;
            OneSignalSendPush($player_id, $url, $message, $android_channel_id, $notificationRedirectId, $notificationRedirectType);
            ClientNotify::create([
                'post_id' => $post->id,
                'client_id' => $post->client->id,
                'message:ar' => __('admin.Post Rejected', [], 'ar') . ' (' . $post->translate('en')->title . ') ' . __('admin.Because', [], 'ar') . ' ' . $request->reason,
                'message:en' => __('admin.Post Rejected', [], 'en') . ' (' . $post->translate('en')->title . ') ' . __('admin.Because', [], 'en') . ' ' . $request->reason,
            ]);
            return response()->json([
                'status' => 'true',
                'title' => __('admin.rejecting_post_success'),
                'player_id' => $player_id,
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'title' => __('admin.error'),

            ]);
        }
    } //end of postRefusal function


}//end of class
