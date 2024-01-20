<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNotify;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function index(){
        $notifications = AdminNotify::paginate(50);
        AdminNotify::query()->update(['status' => 1]);
        return view('admin.notification.index',compact('notifications'));
    }
    //end of index function

    public function destroy($id){
        $notify = AdminNotify::findOrFail($id);
        $notify->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('admin.notification');
    }

    public function nav_notifications(){
        $AdminNotifications = AdminNotify::where('status',0)->orderBy('id', 'DESC')->get();
        $countNotifications = count($AdminNotifications);
        $notifications = "";
        foreach ($AdminNotifications as $key => $notify) {
            $photo = $notify->client->photo;
            $message = $notify->message;
            $diffForHumans = $notify->created_at->diffForHumans();
            $notifications .="
                <a href=".route('post.show',$notify->post_id).">
                    <li class='list-group-item list-group-item-action dropdown-notifications-item'>
                        <div class='d-flex'>
                        <div class='flex-shrink-0 me-3'>
                            <div class='avatar'>
                            <img src='".asset($photo)."' alt class='w-px-40 h-auto rounded-circle' />
                            </div>
                        </div>
                        <div class='flex-grow-1'>
                            <p class='mb-1'>$message</p>
                            <small class='text-muted'>".$diffForHumans."</small>
                        </div>
                        </div>
                    </li>
                </a>
            ";
        }
        return response()->json([
            'status'=> true,
            'notifications' => $notifications,
            'countNotifications' => $countNotifications,
        ]);
    }


}//end of class
