@extends('dashboard.user.layout.main')

@section('content')
      <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Data</h1>
</div>

<!-- Content Row -->
<div class="">
    @php
        $id = Crypt::encrypt($data->id);
    @endphp
    <form action="/dashboard/user/{{$id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama / Judul Web</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}">
        </div>
        <div class="form-group">
            {{-- <label for="">Slug</label> --}}
            <input type="text" hidden class="form-control" id="slug" readonly name="slug" value="{{$data->slug}}">
        </div>
        <div class="form-group">
            <label for="link">Link</label>
            <input type="text" class="form-control" id="link" name="link" value="{{$data->link}}">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi Web</label>
            <input id="deskripsi" type="hidden" name="deskripsi" value="{{$data->deskripsi}}">
            <trix-editor input="deskripsi"></trix-editor>
        </div>
        <div class="mb-3">
            <label for="gamar" class="form-label">Screenshot Tampilan Website</label>
            <input type="hidden" name="oldGambar" value="{{$data->gambar}}">
            @if ($data->gambar)
            <img src="/storage/{{$data->gambar}}" class="gambar-preview img-fluid mb-3 col-sm-5 d-block" alt="">
            @else
            <img class="gambar-preview img-fluid mb-3 col-sm-5" alt="">
            @endif
            <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewGambar()">
          </div>
        <div class="invalid-feedback">
            @error('gambar')
                {{$message}}
            @enderror
        </div>
        <div class="form-group">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
</div>

<!-- Content Row -->

<div class="row">
</div>

<!-- Content Row -->
<div class="row">

</div>
<script>
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change', function () {
        // body
        fetch('/dashboard/user/checkSlug?nama=' + nama.value)
            .then(response => response.JSON())
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