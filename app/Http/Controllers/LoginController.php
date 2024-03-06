<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request){
        return view('login');
    }
    public function store(Request $request){
        $data=$request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        if (Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect('/quiz');
        }
        return back()->with('error','Login Failed');
    }
    public function logout(Request $request){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
