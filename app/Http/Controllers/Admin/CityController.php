<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Http\Requests\Admin\CityRequest;
use Illuminate\Http\Request;

class CityController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data = $request->all();
        $cities = City::whereHas('translations', function($query) use ($request){
            return $query->where('name','like','%'.$request->search.'%');
        })->orWhereHas('country', function($query) use ($request){
            return $query->whereHas('translations', function($query) use ($request){
                return $query->where('name','like','%'.$request->search.'%');
            });
        })->paginate(15);
        return view('admin.city.index',compact('cities','data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.city.create',compact('countries'));
    }//end of create function

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $request_data = $request->all();
        City::create($request_data);
        session()->flash('success', __('admin.created_successfully'));
        return redirect()->route('city.index');
    }//end of store fiunction

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::findOrFail($id);
        $countries = Country::all();
        return view('admin.city.edit',compact('city','countries'));
    }//end of edit function

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
        foreach(config('translatable.locales') as $key=>$lang){
            $except[$key] = "id:$lang";
        }
        $request_data = $request->all();
        $city = City::findOrFail($id);
        $city->update($request_data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('city.index');
    }//end of updated function

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('city.index');
    }//end of destroy function

}//end of class
