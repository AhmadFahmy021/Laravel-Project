@extends('dashboard.admin.layout.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Kelola Postingan</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard/admin"> Dashboard</a> </li>
            <li class="breadcrumb-item active">Kelola Postingan</li>
            </ol>
        </div>
        </div>
    </div>
</div>
<div class="container-fluid ">
    <div class="card mx-5">
        <div class="card-header bg-dark">
          Data User
        </div>
        <div class="card-body"  style="max-height: 309px; overflow-y: auto;">
            <table id="exampleTable2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama / Judul Web</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$dt->nama}}</td>
                      <td>{{$dt->user->nama}}</td>
                      <td>
                        @php
                            $id = Crypt::encrypt($dt->id);
                        @endphp
                        {{-- <a class="btn btn-outline-primary" href="/dashboard/admin/editRole/{{$id}}/edit"><i class="fas fa-pen-fancy"></i> Edit</a> --}}
                        <a class="btn btn-outline-danger" href="/dashboard/admin/postingan/{{$id}}/delete" onclick="return confirm('Yakin ingin menghapus postingan {{$dt->nama}}')"><i class="fas fa-window-close"></i> Delete</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection