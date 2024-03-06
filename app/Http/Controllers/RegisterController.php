<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'username'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:3'
        ]);
        $data['password']=bcrypt($data['password']);
        User::create($data);
        $request->session()->flash('success','Registrasi Berhasil');
        return redirect('/login');
    }
}
