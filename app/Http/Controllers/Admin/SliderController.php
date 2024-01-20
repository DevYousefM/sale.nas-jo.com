<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\Slider;
use Carbon\Carbon;
use App\Traits\CustomFunctions;

class SliderController extends Controller
{
    use CustomFunctions;

    public function index(){
        $slider = Slider::paginate(15);
        return view('admin.slider.index',compact('slider'));
    }//end of index function

    public function create(){
        return view('admin.slider.create');
    }//end of create function

    public function store(SliderRequest $request){
        if($request->has('photo')){
            $photo = $this->StoreFiles($request->photo , 'assets/files/slider/images' , 'slider_'.strtotime(Carbon::now()));
            Slider::create([
                'photo' => $photo,
                'status' => 0,
            ]);
            session()->flash('success', __('admin.created_successfully'));
            return redirect()->route('slider.index');
        }
    }//end of store function

    public function destroy($id){
        $slider = Slider::findOrFail($id);
        $slider->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('slider.index');
    }//end of destory function

}//end of class
