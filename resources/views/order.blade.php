@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Order</div>

        <div class="card-body">
          <div class="container">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="email" class="col-form-label text-md-right">Nama Barang</label>
                </div>
                <div class="col-md-5 col-8"> 
                  <input type="text" class="form-control" name="nama_barang" required autofocus>
                </div>
                <div class="col-md-4">
                  <div class="custom-control custom-radio custom-control-inline" style="margin-top: 5px;">
                    <input type="radio" id="customRadio1" name="status" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio1">Beli</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio2" name="status" class="custom-control-input">
                    <label class="custom-control-label" for="customRadio2">Ambil</label>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="email" class="col-form-label text-md-right">Perkiraan Harga</label>
                </div>
                <div class="col-md-9"> 
                  <input type="number" class="form-control" name="harga" id="harga">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="password" class="col-form-label text-md-right">Alamat Pemesanan</label>
                </div>
                <div class="col-md-9">
                  <textarea rows="3" class="form-control"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="password" class="col-form-label text-md-right">Alamat Titipan</label>
                </div>
                <div class="col-md-9">
                  <textarea rows="3" class="form-control"></textarea>
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Submit
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#harga').attr('disabled', 'disabled');
      $('input[name=status]').change(function(){
        if($('#customRadio1').prop('checked') == true){
            $('#harga').attr('disabled', false);
        } else if($('#customRadio2').prop('checked') == true){
            $('#harga').attr('disabled', 'disabled');
        } else {
            $('#harga').attr('disabled', 'disabled');
        }
      })
    })
    
    $(document).ready(function () {
      $('#upload-foto').hide();
      $('#upload-event').hide();
      $('input[name=status]').change(function(){
        if($('#switchery-foto').prop('checked') == true){
          $('#upload-foto').show();
          $('#upload-video').hide();
          $('#upload-event').hide();
        } else if($('#switchery-video').prop('checked') == true){
          $('#upload-video').show();
          $('#upload-foto').hide();
          $('#upload-event').hide();
        } else if($('#switchery-event').prop('checked') == true){
          $('#upload-event').show();
          $('#upload-foto').hide();
          $('#upload-video').hide();
        }
      })
    })
  </script>
@endsection
