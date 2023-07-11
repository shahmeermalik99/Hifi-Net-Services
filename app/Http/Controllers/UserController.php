<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userlist()
    {
        if (Auth::user() && (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
            $user = User::where('status', '=', 'yes')->get();
            return view('users.userlist', ['user' => $user]);
        } else {
            return redirect()->back();
        }
    }
    public function adduser()
    {
        if (Auth::user() && (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
        return view('users.adduser');
        }
        else{
            return redirect()->back();
        }
    }
    public function addusers(Request $request)
    {
        $request->validate(
            [

                'email' => 'required|unique:users,email,',
                'contact' => 'required|unique:users,contact,',
                'cnic' => 'required|unique:users,cnic,',
            ],
            [
                'email.unique' => 'Email already exist',
                'contact.unique' => 'Phone Number already exist',
                'cnic.unique' => 'Cnic already exist',
            ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->fname = $request->fname;
        $user->cnic = $request->cnic;
        $user->contact = $request->contact;
        $user->role = $request->role;
        $user->address = $request->address;
        $user->password = $request->password;
        $user->save();
        Alert::success('Success', 'User Added Successfully!');
        return redirect()->route('users.userlist');
    }

    public function quickshow($id)
    {
        if (Auth::user() && (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
        $user = User::findorfail($id);
        return view('users.showuser', compact('user'));
        }
        else{
            return redirect()->back();
        }
    }

    public function profile()
    {
        $user = Auth::user()->id;
        if ($user) {
            $user = User::findorfail($user);
            return view('users.showuser', compact('user'));
        } else {
            return redirect()->back();
        }
    }

    public function updateshow($id)
    {
        if (Auth::user() && (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Admin')) {
        $user = User::findorfail($id);
        return view('users.edituser', compact('user'))->with('status', '');;
        }
        else{
            return redirect()->back();
        }
    }

    public function updateusers(Request $request, $id)
    {
        $request->validate(
            [
                'email' => 'required|email|unique:users,email,' . $id,
                'contact' => 'required|unique:users,contact,' . $id,
                'cnic' => 'required|unique:users,cnic,' . $id,
            ],
            [
                'email.unique' => 'Email already exist',
                'contact.unique' => 'Phone Number already exist',
                'cnic.unique' => 'Cnic already exist',
            ]
        );


        $user = User::findorFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->fname = $request->fname;
        $user->cnic = $request->cnic;
        $user->contact = $request->contact;
        $user->role = $request->role;
        $user->address = $request->address;
        $user->save();
        Alert::success('Success', 'User Updated Successfully');
        return redirect()->route('users.userlist');
    }
    public function destroyuser($id)
    {
        if (Auth::user()) {
            $user = User::findorFail($id);
            $user->delete();
            Alert::success('success', 'User Deleted Successfully');
            return redirect()->route('users.userlist')->with('info', 'User Deleted Successfully!');
        } else {
            return redirect()->back();
        }
    }
}
