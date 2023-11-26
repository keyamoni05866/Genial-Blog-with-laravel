<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
        public function index(){
            $blogs = Blog::where('status','active')->latest()->paginate(5);
            $features= Blog::where('feature','active')->get();
            $categories = Category::where('status','active')->get();
            $about=About::where('status','active')->first();
            $popular_blogs = Blog::where('status', 'active')->orderBy('visitor_count','desc')->take(3)->get();
            return view('frontend.root.index', compact('features','blogs','categories','about','popular_blogs'));
        }


        // single blog

        public function single($id){
            $blog = Blog::where('id',$id)->first();
            $about=About::where('status','active')->first();


            // return $about->profession;

            if($blog){
                Blog::find($id)->update([
                  'visitor_count' => $blog->visitor_count  + 1,
                ]);
            }
            return view('frontend.singleBlog.singleBlog', compact('blog','about'));
        }



        // all Blogs

        public function blog_index(){

                $blogs = Blog::where('status','active')->get();
                return view('frontend.blogs.index',compact('blogs'));
        }
}
