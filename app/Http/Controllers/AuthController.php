<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showFormLogin(){
        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                return redirect()->route('admin.dashboard');
            }else if(Auth::user()->role == 'resepsionis'){
                return redirect()->route('resepsionis.dashboard');
            }
        }
        
        return view('/login');
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
            return redirect('/login')->with('error', 'Username atau Password salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}   