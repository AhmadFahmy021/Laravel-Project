@extends('dashboard.admin.layout.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Kelola Pengguna</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard/admin"> Dashboard</a> </li>
            <li class="breadcrumb-item active">Edit Role</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="container-fluid ">
    <div class="card mx-5">
        <div class="card-header bg-gray">
          Data User
        </div>
        <div class="card-body">
            <table id="exampleTable1" class="table table-bordered  table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Hak Akses</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$dt->nama}}</td>
                      <td>{{$dt->username}}</td>
                      <td title="{{$dt->email}}">{{Str::limit($dt->email, 10) }}</td>
                      <td class="text-uppercase">{{$dt->role}}</td>
                      <td>
                        @php
                            $id = Crypt::encrypt($dt->id);
                        @endphp
                        <a class="btn btn-outline-primary" href="/dashboard/admin/pengguna/{{$id}}/edit"><i class="fas fa-pen-fancy"></i> Edit</a>
                        <a class="btn btn-outline-danger" href="/dashboard/admin/pengguna/{{$id}}/delete" onclick="return confirm('Yakin ingin menghapus user {{$dt->nama}}')"><i class="fas fa-window-close"></i> Delete</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection