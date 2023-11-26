<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryBlogController extends Controller
{
    public function index($id){
        $blogs = Blog::where('category_id',$id)->get();
        $category_blog = Category::where('id',$id)->first();
        return view('frontend.categoryBlog.index', compact('blogs','category_blog'));
    }
}
