<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Traits\CustomFunctions;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use CustomFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        // $categories = Category::paginate(15);
        $data = $request->all();
        $categories = Category::whereHas('translations' , function($query) use ($request){
            return $query->where('name','like','%'.$request->search.'%');
        })->paginate(15);
        return view('admin.category.index',compact('categories','data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }//end of create function

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $request_data = $request->except('icon');
        if ($request->has('icon')) {
            $request_data['icon'] = $this->StoreFiles($request->icon , 'assets/files/category/icons' , 'icon_'.strtotime(Carbon::now()));
        }
        Category::create($request_data);
        session()->flash('success', __('admin.created_successfully'));
        return redirect()->route('category.index');
    }//end of store fiunction

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }//end of edit function

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        foreach(config('translatable.locales') as $key=>$lang){
            $except[$key] = "id:$lang";
        }
        $request_data = $request->except('icon');
        if ($request->has('icon')) {
            $request_data['icon'] = $this->StoreFiles($request->icon , 'assets/files/category/icons' , 'icon_'.strtotime(Carbon::now()));
        }
        $category = Category::findOrFail($id);
        $category->update($request_data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('category.index');
    }//end of updated function

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('category.index');
    }//end of destroy function

}//end of class
