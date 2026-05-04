<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // halaman login
    public function login(){
        return view('login');
    }

    // proses login
    public function process(Request $request){
        $user = User::where('name', $request->name)->first();

        if(!$user){
            return back()->with('error', 'User tidak ditemukan');
        }

        if(!Hash::check($request->password, $user->password)){
            return back()->with('error', 'Password salah');
        }

        Session::put('user_id', $user->id);
        Session::put('role', $user->role);

        return redirect('/dashboard');
    }

    // halaman register
    public function register(){
        return view('register');
    }

    // simpan register
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:users',
            'password' => 'required|min:6',
            'role' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect('/login')->with('success', 'Berhasil daftar!');
    }

    // logout
    public function logout(){
        Session::flush();
        return redirect('/login');
    }
}