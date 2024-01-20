<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategoryRequest;
use App\Models\Category;
use App\Models\Feature;
use App\Models\SubCategory;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnValueMap;

class SubCategoryController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        // $subcategories = SubCategory::paginate(15);
        $data = $request->all();
        $subcategories = SubCategory::whereHas('translations', function($query) use ($request){
            return $query->where('name','like','%'.$request->search.'%');
        })->orWhereHas('categories', function($query) use ($request){
            return $query->whereHas('translations', function($query) use ($request){
                return $query->where('name','like','%'.$request->search.'%');
            });
        })->orWhereHas('features', function($query) use ($request){
            return $query->whereHas('translations', function($query) use ($request){
                return $query->where('name','like','%'.$request->search.'%');
            });
        })->paginate(15);
        return view('admin.subcategory.index',compact('subcategories','data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $features = Feature::all();
        return view('admin.subcategory.create',compact('categories','features'));
    }//end of create function

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        $request_data = $request->except('features');
        $subCategory = SubCategory::create($request_data);
        $subCategory->features()->sync($request->features);
        $subCategory->categories()->sync($request->categories);
        session()->flash('success', __('admin.created_successfully'));
        return redirect()->route('sub-category.index');
    }//end of store fiunction

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $features = Feature::all();
        $features_ids = array();
        foreach($subcategory->features as $index=>$feature){
            $features_ids[$index] = $feature->id;
        }
        $categories_ids = array();
        foreach ($subcategory->categories as $key => $category) {
            $categories_ids[$key] = $category->id;
        }
        $categories = Category::all();
        return view('admin.subcategory.edit',compact('subcategory','categories','features_ids','features','categories_ids'));
    }//end of edit function

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryRequest $request, $id)
    {
        foreach(config('translatable.locales') as $key=>$lang){
            $except[$key] = "id:$lang";
        }
        $request_data = $request->except('features','categories');
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update($request_data);
        $subcategory->features()->detach();
        $subcategory->features()->sync($request->features);
        $subcategory->categories()->detach();
        $subcategory->categories()->sync($request->categories);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('sub-category.index');
    }//end of updated function

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = SubCategory::findOrFail($id);
        $category->features()->detach();
        $category->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('sub-category.index');
    }//end of destroy function

}//end of class
