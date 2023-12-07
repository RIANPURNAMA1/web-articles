<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(){
        return view('auth.login');
    }
    public function loginprocess(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Login Successfully');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(){
        return view('auth.register');
    }
    public function registerprocess(Request $request){
   $validasi=  $request->validate([
       'name'=>'required',
       'email'=>'required |email',
       'password'=>'required',
     ]);
     $validasi['password'] = Hash::make($validasi['password']);
    User::create($validasi);

     return redirect()->route('login')->with('success','Register Successfully');

    }

    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login')->with('success','Logout Successfully');;
}
    }

