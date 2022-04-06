<?php

namespace App\Http\Controllers\Front;

use App\Helpers\DateShamsi;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
//        $users = User::query()->
//            whereHas('articles',function ($q){
//                $q->where('status',1);
//        })
//            ->get();
//
//
//        dd($users);
        //app()->setLocale('en');

        $now = Carbon::now();
        $start = $now->copy()->startOfWeek(Carbon::SATURDAY)->format('Y-m-d');
        $end = $now->copy()->endOfWeek(Carbon::FRIDAY)->format('Y-m-d');



       $users =  User::query()->whereDate('created_at','>=',$start)
                    ->whereDate('created_at','<=',$end)->get();


       // $categories = Category::query()->where('parent_id',0)->get();
       // return view('front.index',compact('categories'));
    }
}
