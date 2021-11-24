<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPayment()
    {
        $categories = Category::query()->where('parent_id',0)->get();
        return view('front.payment_details',compact('categories'));
    }
}
