@extends('template/t_index')        
@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-md-3 well">
                <h4>Masukan Satuan Kemasan Obat</h4>
                @if(Session::has('select'))
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="updateDataKemasan">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_kemasan" value="{{ Session::get('id') }}">
            <div class="form-group">
              <label for="id_satuan" class="col-sm-4 control-label"><small>ID Satuan Kemasan</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm " id="inputIDSatuanKemasan" name="inputIDSatuanKemasan" value="{{ Session::get('id_satuan_kemasan') }}" required>
              </div>
            </div>
            <div class="form-group">
              <label for="satuan_kemasan" class="col-sm-4 control-label"><small>Satuan Kemasan</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputSatuanKemasan" name="inputSatuanKemasan" value="{{ Session::get('satuan_kemasan') }}" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Edit Data Kemasan Obat</button>
              </div>
            </div>
        </form>
                @else
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="createDataKemasan">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="id_satuan" class="col-sm-4 control-label"><small>ID Satuan Kemasan</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm " id="inputIDSatuanKemasan" name="inputIDSatuanKemasan" placeholder="disesuaikan" required>
                  <div id="messagewarning" style="font-size: 10px; padding-left: 5px; margin-top: 5px;">
                                                            
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="satuan_kemasan" class="col-sm-4 control-label"><small>Satuan Kemasan</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputSatuanKemasan" name="inputSatuanKemasan" placeholder="disesuaikan" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Tambah Data Kemasan Obat</button>
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
                        <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="filterDataKemasan">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          Cari Berdasarkan: 
                        <div class="form-group">
                          <select class="form-control input-sm" name="filter-kategori">
                            <option value="1">ID Satuan Kemasan</option>
                            <option value="2">Satuan Kemasan</option>
                          </select>
                        </div>  
                          <div class="form-group">
                            <input type="text" class="form-control input-sm" id="keyword" name="keyword-pencarian" placeholder="Kata Kunci Pencarian">
                        </div>  
                          <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span></button>
                          <a href="datakemasan" class="btn btn-warning btn-sm">Reset Tabel</a>
                      </form>
                      </td>
                      <td width="35%" style="text-align: right;">
                        <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="exportDataKemasan">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-print"></span></button>
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
								<th>ID Satuan Kemasan</th>
								<th>Satuan Kemasan</th>								
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
              <?php $no = 1;?>
              @if($datakemasan -> count() > 0)
                @foreach($datakemasan as $kemasan)
                  <tr>
                    <td style="text-align: right;">{{ $no++ }}</td>
                    <td>{{ $kemasan -> id_satuan_kemasan }}</td>
                    <td>{{ $kemasan -> satuan_kemasan }}</td>
                    <td style="text-align: center;"><a href="selectDataKemasan/{{ $kemasan->id }}" class="btn btn-xs btn-warning" title="Edit Data"><span class="glyphicon glyphicon-pencil"></span></a> <a href="hapusDataKemasan/{{ $kemasan->id }}" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="btn btn-xs btn-danger" title="Hapus Data"><span class="glyphicon glyphicon-remove"></span></a></td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="4" style="text-align: center"><i>Belum ada data satuan kemasan</i></td>
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