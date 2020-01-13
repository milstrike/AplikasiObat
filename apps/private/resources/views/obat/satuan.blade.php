@extends('template/t_index')        
@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-md-3 well">
                <h4>Masukan Satuan Obat</h4>
                @if(Session::has('select'))
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="updateDataSatuan">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_satuan" value="{{ Session::get('id') }}">
            <div class="form-group">
              <label for="id_satuan" class="col-sm-4 control-label"><small>ID Satuan</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm " id="inputIDSatuan" name="inputIDSatuan" value="{{ Session::get('id_satuan') }}" required>
              </div>
            </div>
            <div class="form-group">
              <label for="satuan" class="col-sm-4 control-label"><small>Satuan</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputSatuan" name="inputSatuan" value="{{ Session::get('satuan') }}" required>
              </div>
            </div>
            <div class="form-group">
              <label for="satuan_kemasan" class="col-sm-4 control-label"><small>Satuan Kemasan</small></label>
              <div class="col-sm-8">
                  <select name="inputSatuanKemasan" class="form-control input-sm">
                    @if($datakemasan -> count() > 0)
                      @foreach($datakemasan as $kemasan)
                        @if($kemasan -> id_satuan_kemasan == Session::get('id_satuan_kemasan') )
                          <option value="{{ $kemasan -> id_satuan_kemasan }}" selected>{{ $kemasan -> id_satuan_kemasan }} - {{ $kemasan -> satuan_kemasan }}</option>
                        @else
                          <option value="{{ $kemasan -> id_satuan_kemasan }}">{{ $kemasan -> id_satuan_kemasan }} - {{ $kemasan -> satuan_kemasan }}</option>
                        @endif
                      @endforeach
                    @else
                      <option value="0">Belum Ada Data Satuan Kemasan</option>
                    @endif
                  </select>               
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Edit Data Satuan Obat</button>
              </div>
            </div>
        </form>
                @else
                  <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="createDataSatuan">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="id_satuan" class="col-sm-4 control-label"><small>ID Satuan</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm " id="inputIDSatuan" name="inputIDSatuan" placeholder="disesuaikan" required>
                  <div id="messagewarning" style="font-size: 10px; padding-left: 5px; margin-top: 5px;">
                                                            
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="satuan" class="col-sm-4 control-label"><small>Satuan</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputSatuan" name="inputSatuan" placeholder="disesuaikan" required>
              </div>
            </div>
            <div class="form-group">
              <label for="satuan_kemasan" class="col-sm-4 control-label"><small>Satuan Kemasan</small></label>
              <div class="col-sm-8">
                  <select name="inputSatuanKemasan" class="form-control input-sm">
                    @if($datakemasan -> count() > 0)
                      @foreach($datakemasan as $kemasan)
                        <option value="{{ $kemasan -> id_satuan_kemasan }}">{{ $kemasan -> id_satuan_kemasan }} - {{ $kemasan -> satuan_kemasan }}</option>
                      @endforeach
                    @else
                      <option value="0">Belum Ada Data Satuan Kemasan</option>
                    @endif
                  </select>               
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Tambah Data Satuan Obat</button>
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
                    <td width="60%">
                        <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="filterDataSatuan">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          Cari Berdasarkan: 
                        <div class="form-group">
                          <select class="form-control input-sm" name="filter-kategori">
                            <option value="1">ID Satuan</option>
                            <option value="2">Satuan</option>
                          </select>
                        </div>  
                          <div class="form-group">
                            <input type="text" class="form-control input-sm" id="keyword" name="keyword-pencarian" placeholder="Kata Kunci Pencarian">
                        </div>  
                          <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span></button>
                          <a href="datasatuan" class="btn btn-warning btn-sm">Reset Tabel</a>
                      </form>
                    </td>
                    <td width="40%" style="text-align: right;">
                      <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="exportDataSatuan">
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
								<th>ID Satuan</th>
								<th>Satuan</th>
								<th>Satuan Kemasan</th>								
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
              <?php $no = 1;?>
              @if($datasatuan -> count() > 0)
                @foreach($datasatuan as $satuan)
                  <tr>
                    <td style="text-align: right;">{{ $no++ }}</td>
                    <td>{{ $satuan -> id_satuan }}</td>
                    <td>{{ $satuan -> satuan }}</td>
                    <td>
                      @if($datakemasan -> count() >0)
                        @foreach($datakemasan as $kemasan)
                          @if( $satuan -> id_satuan_kemasan == $kemasan -> id_satuan_kemasan)
                            {{ $kemasan -> satuan_kemasan }}
                          @else
                          @endif
                        @endforeach
                      @else
                      @endif
                    </td>
                    <td style="text-align: center;"><a href="selectDataSatuan/{{ $satuan->id }}" class="btn btn-xs btn-warning" title="Edit Data"><span class="glyphicon glyphicon-pencil"></span></a> <a href="hapusDataSatuan/{{ $satuan->id }}" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="btn btn-xs btn-danger" title="Hapus Data"><span class="glyphicon glyphicon-remove"></span></a></td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="5" style="text-align: center"><i>Belum ada data satuan obat</i></td>
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