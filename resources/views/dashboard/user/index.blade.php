@extends('dashboard.user.layout.main')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#formModal"><i
          class="fas fa-plus fa-sm text-white-50"></i> Posting Website</button>
</div>
<!-- Content Row -->

@if (session()->has('berhasil') )
<div class="alert alert-success alert" role="alert">
    {{session('berhasil')}}
    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">×</button> --}}
</div>
@endif
<div class=" card shadow mb-4" >
    <div class="card-header">
        Data Postingan
    </div>
    <div class="card-body" >
        <div class="table-responsive" style="max-height: 250px; overflow-y: auto;">
            <table class="table table-bordered" id="dataTable" cellspacing="0" >
                <thead >
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th class="text-center" >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{Str::limit($dt->nama, 20, '...')}}</td>
                        {{-- <td>{{$dt->slug}}</td> --}}
                        <td>{!!html_entity_decode( Str::limit($dt->deskripsi, 25, '...')) !!}</td>
                        <td class="text-center">
                            <a href="{{$dt->link}}" target="_blank" class="btn btn-outline-success"><i class="fas fa-eye"></i> Preview</a>
                            @php
                                {{$id = Crypt::encrypt($dt->id) ;}}
                                // {{$id = Str::limit(Crypt::encrypt($dt->id), 100, '...') ;}}
                            @endphp
                            <a href="/dashboard/user/{{$id}}/edit" class="btn btn-outline-primary"><i class="fas fa-pen"></i> Edit</a>
                            {{-- <a href="/dashboard/user/{{$id}}/delete" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Delete</a> --}}
                            <form action="/dashboard/user/{{$id}}" onclick="return confirm('Kamu yakin ingin menghapus data {{$dt->nama}} !!!')" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    {{-- <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- MOdal Tambah --}}
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Web Portfolio</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/dashboard/user" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama / Judul Web</label>
                        <input type="text" class="form-control @error('nama')
                        is-invalid
                        @enderror" id="nama" name="nama" value="{{old('nama')}}">
                        <div class="invalid-feedback">
                            @error('nama')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        {{-- <label for="">Slug</label> --}}
                        <input type="text" hidden class="form-control" id="slug" readonly name="slug" >
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" class="form-control @error('link')
                        is-invalid
                        @enderror " id="link" name="link" value="{{old('link')}}">
                        <div class="invalid-feedback">
                            @error('link')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Web</label>
                        <input class="@error('deskripsi')
                            is-invalid
                        @enderror" id="deskripsi" type="hidden" name="deskripsi" value="{{old('deskripsi')}}">
                        <trix-editor input="deskripsi" id="deskripsi"></trix-editor>
                        @error('deskripsi')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        {{-- <textarea type="email" class="form-control" id="deskripsi" name="deskripsi"></textarea> --}}
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Screenshot Tampilan Website</label>
                        <img class="gambar-preview img-fluid mb-3 col-sm-5" alt="">
                        <input class="form-control @error('gambar')
                            is-invalid
                        @enderror" type="file" id="gambar" name="gambar" onchange="previewGambar()" value="{{old('gambar')}}">
                        <div class="invalid-feedback">
                            @error('gambar')
                                {{$message}}
                            @enderror
                        </div>
                    </div>
                      
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change', function () {
        // body
        fetch('/dashboard/user/checkSlug?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });

    function previewGambar() {
    const gambar = document.querySelector('#gambar');
    const gambarPreview = document.querySelector('.gambar-preview');

    gambarPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(gambar.files[0]);

    oFReader.onload = function(oFREvent) {
        gambarPreview.src = oFREvent.target.result;
    }
}
  </script>
@endsection