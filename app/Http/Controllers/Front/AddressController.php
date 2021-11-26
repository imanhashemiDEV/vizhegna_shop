<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function addUserAddress(Request $request)
    {
        if(Auth::check()){
            Address::query()->create([
                'address'=>$request->address,
                'user_id'=>auth()->user()->id
            ]);

            return redirect()->back();
        }else{
            return  redirect()->route('login');
        }

    }
}
