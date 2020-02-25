@extends('layouts.adminpage')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10 bg-content">
			<!-- Content -->
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb breadcrumb-custom">
					<li class="breadcrumb-item"><a href="">Data Penitipan</a></li>
					<li class="breadcrumb-item active" aria-current="page">Sedang Menitip</li>
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
							<th>Nama Penitip</th>
							<th>Nama Barang</th>
							<th>Destinasi</th>
							<th>Status</th>
							<th>Ket</th>
							<th>Total Harga</th>
							<th>Detail</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($data as $datas)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$datas->id}}</td>
							<td>{{$datas->nama_penitip}}</td>
							<td>{{$datas->nama_barang}}</td>
							<td>@if($datas->destinasi == 'luar_kota')
								@php $desti = 'Luar Kota'; @endphp
								@else
								@php $desti = 'Dalam Kota'; @endphp
								@endif

							{{ $desti }}</td>
							<td>Titip {{$datas->status}}</td>
							@if($datas->ket == 'cari_porter')
							@php $ket = 'Cari Porter'; $alert = 'warning'; $disabled_selesai = 'disabled'; $disabled_cancel = '';@endphp
							@else
							@php $ket = 'Pengiriman'; $alert = 'success'; $disabled_selesai = ''; $disabled_cancel = 'disabled';@endphp
							@endif
							<td><div class="alert alert-{{$alert}}" role="alert">{{$ket}}</div></td>
							<td>{{ "Rp. ".format_uang($datas->harga + $datas->tip) }} </td>
							<td><button type="button" class="btn btn-info btn-sm" 
								data-toggle="modal" 
								data-target="#detail-pesananan" 
								data-nama_barang="{{$datas->nama_barang}}" 
								data-harga_barang="{{'Rp. '.format_uang($datas->harga)}}" 
								data-status="{{$datas->status}}"
								data-alamat_awal="{{$datas->alamat_awal}}" 
								data-alamat_tujuan="{{$datas->alamat_tujuan}}" 
								data-facebook_porter="{{$datas->facebook_porter}}" 
								data-twitter_porter="{{$datas->twitter_porter}}" 
								data-instagram_porter="{{$datas->instagram_porter}}" 
								data-total_harga="{{ 'Rp. '.format_uang($datas->harga + $datas->tip) }}" data-destinasi="{{$datas->destinasi}}" 
								data-jarak_berat="{{$datas->jarak_berat}}" 
								data-tip="{{'Rp. '.format_uang($datas->tip)}}"
								data-nama_penitip="{{$datas->nama_penitip}}"
								title="Detail">
								<span class="fas fa-eye"></span></button></td>

								<td>
									<button type="button" class="btn btn-warning btn-sm" onclick="find_porter()" id="find_porter" href="{{ route('penitipan_find_porter', ['id' => $datas->id ]) }}"><span class="fas fa-check-circle" title="Porter Ditemukan"></button>

										<button type="button" class="btn btn-success btn-sm" onclick="done_transaksi()" id="done_transaksi" href="{{ route('penitipan_done', ['id' => $datas->id ]) }}" title="Selesai" {{$disabled_selesai}}><span class="fas fa-check-double" ></button>

											<button type="button" class="btn btn-danger btn-sm" href="{{ route('penitipan_cancel', ['id' => $datas->id ]) }}" onclick="cancel()" id="cancel" title="Cancel" {{$disabled_cancel}}><span class="fas fa-times"></button></td>
											</tr>
											@endforeach

										</tbody>
									</table>

								</div>
								<!-- End Content -->
							</div>
						</div>
					</div>
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
													<td>Nama Penitip</td>
													<td>:</td>
													<td id="nama_penitip"></td>
												</tr>
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
	var nama_penitip  = button.data('nama_penitip')


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
	modal.find('#nama_penitip').text(nama_penitip)

})
// End Modal detail

function done_transaksi() {
	$(document).on('click', '#done_transaksi', function(){
		Swal.fire({
			title: 'Transaksi Selesai ?',
			text: "Anda tidak dapat mengembalikan data yang telah di konfirmasi!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Konfirmasi!',
			timer: 6500
		}).then((result) => {
			if (result.value) {
				var me = $(this),
				url = me.attr('href'),
				token = $('meta[name="csrf-token"]').attr('content');
				$.ajax({
					url: url,
					method: "POST",
					data : {
						'_method' : 'PUT',
						'_token'  : token
					},
					success:function(data){
						transaksi_berhasil(data.status, data.pesan);
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
			}
		});
	});
}

function cancel() {
	$(document).on('click', '#cancel', function(){
		Swal.fire({
			title: 'Batalkan Transaksi ?',
			text: "Membatalkan berarti menghapus transaksi !",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Konfirmasi!',
			timer: 6500
		}).then((result) => {
			if (result.value) {
				var me = $(this),
				url = me.attr('href'),
				token = $('meta[name="csrf-token"]').attr('content');
				$.ajax({
					url: url,
					method: "POST",
					data : {
						'_method' : 'DELETE',
						'_token'  : token
					},
					success:function(data){
						transaksi_berhasil(data.status, data.pesan);
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
			}
		});
	});
}

function find_porter() {
	$(document).on('click', '#find_porter', function(){
		Swal.fire({
			title: 'Porter Tersedia ?',
			text: "Jika Porter Tersedia, Silakan Lanjutkan !",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Konfirmasi!',
			timer: 6500
		}).then((result) => {
			if (result.value) {
				var me = $(this),
				url = me.attr('href'),
				token = $('meta[name="csrf-token"]').attr('content');
				$.ajax({
					url: url,
					method: "POST",
					data : {
						'_method' : 'PUT',
						'_token'  : token
					},
					success:function(data){
						transaksi_berhasil(data.status, data.pesan);
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
			}
		});
	});
}

function transaksi_berhasil(status, pesan) {
	Swal.fire({
		text: "Transaksi telah selasai dilakukan",
		type: status,
		title: pesan,
		showConfirmButton: true,
		button: "Ok"
	}).then(function(){ 
		location.reload();
	})
}
</script>

@endsection
