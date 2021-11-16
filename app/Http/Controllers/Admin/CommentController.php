<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeComment(Request $request)
    {
        $product_id =$request->product_id;
        $product = Product::query()->find($product_id);

        $comment = new Comment();
        $comment->user_id=auth()->user()->id;
        $comment->body = $request->body;
        $comment->status='0';

        $product->comments()->save($comment);

        return redirect()->back()->with('message','پیام شما پس از تایید نمایش داده می شود');
    }
}
