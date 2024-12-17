<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Mail;
use Str;

class AuthController extends Controller
{
    public function login()
    {
        // dd(Hash::make(1234560));
        if(!empty(Auth::check()))
        {
            return redirect('admin/dashboard');
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type == 2)
            {
                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->user_type == 3)
            {
                return redirect('student/dashboard');
            }
            else if(Auth::user()->user_type == 4)
            {
                return redirect('parent/dashboard');
            }
            return redirect('admin/dashboard');
        }

        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        // dd($request->all());
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type == 2)
            {
                return redirect('teacher/dashboard');
            }
            else if(Auth::user()->user_type == 3)
            {
                return redirect('student/dashboard');
            }
            else if(Auth::user()->user_type == 4)
            {
                return redirect('parent/dashboard');
            }
            // return redirect('admin/dashboard');
        }
        else
        {
            return redirect()->back()->with('error', 'Please enter currect email and password');
        }
    }

    public function forgotpassword()
    {
        return view('auth.forgot');
    }

    public function PostForgotPassword(Request $request)
    {
        // dd($request->all());
        $user = User::getEmailSingle($request->email);
        // dd($user);
        if(!empty($user))
        {
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', "Please check your email amd reset password.");
        }
        else
        {
            return redirect('')->with('error', "Email not found in the system.");
        }
    }

    public function reset($token)
    {
        $user = User::gettokenSingle($token);
        if(!empty($user))
        {
            $data['user'] = $user;
            return view('auth.reset');
        }
        else
        {
            abort(404);
        }
    }

    public function PostReset($token, Request $request)
    {
        if($request->password == $request->cpassword)
        {
            $user = User::gettokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect('/')->with('success', "Password successfuly reset.");
        }
        else
        {
            return redirect()->back()->with('error', "Password and confirm password dose not match.");
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }

}
