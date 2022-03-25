<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormLogin(){
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('admin/login');
    }

    public function login(Request $request){
        $data = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ],
        [
            'username.required' => 'Username tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ]);

        if(Auth::attempt($data)){
            if(Auth::user()->role == 'admin'){
                return redirect('admin/dashboard');
            }else{
                return redirect('resepsionis/dashboard');
            }
            // return redirect('/admin/dashboard');
        }else{
            return redirect('/admin/login');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/admin/login');
    }
}   