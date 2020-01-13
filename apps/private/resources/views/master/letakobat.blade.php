@extends('template/t_index')        
@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-md-3 well">
                <h4>Masukan Letak Penyimpanan Obat</h4>
                @if(Session::has('select'))
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="updateDataPenyimpanan">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_penyimpanan" value="{{ Session::get('id') }}">
            <div class="form-group">
              <label for="id_penyimpanan" class="col-sm-4 control-label"><small>ID Penyimpanan</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm " id="inputIDPenyimpanan" name="inputIDPenyimpanan" value="{{ Session::get('id_penyimpanan') }}" required>
              </div>
            </div>
            <div class="form-group">
              <label for="penyimpanan" class="col-sm-4 control-label"><small>Penyimpanan</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputPenyimpanan" name="inputPenyimpanan" value="{{ Session::get('penyimpanan') }}" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Edit Data Penyimpanan Obat</button>
              </div>
            </div>
        </form>
                @else
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="createDataPenyimpanan">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="id_penyimpanan" class="col-sm-4 control-label"><small>ID Penyimpanan</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm " id="inputIDPenyimpanan" name="inputIDPenyimpanan" placeholder="disesuaikan" required>
                  <div id="messagewarning" style="font-size: 10px; padding-left: 5px; margin-top: 5px;">
                                                            
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="penyimpanan" class="col-sm-4 control-label"><small>Penyimpanan</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputPenyimpanan" name="inputPenyimpanan" placeholder="contoh: lemari 3" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Tambah Data Penyimpanan Obat</button>
              </div>
            </div>
        </form>
                @endif
            </div>
            <div class="col-md-9">
              <script>
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove(); 
                        });
                            }, 2000);
                    </script>
                    @if(Session::has('message'))
                          <div class="alert alert-info"> {{ Session::get('message') }} </div>
                    @endif
                    <table width="100%">
                    <tr>
                    <td width="65%">
                                        <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="filterDataPenyimpanan">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          Cari Berdasarkan: 
                        <div class="form-group">
                          <select class="form-control input-sm" name="filter-kategori">
                            <option value="1">ID Penyimpanan</option>
                            <option value="2">Penyimpanan</option>
                          </select>
                        </div>  
                          <div class="form-group">
                            <input type="text" class="form-control input-sm" id="keyword" name="keyword-pencarian" placeholder="Kata Kunci Pencarian">
                        </div>  
                          <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></button>
                          <a href="letakobat" class="btn btn-warning btn-sm">Reset Tabel</a>
                      </form>
        </td>
        <td width="35%" style="text-align: right;">
                        <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="exportDataPenyimpanan">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-print"></button>
                          </form>
                      </td>
        </tr>
        </table>
				<div class="table-responsive" style="margin-top: 10px;">
          <small>
					<table class="table table-bordered" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>ID Penyimpanan</th>
								<th>Penyimpanan</th>								
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
              <?php $no = 1; ?>
              @if($datapenyimpanan -> count() > 0)
                @foreach($datapenyimpanan as $penyimpanan)
                  <tr>
                    <td style="text-align:right;">{{ $no++ }}</td>
                    <td>{{ $penyimpanan -> id_penyimpanan }}</td>
                    <td>{{ $penyimpanan -> penyimpanan }}</td>
                    <td style="text-align:center;"><a href="selectDataPenyimpanan/{{ $penyimpanan->id }}" class="btn btn-xs btn-warning" title="Edit Data"><span class="glyphicon glyphicon-pencil"></span></a> <a href="hapusDataPenyimpanan/{{ $penyimpanan->id }}" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="btn btn-xs btn-danger" title="Hapus Data"><span class="glyphicon glyphicon-remove"></span></a></td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="4" style="text-align: center"><i>Belum ada data penyimpanan</i></td>
                </tr>
              @endif
						</tbody>
					</table>
        </small>
				</div>
            </div>
        </div>
    </div>
@endsection