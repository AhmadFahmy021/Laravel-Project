<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | Karisma Academy</title>
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styless.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body style="background-color: #0C055E">

    <section id="daftar" class="daftar">
        <div class="container ">
            <div class="row up2 pb-5">
                <div class="card up-card shadow-lg" >
                    <div class="card-body">
                        <div class="col-12 col-md-12 col-sm-10 col-lg-5 up-form2">
                            <h1 class="fw-bold text-center pb-5 ">Login</h1>
                            {{-- Peringatan Berhasil Register --}}
                            @if (session()->has('berhasil') )
                            <div class="alert alert-success alert" role="alert">
                                {{session('berhasil')}}
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                              </div>
                            @endif
                            {{-- Peringatan Gagal login --}}
                            @if (session()->has('failed') )
                            <div class="alert alert-danger alert" role="alert">
                                {{session('failed')}}
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                              </div>
                            @endif
                            <form action="/login" method="POST">
                                @csrf
                                <div class="input-group mb-3 has-validation">
                                    <span class="input-group-text" id="basic-addon1"><i class=" fa-solid fa-user fa-lg"></i></span>
                                    <input type="text" name="username" class="form-control fs-5 @error('username')
                                    is-invalid
                                    @enderror" placeholder="Username" autocomplete="OFF" autofocus aria-describedby="basic-addon1" value="{{old('username')}}">
                                    <div class="invalid-feedback">
                                        @error('username')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group mb-3 has-validation pb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class=" fa-solid fa-key fa-lg"></i></span>
                                    <input type="password" name="password" class="form-control fs-5 @error('password')
                                    is-invalid
                                    @enderror" placeholder="Password" aria-describedby="basic-addon1" >
                                    <div class="invalid-feedback">
                                        @error('password')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                    
                                <div class="form-floating mb-3 button text-center">
                                    <a href="/"  class="text-white fw-bold btn btn-md close" style="background-color: #ea0000;">Batal</a>
                                    <button type="submit" class="text-white fw-bold btn btn-md " style="background-color: #0C055E;">Login</button>
                                </div>
                                <div class="form-floating  text-center">
                                    <a href="/register" class="text-dark">Daftar Sekarang</a>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 text-center col-md-12 col-sm-5 col-lg-4 up-img2">
                            <img src="/img/karismabiru.png" alt="">
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </section>
    
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>