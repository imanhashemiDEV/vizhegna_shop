<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::query()->paginate(10);
        return view('admin.article.articles',compact('articles'));
    }

    public function create()
    {
        $categories = Category::query()->pluck('title','id');
        return view('admin.article.create',compact('categories'));
    }


    public function store(Request $request)
    {
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $fileName = time().'.'.$photo->extension();
            $photo->move(public_path('images/articles'), $fileName);
        }

       Article::query()->create([
            'title'=>$request->title,
           'body'=>$request->body,
           'photo'=>$fileName,
           'user_id'=>auth()->user()->id,
           'category_id'=>$request->category_id
       ]);

        return redirect()->route('articles.create')->with('message','مقاله با موفقیت ثبت شد');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $categories = Category::query()->pluck('title','id');
        $article = Article::query()->find($id);
        return view('admin.article.update', compact('categories','article'));
    }


    public function update(Request $request, $id)
    {
        $fileName = Article::query()->find($id)->photo;

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $fileName = time().'.'.$photo->extension();
            $photo->move(public_path('images/articles'), $fileName);
        }

        Article::query()->find($id)->update([
            'title'=>$request->title,
            'body'=>$request->body,
            'photo'=>$fileName,
            'user_id'=>auth()->user()->id,
            'category_id'=>$request->category_id
        ]);

        return redirect()->back()->with('message','مقاله با موفقیت ویرایش شد');
    }


    public function destroy($id)
    {
        Article::destroy($id);
        return redirect()->back()->with('message','مقاله با موفقیت حذف شد');

    }
}
