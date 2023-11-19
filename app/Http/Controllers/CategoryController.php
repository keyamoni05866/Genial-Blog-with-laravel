<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(3);
        return view('dashboard.category.index', compact('categories'));
    }



    // insert
    public function insert(Request $request)
    {

        $request->validate([
            "title" => 'required',
            "image" => 'required|image',
        ]);

        $new_name = auth()->id() . '-' . rand(999, 10000) . '-' . now()->format('M-d-Y') . '.' . $request->file('image')->getClientOriginalExtension();
        $img = Image::make($request->file('image'))->resize(300, 200);
        $img->save(base_path('public/uploads/category/' . $new_name), 60);

        if ($request->hasFile('image')) {
            if ($request->slug) {
                Category::insert([
                    'title' => $request->title,
                    'user_id' => auth()->id(),
                    'slug' => Str::slug($request->slug),
                    'image' => $new_name,
                    'created_at' => now(),
                ]);
            } else {
                Category::insert([
                    'title' => $request->title,
                    'user_id' => auth()->id(),
                    'slug' => Str::slug($request->title),
                    'image' => $new_name,
                    'created_at' => now(),
                ]);
            }

            return back()->with('category_success', 'Category Inserted Successfully');
        }
    }

    // status change
    public function status($id)
    {
        $category = Category::where('id', $id)->first();

        if ($category->status == 'active') {
            Category::find($id)->update([
                'status' => 'deactive',
                'created_at' => now(),
            ]);
            return back();
        } else {
            Category::find($id)->update([
                'status' => 'active',
                'created_at' => now(),
            ]);
            return back();
        }
    }

    // update
    public function update(Request $request, $id)
    {


        $category = Category::where('id', $id)->first();



        if ($request->hasFile('image')) {
            unlink(public_path('uploads/category/' . $category->image));
            $new_name = $id . '-' . $request->title . '-' . now()->format('M-d-Y') . '.' . $request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->resize(300, 200);
            $img->save(base_path('public/uploads/category/' . $new_name), 60);
            if ($request->slug) {
                Category::find($id)->update([
                    'title' => $request->title,
                    'user_id' => auth()->id(),
                    'slug' => Str::slug($request->slug),
                    'image' => $new_name,
                    'created_at' => now(),
                ]);
            } else {
                unlink(public_path('uploads/category/' . $category->image));
                Category::find($id)->update([
                    'title' => $request->title,
                    'user_id' => auth()->id(),
                    'slug' => Str::slug($request->title),
                    'image' => $new_name,
                    'created_at' => now(),
                ]);
            }
        } else {
            Category::find($id)->update([
                'title' => $request->title,
                'user_id' => auth()->id(),
                'slug' => Str::slug($request->slug),
                'created_at' => now(),
            ]);
        }
        return back()->with('category_update', 'Category Updated Successfully');
    }
    // delete

    public function delete($id){

        Category::find($id)->delete();
        return back()->with('delete_success','Category Deleted Successfully');
    }
}
