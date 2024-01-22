<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ModalRequest;
use App\Models\Modal;
use Illuminate\Http\Request;

class ModalsController extends Controller
{

    public function index(Request $request)
    {
        $data = $request->all();
        $modals =  Modal::whereHas('translations', function ($query) use ($request) {
            return $query->where('brand', 'like', '%' . $request->search . '%');
        })->paginate(15);
        return view('admin.modal.index', compact('modals', 'data'));
    }

    public function create()
    {
        return view('admin.modal.create');
    }


    public function store(ModalRequest $request)
    {

        $request_data = $request->all();

        $modal = Modal::create($request_data);

        foreach (config('translatable.locales') as $lang) {
            $modal->translateOrNew('modals', $lang, $request_data["modal:$lang"]);
        }
        $modal->saveTranslations();

        session()->flash('success', __('admin.created_successfully'));
        return redirect()->route('modals.index');
    }

    public function edit($id)
    {
        $modal = Modal::findOrFail($id);
        return view('admin.modal.edit', compact('modal'));
    }


    public function update(ModalRequest $request, $id)
    {
        $request_data = $request->all();
        foreach (config('translatable.locales') as $key => $lang) {
            $except[$key] = "id:$lang";
        }
        $modal = Modal::findOrFail($id);
        $modal->update($request_data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('modals.index');
    }

    public function destroy($id)
    {
        $modal = Modal::findOrFail($id);
        $modal->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('modals.index');
    }
}
