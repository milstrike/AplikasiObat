@section('modalcontent2')
<div id="tambahdataresep" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Tambah Data Resep</h3>
  </div>
  <div class="modal-body">
    <small>
    <form method="POST" enctype="multipart/form-data" action="importcsvdatasiswa">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
  </small>
  </div>
  <div class="modal-footer">
    <button class="btn btn-danger btn-xsall" data-dismiss="modal" aria-hidden="true">Close</button>
    <input type="submit" class="btn btn-primary btn-xsall" value="Tambah Data Resep!">
    </form>
  </div>
</div>
@endsection