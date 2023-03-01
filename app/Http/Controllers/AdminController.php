<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array('message' => 'User logout successfully', 'alert-type' => 'success');

        return redirect('/login')->with($notification);
    } //end of method


    public function Profile()
    {

        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    }
    //end of method
    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    }
    //end of method
    public function StoreProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profile_image')) {

            $file = $request->file('profile_image');
            $filename = date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images/'), $filename);
            $data['profile_image'] = $filename;
        }
        //save data to the database
        $data->save();
        $notification = array('message' => 'Admin Profile Updated successfully', 'alert-type' => 'info');
        return redirect()->route('admin.profile')->with($notification);
    }
    //end of method

    public function ChangePassword()
    {
        return view('admin.change_password');
    }
    //end of method
    public function UpdatePassword(Request $request)
    {
        $validateData = $request->validate(
            [
                'oldpassword' => 'required',
                'newpassword' => 'required',
                'passwordconfirmation' => 'required|same:newpassword',

            ]
        );
        $hashpassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashpassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();
            Session()->flash('message', 'Password changed');
            return redirect()->back(); //redirect to the same page
        } else {
            Session()->flash('message', 'Old Password is not matched');
            return redirect()->back();
        }
    }
    //end of method
}
