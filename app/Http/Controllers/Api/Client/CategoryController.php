<?php

namespace App\Http\Controllers\Api\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use App;
use App\Models\Modal;

class CategoryController extends Controller
{
    use GeneralTrait;

    public function all(Request $request)
    {
        $lang = $request->header('Accept-Language');
        if ($lang) {
            App::setLocale($lang);
        }
        $categories = Category::all();
        return $this->returnData('data', $categories);
    } //end of all function

    public function getSubCategoriesByID($id, Request $request)
    {
        $lang = $request->header('Accept-Language');
        if ($lang) {
            App::setLocale($lang);
        }
        $category = Category::find($id);
        if ($category) {
            return $this->returnData('data', $category->subcategories);
        } else {
            return $this->returnError('001', __('api.item_not_found'));
        }
    } //end of getSubCategoriesByID function

    public function all_subcategories(Request $request)
    {
        $lang = $request->header('Accept-Language');
        if ($lang) {
            App::setLocale($lang);
        }

        $subcategories = SubCategory::with('translations')->get();
        $result = [];
        foreach ($subcategories as $subcategory) {
            $subcategoryData = $subcategory->toArray();
            $subcategoryNames = $subcategory->translations->pluck('name', 'locale')->toArray();
            $modals = Modal::whereTranslation('brand', array_values($subcategoryNames))->get();
            $modalsArray = [];
            foreach ($modals as $modal) {
                $modalsArray = array_merge($modalsArray, json_decode($modal->modals, true));
            }
            $subcategoryData['models'] = $modalsArray;

            $result[] = $subcategoryData;
        }

        return $this->returnData('data', $result);
    } //end of all_subcategories function

    public function getFeaturesBySubCategoryID($id, Request $request)
    {
        $lang = $request->header('Accept-Language');
        if ($lang) {
            App::setLocale($lang);
        }
        $subcategory = SubCategory::findOrFail($id);
        return $this->returnData('data', $subcategory->features);
    } //end of function

}//end of class
