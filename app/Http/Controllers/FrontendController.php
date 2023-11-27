<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
// error
  public function error(){
   return view('frontend.error.error');
 }

//  Main Index for root page  /////

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

            $comments = Comment::with('relationwithreply')->where('blog_id',$id)->whereNull('reply_id')->get();
            if($blog){
                Blog::find($id)->update([
                  'visitor_count' => $blog->visitor_count  + 1,
                ]);
            }
            return view('frontend.singleBlog.singleBlog', compact('blog','about','comments'));
        }



        // all Blogs

        public function blog_index(){

                $blogs = Blog::where('status','active')->get();
                return view('frontend.blogs.index',compact('blogs'));
        }


        // Contact

        public function contact_index(){
            return view('frontend.contact.index');
        }

        //contact post

        public function contact_post(Request $request){
            Contact::insert([

                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'created_at' => now(),

             ]);

            Mail::to($request->email)->send(new ContactMail($request->except('_token')));

             return back();
        }
}
