<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::whereRoleIs('admin')->paginate(15);
        return view('admin.sub-admin.index',compact('admins'));
    }//end of index function

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sub-admin.create');
    }//end of create function

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        $request_data = $request->except(['password','permissions']);
        $request_data['password'] = bcrypt($request->password);
        $admin = Admin::create($request_data);
        $admin->attachRole('admin');
        $admin->syncPermissions($request->permissions);
        session()->flash('success', __('admin.created_successfully'));
        return redirect()->route('sub-admin.index');
    }//end of store function


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.sub-admin.edit',compact('admin'));
    }//end of edit function

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $request_data = $request->except(['password','permissions']);
        $request_data['password'] = bcrypt($request->password);
        $admin->update($request_data);
        $admin->syncPermissions($request->permissions);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('sub-admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('sub-admin.index');
    }

    public function updatePlayerId(Request $request)
    {
        $admin = Admin::find(auth()->guard('admin')->user()->id);
        $admin->player_id = $request->userId;
        $admin->save();
        return response()->json([
            'status' => 'success',
        ]);
        # code...
    }
}
