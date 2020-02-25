@extends('layouts.app')

@section('content')

      <!-- Content -->
      	<nav aria-label="breadcrumb">
		  <ol class="breadcrumb breadcrumb-custom">
		    <li class="breadcrumb-item active" aria-current="page">Keranjang Anda</li>
		  </ol>
		</nav>

@php
$no = 1;
@endphp
		<div class="table-responsive">
		  <table class="table">
		    <thead>
		    	<tr style="background-color: #D6D8D9">
		    		<th>No</th>
		    		<th>Id Order</th>
		    		<th>Nama Barang</th>
		    		<th>Destinasi</th>
		    		<th>Status</th>
		    		<th>Total Harga</th>
            <th>Ket</th>
		    		<th>Detail</th>
		    	</tr>
		    </thead>
		    <tbody>
		    	@foreach($data as $datas)
		    	<tr>
		    		<td>{{$no++}}</td>
		    		<td>{{$datas->id}}</td>
		    		<td>{{$datas->nama_barang}}</td>
		    		<td>@if($datas->destinasi == 'luar_kota')
		    				@php $desti = 'Luar Kota'; @endphp
		    			@else
		    				@php $desti = 'Dalam Kota'; @endphp
		    			@endif

		    			{{ $desti }}</td>
		    		<td>Titip {{$datas->status}}</td>
		    		<td>{{ "Rp. ".format_uang($datas->harga + $datas->tip) }} </td>
            @if($datas->ket == 'cari_porter')
              @php $ket = 'Cari Porter'; $alert = 'warning'; @endphp
            @else
              @php $ket = 'Pengiriman'; $alert = 'success'; @endphp
            @endif
            <td><div class="alert alert-{{$alert}}" role="alert">{{$ket}}</div></td>
		    		<td><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail-pesananan" data-nama_barang="{{$datas->nama_barang}}" data-harga_barang="{{'Rp. '.format_uang($datas->harga)}}" data-status="{{$datas->status}}" data-alamat_awal="{{$datas->alamat_awal}}" data-alamat_tujuan="{{$datas->alamat_tujuan}}" data-facebook_porter="{{$datas->facebook_porter}}" data-twitter_porter="{{$datas->twitter_porter}}" data-instagram_porter="{{$datas->instagram_porter}}" data-total_harga="{{ 'Rp. '.format_uang($datas->harga + $datas->tip) }}" data-destinasi="{{$datas->destinasi}}" data-jarak_berat="{{$datas->jarak_berat}}" data-tip="{{'Rp. '.format_uang($datas->tip)}}">
		    			<span class="fas fa-eye"></span> Detail</button></td>
		    	</tr>
		    	@endforeach
		    	
		    </tbody>
		  </table>
		 
		</div>
      <!-- End Content -->

<!-- Modal detail -->
<div class="modal fade bd-example-modal-lg" id="detail-pesananan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi Anda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Konten -->
        <div class="row">
        <div class="col-md-8">
        <table>
          <tr>
            <td>Nama Barang</td>
            <td>:</td>
            <td id="nama_barang"></td>
          </tr>
          <tr>
            <td>Status</td>
            <td>:</td>
            <td id="status"></td>
          </tr>
          <tr>
            <td>Harga Barang</td>
            <td>:</td>
            <td id="harga_barang"></td>
          </tr>
          <tr>
            <td>Destinasi</td>
            <td>:</td>
            <td id="destinasi"></td>
          </tr>
          <tr>
            <td>Jarak</td>
            <td>:</td>
            <td id="jarak"></td>
          </tr>
          <tr>
            <td>Berat</td>
            <td>:</td>
            <td id="berat"></td>
          </tr>
          <tr>
            <td>Harga Tip</td>
            <td>:</td>
            <td id="tip"></td>
          </tr>
          <tr>
            <td>Alamat Pemesanan</td>
            <td>:</td>
            <td id="alamat_awal"></td>
          </tr>
          <tr>
            <td>Alamat Tujuan</td>
            <td>:</td>
            <td id="alamat_tujuan"></td>
          </tr>
          
        </table>
        </div>

        <div class="col-md-4">
        <table>
         <tr>
            <td>Facebook Porter</td>
            <td>:</td>
            <td id="facebook_porter"></td>
          </tr>
          <tr>
            <td>Instagram Porter</td>
            <td>:</td>
            <td id="instagram_porter"></td>
          </tr>
          <tr>
            <td>Twitter Porter</td>
            <td>:</td>
            <td id="twitter_porter"></td>
          </tr>
          <tr>
            <td><b>Total Harga</b></td>
            <td>:</td>
            <b><td id="total"></td></b>
          </tr>
          
        </table>
        </div>
        </div>
        <!-- End Konten -->
      </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
  </div>
</div>
<!-- End Modal detail -->
@endsection

@section('js')

<script type="text/javascript">

//Modal detail
	$('#detail-pesananan').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget)
	  var modal = $(this)
	  var nama_barang = button.data('nama_barang') 
	  var status = button.data('status')
	  if(status == 'beli') {
	  	var harga_barang = button.data('harga_barang')
	  } else {
	  	var harga_barang = '-';
	  }

	  var jarak_berat  = button.data('jarak_berat')
	  var destinasi  = button.data('destinasi')
	  if(destinasi == 'luar_kota') {
	  	var destinasi_name = 'Luar Kota'
	  	modal.find('#berat').text(jarak_berat+' Kg')
	  	modal.find('#jarak').text('-')
	  } else {
	  	var destinasi_name = 'Dalam Kota'
	  	modal.find('#jarak').text(jarak_berat+' Km')
	  	modal.find('#berat').text('-')
	  }
	  var alamat_awal  = button.data('alamat_awal')
	  var alamat_tujuan  = button.data('alamat_tujuan')
	  var tip  = button.data('tip')
	  var destinasi  = button.data('destinasi')
	  var facebook_porter  = button.data('facebook_porter')
	  var twitter_porter  = button.data('twitter_porter')
	  var instagram_porter  = button.data('instagram_porter')
	  var jarak_berat  = button.data('jarak_berat')
	  var total  = button.data('total_harga')

	  
	  modal.find('#nama_barang').text(nama_barang)
	  modal.find('#destinasi').text(destinasi_name)
	  modal.find('#harga_barang').text(harga_barang)
	  modal.find('#tip').text(tip)
	  modal.find('#alamat_awal').text(alamat_awal)
	  modal.find('#alamat_tujuan').text(alamat_tujuan)
	  modal.find('#facebook_porter').text(facebook_porter)
	  modal.find('#twitter_porter').text(twitter_porter)
	  modal.find('#instagram_porter').text(instagram_porter)
	  modal.find('#total').html('<b>'+total+'</b>')
	  modal.find('#status').text(status)

	})
// End Modal detail

</script>

@endsection
