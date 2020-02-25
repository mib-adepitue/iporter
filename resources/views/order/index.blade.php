@extends('layouts.app')

@section('content')
<div class="container">

<button data-target="#balas" data-toggle="modal" class="btn btn-custom">Tambah Order</button>
  <div>
    <div class="row">
      @foreach($data as $datas)
      <div class=" col-md-3 mt-2">
      	<div class="card">
          <div class="card-body">
            <h4 class="card-title">{{ $datas->alamat_tujuan }}</h4>
            <h5 class="card-text">Alamat awal : {{ $datas->alamat_awal }}</h5>
            <button data-target="#balas" data-toggle="modal" class="btn btn-custom">Balas</button>
          </div>
        </div>
      </div>
      @endforeach
      {{ $data->links() }}
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="balas">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#jarak_input').hide();
    $('#jarak_label').hide();
    $('input[name=status]').change(function(){
      if($('#customRadio2').prop('checked') == true){
        $('#jarak_input').show();
        $('#jarak_label').show();
      } else if($('#customRadio1').prop('checked') == true){
        $('#jarak_input').hide();
        $('#jarak_label').hide();
      } else {
        $('#jarak_input').hide();
        $('#jarak_label').hide();
      }
    })
  })

</script>
@endsection
