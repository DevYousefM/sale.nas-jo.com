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

        // Get all subcategories with translations
        $subcategories = SubCategory::with('translations')->get();

        $result = [];

        foreach ($subcategories as $subcategory) {
            $subcategoryData = $subcategory->toArray();

            // Extract subcategory names in the current language
            $subcategoryNames = [];
            foreach ($subcategory->translations as $translation) {
                $subcategoryNames[$translation->locale] = $translation->name;
            }

            // Search for Modals with translated brand equal to subcategory names
            $modals = Modal::whereTranslationIn('brand', $subcategoryNames)->get();

            // Include the modals in the subcategory data
            $subcategoryData['modals'] = $modals->pluck('modals')->flatten()->unique()->toArray();

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
