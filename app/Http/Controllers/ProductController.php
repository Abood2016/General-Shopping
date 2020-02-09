<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'images'])->paginate(env('PAGINATION_COUNT'));

         $currency_code = env('CURRENCY_CODE' , "$");

        return view('admin.products.products')->with([
            'products' => $products,
            'currency_code' => $currency_code
        ]);

    }

    public function newproduct($id = null)
    {
        $product = null;
        if( !is_null( $id ) ){
            $product = Product::with([
                'hasUnit', 'category'
            ])->find($id);
         }

         $units = Unit::all();
         $categories = Category::all();

        return view('admin.products.new-product')->with([
            'product' => $product,
            'units' => $units,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request){

    }

    public function update(Request $request)
    {
        dd($request);
    }

    public function delete(Request $request ,$id)
    {
    }
}
