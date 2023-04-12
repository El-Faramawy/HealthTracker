<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $data = Category::all();
        return apiResponse($data);
    }
    //================================================================

    public function category_search(Request $request){
       $data = Category::where('name_ar','like','%' .$request->name. '%')
           ->orWhere('name_en','like','%' .$request->name. '%')
           ->get();
        return apiResponse($data);
    }
    //================================================================
}
