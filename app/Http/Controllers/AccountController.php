<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //
    public function index_login(){
        return view('account.login');
    }
    public function index_regis(){
        return view('account.regis');
    }

    public function store_regis(Request $request){
        $validated = $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users',
            'email' => 'email:dns|required|unique:users',
            'password' => 'required|min:8'
        ]);
        $validated['password'] = Hash::make($validated['password']);
        $validated['id_role'] = 1;
        User::create($validated);
        // dd($validated);
        return redirect('/login')->with('berhasil',"Selamat bergabung bersama kami 🙏 Silahkan Login!!");
    }
    public function store_login(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 'user' OR Auth::user()->role == 'member') {
                return redirect()->intended('/dashboard/user');
            } else if(Auth::user()->role == 'admin' OR Auth::user()->role == 'superadmin'){
                return redirect()->intended('/dashboard/admin');
            }
            
        }
        return back()->with('failed', 'Login Gagal ! Ulangi Beberapa Saat Lagi');
    }

    public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
}
}
