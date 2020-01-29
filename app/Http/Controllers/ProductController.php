<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
}
