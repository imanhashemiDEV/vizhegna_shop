<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BrandExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Imports\BrandImport;
use App\Models\Brand;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::query()->paginate(10);
        return view('admin.brand.brands',compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create_brand');
    }


    public function store(BrandRequest $request)
    {
        $title = $request->input('title');
        if($request->hasFile('image')){

            $image = $request->file('image');
            $fileName = time().'.'.$image->extension();
            $image->move(public_path('images/brands'), $fileName);
        }

        Brand::query()->create([
            'title'=>$title,
            'image'=>$fileName
        ]);

        return redirect()->route('brands.create')->with('message','برند با موفقیت ثبت شد');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $brand = Brand::query()->find($id);
        return view('admin.brand.update_brand',compact('brand'));
    }

    public function update(BrandRequest $request, $id)
    {
        $title = $request->input('title');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = time().'.'.$image->extension();
            $image->move(public_path('images/brands'), $fileName);
        }

        Brand::query()->find($id)->update([
            'title'=>$title,
            'image'=>$fileName
        ]);

        return redirect()->back()->with('message','برند با موفقیت بروزرسانی شد');
    }


    public function destroy($id)
    {
        $brand = Brand::query()->find($id);
        $path = public_path()."/images/brands/".$brand->image;
        unlink($path);
        $brand->delete();
    }

    public function exportExcel()
    {
        $brands = Brand::query()->get();
        return Excel::download(new BrandExport($brands),'brand-excel.xlsx');
    }

    public function importExcell()
    {
        return view('admin.brand.excel_brand');
    }

    public function insertExcel(Request $request)
    {
        Excel::import(new BrandImport(), $request->file('file')->store('temp'));
        return back();
    }
}
