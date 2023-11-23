<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
        public function index(){
            $blogs = Blog::where('status','active')->latest()->paginate(5);
            $features= Blog::where('feature','active')->get();
            $categories = Category::where('status','active')->get();
            return view('frontend.root.index', compact('features','blogs','categories'));
        }


        // single blog

        public function single($id){
            $blog = Blog::where('id',$id)->first();

            // if($blog){
            //     Blog::find($id)->update([
            //       'visitor_count' => $blog->visitor_count  + 1,
            //     ]);
            // }
            return view('frontend.singleBlog.singleBlog', compact('blog'));
        }
}
