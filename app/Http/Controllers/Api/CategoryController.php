<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        // $category = Category::all();
        // return new  CategoryResource($category);
         
          return CategoryResource::collection(Category::paginate());
    }

    public function show( $id )
    {
    
        return new CategoryResource( Category::find($id) );
    }
}
