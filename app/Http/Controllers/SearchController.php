<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $search = $request->blog_search;
        $blogs = Blog::where('title','like',"%$search%")->orWhere('description','like',"%$search%")->get();
        return view('frontend.blogs.index',compact('blogs','search'));
     }
}
