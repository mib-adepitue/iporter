<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta name="viewport" c ontent="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>gomblok</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('iporter/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{asset('iporter/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('iporter/vendor/simple-line-icons/css/simple-line-icons.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="{{asset('iporter/device-mockups/device-mockups.min.css')}}">

  <!-- Custom styles for this template -->
  <link href="{{asset('iporter/css/new-age.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('iporter/css/style.css')}}">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="#page-top">iPorter</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#download">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#features">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('porter.create') }}"> NgePorter Yuks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('info.aplikasi') }}">Info Aplikasi</a>
          </li>
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif
          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            <a class="dropdown-item" href="{{ route('profile') }}">
              Profil
            </a>
          </div>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>


<div class="bd-example">
  <div id="demo" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('iporter/img/3.jpg')}}" alt="Gambar - 1" class="d-block w-100">
        <div class="carousel-caption">
          <h1 class="mb-5">Pengen Makan Tapi Mager? <br>iPorter aja!</h1>
          <p>
            <a href="{{route('order.create')}}"
            class="btn btn-outline btn-xl js-scroll-trigger text-center">Titip Dong!</a>
            
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('iporter/img/1.jpg')}}" alt="Gambar - 2" class="d-block w-100">
        <div class="carousel-caption">
          <h1 class="mb-5">Pengen Bayarin Tagihan? <br>iPorter aja!</h1>
          <p>
            <a href="{{route('order.create')}}"
            class="btn btn-outline btn-xl js-scroll-trigger text-center">Titip Dong!</a>
            
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('iporter/img/2.jpg')}}" alt="Gambar - 3" class="d-block w-100">
        <div class="carousel-caption">
          <h1 class="mb-5">Pengen Dibeliin Oleh-Oleh? <br>iPorter aja!</h1>
          <p>
            <a href="{{route('order.create')}}"
            class="btn btn-outline btn-xl js-scroll-trigger text-center">Titip Dong!</a>
           
          </p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#demo" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#demo" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<!-- akhir slider -->


<section class="download text-center text-white" id="download">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>Bagaimana Cara Penitipannya</h2>
        <p> Hanya Dengan 3 Langkah Saja</p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="feature-center animate-box" data-animate-effect="fadeIn">
          <span class="icon">
            <i class="far fa-2x fa-check-circle"></i>
          </span>
          <h3> REQUEST BARANG </h3>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="feature-center animate-box" data-animate-effect="fadeIn">
          <span class="icon">
            <i class="far fa-2x fa-check-circle"></i>
          </span>
          <h3> BAYAR </h3>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="feature-center animate-box" data-animate-effect="fadeIn">
          <span class="icon fo">
            <i class="far fa-2x fa-check-circle"></i>
          </span>
          <h3> TERIMA </h3>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<section class="features" id="features">
  <div class="container">
    <div class="section-heading text-center">
      <h2>Kenapa Harus iPorter?</h2>
      <p class="text-muted">Keunggulan Dari iPorter.</p>
      <hr>
    </div>
    <div class="row">
      <div class="col-lg my-auto">
        <div class="device-container">

        </div>
        <div class="col-lg my-auto">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6">
                <div class="feature-item">
                  <i class="icon-screen-smartphone text-primary"></i>
                  <h3>Cepat dan Murah</h3>
                  <p class="text-muted">Pesanan Cepat di Proses dan harga Murah.</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="feature-item">
                  <i class="icon-camera text-primary"></i>
                  <h3>Fee</h3>
                  <p class="text-muted">Dapatkan Komisi dari Pesanan yang di antarkan</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="feature-item">
                  <i class="icon-present text-primary"></i>
                  <h3>Produk Lokal</h3>
                  <p class="text-muted">Nikmati Semua Ciri Khas Nusantara</p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="feature-item">
                  <i class="icon-lock-open text-primary"></i>
                  <h3>Aman dan Terpercaya</h3>
                  <p class="text-muted">Transaksi Terjamin. Barang Pasti Sampai</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- <section class="cta">
    <div class="cta-content">
      <div class="container">
        <h2>Stop waiting.<br>Start building.</h2>
        <a href="#contact" class="btn btn-outline btn-xl js-scroll-trigger">Let's Get Started!</a>
      </div>
    </div>
    <div class="overlay"></div>
  </section> -->

  <section class="contact" id="contact">
    <div class="container">
      <h2>Sosial Media</h2>
      <ul class="list-inline list-social">
        <!-- <li class="list-inline-item social-twitter">
          <a href="#">
            <i class="fab fa-twitter"></i>
          </a>
        </li> -->
        <li class="list-inline-item social-facebook">
          <a href="https://www.facebook.com/iPorter-100232534725832/">
            <i class="fab fa-facebook-f"></i>
          </a>
        </li>
        <!-- <li class="list-inline-item social-google-plus">
          <a href="#">
            <i class="fab fa-google-plus-g"></i>
          </a>
        </li> -->
      </ul>
    </div>
  </section>

  <footer>
    <div class="container">
      <p>&copy; iPorter.id 2019. All Rights Reserved.</p>
      <ul class="list-inline">
        <li class="list-inline-item">
          <a href="#">Privacy</a>
        </li>
        <li class="list-inline-item">
          <a href="#">Terms</a>
        </li>
        <li class="list-inline-item">
          <a href="#">FAQ</a>
        </li>
      </ul>
    </div>
  </footer>

  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
        <div class="modal-body">
          <p>bagian body modal.</p>
        </div>
        <!-- footer modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup Modal</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('iporter/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('iporter/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{asset('iporter/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('iporter/js/new-age.min.js')}}"></script>
  <!-- <script src="{{asset('iporter/js/js.js')}}"></script> -->

</body>

</html>