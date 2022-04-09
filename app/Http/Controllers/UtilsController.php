<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Location;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class UtilsController extends Controller
{
    public function getCities($country_id)
    {
        $cities = City::where('country_id', $country_id)->get();
        return response()->json($cities, 200);
    }

    public function getLocations($city_id)
    {
        $cities = Location::where('city_id', $city_id)->get();
        return response()->json($cities, 200);
    }

    public function getSubcategories($category_id)
    {
        $subcategories = Subcategory::where('category_id', $category_id)
                                    ->orderBy('name')
                                    ->get(); 
        return response()->json($subcategories, 200);
    }
}
