<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request){
        Comment::insert([
           'blog_id'=> $request->blog_id,
           'reply_id'=> $request->reply_id,
           'name'=> $request->name,
           'email'=> $request->email,
           'message'=> $request->message,
           'created_at'=> now(),
        ]);
        return back();
    }
}
