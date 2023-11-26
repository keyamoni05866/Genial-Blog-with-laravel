<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagBlogController extends Controller
{
    public function index($id){
        $tag_name = Tag::where('id',$id)->first();
        $tag = Tag::with('manyrelationblogs')->where('id',$id)->get();
        $blogs= $tag[0]->manyrelationblogs;
     return view('frontend.tagBlog.index',compact('blogs','tag_name'));

 }
}
