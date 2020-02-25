    <!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>iPorter</title>

      <!-- Scripts -->
        <!-- <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/dropzone.js') }}" defer></script>
        <script type="text/javascript" src="{{'http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'}}"></script> -->

        <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fontawesome/css/all.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style type="text/css">
          .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            font-size:30px;
            box-shadow: 2px 2px 3px #999;
            z-index:100;
          }

          .my-float{
            margin-top:16px;
          }
        </style>
      </head>
      <body>
        <a href="https://api.whatsapp.com/send?phone=+6282191649777&text=Halo,%20Nitip%20pesan%20dong." class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
        <div id="app">
          <nav class="navbar navbar-expand-md navbar-dark shadow-sm navbar-custom">
            <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}">
                iPorter
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                  <!-- Authentication Links -->
                  <li class="nav-item">
                    <a class="nav-link {{Request::path() == 'info-aplikasi' ? 'active' : '' }}" href="{{ route('info.aplikasi') }}"><span class="fas fa-question-circle"></span> Info Aplikasi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{Request::path() == 'porter/create' ? 'active' : '' }}" href="{{ route('porter.create') }}"><span class="fas fa-hands-helping"></span> NgePorter Yuks</a>
                  </li>
                  <li class="nav-item">
                   <a class="nav-link {{Request::path() == 'order/create' ? 'active' : '' }}" href="{{ route('order.create') }}"><span class="fas fa-cart-plus"></span> Nitip Dong</a>
                 </li>
                 @guest
                 <li class="nav-item">
                  <a class="nav-link {{Request::path() == 'login' ? 'active' : '' }}" href="{{ route('login') }}"><span class="fas fa-sign-in-alt"></span> {{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link {{Request::path() == 'register' ? 'active' : '' }}" href="{{ route('register') }}"><span class="fas fa-file-contract"></span> {{ __('Register') }}</a>
                </li>

                @endif
                @else

                @if(Auth::user()->email_verified_at == '')

                <li class="nav-item">
                  <a class="nav-link" href="{{ route('verifikasi.email.template.app') }}"><span class="fas fa-clipboard-check"></span> Verifikasi Email</a>
                </li>
                @else
                <li class="nav-item">   
                  <a class="nav-link {{Request::path() == 'keranjang' ? 'active' : '' }}" href="{{ route('keranjang.show') }}"><span class="fas fa-shopping-cart"></span> Keranjang</a>
                </li>
                @endif


                <li class="nav-item dropdown {{Request::path() == 'profile' ? 'active' : '' }}">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                    @if(Auth::user()->email_verified_at == '')
                    <a class="dropdown-item" href="{{ route('verifikasi.email.template.app') }}"><span class="fas fa-clipboard-check"></span> Verifikasi Email</a>
                    @else 
                    @if(Auth::user()->nik == '' && Auth::user()->phone == '')
                    <a class="dropdown-item" href="#complete-data" data-toggle="modal" data-target="#complete-data"><span class="fas fa-clipboard-list"></span> Lengkapi Data</a>
                    @endif
                    @endif

                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                    @if(Auth::user()->email_verified_at == '')
                    @else
                    <a class="dropdown-item {{Request::path() == 'keranjang' ? 'active' : '' }}" href="{{route('keranjang.show')}}"><span class="fas fa-shopping-cart"></span> Keranjang</a>
                    <a class="dropdown-item {{Request::path() == 'riwayat-penitipan' ? 'active' : '' }}" href="{{route('riwayat.penitipan_user')}}"><span class="fas fa-history"></span> Riwayat Penitipan</a>
                    @endif
                    <a class="dropdown-item {{Request::path() == 'profile' ? 'active' : '' }}" href="{{ route('profile.show') }}"><span class="fas fa-user-tie"></span> Profile</a>
                    <a class="dropdown-item" href="{{ route('user.logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><span class="fas fa-sign-in-alt"></span>  
                    {{ __('Logout') }}
                  </a>
                </div>
              </li>
              @endguest

            </ul>
          </div>
        </div>
      </nav>

      <main class="py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              @guest
              @if(Request::path() == 'porter/create')
              <div class="alert alert-warning" role="alert">
                Daftar lalu verifikasi dan lengkapi data kamu di bawah untuk menjadi Porter.
              </div>
              @else
              <div class="alert alert-warning" role="alert">
                Daftar lalu verifikasi dan lengkapi data kamu untuk menitip.
              </div>
              @endif
              @else
              @if(Auth::user()->email_verified_at == '')
              @if(Request::path() == 'porter/create')
              @else
              <div class="alert alert-warning" role="alert">
                Verifikasi email kamu <a href="{{ route('verifikasi.email.template.app') }}" class="alert-link">di sini</a>.
              </div>
              @endif
              
              @else
              @if(Auth::user()->nik == '' &&  Auth::user()->phone == '')
              @if(Request::path() == 'porter/create')
              @else

              <div class="alert alert-warning" role="alert">
                Lengkapi data kamu untuk bisa menitip <a href="" class="alert-link" data-toggle="modal" data-target="#complete-data">di sini</a>.
              </div>
              @endif
              @endif
              @endif
              @endguest
              @yield('content')
            </div>
          </div>
        </div>
      </main>
    </div>

    <!-- Modal Form Complete Data-->
    <div class="modal fade" id="complete-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Lengkapi Data Anda Untuk Bisa Menitip</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('lengkapi_data.store') }}" method="POST" id="form-lengkapi-data">
              @csrf
              <div class="form-group">
                <small>Note : * wajib diisi</small>

              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Nik : *</label>
                <input class="form-control" name="nik">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Phone : *</label>
                <input class="form-control" name="phone">
              </div>

              <br>
              <div class="alert alert-success text-center" role="alert">
                Masukkan Data Sosmed Kamu :
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Instagram : </label>
                <input class="form-control" name="instgram">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Facebook : </label>
                <input class="form-control" name="facebook">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Twitter : </label>
                <input class="form-control" name="twitter">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End Form Complete Data -->


    </body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    @yield('js')
    <script type="text/javascript">


      $('#form-lengkapi-data').submit(function(e){
        e.preventDefault();
        proses();
        var url = $('#form-lengkapi-data').attr('action');
    // var me = $(this),
    //                     url = me.attr('action'),
    // token = $('meta[name="csrf-token"]').attr('content');
    console.log(url);
    console.log('wowowo');
    var request = new FormData(this);
    $.ajax({
      url: url,
      method: "POST",
      data: request,
      contentType: false,
      cache: false,
      processData: false,
            // dataType: "json",
            success:function(data){

              berhasil(data.status, data.pesan);
            },
            error: function(xhr, status, error){
              var error = xhr.responseJSON; 
              if ($.isEmptyObject(error) == false) {
                $.each(error.errors, function(key, value) {
                  gagal(key, value);
                });
              }
            } 
          }); 
  });
      function berhasil(status, pesan) {
        Swal.fire({
          text: "Data Anda akan segera diproses oleh Admin",
          type: status,
          title: pesan,
          showConfirmButton: true,
          button: "Ok"
        }).then(function(){ 
         location.reload();
       })
      }

      function berhasil_hapus(status, pesan) {
        Swal.fire({
          text: "Data riwayat Anda dihapus",
          type: status,
          title: pesan,
          showConfirmButton: true,
          button: "Ok"
        }).then(function(){ 
         location.reload();
       })
      }

      function gagal(key, pesan) {
        Swal.fire({
          type: 'error',
          title:  key + ' : ' + pesan,
          showConfirmButton: true,
          button: "Ok"
        })
      }

// function login_first() {
//   Swal.fire({
//     type: 'error',
//     title:  'Anda harus login dengan email yang telah di verifikasi',
//     showConfirmButton: true,
//     button: "Ok"
// })
// }

function proses(key, pesan) {
  Swal.fire({
    type: 'warning',
    title:  'Memproses pengiriman',
    showConfirmButton: false
  })
}
</script>

</html>
