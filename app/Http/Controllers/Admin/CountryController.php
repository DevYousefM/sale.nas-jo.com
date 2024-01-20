<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Http\Requests\Admin\CountryRequest;
use App\Traits\CustomFunctions;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    use CustomFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        // $countries = Country::paginate(15);
        $data = $request->all();
        $countries = Country::whereHas('translations' , function($query) use ($request){
            return $query->where('name','like','%'.$request->search.'%')
                    ->orWhere('currency','like','%'.$request->search.'%')
                    ->orWhere('code','like','%'.$request->search.'%');
        })->paginate(15);
        // return $data;
        return view('admin.country.index',compact('countries','data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.country.create');
    }//end of create function

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        $request_data = $request->except(['photo']);
        if($request->has('photo')){
            $request_data['photo'] = $this->StoreFiles($request->photo , 'assets/files/country/images' , 'country_'.strtotime(Carbon::now()));
        }
        Country::create($request_data);
        session()->flash('success', __('admin.created_successfully'));
        return redirect()->route('country.index');
    }//end of store fiunction

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('admin.country.edit',compact('country'));
    }//end of edit function

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id)
    {
        $request_data = $request->except(['photo']);
        if($request->has('photo')){
            $request_data['photo'] = $this->StoreFiles($request->photo , 'assets/files/country/images' , 'country_'.strtotime(Carbon::now()));
        }
        foreach(config('translatable.locales') as $key=>$lang){
            $except[$key] = "id:$lang";
        }
        $country = Country::findOrFail($id);
        $country->update($request_data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('country.index');
    }//end of updated function

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('country.index');
    }//end of destroy function


}//end of class
