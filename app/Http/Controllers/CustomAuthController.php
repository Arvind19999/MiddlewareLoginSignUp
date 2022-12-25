<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function userRegister(Request $request)
    {
        // return "Value posted Successfully";
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = new Users();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $res = $user->save();
        if ($res) {
            return back()->with('success', 'Your account is Registered Successfully');
        } else {
            return back()->with('fails', 'Something went wrong, Please try again');
        }

    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
            // 'password'=>'required'
        ]);
        $user = Users::where('email', '=', $request->email)->first();
        if ($user) {
            if ($request->password == $user->password) {
                $request->session()->put('loginId', $user->id);
                return redirect('/dashboard');
            } else {
                return back()->with('fails', 'Please Enter Correct email and password');
            }

        } else {
            return back()->with('fails', 'Please Enter Correct email and password');
        }
    }

    public function dashBoard()
    {
        $data = array();
        if (Session::has('loginId')) {
            $data = Users::where('id', '=', Session::get('loginId'))->first();
            return view('dashboard', compact('data'));
        }
    }

    public function logOut(Request $request)
    {
        // print_r($request->all());
        if (Session::has('loginId')) {
            $request->session()->forget('loginId');
            
            return redirect('login')->with('success', 'You Are LoggedOut Successfully');

        }

    }
}