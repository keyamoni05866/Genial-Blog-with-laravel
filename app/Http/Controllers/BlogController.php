<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    // All Blogs view
    public function index(){
        $blogs = Blog::where('user_id',auth()->id())->paginate(2);
        // $alls = Blog::paginate(2);
        // $trashes = Blog::onlyTrashed()->get();
        return view('dashboard.blog.index',compact('blogs'));
    }


    // insert view
    public function insert_view(){
        $categories = Category::all();
        $tags = Tag::where('status','active')->get();
        return view('dashboard.blog.insert',compact('categories','tags'));
    }

      // database insert
      public function insert(Request $request){

        $new_name = auth()->id().'-'.rand(100,9999).'-'.now()->format('d-m-Y').'.'.$request->file('image')->getClientOriginalExtension();

        $img = Image::make($request->file('image'))->resize(300, 200);
        $img->save(base_path('public/uploads/blog/'.$new_name), 60);

        if($request->hasFile('image')){
          $blog =  Blog::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $new_name,
                'date' => $request->date,
                'category_id' => $request->category_id,
                'user_id' => auth()->id(),
                'created_at' => now()
             ]);
        }
        $blog->ManyRelationTags()->attach($request->ids);
        $blog->save();

        return back();
    }

    // change status
    public function status($id){
        $blog = Blog::where('id',$id)->first();

        if($blog->status == 'deactive'){
         Blog::find($id)->update([
              'status' => 'active',
              'update_at'=> now(),
         ]);
         return back();
        }else{
         Blog::find($id)->update([
             'status' => 'deactive',
             'update_at'=> now(),
        ]);
        return back();
        }
     }


       //  feature post

       public function feature($id){
        $blog = Blog::where('id', $id)->first();

        if($blog->feature == 'active'){
            Blog::find($id)->update([
             'feature' => 'deactive',
             'update_at' => now(),
            ]);
            return back();
        }else{
            Blog::find($id)->update([
                'feature' => 'active',
                'update_at' => now(),
               ]);
               return back();
        }
    }

       // Edit view

       public function edit_view($id){
        $categories = Category::all();
        $tags = Tag::all();
        $blog = Blog::where('id',$id)->first();

        return view('dashboard.blog.edit',[
            'categories' =>$categories,
            'tags' =>$tags,
            'blog' =>$blog,

        ]);

     }

    //  Edit

    public function edit(Request $request, $id){
        if($request->file('image')){
          $blog = Blog::where('id',$id)->first();
           unlink(public_path('uploads/blog/'. $blog->image));

                $new_name = $id.'-'.rand(999,1000).'-'.now()->format('d-m-Y').'.'.$request->file('image')->getClientOriginalExtension();

                $img = Image::make($request->file('image'))->resize(300, 200);
                $img->save(base_path('public/uploads/blog/'.$new_name), 60);

                $blog = Blog::find($id);
                $blog->title = $request->title;
                $blog->description = $request->description;
                $blog->image = $new_name;
                $blog->date = $request->date;
                $blog->category_id = $request->category_id;
                $blog->user_id = auth()->id();

                $blog->updated_at = now();
                $blog->ManyRelationTags()->sync($request->ids);
                $blog->save();
                return redirect()->route('blog');


        }else{

          $blog = Blog::find($id);
          $blog->title = $request->title;
          $blog->description = $request->description;
          $blog->date = $request->date;
          $blog->category_id = $request->category_id;
          $blog->user_id = auth()->id();
          $blog->updated_at = now();

          $blog->ManyRelationTags()->sync($request->ids);
          $blog->save();
          return redirect()->route('blog');
        }

       }


}
