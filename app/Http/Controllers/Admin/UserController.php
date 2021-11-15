<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $users = User::query()->paginate(10);
        return view('admin.users.users',compact('users'));
    }


    public function create()
    {
        return view('admin.users.create_user');
    }


    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('message','کاربر با موفقیت ثبت شد');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::query()->find($id);
        return view('admin.users.update_user', compact('user'));
    }


    public function update(Request $request, $id)
    {
        User::query()->find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('message','کاربر با موفقیت ویرایش شد');
    }


    public function destroy($id)
    {
        //
    }

    public function createUserRoles($id)
    {
        $user = User::query()->find($id);
        $roles = Role::query()->get();
        return view('admin.users.create_user_roles',compact('user','roles'));
    }

    public function storeUserRoles(Request $request , $id)
    {
        $user = User::query()->find($id);
        $user->syncRoles($request->roles);
        return redirect()->back()->with('message','نقش ها با موفقیت به کاربر متصل شدند ');
    }
}
