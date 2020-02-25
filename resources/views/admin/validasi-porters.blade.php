@extends('layouts.adminpage')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 bg-content">
      <!-- Content -->
      	<nav aria-label="breadcrumb">
		  <ol class="breadcrumb breadcrumb-custom">
		    <li class="breadcrumb-item"><a href="">Data Porters</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Validasi Porters</li>
		  </ol>
		</nav>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#">Pendaftar Porters Yang Harus Di Validasi</a>
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

		<div class="table-responsive">
		  <table class="table">
		    <thead>
		    	<tr style="background-color: #D6D8D9">
		    		<th>No</th>
		    		<th>Id</th>
		    		<th>Nama</th>
		    		<th>Foto Ktp</th>
		    		<th>Foto Selfie & Ktp</th>
            <th>Action</th>
		    		<th>Verifikasi</th>
		    	</tr>
		    </thead>
		    <tbody>
		    	@php $no = 1; @endphp
		    	@foreach($data as $datas)
		    	<tr>
		    		<td>{{$no++}}</td>
		    		<td>{{$datas->id}}</td>
		    		<td>{{$datas->name}}</td>
		    		<td><a href="#ktp_only"><img src="{{asset('storage/' . $datas->foto_ktp)}}" width="50px" alt="foto ktp"></a></td>
		    		<td><a href="#ktp_selfie"><img src="{{asset('storage/' . $datas->selfie_ktp)}}" width="50px" alt="foto selfie & ktp"></a></td>

            <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-detail" data-name="{{$datas->name}}" data-email="{{$datas->email}}" data-foto_ktp="{{$datas->foto_ktp}}" data-selfie_ktp="{{$datas->selfie_ktp}}" data-nik="{{$datas->nik}}" data-foto_profile="{{$datas->foto_profile}}" data-alamat="{{$datas->alamat}}" data-tanggal_lahir="{{$datas->tanggal_lahir}}" data-phone="{{$datas->phone}}" data-instagram="{{$datas->instagram}}" data-facebook="{{$datas->facebook}}" data-twitter="{{$datas->twitter}}"><span class="fas fa-eye"></span> Detail</button>
            </td>

		    		<td><button href="{{route('store.validasi', ['id' => $datas->id])}}" onclick="validasi_porter()" class="btn btn-success btn-sm" data-name="{{$datas->name}}"
		    			id="validasi_porter">
		    			<span class="fas fa-check"></span> Terima</button> 

		    			<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$datas->name}}" data-rute="{{ route('porters.reject', ['id' => $datas->id]) }}" data-email="{{$datas->email}}"><span class="fas fa-times"></span> Tolak</button>
		    		</td>

		    	</tr>

		    	<!-- OVERLAY -->
                        <div class="overlay" id="ktp_only">
                          <a href="#ngeporter-yuks" class="fa fa-close"></a>
                          <img src="{{asset('storage/' . $datas->foto_ktp)}}"> 
                        </div>

                        <div class="overlay" id="ktp_selfie">
                          <a href="#ngeporter-yuks" class="fa fa-close"></a>
                          <img src="{{asset('storage/' . $datas->selfie_ktp)}}"> 
                        </div>
                        <!-- END OVERLAY -->
		    	@endforeach
		    </tbody>
		  </table>
		  {{ $data->links() }}
		</div>
      <!-- End Content -->
    </div>
  </div>
</div>

<!-- Modal detail -->
<div class="modal fade bd-example-modal-lg" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail </h5>
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
            <td>Nik</td>
            <td>:</td>
            <td id="nik">7308090408990001</td>
          </tr>
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td id="name">Khaeruddin Asdar</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>:</td>
            <td id="email">khaeruddinasdar12@gmail.com</td>
          </tr>
          <tr>
            <td>No. Hp</td>
            <td>:</td>
            <td id="phone">082344949505</td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td id="alamat">Galung, Desat Talungeng, Kec. Barebbo, Kab. Bone</td>
          </tr>
        </table>
        </div>

        <div class="col-md-4">
        <table>
          <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td id="tanggal_lahir">22/10/2000</td>
          </tr>
          <tr>
            <td>Instagram</td>
            <td>:</td>
            <td id="instagram">khaeruddinasdar</td>
          </tr>
          <tr>
            <td>Facebook</td>
            <td>:</td>
            <td id="facebook">khaeruddinasdar</td>
          </tr>
          <tr>
            <td>Twitter</td>
            <td>:</td>
            <td id="twitter">khaeruddinasdar</td>
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

<!-- Modal Form Penolakan Data-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" id="form-reject">
        	<!-- <input
				type="hidden"
				value="PUT"
				name="_method"> -->
        	@csrf
        <div class="form-group">
		    <label for="exampleInputEmail1">To : </label>
		    <input class="form-control" id="modal-email-view" disabled>
		    <input type="hidden" name="email" id="modal-email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Subject : </label>
		    <input value="Penolakan Data Pendaftaran Porter" disabled class="form-control">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Pesan : </label>
		    <textarea rows="5" name="pesan" class="form-control">Data Anda tidak valid, silakan mengirim kembali data Anda untuk dapat menjadi seorang Porter, kami akan validasi ulang setelah Anda mengirim data Anda. Terima Kasih !! cek status Anda di iporter.id/porter/create</textarea>
		  </div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send Email</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- End Modal -->
@endsection

@section('js')

<script type="text/javascript">

//Modal penolakan data porter
	$('#exampleModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var recipient = button.data('whatever') 
	  var email = button.data('email')
	  var rute  = button.data('rute')
	  var modal = $(this)
	  modal.find('.modal-title').text('Menolak Data ' + recipient)
	  modal.find('#modal-email').val(email)
	  modal.find('#modal-email-view').val(email)
	  modal.find('#form-reject').attr('action', rute)
	})
// End Modal penolakan data porter

//Modal Detail
    $('#modal-detail').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('name') 
    var nik = button.data('nik')
    var email  = button.data('email')
    var phone  = button.data('phone')
    var alamat  = button.data('alamat')
    var tanggal_lahir  = button.data('tanggal_lahir')
    var instagram  = button.data('instagram')
    var facebook  = button.data('facebook')
    var twitter  = button.data('twitter')
    var modal = $(this)
    modal.find('#name').text(name)
    modal.find('#email').text(email)
    modal.find('#nik').text(nik)
    modal.find('#phone').text(phone)
    modal.find('#alamat').text(alamat)
    modal.find('#tanggal_lahir').text(tanggal_lahir)
    modal.find('#instagram').text(instagram)
    modal.find('#facebook').text(facebook)
    modal.find('#twitter').text(twitter)
  })
//End Modal Detail



	function validasi_porter() {

		    $(document).on('click', '#validasi_porter', function(){
		    	var me = $(this),
                        url = me.attr('href'),
                        token = $('meta[name="csrf-token"]').attr('content'),
                        nama = me.attr('data-name');
              Swal.fire({
                title: 'Validasi ' +nama+ ' ?',
                text: "Perhatikan dengan sebaik-baiknya data yang harus di validasi !",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Validasi!'
              }).then((result) => {
                  if (result.value) {
                    
                        $.ajax({
                          url: url,
                          method: "POST",
                          data : {
                            '_method' : 'PUT',
                            '_token'  : token
                          },
                          success:function(data){
                          	// location.reload(true);
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
                      }
                  });
              });
	}


	$('#form-reject').submit(function(e){
    e.preventDefault();
    proses();
    var url = $('#form-reject').attr('action');
    // var me = $(this),
    //                     url = me.attr('action'),
	// token = $('meta[name="csrf-token"]').attr('content');
                        console.log(url);
                        console.log('wowowo');
    var request = new FormData(this);
          $.ajax({
            url: url,
            method: "POST",
            data: request,
            contentType: false,
            cache: false,
            processData: false,
            // dataType: "json",
            success:function(data){
             
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
