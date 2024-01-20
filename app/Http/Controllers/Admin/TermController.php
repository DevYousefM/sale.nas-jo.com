<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function index(){
        $term = Term::first();
        return view('admin.term.index',compact('term'));
    }//end of index function

    public function update(Request $request){
        $request_data = $request->all();
        $term = Term::first();
        if($term){
            $term->update($request_data);
            return view('admin.term.index',compact('term'));
        }else{
            $term = Term::create($request_data);
            return view('admin.term.index',compact('term'));
        }
    }//end of update function

}//end of class
