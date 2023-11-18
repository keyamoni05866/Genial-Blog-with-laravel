<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
class profileController extends Controller
{
   public function index(){
    return view('dashboard.profile.index');
   }

      // name update
      public function name_update(Request $request,$id) {
        $request->validate([
            'name'=>'required',
         ]);

    User::find($id)->update([
        'name' => $request->name,
        'created_at' => now(),
    ]);
    return back()->with('name_success','Name Update Successfully');
    }

    // email
    public function email_update(Request $request,$id) {
        $request->validate([
            'email'=>'required|email',
         ]);

    User::find($id)->update([
        'email' => $request->email,
        'created_at' => now(),
    ]);
    return back()->with('email_success','Email Update Successfully');
    }

    // password

    public function password_update(Request $request, $id){
        $request->validate([
            'current_password' => "required",
            'password' => "required|confirmed",
        ]);

        if(Hash::check($request->current_password, auth()->user()->password)){
               User::findOrFail($id)->update([
                    'password' => $request->password,
                    'created_at' => now(),
               ]);
               return back()->with('password_success','Password Change Successfully');
        }else{
               return back()->with('password_error','Current Password Does not match');
        }
    }

    // image update

    public function image_update(Request $request,$id) {
        $request->validate([
           'image'=>'required|image',
        ]);
        if(auth()->user()->image == 'profile.jpg'){

           $new_name = auth()->id()."-".auth()->user()->name.".".$request->file('image')->getClientOriginalExtension();
           $img = Image::make($request->file('image'))->resize(300, 200);
           $img->save(base_path('public/uploads/default/'.$new_name), 60);

           User::find($id)->update([
               'image'=>$new_name,
               'updated_at'=>now(),
           ]);
           return back();

        }else{
           unlink(public_path(path: 'uploads/default/'. auth()->user()->image));
           $new_name = auth()->id()."-".auth()->user()->name.".".$request->file('image')->getClientOriginalExtension();
           $img = Image::make($request->file('image'))->resize(300, 200);
           $img->save(base_path('public/uploads/default/'.$new_name), 60);

           User::find($id)->update([
               'image'=>$new_name,
               'updated_at'=>now(),
           ]);
           return back();
        }

   }
}
