<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\General;
use App\Models\Policy;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Term;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::where('status',1)->orderBy('id', 'desc')->take(6)->get();
        $categories = Category::orderBy('id', 'asc')->take(4)->get();
        $postFeatures = Post::where('feature',1)->orderBy('id', 'asc')->get();
        $setting = General::first();
        $countries = Country::all();
        $categories = Category::all();
        $slider = Slider::where('status',1)->get();
        return view('website.index',compact('posts','categories','postFeatures','setting','slider','countries','categories'));
    }//end of index function

    public function show($id){
        $post = Post::findOrFail($id);
        $setting = General::first();
        $postFeatures = Post::where('status',1)->where('feature',1)->orderBy('id', 'asc')->take(10)->get();
        $countries = Country::all();
        $categories = Category::all();
        return view('website.show',compact('post','setting','postFeatures','countries','categories'));
    }//end of show function

    public function search(Request $request){
        $data = $request->all();
        $posts = Post::when($request , function($query) use ($request){
            if($request->has('price')){
                return $query->where('category_id','like','%'.$request->category_id.'%')
                ->orWhere('sub_category_id','like','%'.$request->sub_category_id.'%')
                ->where('country_id','like','%'.$request->country_id.'%')
                ->orWhere('city_id','like','%'.$request->city_id.'%')
                ->where('price', '>=', $request->min_price)
                ->where('price', '<=', $request->max_price);
            }else{
                return $query->where('category_id','like','%'.$request->category_id.'%')
                ->orWhere('sub_category_id','like','%'.$request->sub_category_id.'%')
                ->where('country_id','like','%'.$request->country_id.'%')
                ->orWhere('city_id','like','%'.$request->city_id.'%');
            }
        })->paginate(15);
        $country = Country::find($request->country_id);
        if($country){
            $cities = $country->cities;
        }else{
            $cities = array();
        }
        $category = Category::find($request->category_id);
        if($category){
            $subcategories = $category->subcategories;
        }else{
            $subcategories = array();
        }
        $setting = General::first();
        $postFeatures = Post::where('status',1)->where('feature',1)->orderBy('id', 'asc')->take(10)->get();
        $countries = Country::all();
        $categories = Category::all();
        return view('website.search',compact('posts','setting','postFeatures','countries','categories','data','cities','subcategories'));
    }//end of search function


    public function policy()
    {
        $policyTerm = Policy::first();
        $setting = General::first();
        $pageTitle = 'policy';
        return view('website.policyTermsAndConditions',compact('policyTerm','setting','pageTitle'));
    }
    public function TermsAndConditions()
    {
        $policyTerm = Term::first();
        $setting = General::first();
        $pageTitle = 'TermsAndConditions';
        return view('website.policyTermsAndConditions',compact('policyTerm','setting','pageTitle'));
    }

}//end of class
