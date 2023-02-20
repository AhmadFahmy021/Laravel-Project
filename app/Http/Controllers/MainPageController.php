<?php

namespace App\Http\Controllers;

use App\Models\Web;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPageController extends Controller
{
    //
    public function index(){
        if(Auth::check()){
            if (Auth::user()->role == 'user' OR Auth::user()->role == 'member') {
                $route = [
                    'nama' => 'Dashboard',
                    'link' => 'dashboard/user'
                ];
                $data = Web::latest()->get();
                $data2 = Web::all()->count();
                // $data = json_encode($data);
                // dd($data);
                // $data = json_decode($data);
                // $data = last($data);
                // dd($data);
                return view('index', compact('route','data','data2'));
            } else if(Auth::user()->role == 'admin' OR Auth::user()->role == 'superadmin'){
                $route = [
                    'nama' => 'Dashboard',
                    'link' => 'dashboard/admin'
                ];
                $data = Web::latest()->get();
                $data2 = Web::all()->count();
                // $data = json_encode($data);
                // $data = last($data);
                // dd($data);
                return view('index', compact('route','data','data2'));
            } 
        } else {
            $route = [
                'nama' => 'Login',
                'link' => 'login'
            ];
            $data = Web::latest()->get();
            $data2 = Web::all()->count();
            // $data = json_decode($data);
            // $data = last($data);
            // dd($data);
            return view('index', compact('route','data','data2'));
        }
    }
}
