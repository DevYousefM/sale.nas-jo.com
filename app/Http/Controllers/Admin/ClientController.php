<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\Country;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data  = $request->all();
        $clients = Client::when($request , function($query) use ($request){
            return $query->where('username','like','%'.$request->username.'%')
                    ->where('mobile','like','%'.$request->mobile.'%')
                    ->where('email','like','%'.$request->email.'%')
                    ->where('country_id','like','%'.$request->country_id.'%')
                    ->where('city_id','like','%'.$request->city_id.'%');
        })->paginate(15);
        // $clients = Client::paginate(20);
        $countries = Country::all();
        return view('admin.client.index',compact('clients','countries','data'));
    }//end of index function

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.client.create',compact('countries'));
    }//end of create function

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $request_data = $request->except('password');
        $request_data['password'] = bcrypt($request->password);
        Client::create($request_data);
        session()->flash('success', __('admin.created_successfully'));
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        $countries = Country::all();
        $cities = $client->country->cities;
        return view('admin.client.show',compact('client','countries','cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $countries = Country::all();
        $cities = $client->country->cities;
        return view('admin.client.edit',compact('client','countries','cities'));
    }//end of edit function

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $client = Client::findOrFail($id);
        $request_data = $request->except('password');
        if(isset($request->password)){
            $request_data['password'] = bcrypt($request->password);
        }
        $client->update($request_data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('client.index');
    }//end of update function

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('client.index');
    }//end of destroy function

}
