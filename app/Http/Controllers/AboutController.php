<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class AboutController extends Controller
{
   public function index(){
    $abouts=About::all();
    return view('dashboard.about_me.index', compact('abouts'));
   }

// about insert

  public function insert(Request $request){

    $new_name = auth()->id().'-'.rand(10000,999999).'-'.now()->format('d-m-Y').'.'.$request->file('image')->getClientOriginalExtension();

    $img = Image::make($request->file('image'))->resize(300, 200);
    $img->save(base_path('public/uploads/about/'.$new_name), 60);


        About::insert([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $new_name,
        'profession' => $request->profession,
        'created_at' => now()
     ]);

     return back();

  }

  public function status($id){
    $about = About::where('id', $id)->first();

        if ( $about->status == 'active') {
            About::find($id)->update([
                'status' => 'deactive',
                'created_at' => now(),
            ]);
            return back();
        } else {
            About::find($id)->update([
                'status' => 'active',
                'created_at' => now(),
            ]);
            return back();
        }
  }

//   delete

public function delete($id){
    About::find($id)->delete();
    return back();
}
}
