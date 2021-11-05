<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PropertyGroup;
use Illuminate\Http\Request;

class PropertyGroupController extends Controller
{

    public function index()
    {
        $property_groups = PropertyGroup::query()->paginate(10);
        return  view('admin.peoperty_group.property_groups',compact('property_groups'));
    }


    public function create()
    {
        $categories=Category::query()->where('parent_id','!=',0)->pluck('title','id');
        return view('admin.peoperty_group.create_property_group',compact('categories'));
    }


    public function store(Request $request)
    {
        PropertyGroup::query()->create([
            'title'=>$request->title,
            'category_id'=>$request->category_id
        ]);

        return redirect()->back()->with('message','گروه ویژگی ها با موفقیت اضافه شد');
    }


    public function show($id)
    {

    }

    public function edit($id)
    {
        $categories=Category::query()->where('parent_id','!=',0)->pluck('title','id');
        $property_group = PropertyGroup::query()->find($id);
        return view('admin.peoperty_group.update_property_group',compact('property_group','categories'));
    }


    public function update(Request $request, $id)
    {
        PropertyGroup::query()->find($id)->update([
            'title'=>$request->title,
            'category_id'=>$request->category_id
        ]);

        return redirect()->back()->with('message','گروه ویژگی ها با موفقیت ویرایش شد');

    }

    public function destroy($id)
    {
        PropertyGroup::destroy($id);
    }
}
