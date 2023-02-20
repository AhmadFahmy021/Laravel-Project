<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Karisma Academy | Halaman Utama</title>
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-lg fixed-top" style="background-color: #0C055E;">
        <div class="container">
          <a class="navbar-brand" href="/"><img src="/img/karismalogo.png" width="60px" alt="karisma academy">Karisma Academy</a>
          <a class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </a>
          <div class="collapse navbar-collapse text-center" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              {{-- <li class="nav-item">
                <a class="nav-link" href="#portfolio">Portfolio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#tentang">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#layanan">Layanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contacts</a>
              </li> --}}
              <li class="nav-item">
                {{-- <a href="btn btn-outline-light" href="/login">Login</a> --}}
                <a class=" btn btn-outline-light" href="/{{$route['link']}}" title="{{$route['nama']}}">{{$route['nama']}}</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Navbar Akhir -->

      <!-- Banner Awal -->
      <section class="banner">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="banner-teks col-md-6 float-end">
                        <h2>Profesional Web Development & Profesional Web Design</h2>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero, odit. Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="col-md-6 float-start banner-gambar">
                        <img src="/img/Web Design.png" width="300px"  alt="">
                    </div>
                </div>
            </div>
        </div>
      </section>
      <!-- Banner Akhir -->
      <!-- Portfolio Awal -->
      <section id="portfolio" class="category ">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    @if ($data2 == 0)
                        <p class="fs-2 text-center ">Data not found</p>
                    @endif
                    @foreach ($data as $dt)
                    @php
                        $id = Crypt::encrypt($dt->id);
                    @endphp
                    <div class="col-md-4 pt-3">
                        <div class="rounded category-card shadow ">
                            <div class="card-body  text-center">
                                <a href="/detail/{{$id}}" target="_blank"><img class="card-gambar rounded img-fluid"  src="storage/{{$dt->gambar}}"  alt="{{$dt->nama}}"></a>
                                <a class="teks pt-4" target="_blank" title="{{$dt->nama}}" href="/detail/{{$id}}"> {{Str::limit($dt->nama, 15, '...')}} </a>
                                <p class="pt-2 pb-2">By : {{$dt->user->nama}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    {{-- <div class="col-md-4 pt-3 ">
                        <div class="card category-card shadow ">
                            <div class="card-body text-center">
                                <a class="teks" href="#">Web Administrator</a>
                                <p>Lorem ipsum dolor sit amet.</p>
                                <!-- <a class="set1 float-start" href="?">New</a>
                                <a class="set2 float-end" href="?">Lasted</a> -->
                                <img class="card-gambar rounded " src="/img/programming.jpg"  alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pt-3 ">
                        <div class="card category-card shadow ">
                            <div class="card-body text-center">
                                <a class="teks" href="#">Web Development</a>
                                <p>Lorem ipsum dolor sit amet.</p>
                                <!-- <a class="set1 float-start" href="?">New</a>
                                <a class="set2 float-end" href="?">Lasted</a> -->
                                <img class="card-gambar rounded " src="/img/programming.jpg"  alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pt-3 ">
                        <div class="card category-card shadow ">
                            <div class="card-body text-center">
                                <a class="teks" href="#">Front End Web Developer </a>
                                <p>Lorem ipsum dolor sit amet.</p>
                                <!-- <a class="set1 float-start" href="?">New</a>
                                <a class="set2 float-end" href="?">Lasted</a> -->
                                <img class="card-gambar rounded " src="/img/programming.jpg"  alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pt-3 ">
                        <div class="card category-card shadow ">
                            <div class="card-body text-center">
                                <a class="teks" href="#">Full Stack Web Development </a>
                                <p>Lorem ipsum dolor sit amet.</p>
                                <!-- <a class="set1 float-start" href="?">New</a>
                                <a class="set2 float-end" href="?">Lasted</a> -->
                                <img class="card-gambar rounded " src="/img/programming.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pt-3 ">
                        <div class="card category-card shadow ">
                            <div class="card-body text-center">
                                <a class="teks" href="#">Back End Web Developer </a>
                                <p>Lorem ipsum dolor sit amet.</p>
                                <!-- <a class="set1 float-start" href="?">New</a>
                                <a class="set2 float-end" href="?">Lasted</a> -->
                                <img class="card-gambar rounded " src="/img/programming.jpg"  alt="">
                            </div>
                        </div>
                    </div> --}}
                    
                </div>
                {{-- <div class="row pt-5">
                    <div class="col m text-center">
                        <a href="#" class="tombol-all rounded btn">View All Portofolio</a>
                    </div>
                </div> --}}
            </div>
        </div>
      </section>
      <!-- Portfolio Akhir -->
      <!-- Terbaik Awal -->
      <!-- <section id="terbaik" class="terbaik">
        <div class="row ">
            <div class="col-md-6 float-start">
                <div class="card terbaik-card  ">
                    <div class="card-body terbaik-body">
                        <img class="gambar" src="assets/img/foto1.jpg" alt="" >
                        <img class="gambar" src="assets/img/foto1.jpg" alt="" >
                    </div>
                    <div class="card-body terbaik-body">
                        <img class="gambar" src="assets/img/foto2.jpg" alt="" >
                        <img class="gambar" src="assets/img/foto2.jpg" alt="" >
                    </div>
                </div>
            </div>
            <div class="terbaik-teks col-md-6 float-end">
                <p class="fs-2 pt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, hic!</p>
                <a href="#" class="tombol-all rounded btn">View All Four Terbaik</a>
            </div>
        </div>
      </section> -->
      <!-- <section id="terbaik" class="terbaik">
        <div class="contianer-fluid">

            <div class="row">
                <figure class="figure">
                    <div class="cardd col-md-11 float-end">
                        <div class="card">
                            <div class="card-body d-flex flex-column align-items-start">
                                <div class="gambar1 d-flex justify-content-between">
                                    <img src="assets/img/foto1.jpg" alt="Gambar 1" class="img-fluid img-1">
                                    <img src="assets/img/foto2.jpg" alt="Gambar 2" class="img-fluid img-1">
                                </div>
                                <div class="gambar2 d-flex justify-content-between mt-3">
                                    <img src="assets/img/foto1.jpg" alt="Gambar 3" class="img-fluid img-2">
                                    <img src="assets/img/foto2.jpg" alt="Gambar 4" class="img-fluid img-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </figure>
            </div>
            <div class="row">

                <div class="teks col-md-8 float-start">
                    <p class="fs-2 pt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, hic!</p>
                    <a href="#" class="tombol-all rounded btn">View All Four Terbaik</a>
                </div>
            </div>
        </div>
          
      </section> -->
      {{-- <section class="terbaik">
        <div class="row">
            <div class="col-md-6">
                <!-- <p class="tulis fs-2 pt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, hic!</p> -->
                <div class="card">
                    <div class="card-body d-flex flex-column align-items-start">
                        <p class="tulis text-center fs-2 pt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, hic!</p>

                        <div class="d-flex justiy-content-between card-img">
                            <img src="/img/foto1.jpg" alt="">
                            <img src="/img/foto2.jpg" alt="">
                        </div>
                        <div class="d-flex justiy-content-between card-img mt-3">
                            <img src="/img/foto1.jpg" alt="">
                            <img src="/img/foto2.jpg" alt="">
                        </div>
                        <div class="pt-3 button ">
                            <a href="#" class="tulis tombol-all rounded btn">View All Four Terbaik</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="teks">
                    <p class="fs-2 pt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, hic!</p>
                    <a href="#" class="tombol-all rounded btn">View All Four Terbaik</a>
                </div>
            </div>
            </div>
        </div>
      </section> --}}
      <!-- Terbaik Akhir -->
      <!-- footer awal -->
      <section class="section-footer pt-5 mt-5 ">
        <footer class="footer" style="background-color: #0C055E;">
            <div class="container pb-2 mb-2" style="background-color: #0C055E;">
                <div class="row row-sub-footer" style="background-color: #0C055E;">
                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                        <div class="wrapper-col-1">
                            <h1>
                                <!-- <img src="assets/img/karisma-removebg-preview.png" width="50px" alt="karisma academy"> -->
                                Karisma Academy
                            </h1>
                            <p>Karisma Academy memberikan kemudahan bagi siapa pun yang ingin terjun ke dunia komputer atau digital</p>
                            <div class="wrapper-icon d-flex">
                                <a href=""><i class="fa-brands fa-square-facebook"></i></a>
                                <a href=""><i class="fa-brands fa-square-instagram"></i></a>
                                <a href=""><i class="fa-brands fa-tiktok"></i></a>
                                <a href=""><i class="fa-brands fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="wrapper-col-2">
                            <h1>PERUSAHAAN</h1>
                            <ul>
                                <li><a href="#">Tentang Kami</a></li>
                                <li><a href="#">Hubungi Kami</a></li>
                                <li><a href="#">Gabung Sekarang</a></li>
                                <li><a href="#">Partner Kerja Sama</a></li>
                                <li><a href="#">Program Kami</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="wrapper-col-3">
                            <h1>INFORMASI</h1>
                            <ul>
                                <li><a href="">Review Customer</a></li>
                                <li><a href="">Pendaftaran </a></li>
                                <li><a href="">Paket Belajar</a></li>
                                <li><a href="">Penghargaan Terbaik</a></li>
                                <li><a href="">Lihat Hasil</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="wrapper-col-4">
                            <h1>BANTUAN</h1>
                            <ul>
                                <li><a href="">Cara Mendaftar</a></li>
                                <li><a href="">Cara Bergabung</a></li>
                                <li><a href="">Tambah Masa Belajar</a></li>
                                <li><a href="">Tambah Paket Belajar</a></li>
                                <li><a href="">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="wrapper-last-footer d-flex justify-content-between">
                   Copyright &COPY; 2022 - <?= date('Y'); ?> Karisma Academy. All Rights Reserved
                </div>
            </div>
        </footer>
      </section>
      <!-- footer akhir -->
    <!-- Javascript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>