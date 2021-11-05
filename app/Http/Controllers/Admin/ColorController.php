<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{

    public function index()
    {
        $colors = Color::query()->paginate(10);
        return view('admin.color.colors',compact('colors'));
    }


    public function create()
    {
        return view('admin.color.create_color');
    }


    public function store(Request $request)
    {
        Color::query()->create([
            'title'=>$request->input('title'),
            'code'=>$request->input('code')
        ]);

        return redirect()->back()->with('message','رنگ با موفقیت اضافه شد');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $color = Color::query()->find($id);
        return view('admin.color.update_color',compact('color'));
    }


    public function update(Request $request, $id)
    {
        Color::query()->find($id)->update([
            'title'=>$request->input('title'),
            'code'=>$request->input('code')
        ]);

        return redirect()->back()->with('message','رنگ با موفقیت ویرایش شد');
    }


    public function destroy($id)
    {
         Color::destroy($id);
    }
}
