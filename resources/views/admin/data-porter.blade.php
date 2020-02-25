@extends('layouts.adminpage')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 bg-content">
      <!-- Content -->
      	<nav aria-label="breadcrumb">
		  <ol class="breadcrumb breadcrumb-custom">
		    <li class="breadcrumb-item"><a href="">Data Porters</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Porters</li>
		  </ol>
		</nav>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">Data Porter Yang telah mendaftar</a>
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
		    		<th>Action</th>
		    	</tr>
		    </thead>
		    <tbody>
		    	@foreach($data as $datas)
		    	<tr>
		    		<td>{{$no++}}</td>
		    		<td>{{$datas->id}}</td>
		    		<td>{{$datas->name}}</td>
		    		<td>{{$datas->email}}</td>
		    		<td>{{$datas->alamat}}</td>
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
