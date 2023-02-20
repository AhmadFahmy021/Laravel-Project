@extends('dashboard.admin.layout.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Edit Role</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <!-- <li class="breadcrumb-item">Dashboard</li> -->
                <li class="breadcrumb-item"><a href="/dashboard/admin">Dashboard</a></li>
                <li class="breadcrumb-item">Edit Role</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
        @php
        $id = Crypt::encrypt($data->id);
    @endphp
        <form method="POST" action="/dashboard/admin/pengguna/update/{{$id}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->nama}}" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Username</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$data->username}}" readonly name="username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$data->email}}" readonly name="username">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Role</label>
                <select class="form-control" id="exampleFormControlSelect1" name="role">
                    {{-- @foreach ($select as $s)
                        <option value="">{{$s->role}}</option>
                    @endforeach --}}
                    @if (Auth::user()->role == 'admin')
                        <option value="member" @if ($data->role == 'member')
                            selected
                        @endif>Member</option>
                        <option value="user" @if ($data->role == 'user')
                            selected
                        @endif>User</option>
                    @endif
                    @if (Auth::user()->role == 'superadmin')
                        <option value="member" @if ($data->role == 'member')
                            selected
                        @endif>Member</option>
                        <option value="user" @if ($data->role == 'user')
                            selected
                        @endif>User</option>
                        <option value="admin" @if ($data->role == 'admin')
                            selected
                        @endif>Admin</option>
                    @endif
                    {{-- <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option> --}}
                </select>
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
@endsection