<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        app()->setLocale('en');

        $categories = Category::query()->where('parent_id',0)->get();
        return view('front.index',compact('categories'));
    }
}
