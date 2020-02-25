@extends('layouts.adminpage')

@section('content')

<style type="text/css"> 
	
</style>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 bg-content">
      <!-- Content -->
      	<nav aria-label="breadcrumb">
		  <ol class="breadcrumb breadcrumb-custom">
		    <li class="breadcrumb-item active" aria-current="page">Users</li>
		  </ol>
		</nav>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">Semua Data User, Porter & Penitip</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#search" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="search">
		    <ul class="navbar-nav mr-auto">
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		    </form>
		  </div>
		</nav>
@php
$no = 1;
@endphp
		<div class="table-responsive">
		  <table class="table">
		    <thead>
		    	<tr style="background-color: #D6D8D9">
		    		<th>No</th>
		    		<th>Id</th>
		    		<th>Nama</th>
		    		<th>Email</th>
		    		<th>Alamat</th>
		    		<th>Status</th>
		    		<th>Action</th>
		    	</tr>
		    </thead>
		    <tbody>
		    	@foreach($data as $datas)

		    	@if($datas->email_verified_at == '') <!-- Belum verifikasi emailnya saat daftar -->
		    		@php $status = 'Belum Verifikasi Email'; $alert = 'warning'; @endphp

		    	@elseif($datas->status == 'active' && $datas->admin_verified_at != '') <!-- Aktif, Sudah verifikasi admin, Porter -->
		    		@php $status = 'Seorang Porter'; $alert = 'success'; @endphp

		    	@elseif($datas->status == 'active' && $datas->foto_ktp == '' && $datas->admin_verified_at == '')<!-- Aktif, Tidak daftar porter, Bukan Porter, Hanya Penitip -->
		    		@php $status = 'Hanya Penitip'; $alert = 'info'; @endphp

		    	@elseif($datas->status == 'active' && $datas->foto_ktp != '' && $datas->admin_verified_at == '') <!-- Aktif, daftar porter, tahap verifikasi admin -->
		    		@php $status = 'Tahap Verifikasi'; $alert = 'primary';@endphp

		    	@elseif($datas->status == 'inactive') <!-- Tidak Aktif -->
		    		@php $status = 'Tidak Aktif'; $alert = 'danger';@endphp
		    	@endif
		    	<tr>
		    		<td>{{$no++}}</td>
		    		<td>{{$datas->id}}</td>
		    		<td>{{$datas->name}}</td>
		    		<td>{{$datas->email}}</td>
		    		<td>{{$datas->alamat}}</td>
		    		<td><div class="alert alert-{{$alert}}" role="alert">{{$status}}</div></td>
		    		<td>Hapus || Edit || Detail</td>
		    	</tr>
		    	@endforeach
		    </tbody>
		  </table>
		  {{ $data->links() }}
		</div>
      <!-- End Content -->
    </div>
  </div>
</div>
@endsection
