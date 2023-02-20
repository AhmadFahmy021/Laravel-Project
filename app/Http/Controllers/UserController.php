<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Web;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Web::all()->where('user_id', '=', Auth::user()->id);
        return view('dashboard.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request->file('gambar')->store('web-images');
        // dd($request);
        $request->validate([
            'nama' => 'required',
            'link' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|file|max:5024']);
        $validated = 
        [
            'user_id' => auth()->user()->id,
            'nama' => $request->post('nama'),
            'slug' => $request->post('slug'),
            'link' => $request->post('link'),
            'deskripsi' => $request->post('deskripsi'),
            'gambar' => $request->file('gambar')->store('web-images'),
        ];
        // dd($validated);

        // $validated['gambar'] = $request->file('gambar')->store('web-images');
        // $validated['deskripsi'] = strip_tags($validated['deskripsi']);
        Web::create($validated);
        return redirect('/dashboard/user')->with('berhasil','Data Berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       $data = Crypt::decrypt($id);
       $data = Web::findOrFail($data);
       
       return view('detail',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $dcrypt = Crypt::decrypt($id);
        $data = Web::findOrFail($dcrypt);
        // dd($data);
        return view('dashboard.user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dcrypt = Crypt::decrypt($id);
        $data = Web::findOrFail($dcrypt);
        // dd($data);
        $form = [
            // 'id_user' =>  Auth::user()->id,
            'nama' => 'required',
            'slug' => 'required',
            'deskripsi' => 'required',
            'link' => 'required',
            'gambar' => 'image|file|max:5024'
        ];
        $validated = $request->validate($form);
        if($request->gambar){
            if($request->oldGambar){
                Storage::delete($request->oldGambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('web-images');
        }
        // dd($validated);
        $data->update($validated);
        return redirect('/dashboard/user');
        // return view('dashboard.user.edit', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Web  $web
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $be = Crypt::decrypt($id);
    //    dd($be);
        $data = Web::findOrFail($be);
        if($data->gambar){
            Storage::delete($data->gambar);
        }
        $data->delete();
        return redirect('/dashboard/user')->with('berhasil','Data berhasil di hapus');
    }
    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Web::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
