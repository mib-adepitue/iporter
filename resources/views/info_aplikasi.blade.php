@extends('layouts.app')

@section('content')

      <!-- Content -->
      <ul class="nav nav-tabs nav-custom" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="#porter" role="tab" data-toggle="tab">Sebagai Porter</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#penitip" role="tab" data-toggle="tab">Sebagai Penitip</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Tab Porter -->
        <div role="tabpanel" class="tab-pane active" id="porter">
          <div class="container alert alert-info">
            <h4>Alur Kerja Aplikasi Sebagai Porter</h4>
            <ul>
              <li>Daftar di <a href="{{ route('register') }}"> www.iporter.id.com/register</a></li>
              <li>Verifikasi email Anda </li>
              <li>Lengkapi Data Anda di <a href="{{ route('porter.create') }}"> www.iporter.id.com/porter/create</a></li>
              <li>Data Anda segera diproses, Anda akan segera mendapatkan informasi melalui email, WA, maupun status Anda di halaman <a href=""> www.iporter.id.com/porter/create</a></li>
              <li>Jika data Anda diterima, Anda bisa segera mempublikasikan ke media sosial Anda bahwa Anda seorang mitra iPorter </li>
              <li>Jika data Anda TIDAK diterima, Anda bisa mengirim ulang Data Anda di <a href="{{ route('porter.create') }}"> www.iporter.id.com/porter/create</a> </li>
            </ul>
          </div>
        </div>
        <!-- End Tab Porter -->

        <!-- Tab Penitip -->
        <div role="tabpanel" class="tab-pane fade" id="penitip">
         <div class="container alert alert-info">
          <h4>Alur Kerja Aplikasi Sebagai Penitip</h4>
          <ul>
            <li>Daftar di <a href="{{ route('register') }}"> www.iporter.id.com/register</a></li>
            <li>Verifikasi email Anda </li>
            <li>Lengkapi data  Anda </li>
            <li>Cari Informasi tentang porter yang akan melakukan perjalanan sesuai tujuan Anda</li>
            <li>Isi data barang yang akan Anda titip ke porter tersebut di <a href="{{ route('order.create') }}"> www.iporter.id.com/order/create</a> </li>
            <li>Admin akan menghubungi Anda via WA untuk mengkonfirmasi penitipan Anda ke porter tersebut</li>
            <li>Transfer uang ke rekening ..... sesuai kebutuhan porter</li>
            <li>Uang Anda akan tetap berada di pihak kami sampai barang Anda sampai tujuan</li>
          </ul>
        </div>
      </div>
      <!-- End Tab Penitip -->


      <!-- Tab pertanyaan collapse -->
      <div class="accordion" id="accordionExample">

        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Apa Itu iPorter ?
              </button>
            </h2>
          </div>

          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              iPorter adalah aplikasi jasa titip. aplikasi yang memungkinkan Anda untuk transaksi jasa titip melalui admin iPorter. Anda bisa menjadi penitip maupun Porter(orang yang akan dititipi).
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Apa Itu Nitip Dong ?
              </button>
            </h2>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                Nitip Dong adalah halaman untuk mengisi data penitipan Anda. fitur ini bagi Anda yang mengetahui bahwa ada Porter yang sedang siap untuk dititipi sesuatu sesuai tujuan Anda, maka Anda tinggal mengisi halaman Nitip Dong ini dan data Porter atau sumber informasi dimana Anda mengetahui perjalanan yang akan Anda titipi. 
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Apa Itu NgePorter Yuk ? 
              </button>
            </h2>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              NgePorter Yuk adalah halaman untuk mendaftar sebagai Porter. Fitur ini bagi Anda yang sedang melakukan travel dan siap di titipi oleh orang lain. Anda akan memperoleh uang tip dari orang yang menitip kepada Anda.
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                Bagaimana cara untuk menitip ? 
              </button>
            </h2>
          </div>
          <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              Anda harus daftar terlebih dahulu, lalu login dan verfikasi email terlebih dahulu, kemudian Anda harus melengkapi data Anda, Setelah data Anda lengkap silakan ke halaman Nitip Dong dan isi data yang dibutuhkan. 
            </div>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                Bagaimana Cara menjadi Porter ?
              </button>
            </h2>
          </div>
          <div id="collapseFive" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
              Anda harus daftar terlebih dahulu, lalu login dan verfikasi email terlebih dahulu, kemudian ke halaman NgePorter Yuk, lengkapilah data Anda. Setelah Anda mengirim data Anda, selalulah cek email Anda karena akan ada pemberitahuan melalui email bahwa Anda diterima menjadi Porter atau tidak. 
            </div>
          </div>
        </div>
      </div>

      <!-- End Tab pertanyaan collapse -->



    </div>
    <!-- End Content -->

@endsection
