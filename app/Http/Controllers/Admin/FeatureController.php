<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeatureRequest;
use App\Models\Feature;
use App\Models\Menu;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $features = Feature::paginate(15);
        $data = $request->all();
        $features = Feature::whereHas('translations', function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->search . '%');
        })->paginate(15);
        return view('admin.feature.index', compact('features', 'data'));
    } //end of index function

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feature.create');
    } //end of create function

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeatureRequest $request)
    {
        // return $request;
        $request_data = $request->all();
        $feature = Feature::create($request_data);
        $menu = array_filter($request->values, function ($value) {
            return $value !== null;
        });

        Menu::create([
            "feature_id" => $feature->id,
            "menu" => json_encode($menu),
        ]);

        session()->flash('success', __('admin.created_successfully'));
        return redirect()->route('feature.index');
    } //end of store fiunction



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature = Feature::findOrFail($id);
        return view('admin.feature.edit', compact('feature'));
    } //end of edit function

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureRequest $request, $id)
    {
        foreach (config('translatable.locales') as $key => $lang) {
            $except[$key] = "id:$lang";
        }
        $request_data = $request->all();
        $feature = Feature::findOrFail($id);
        $feature->update($request_data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('feature.index');
    } //end of updated function

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('feature.index');
    } //end of destroy function

}//end of class
