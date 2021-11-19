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


    public function listComment()
    {
       $comments = Comment::query()->paginate(10);
       return view('admin.commnt.comments',compact('comments'));
    }

    public function submitComment(Request $request,$id)
    {
        $comment = Comment::query()->find($id);
        if($comment->status==0){
            $comment->status='1';
            $comment->save();
        }else{
            $comment->status='0';
            $comment->save();
        }

        return redirect()->back();
    }
}
