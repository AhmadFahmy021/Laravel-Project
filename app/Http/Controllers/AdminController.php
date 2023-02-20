<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Web;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index()
    {
        $member = User::all()->where('role', '=', 'member')->count();
        $user = User::all()->where('role', '=', 'user')->count();
        $admin = User::all()->where('role', '=', 'admin')->count();
        // $member = $member->count();
        // $user = $user->count();
        $jumlah = Web::all()->count();
        $posting = $jumlah / 100;
        return view('dashboard.admin.index', compact('member', 'user', 'jumlah','admin','posting'));
    }

    public function role()
    {
        if (Auth::user()->role == 'admin') {
            $data = DB::table('users')->where('role', '=', 'user')->orWhere('role', '=', 'member')->get();
        } else {
            $data = DB::table('users')->where('role', '=', 'user')->orWhere('role', '=', 'member')->orWhere('role', '=', 'admin')->get();

        }
        // $data = json_encode($data);
        // dd($data);
        return view('dashboard.admin.role', compact('data'));
    }
    public function edit($id){
        $crypt = Crypt::decrypt($id);
        $data = User::findOrFail($crypt);
        // $select = Web::all();
        // dd($data);
        return view('dashboard.admin.editRole', compact('data'));
    }
    public function updated(Request $request, $id ){
        $crypt = Crypt::decrypt($id);
        $data = User::findOrFail($crypt);

        $form = [
            'role' => $request->post('role')
        ];
        $data->update($form);
        // dd($form);
        return redirect('/dashboard/admin/pengguna');
    }
    public function delete_user( $id ){
        $crypt = Crypt::decrypt($id);
        $data = User::findOrFail($crypt);
        // dd($data);
        $data->delete();
        return redirect('/dashboard/admin/pengguna');
    }
    public function show(){
        $data = Web::all();
        return view('dashboard.admin.postingan',compact('data'));
    }
    public function delete_postingan($id){
        $crypt = Crypt::decrypt($id);
        $data = Web::findOrFail($crypt);
        // dd($data);
        $data->delete();
        return redirect('/dashboard/admin/postingan');
    }
}
