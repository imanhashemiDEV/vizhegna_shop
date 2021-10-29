<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function addGallery($product_id)
    {
        $product = Product::query()->find($product_id);
        return view('admin.product.add_gallery',compact('product'));
    }

    public function storeGallery(Request $request,$product_id)
    {

        if($request->hasFile('file')){
            $image = $request->file('file');
            $fileName = time().'-'.$image->getClientOriginalName();
            $image->move(public_path('images/products'), $fileName);
        }


        Gallery::query()->create([
            'image'=>$fileName,
            'product_id'=>$product_id
        ]);

        return redirect()->back()->with('message','عکس با موفقیت ثبت شد');
    }

    public function deleteGallery($id)
    {
        $gallery = Gallery::query()->find($id);
        $path = public_path()."/images/products/".$gallery->image;
        unlink($path);
        $gallery->delete();

        return redirect()->back();
    }
}
