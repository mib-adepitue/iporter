@extends('layouts.app')

@section('content')

      <!-- Content -->
      <!-- FORM SEBELUM MENDAFTAR -->
<div class="card">
  <div class="card-header card-header-custom">Profile Anda</div>

  <div class="card-body">
    
    <form method="POST" action="" enctype="multipart/form-data" id="">

    	<div class="form-group row">
        <label for="foto_ktp" class="col-md-4 col-form-label text-md-right">Foto Ktp *</label>

        <div class="col-md-6 custom-file">
         <div class="custom-file">
          <input type="file" name="foto_ktp" class="custom-file-input @error('foto_ktp') is-invalid @enderror" id="inputGroupFile04" onchange="tampilkanPreviewktp(this,'previewktp')" accept="image/*">
          <label class="custom-file-label" for="inputGroupFile04">Foto Profile</label>
        </div>
      </div>
    </div>

    <br>
    <div class="form-group row">
      <label for="alamat" class="col-md-4 col-form-label text-md-right"></label>

@if(Auth::user()-> foto_profile == '')
	@php $profile = asset('img/upload.jpg') ; @endphp
	
@else
	@php $profile = asset('storage/'.Auth::user()->foto_profile) ; @endphp
@endif
      <div class="col-md-6 text-center">
        <img id="previewktp" src="{{$profile}}" alt="Foto Profile" width="70px">
      </div>
    </div>

    	<div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right">Nik</label>

        <div class="col-md-6">
          <input type="text" class="form-control" name="name" value="{{Auth::user()->nik}}" >
        </div>
      </div>

      <div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right">Nama</label>

        <div class="col-md-6">
          <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" >
        </div>
      </div>

      <div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right">Email</label>

        <div class="col-md-6">
          <input type="text" class="form-control" name="phone" value="{{Auth::user()->email}}" disabled>
        </div>
      </div>

      <div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>

        <div class="col-md-6">
          <input type="text" class="form-control" name="alamat" value="{{Auth::user()->alamat}}" >
        </div>
      </div>

      <div class="form-group row">
        <label for="alamat" class="col-md-4 col-form-label text-md-right">Tanggal Lahir</label>

        <div class="col-md-6">
          <input type="date" class="form-control" name="alamat" value="{{Auth::user()->tanggal_lahir}}" >
        </div>
      </div>

  <br>
  <div class="alert alert-success text-center" role="alert">
    Masukkan Data Sosmed Kamu :
  </div>

  <div class="form-group row">
    <label for="instagram" class="col-md-4 col-form-label text-md-right">Instagram</label>

    <div class="col-md-6">
      <input id="instagram" type="text" class="form-control" name="instagram" value="{{Auth::user()->instagram}}"  placeholder="contoh. (aldinjr12)">

    </div>
  </div>

  <div class="form-group row">
    <label for="facebook" class="col-md-4 col-form-label text-md-right">Facebook</label>

    <div class="col-md-6">
      <input id="facebook" type="text" class="form-control" name="facebook" value="{{Auth::user()->facebook}}"  placeholder="contoh. (aldinjr12)">

    </div>
  </div>

  <div class="form-group row">
    <label for="twitter" class="col-md-4 col-form-label text-md-right">Twitter</label>

    <div class="col-md-6">
      <input id="twitter" type="text" class="form-control " name="twitter" value="{{Auth::user()->twitter}}" placeholder="contoh. (aldinjr12)">
    </div>
  </div>

  <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
      <button type="submit" class="btn btn-custom">
        Submit
      </button>
    </div>
  </div>
</form>
</div>
</div>
<!-- END FORM SEBELUM MENDAFTAR --> 
    <!-- End Content -->

@endsection
