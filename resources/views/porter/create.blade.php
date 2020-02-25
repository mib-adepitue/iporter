@extends('layouts.app')

@section('content')
<script>
  function tampilkanPreview(gambar,idpreview){
//                membuat objek gambar
var gb = gambar.files;
//                loop untuk merender gambar
for (var i = 0; i < gb.length; i++){
//                    bikin variabel
var gbPreview = gb[i];
var imageType = /image.*/;
var preview=document.getElementById(idpreview);
var reader = new FileReader();
if (gbPreview.type.match(imageType)) {
//                        jika tipe data sesuai
preview.file = gbPreview;
reader.onload = (function(element) {
  return function(e) {
    element.src = e.target.result;
  };
})(preview);
    //                    membaca data URL gambar
    reader.readAsDataURL(gbPreview);
  }else{
//                        jika tipe data tidak sesuai
alert("Type file tidak sesuai. Khusus image.");
}
}
}

function tampilkanPreviewktp(gambar,idpreview){
//                membuat objek gambar
var gb = gambar.files;
//                loop untuk merender gambar
for (var i = 0; i < gb.length; i++){
//                    bikin variabel
var gbPreview = gb[i];
var imageType = /image.*/;
var preview=document.getElementById(idpreview);
var reader = new FileReader();
if (gbPreview.type.match(imageType)) {
//                        jika tipe data sesuai
preview.file = gbPreview;
reader.onload = (function(element) {
  return function(e) {
    element.src = e.target.result;
  };
})(preview);
    //                    membaca data URL gambar
    reader.readAsDataURL(gbPreview);
  }else{
//                        jika tipe data tidak sesuai
alert("Type file tidak sesuai. Khusus image.");
}
}
}



function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
  return true;
}

</script>


<!-- Konten -->

@guest
<!-- FORM SEBELUM MENDAFTAR -->
<div class="card">
  <div class="card-header card-header-custom">Daftar Sebagai Porter . ngePorter Yuks</div>

  <div class="card-body">
    
    <form method="" action="" enctype="multipart/form-data" id="">

      <div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right"></label>

        <div class="col-md-6">
          <small>Note : * wajib diisi</small>
        </div>
      </div>

      <div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right">Nik *</label>

        <div class="col-md-6">
          <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="" onkeypress="return hanyaAngka(event)">

          @error('nik')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right">Phone *</label>

        <div class="col-md-6">
          <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="" onkeypress="return hanyaAngka(event)">

          @error('phone')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right">Tanggal Lahir *</label>

        <div class="col-md-6">
          <input id="alamat" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="">

          @error('tanggal_lahir')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat *</label>

        <div class="col-md-6">
          <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="">

          @error('alamat')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="foto_ktp" class="col-md-4 col-form-label text-md-right">Foto Ktp *</label>

        <div class="col-md-6 custom-file">
         <div class="custom-file">
          <input type="file" name="foto_ktp" class="custom-file-input @error('foto_ktp') is-invalid @enderror" id="inputGroupFile04" onchange="tampilkanPreviewktp(this,'previewktp')" accept="image/*">
          @error('foto_ktp')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
          <label class="custom-file-label" for="inputGroupFile04">Foto ktp kamu</label>
        </div>
        <small class="col-md-2">max 3mb <a href="#ktp_only" class="col-form-label text-md-left">Lihat contoh</a></small>
      </div>
    </div>
    <br>
    <div class="form-group row">
      <label for="alamat" class="col-md-4 col-form-label text-md-right"></label>

      <div class="col-md-6 text-center">
        <img id="previewktp" src="{{asset('img/upload.jpg')}}" alt="" width="70px">
      </div>
    </div>

    <div class="form-group row">
      <label for="alamat" class="col-md-4 col-form-label text-md-right">Foto Selfie & Ktp *</label>

      <div class="col-md-6 custom-file">
       <div class="custom-file">
        <input type="file" name="selfie_ktp" class="custom-file-input @error('selfie_ktp') is-invalid @enderror" id="inputGroupFile04" onchange="tampilkanPreview(this,'preview')" accept="image/*">
        @error('selfie_ktp')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label class="custom-file-label" for="inputGroupFile04">Foto selfie & ktp kamu</label>
      </div>
      <small class="col-md-2">max 3mb <a href="#ktp_selfie" class="col-form-label text-md-left">Lihat contoh</a></small>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="alamat" class="col-md-4 col-form-label text-md-right"></label>

    <div class="col-md-6 text-center">
      <img id="preview" src="{{asset('img/upload.jpg')}}" alt="" width="70px"/>
    </div>
  </div>

  <!-- OVERLAY -->
  <div class="overlay" id="ktp_only">
    <a href="#ngeporter-yuks" class="fa fa-close"></a>
    <img src="{{asset('img/ktp.png')}}"> 
  </div>

  <div class="overlay" id="ktp_selfie">
    <a href="#ngeporter-yuks" class="fa fa-close"></a>
    <img src="{{asset('img/selfiektp.png')}}"> 
  </div>
  <!-- END OVERLAY -->

  <br>
  <div class="alert alert-success text-center" role="alert">
    Masukkan Data Sosmed Kamu :
  </div>

  <div class="form-group row">
    <label for="instagram" class="col-md-4 col-form-label text-md-right">Instagram</label>

    <div class="col-md-6">
      <input id="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="" placeholder="contoh. (aldinjr12)">

      @error('instagram')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="facebook" class="col-md-4 col-form-label text-md-right">Facebook</label>

    <div class="col-md-6">
      <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="" placeholder="contoh. (aldinjr12)">

      @error('facebook')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="twitter" class="col-md-4 col-form-label text-md-right">Twitter</label>

    <div class="col-md-6">
      <input id="twitter" type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="" placeholder="contoh. (aldinjr12)">

      @error('twitter')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
      <button type="button" class="btn btn-custom" onclick="login_first()">
        {{ __('Register') }}
      </button>
    </div>
  </div>
</form>
</div>
</div>
<!-- END FORM SEBELUM MENDAFTAR -->


@else

Status Anda : 
@if(Auth::user()->status == 'active' && Auth::user()->admin_verified_at != '' && Auth::user()->foto_ktp != '' &&  Auth::user()->selfie_ktp != '')
<!-- Tanda Porter Atau Bukan -->
<div class="alert alert-info text-center" role="alert">
  Anda Sekarang Seorang Porter, ngePorter Yuk 
</div>
<!-- End Tanda Porter Atau Bukan -->
@elseif(Auth::user()->status == 'active' && Auth::user()->admin_verified_at == '' && Auth::user()->foto_ktp != '' &&  Auth::user()->selfie_ktp != '')
<div class="alert alert-info text-center" role="alert">
  Data Anda Sedang Diproses Oleh Admin !! 
</div> 
@else
<div class="alert alert-warning text-center" role="alert">

  Anda Bukan Porter, Lengkapi Data Di Bawah Untuk Menjadi Porter, ngePorter Yuk !! 
  @if(Auth::user()->email_verified_at == '')  Verifikasi email kamu dulu <a href="{{ route('verifikasi.email.template.app') }}" class="alert-link">di sini</a>.
  @endif
</div>

@if(Auth::user()->nik != '')
@php $nik = Auth::user()->nik; @endphp
@else 
@php $nik = old('nik'); @endphp  
@endif

@if(Auth::user()->phone != '')
@php $phone = Auth::user()->phone; @endphp
@else 
@php $phone = old('phone'); @endphp  
@endif

@if(Auth::user()->alamat != '')
@php $alamat = Auth::user()->alamat; @endphp
@else 
@php $alamat = old('alamat'); @endphp  
@endif

@if(Auth::user()->instagram != '')
@php $instagram = Auth::user()->instagram; @endphp
@else
@php $instagram = old('instagram'); @endphp
@endif

@if(Auth::user()->twitter != '')
@php $twitter = Auth::user()->twitter; @endphp
@else
@php $twitter = old('twitter'); @endphp
@endif

@if(Auth::user()->facebook != '')
@php $facebook = Auth::user()->facebook; @endphp
@else
@php $facebook = old('facebook'); @endphp
@endif

@if(Auth::user()->tanggal_lahir != '')
@php $tanggal_lahir = Auth::user()->tanggal_lahir; @endphp
@else
@php $tanggal_lahir = old('tanggal_lahir'); @endphp
@endif

<!-- FORM SETELAH MENDAFTAR -->
<div class="card">
  <div class="card-header card-header-custom">Daftar Sebagai Porter . ngePorter Yuks</div>

  <div class="card-body">
    @if(Auth::user()->email_verified_at == '')
    @php $rute = ''; $id = '#' ; $method = ''; $onclick = 'verifikasi_email()'; $type='button'; @endphp
    @else
    @php $rute = route('register.porter'); $id = 'form' ; $method = 'POST'; $onclick = ''; $type ='submit';@endphp
    @endif
    <form method="{{$method}}" action="{{$rute}}" enctype="multipart/form-data" id="{{$id}}">
      @csrf

      <div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right"></label>

        <div class="col-md-6">
          <small>Note : * wajib diisi</small>
        </div>
      </div>

      <div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right">Nik *</label>

        <div class="col-md-6">
          <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ $nik }}" onkeypress="return hanyaAngka(event)">

          @error('nik')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right">Phone *</label>

        <div class="col-md-6">
          <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $phone }}" onkeypress="return hanyaAngka(event)">

          @error('phone')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right">Tanggal Lahir *</label>

        <div class="col-md-6">
          <input id="alamat" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ $tanggal_lahir }}">

          @error('tanggal_lahir')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat *</label>

        <div class="col-md-6">
          <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $alamat }}">

          @error('alamat')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="foto_ktp" class="col-md-4 col-form-label text-md-right">Foto Ktp *</label>

        <div class="col-md-6 custom-file">
         <div class="custom-file">
          <input type="file" name="foto_ktp" class="custom-file-input @error('foto_ktp') is-invalid @enderror" id="inputGroupFile04" onchange="tampilkanPreviewktp(this,'previewktp')" accept="image/*">
          @error('foto_ktp')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
          <label class="custom-file-label" for="inputGroupFile04">Foto ktp kamu</label>
        </div>
        <small class="col-md-2">max 3mb <a href="#ktp_only" class="col-form-label text-md-left">Lihat contoh</a></small>
      </div>
    </div>
    <br>
    <div class="form-group row">
      <label for="alamat" class="col-md-4 col-form-label text-md-right"></label>

      <div class="col-md-6 text-center">
        <img id="previewktp" src="{{asset('img/upload.jpg')}}" alt="" width="70px">
      </div>
    </div>

    <div class="form-group row">
      <label for="alamat" class="col-md-4 col-form-label text-md-right">Foto Selfie & Ktp *</label>

      <div class="col-md-6 custom-file">
       <div class="custom-file">
        <input type="file" name="selfie_ktp" class="custom-file-input @error('selfie_ktp') is-invalid @enderror" id="inputGroupFile04" onchange="tampilkanPreview(this,'preview')" accept="image/*">
        @error('selfie_ktp')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label class="custom-file-label" for="inputGroupFile04">Foto selfie & ktp kamu</label>
      </div>
      <small class="col-md-2">max 3mb <a href="#ktp_selfie" class="col-form-label text-md-left">Lihat contoh</a></small>
    </div>
  </div>
  <br>
  <div class="form-group row">
    <label for="alamat" class="col-md-4 col-form-label text-md-right"></label>

    <div class="col-md-6 text-center">
      <img id="preview" src="{{asset('img/upload.jpg')}}" alt="" width="70px"/>
    </div>
  </div>

  <!-- OVERLAY -->
  <div class="overlay" id="ktp_only">
    <a href="#ngeporter-yuks" class="fa fa-close"></a>
    <img src="{{asset('img/ktp.png')}}"> 
  </div>

  <div class="overlay" id="ktp_selfie">
    <a href="#ngeporter-yuks" class="fa fa-close"></a>
    <img src="{{asset('img/selfiektp.png')}}"> 
  </div>
  <!-- END OVERLAY -->

  <br>
  <div class="alert alert-success text-center" role="alert">
    Masukkan Data Sosmed Kamu :
  </div>

  <div class="form-group row">
    <label for="instagram" class="col-md-4 col-form-label text-md-right">Instagram</label>

    <div class="col-md-6">
      <input id="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ $instagram }}" placeholder="contoh. (aldinjr12)">

      @error('instagram')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="facebook" class="col-md-4 col-form-label text-md-right">Facebook</label>

    <div class="col-md-6">
      <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ $facebook }}" placeholder="contoh. (aldinjr12)">

      @error('facebook')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="twitter" class="col-md-4 col-form-label text-md-right">Twitter</label>

    <div class="col-md-6">
      <input id="twitter" type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ $twitter }}" placeholder="contoh. (aldinjr12)">

      @error('twitter')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>

  <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
      <button type="{{$type}}" class="btn btn-custom" onclick="{{$onclick}}">
        {{ __('Register') }}
      </button>
    </div>
  </div>
</form>
</div>
</div>

<!-- END FORM SETELAH MENDAFTAR -->

@endif

@endif

</div>
</div>
</div>


<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>

      <!-- End Konten -->
      @endsection

      @section('js')
      <script type="text/javascript">
                    function login_first() {
      Swal.fire({
        text: "Anda harus memiliki akun untuk mendaftar Porter",
        type: "warning",
        title: 'Kamu Harus Login',
        showConfirmButton: true,
        button: "Ok"
    }).then(function(){ 
     window.location.href = "{{ route('login') }}"; 
 })
}

            function verifikasi_email() {
      Swal.fire({
        text: "Anda harus memverifikasi email Anda untuk bertransaksi",
        type: "warning",
        title: 'Verifikasi Email Anda',
        showConfirmButton: true,
        button: "Ok"
    }).then(function(){
     window.location.href = "{{ route('verifikasi.email.porter.create') }}"; 
 })
}

        $(document).ready(function() {
          $('#jarak_input').hide();
          $('#jarak_label').hide();
          $('input[name=destinasi]').change(function(){
            if($('#customRadio2').prop('checked') == true){
              $('#jarak_input').show();
              $('#jarak_label').show();
            } else if($('#customRadio1').prop('checked') == true){
              $('#jarak_input').hide();
              $('#jarak_label').hide();
            } else {
              $('#jarak_input').hide();
              $('#jarak_label').hide();
            }
          })
        })

        $('#form').submit(function(e){
          e.preventDefault();
          proses();
          var request = new FormData(this);
          var endpoint= "/register-porter";
          $.ajax({
            url: endpoint,
            method: "POST",
            data: request,
            contentType: false,
            cache: false,
            processData: false,
            // dataType: "json",
            success:function(data){
              $('#form')[0].reset();
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

      </script>
      @endsection
