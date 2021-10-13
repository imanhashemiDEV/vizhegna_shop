<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::query()->paginate(10);
        return view('admin.brand.brands',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create_brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        if($request->hasFile('image')){

            $image = $request->file('image');
            $fileName = time().'.'.$image->extension();
            $image->move(public_path('brands'), $fileName);
        }

        Brand::query()->create([
            'title'=>$title,
            'image'=>$fileName
        ]);

        return redirect()->route('brands.create')->with('message','برند با موفقیت ثبت شد');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::query()->find($id);
        return view('admin.brand.update_brand',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $title = $request->input('title');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = time().'.'.$image->extension();
            $image->move(public_path('brands'), $fileName);
        }

        Brand::query()->find($id)->update([
            'title'=>$title,
            'image'=>$fileName
        ]);

        return redirect()->back()->with('message','برند با موفقیت بروزرسانی شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::destroy($id);
    }
}
