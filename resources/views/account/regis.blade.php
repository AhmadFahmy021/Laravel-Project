<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Karisma Academy</title>
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styless.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body >

    <section id="daftar" class="daftar">
        <div class="container ">
            <div class="row up pb-5">
                <div class="card up-card shadow-lg" >
                    <div class="card-body">
                        <div class="col-12 col-md-12 col-sm-10 col-lg-5 up-form">
                            <h1 class="fw-bold text-center pb-5 mb-4">Register</h1>
                            <form action="/register" method="POST">
                                @csrf
                                <div class="input-group mb-3 has-validation">
                                    <span class="input-group-text" id="basic-addon1"><i class=" fa-solid fa-user-tie fa-lg"></i></span>
                                    <input type="text" name="nama" class="form-control fs-5 @error('nama')
                                        is-invalid
                                    @enderror" autofocus placeholder="Nama" aria-describedby="basic-addon1" value="{{old('nama')}}">
                                    <div class="invalid-feedback">
                                        @error('nama')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group mb-3 has-validation">
                                    <span class="input-group-text" id="basic-addon1"><i class=" fa-solid fa-user fa-lg"></i></span>
                                    <input type="text" name="username" class="form-control fs-5 @error('username')
                                    is-invalid
                                    @enderror" placeholder="Username" aria-describedby="basic-addon1" value="{{old('username')}}">
                                    <div class="invalid-feedback">
                                        @error('username')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group mb-3 has-validation">
                                    <span class="input-group-text" id="basic-addon1"><i class=" fa-solid fa-envelope fa-lg"></i></span>
                                    <input type="email" name="email" class="form-control fs-5 @error('email')
                                    is-invalid
                                    @enderror" placeholder="Email"  aria-describedby="basic-addon1" value="{{old('email')}}">
                                    <div class="invalid-feedback">
                                        @error('email')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group mb-3 has-validation">
                                    <span class="input-group-text" id="basic-addon1"><i class=" fa-solid fa-key fa-lg"></i></span>
                                    <input type="password" name="password" class="form-control fs-5 @error('sandi')
                                    is-invalid
                                    @enderror" placeholder="Password" aria-describedby="basic-addon1" >
                                    <div class="invalid-feedback">
                                        @error('sandi')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                                    
                                <div class="form-floating mb-3 button text-center">
                                    <button type="submit" class="text-white btn btn-outline" style="background-color: #0C055E;">Register</button>
                                </div>
                                <div class="form-floating  text-center">
                                    <a href="/login" class="text-dark">Masuk Sekarang</a>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 text-center col-md-12 col-sm-5 col-lg-4 up-img">
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