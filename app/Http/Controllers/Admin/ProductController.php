<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::query()->paginate(10);
        return  view('admin.product.products',compact('products'));
    }

    public function create()
    {
        $categories = Category::query()->where('parent_id','!=',0)->pluck('title','id');
        $brands = Brand::query()->pluck('title','id');;
        return view('admin.product.create_product',compact('categories','brands'));
    }


    public function store(ProductRequest $request)
    {

        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = time().'.'.$image->extension();
            $image->move(public_path('images/products'), $fileName);
        }

        Product::query()->create([
            'title'=>$request->input('title'),
            'slug'=>make_slug($request->input('title')),
            'price'=>$request->input('price'),
            'description'=>$request->input('description'),
            'image'=>$fileName,
            'category_id'=>$request->input('category_id'),
            'brand_id'=>$request->input('brand_id')
        ]);

        return redirect()->back()->with('message','محصول با موفقیت ثبت شد');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $product = Product::query()->find($id);
        $categories = Category::query()->where('parent_id','!=',0)
            ->pluck('title','id');
        $brands = Brand::query()->pluck('title','id');;
        return view('admin.product.update_product',compact('categories','brands','product'));
    }


    public function update(ProductRequest $request, $id)
    {
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = time().'.'.$image->extension();
            $image->move(public_path('images/products'), $fileName);
        }

        Product::query()->find($id)->update([
            'title'=>$request->input('title'),
            'slug'=>make_slug($request->input('title')),
            'price'=>$request->input('price'),
            'description'=>$request->input('description'),
            'image'=>$fileName,
            'category_id'=>$request->input('category_id'),
            'brand_id'=>$request->input('brand_id')
        ]);

        return redirect()->back()->with('message','محصول با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        $product = Product::query()->find($id);
        $path = public_path()."/images/products/".$product->image;
        unlink($path);
        $product->delete();
    }
}
