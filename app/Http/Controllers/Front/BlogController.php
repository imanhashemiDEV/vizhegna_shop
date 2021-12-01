<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::query()->where('parent_id',0)->get();
        $articles=Article::query()->paginate(12);
        return view('front.blog',compact('categories','articles'));
    }

    public function article($id)
    {
        $categories = Category::query()->where('parent_id',0)->get();
        $article = Article::query()->find($id);
        return view('front.blog_details', compact('categories', 'article'));
    }
}
