<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function show()
    {
        return view('admin.profile.index', ["user" => Auth::user()]);
    }

    public function update(Request $request, $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:199'],
            'username' => ['required', 'string', 'max:199'],
            'address' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max: 2048'],
        ]);
        $user = User::where('username', $user)->first();

        if ($request->file('photo')) {
            if ($user->photo && file_exists(public_path($user->photo))) {
                unlink(public_path($user->photo)); // Delete the old image
            }

            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('admin/upload/admin_profile_image'), $filename);
            $user->photo = 'admin/upload/admin_profile_image/' . $filename;
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
        $notification = [
            'message' => 'Profile updated',
            'alert-type' => 'success'
        ];
        return to_route('admin.profile')->with($notification);
        //  dd($user);;
    }
    public function showPassword()
    {
        return view('admin.profile.show');
    }



    public function updateAdminPassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required','string','confirmed','min:6','max:10']
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            $notification = [
                'message' => 'Invalid credentials',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }
        if (Hash::check($request->new_password, auth()->user()->password)) {
            $notification = [
                'message' => 'Previous password can not be used',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }

        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = [
            'message' => 'Password updated successfully!',
            'alert-type' => 'success'
        ];
        // Auth::login(Auth::user());
        return redirect()->back()->with($notification);
    }


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
