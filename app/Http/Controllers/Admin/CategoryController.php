<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::query()->paginate(10);
        return  view('admin.category.categories',compact('categories'));
    }


    public function create()
    {
        $categories=Category::query()->pluck('title','id');
        return view('admin.category.create_category',compact('categories'));
    }


    public function store(CategoryRequest $request)
    {
        $category = Category::query()->create([
            'title'=>$request->input('title'),
            'slug'=>make_slug($request->input('title')),
            'parent_id'=>$request->input('parent_id')
        ]);

        return redirect()->back()->with('message','دسته بندی با موفقیت اضافه شد');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::query()->find($id);
        $categories=Category::query()->pluck('title','id');
        return view('admin.category.update_category',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
       $category = Category::query()->find($id)->update([
           'title'=>$request->input('title'),
           'slug'=>make_slug($request->input('title')),
           'parent_id'=>$request->input('parent_id')
       ]);

        return redirect()->back()->with('message','دسته بندی با موفقیت ویرایش شد');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $category = Category::query()->find($id);
        if(count($category->products) > 0){
            return Response()->json(false);
        }else{
           // Category::destroy($id);
            return  Response()->json(true);
        }

    }

}
