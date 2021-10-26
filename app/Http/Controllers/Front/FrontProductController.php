<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontProductController extends Controller
{
    public function productDetail($id)
    {
        $product = Product::query()->find($id);
        return view('front.product_details',compact('product'));
    }


}
