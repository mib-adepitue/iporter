@extends('layouts.app')

@section('content')

<div class="alert alert-info" role="alert">
                Cara menitip :
                <ul>
                  <li>Nitip Beli adalah fitur bagi Anda yang ingin menitip pesan dan barang tersebut harus dibeli terlebih dahulu oleh porter. Jika Anda mencentang Nitip Beli, maka isilah perkiraan harga barang tersebut dan perkiraan biaya perjalanan porter ke tempat pembelian barang</li>
                  <li>Nitip Ambil adalah fitur bagi Anda yang ingin menitip pesan dan barang tersebut hanya diambil di tempat. </li>
                </ul>
              </div>

@guest
  @php $method = 'GET'; $action = route('login'); $id = '#'; $atribut = ''; $type = 'submit'; $onclick =''; @endphp
@else
  @php $method = 'POST'; $action = route('post.order'); $id = 'form'; $atribut = ''; $type ='submit'; $onclick = ''; @endphp

  @if(Auth::user()->email_verified_at == '')
    @php $method = ''; $action = ''; $id = '#'; $atribut = ''; $type = 'button'; $onclick = 'verifikasi_email()'; @endphp
  @else
    @if(Auth::user()->nik == '' && Auth::user()->phone == '')
      @php $atribut = 'data-toggle=modal data-target=#complete-data'; $id = '#'; $action = ''; $method ='GET'; $type = 'button'; $onclick = ''; @endphp
    @else
      @php $method = 'POST'; $action = route('post.order'); $id = 'form'; $atribut = ''; $type ='submit'; $onclick = ''; @endphp
    @endif
  @endif

@endguest


      <div class="card">
        <div class="card-header card-header-custom">Order.. Nitip Dong</div>

        <div class="card-body">
          <div class="container">
            <form method="{{$method}}" action="{{$action}}" id="{{$id}}">
              @csrf

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="email" class="col-form-label text-md-right">Nama Barang</label>
                </div>
                <div class="col-md-5 col-8"> 
                  <input type="text" class="form-control" name="nama_barang" value="{{ old('nama_barang') }}" required>
                </div>
                <div class="col-md-4">
                  <div class="custom-control custom-radio custom-control-inline" style="margin-top: 5px;">
                    <input type="radio" id="customRadioInline1" name="status" value="beli" class="custom-control-input" required="">
                    <label class="custom-control-label" for="customRadioInline1">Beli</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="status" value="ambil" class="custom-control-input" required="">
                    <label class="custom-control-label" for="customRadioInline2">Ambil</label>
                  </div>
                </div>
              </div>

              <div class="form-group row" id="harga">
                <div class="col-md-3">
                  <label for="email" class="col-form-label text-md-left">Harga Barang</label>
                </div>
                <div class="col-md-9"> 
                  <input type="number" class="form-control" name="harga" id="value-harga" max="99999999" min="1" onkeypress="if(this.value.length==8 ) return false; ">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="email" class="col-form-label text-md-right">Destinasi</label>
                </div>
                <div class="col-md-5">
                  <div class="custom-control custom-radio custom-control-inline" style="margin-top: 5px;">
                    <input type="radio" id="customRadio1" name="destinasi" value="luar_kota" class="custom-control-input" required="" checked="">
                    <label class="custom-control-label" for="customRadio1">Luar Kota</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadio2" name="destinasi" value="dalam_kota" class="custom-control-input" required="">
                    <label class="custom-control-label" for="customRadio2">Dalam Kota</label>
                  </div>
                </div>
                <div class="col-md-2" id="jarak_label">
                  
                </div>
                <div class="col-md-2" id="jarak_input"> 
                    <input type="number" pattern="^[1-9]" class="form-control" name="jarak_berat" id="jarak_berat" 
                    oninput="hitung(event)" max="99" onkeypress="if(this.value.length==2 ) return false; " min="1" required>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="email" class="col-form-label text-md-left">Tip</label>
                </div>
                <div class="col-md-9"> 
                  <input type="text" class="form-control" id="tip" disabled="">
                  <input type="hidden" name="tip" id="hidden-tip">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="password" class="col-form-label text-md-right">Alamat Pemesanan</label>
                </div>
                <div class="col-md-9">
                  <textarea rows="3" class="form-control" name="alamat_awal" required=""></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="password" class="col-form-label text-md-right">Alamat Tujuan</label>
                </div>
                <div class="col-md-9">
                  <textarea rows="3" class="form-control" name="alamat_tujuan" required=""></textarea>
                </div>
              </div>


              <br>
              <div class="alert alert-success" role="alert">
                Kamu dapat info darimana ? infoin medsos porter kamu :
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="email" class="col-form-label text-md-left">Facebook</label>
                </div>
                <div class="col-md-9"> 
                  <input type="text" class="form-control" name="facebook" placeholder="contoh. (aldinjr12)">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-3">
                  <label for="email" class="col-form-label text-md-left">Twitter</label>
                </div>
                <div class="col-md-9"> 
                  <input type="text" class="form-control" name="twitter" placeholder="contoh. (@aldinjr12)">
                </div>
              </div>
              
              <div class="form-group row">
                <div class="col-md-3">
                  <label for="email" class="col-form-label text-md-left">Instagram</label>
                </div>
                <div class="col-md-9"> 
                  <input type="text" class="form-control" name="instagram" placeholder="contoh. (@aldinjr12)">
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-3">
                  <button type="{{$type}}" class="btn btn-custom" {{$atribut}} onclick="{{$onclick}}">
                    Submit
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

@endsection

@section('js')
  <script type="text/javascript">

            function verifikasi_email() {
      Swal.fire({
        text: "Anda harus memverifikasi email Anda untuk bertransaksi",
        type: "warning",
        title: 'Verifikasi Email Anda',
        showConfirmButton: true,
        button: "Ok"
    }).then(function(){ 
     window.location.href = "{{ route('verifikasi_email.order_create') }}"; 
 })
}

    function hitung(evt) {
    
       if($('#customRadio1').prop('checked') == true){
        var berat = $('#jarak_berat').val();
        if (berat < 0){
          harga = 0;
        }else if(berat > 0 && berat <= 5){
          harga = 20000;
        } else if (berat <= 10) {
          harga = 50000;
        } else if (berat <= 15) {
          harga = 100000;
        } else if (berat > 15) {
          harga = 200000;
        } else {
          harga = 0;
        }
        $('#tip').val('Rp.' + harga);
        $('#hidden-tip').val(harga);
      }
      if($('#customRadio2').prop('checked') == true){
        var jarak = $('#jarak_berat').val();
        if (jarak < 0){
          harga = 0;
        } else if(jarak <= 10){
          harga = 5000;
        } else if (jarak > 10){
          harga_awal = 5000;
          jarak_tambah = jarak - 10;
          harga_tambah = jarak_tambah * 2000;
          harga = harga_awal + harga_tambah;
        } else {
          harga = 0;
        }
        $('#tip').val('Rp.' + harga);
        $('#hidden-tip').val(harga);
      }
    }
 $('#jarak_berat').change(function(){
      if($('#customRadio1').prop('checked') == true){
        var berat = $('#jarak_berat').val();
        if (berat < 0){
          harga = 0;
        }else if(berat > 0 && berat <= 5){
          harga = 20000;
        } else if (berat <= 10) {
          harga = 50000;
        } else if (berat <= 15) {
          harga = 100000;
        } else if (berat > 15) {
          harga = 200000;
        } else {
          harga = 0;
        }
        $('#tip').val('Rp.' + harga);
        $('#hidden-tip').val(harga);
      }
      if($('#customRadio2').prop('checked') == true){
        var jarak = $('#jarak_berat').val();
        if (jarak < 0){
          harga = 0;
        } else if(jarak <= 10){
          harga = 5000;
        } else if (jarak > 10){
          harga_awal = 5000;
          jarak_tambah = jarak - 10;
          harga_tambah = jarak_tambah * 2000;
          harga = harga_awal + harga_tambah;
        } else {
          harga = 0;
        }
        $('#tip').val('Rp.' + harga);
        $('#hidden-tip').val(harga);
      }
    })

    $(document).ready(function() {
      // document.getElementById("jarak_berat").maxLength = "2";
      $('#harga').hide();
      $('#value-harga').val('');
      $('#harga').attr('required', false);
      $('input[name=status]').change(function(){
        if($('#customRadioInline1').prop('checked') == true){
            $('#harga').show();
            $('#harga').attr('required', true);
            $('#value-harga').val('');

        } else if($('#customRadioInline2').prop('checked') == true){
            $('#harga').hide();
            $('#harga').attr('required', false);
            $('#value-harga').val('');
        } else {
            $('#harga').hide();
            $('#harga').attr('required', false);
            $('#value-harga').val('');
        }
      })
    })

      $('#jarak').attr('required', false);
      $('#jarak_label').html('<label class="col-form-label text-md-right">Berat (kg)</label>');
      $('input[name=destinasi]').change(function(){
        if($('#customRadio2').prop('checked') == true){
            $('#tip').val('');
            $('#jarak_berat').val('');
            $('#jarak_label').html('<label class="col-form-label text-md-right">Jarak (km)</label>');
        } else if($('#customRadio1').prop('checked') == true){
            $('#tip').val('');
            $('#jarak_berat').val('');
            $('#jarak_label').html('<label class="col-form-label text-md-right">Berat (kg)</label>');
        } else {
            $('#jarak_berat').val('');
            $('#tip').val('');
        }
      })
  
    
   $('#form').submit(function(e){
    e.preventDefault();
    var request = new FormData(this);
    var url = $('#form').attr('action');
          $.ajax({
            url: url,
            method: "POST",
            data: request,
            contentType: false,
            cache: false,
            processData: false,
            // dataType: "json",
            success:function(data){
              
              if(data.status == 'success') {
                $('#form')[0].reset();
                berhasil(data.status, data.pesan);
              } else if (data.status == 'error') {
                pesan(data.status, data.pesan);
              }
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

   function pesan(status, pesan) {
      Swal.fire({
        type: status,
        title: pesan,
        showConfirmButton: true,
        button: "Ok"
    })
  }
  </script>
@endsection
