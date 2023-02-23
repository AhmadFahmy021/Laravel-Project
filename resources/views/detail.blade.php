<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karisma Academy | Detail Portfolio</title>
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body id="home">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-lg fixed-top" style="background-color: #0C055E;">
        <div class="container">
          <a class="navbar-brand" href="/detail/{{$id}}"><img src="/img/karismalogo.png" width="60px" alt="karisma academy">Karisma Academy</a>
          {{-- <a class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </a> --}}
          <div class="collapse navbar-collapse text-center" id="navbarNav">
            {{-- <ul class="navbar-nav ms-auto">
                <a href="/" class="btn btn-outline-light"><i class="fa-sharp fa-solid fa-caret-left"></i> Kembali</a>
            </ul> --}}
          </div>
        </div>
      </nav>
      <section class="detail">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-8 float-start">
                        <img src="/storage/{{$data->gambar}}" class="rounded  detail-gambar"  alt="{{$data->nama}}">
                    </div>
                    <div class="detail-teks col-12 col-sm-6 col-md-8 float-end pt-3">
                        <h2 class="fs-3 fw-bold">{{$data->nama}}</h2>
                        <p>Created By : {{$data->user->nama}}</p>
                        <p><a href="{{$data->link}}" class="btn text-white" style="background-color: #0C055E;" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-eye"></i> Live Preview</a></p>
                    </div>
                    <p class="pt-3">{!! html_entity_decode( $data->deskripsi) !!}</p>
                </div>
            </div>
        </div>
      </section>
      <!-- footer -->
      <section class="section-footer pt-5">
        <footer>
            <div class="container">
                <div class="row row-sub-footer">
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
                   Copyright &COPY; 2022 - 2022 Karisma Academy. All Rights Reserved
                </div>
            </div>
        </footer>
      </section>
    <!-- Javascritp -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
</body>
</html>