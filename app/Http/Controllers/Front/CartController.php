<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function storeToCart(Request $request , $id)
    {
        $product = Product::query()->find($id);
        $product_qty= $request->qty;
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->addToCart($product,$id,$product_qty);
        session()->put('cart',$cart);

        return response([
            'cart'=>$cart
        ]);

    }

    public function removeFromCart(Request $request , $id)
    {
        $product = Product::query()->find($id);
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeFromCart($product,$id);
        session()->put('cart',$cart);
        return response([
            'cart'=>$cart
        ]);
    }
}
