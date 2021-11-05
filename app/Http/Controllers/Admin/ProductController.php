<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::query()->paginate(10);
        return view('admin.product.products', compact('products'));
    }

    public function create()
    {
        $colors = Color::query()->pluck('title', 'id');
        $categories = Category::query()->where('parent_id', '!=', 0)->pluck('title', 'id');
        $brands = Brand::query()->pluck('title', 'id');;
        return view('admin.product.create_product', compact('categories', 'brands', 'colors'));
    }


    public function store(ProductRequest $request)
    {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '.' . $image->extension();
            $image->move(public_path('images/products'), $fileName);
        }

        $product = Product::query()->create([
            'title' => $request->input('title'),
            'slug' => make_slug($request->input('title')),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'title_en' => $request->input('title_en'),
            'guaranty' => $request->input('guaranty'),
            'product_count' => $request->input('product_count'),
            'image' => $fileName,
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id')
        ]);

        $colors = $request->colors;
        $product->colors()->attach($colors);

        return redirect()->back()->with('message', 'محصول با موفقیت ثبت شد');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $colors = Color::query()->pluck('title', 'id');
        $product = Product::query()->find($id);
        $categories = Category::query()->where('parent_id', '!=', 0)
            ->pluck('title', 'id');
        $brands = Brand::query()->pluck('title', 'id');;
        return view('admin.product.update_product', compact('categories', 'brands', 'product', 'colors'));
    }


    public function update(ProductRequest $request, $id)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '.' . $image->extension();
            $image->move(public_path('images/products'), $fileName);
        }

        $product = Product::query()->find($id);

        $product->title = $request->input('title');
        $product->slug = make_slug($request->input('title'));
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->title_en = $request->input('title_en');
        $product->guaranty = $request->input('guaranty');
        $product->product_count = $request->input('product_count');
        $product->image = $fileName;
        $product->category_id = $request->input('category_id');
        $product->brand_id = $request->input('brand_id');

        $product->save();

        $colors = $request->colors;
        $product->colors()->sync($colors);

        return redirect()->back()->with('message', 'محصول با موفقیت ویرایش شد');
    }

    public function destroy($id)
    {
        $product = Product::query()->find($id);
        $path = public_path() . "/images/products/" . $product->image;
        unlink($path);
        $product->delete();
    }
}
