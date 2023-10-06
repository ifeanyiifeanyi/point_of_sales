<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function show()
    {
        return view('admin.profile.index', ["user" => Auth::user()]);
    }

    public function update(Request $request,$user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:199'],
            'username' => ['required', 'string', 'max:199'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max: 2048'],
        ]);
         $user = User::where('username',$user)->first();

         if($request->file('photo')){
            if ($user->photo && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo)); // Delete the old image
            }

            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('admin/upload/admin_profile_image'), $filename);
            $user->photo = 'admin/upload/admin_profile_image/'.$filename;
         }

         $user->name = $request->name;
         $user->username = $request->username;
         $user->email = $request->email;
         $user->phone = $request->phone;
         $user->address = $request->address;
         $user->save();
         return to_route('admin.profile')->with('status', "Profile updated!!");
        //  dd($user);;
    }






    public function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
