<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Modal;
use App\Traits\CustomFunctions;
use Illuminate\Http\Request;

class ModalsController extends Controller
{
    use CustomFunctions;

    public function index(Request $request)
    {
        // $categories = Category::paginate(15);
        $data = $request->all();
        $modals =  Modal::whereHas('translations', function ($query) use ($request) {
            return $query->where('name', 'like', '%' . $request->search . '%');
        })->paginate(15);
        return view('admin.modal.index', compact('modals', 'data'));
    }

    public function create()
    {
        return view('admin.modal.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            "brand" => "required",
            "modal" => "required"
        ]);
        $request_data = $request->all();
        Modal::create($request_data);
        session()->flash('success', __('admin.created_successfully'));
        return redirect()->route('modal.index');
    }

    public function edit($id)
    {
        $modal = Modal::findOrFail($id);
        return view('admin.modal.edit', compact('modal'));
    }


    public function update(Request $request, $id)
    {
        $request_data = $request->all();
        foreach (config('translatable.locales') as $key => $lang) {
            $except[$key] = "id:$lang";
        }
        $modal = Modal::findOrFail($id);
        $modal->update($request_data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('modal.index');
    }

    public function destroy($id)
    {
        $modal = Modal::findOrFail($id);
        $modal->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('modal.index');
    }
}
