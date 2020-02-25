@extends('layouts.adminpage')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 bg-content">
      <!-- Content -->

      <nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-custom">
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
  </ol>
</nav>

 <div class="row">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Sedang Meniitip</h5>
        <h1 class="card-text"><span class="fas fa-spinner"> 15</h1>
        <a href="#" class="btn btn-custom">More Info</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Validasi Porters</h5>
        <h1 class="card-text"><span class="fas fa-user-clock"></span> 15</h1>
        <a href="#" class="btn btn-custom">More Info</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"></span> Jumlah Porter</h5>
        <h1 class="card-text"><span class="fas fa-user-check"> 15</h1>
        <a href="#" class="btn btn-custom">More Info</a>
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Data Penitipan</h5>
        <h1 class="card-text"><span class="fas fa-chart-bar"> 15</h1>
        <a href="#" class="btn btn-custom">More Info</a>
      </div>
    </div>
  </div>
  
</div>
      <!-- End Content -->
    </div>
  </div>
</div>
@endsection
