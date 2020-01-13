@extends('template/t_index')        
@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-md-3 well">
                <h4>Masukan Data Obat</h4>
                @if(Session::has('select'))
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="updateDataObat">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_obat" value="{{ Session::get('id') }}">
                  <input type="hidden" name="stok_sekarang" value="{{ Session::get('stok_sekarang') }}">
            <div class="form-group">
              <label for="id_obat" class="col-sm-4 control-label"><small>ID Obat</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm " id="inputIDObat" name="inputIDObat" value="{{ Session::get('id_obat') }}" required>
              </div>
            </div>
            <div class="form-group">
              <label for="nama_obat" class="col-sm-4 control-label"><small>Nama Obat</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputObat" name="inputObat" value="{{ Session::get('obat') }}" required>
              </div>
            </div>
            <div class="form-group">
              <label for="satuan" class="col-sm-4 control-label"><small>Satuan</small></label>
              <div class="col-sm-8">
                  <select name="inputIDSatuan" class="form-control input-sm">

                  @if($datasatuan -> count() > 0)
                      @foreach($datasatuan as $satuan)
                        @if($datakemasan -> count() > 0)
                          @foreach($datakemasan as $dks)
                            @if($satuan -> id_satuan_kemasan == $dks -> id_satuan_kemasan)
                              @if(Session::get('id_satuan') == $satuan -> id_satuan)
                              <option value="{{ $satuan -> id_satuan }}">{{ $satuan -> satuan }} ( {{ $dks -> satuan_kemasan }} )</option>
                                @else
                              <option value="{{ $satuan -> id_satuan }}" selected>{{ $satuan -> satuan }} ( {{ $dks -> satuan_kemasan }} )</option>
                                @endif
                            @else
                            @endif
                          @endforeach
                        @endif
                      @endforeach
                    @else
                        <option value="0">Belum ada data satuan</option>
                    @endif
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label for="Harga" class="col-sm-4 control-label"><small>Harga</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputHargaSatuan" name="inputHargaSatuan" value="{{ Session::get('harga') }}" required>
            </div>
            </div>
            <div class="form-group">
              <label for="letak" class="col-sm-4 control-label"><small>Letak</small></label>
              <div class="col-sm-8">
                  <select name="inputIDPenyimpanan" class="form-control input-sm">
                    @if($datapenyimpanan -> count() > 0)
                      @foreach($datapenyimpanan as $penyimpanan)
                        @if(Session::get('id_penyimpanan') == $penyimpanan -> id_penyimpanan)
                        <option value="{{ $penyimpanan -> id_penyimpanan }}" selected>{{ $penyimpanan -> id_penyimpanan }} - {{ $penyimpanan -> penyimpanan }}</option>
                        @else
                        <option value="{{ $penyimpanan -> id_penyimpanan }}">{{ $penyimpanan -> id_penyimpanan }} - {{ $penyimpanan -> penyimpanan }}</option>
                        @endif
                      @endforeach
                    @else
                        <option value="0">Belum ada data Penyimpanan</option>
                    @endif
                  </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Edit Data Obat</button>
              </div>
            </div>
        </form>
                @else
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="createDataObat">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="id_obat" class="col-sm-4 control-label"><small>ID Obat</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm " id="inputIDObat" name="inputIDObat" placeholder="disesuaikan" required>
                  <div id="messagewarning" style="font-size: 10px; padding-left: 5px; margin-top: 5px;">
                                                            
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="nama_obat" class="col-sm-4 control-label"><small>Nama Obat</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputObat" name="inputObat" placeholder="contoh: Albendazole 400" required>
              </div>
            </div>
            <div class="form-group">
              <label for="satuan" class="col-sm-4 control-label"><small>Satuan</small></label>
              <div class="col-sm-8">
                  <select name="inputIDSatuan" class="form-control input-sm">
                    @if($datasatuan -> count() > 0)
                      @foreach($datasatuan as $satuan)
                        @if($datakemasan -> count() > 0)
                          @foreach($datakemasan as $dks)
                            @if($satuan -> id_satuan_kemasan == $dks -> id_satuan_kemasan)
                              <option value="{{ $satuan -> id_satuan }}">{{ $satuan -> satuan }} ( {{ $dks -> satuan_kemasan }} )</option>
                            @else
                            @endif
                          @endforeach
                        @endif
                      @endforeach
                    @else
                        <option value="0">Belum ada data satuan</option>
                    @endif
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label for="Harga" class="col-sm-4 control-label"><small>Harga</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputHargaSatuan" name="inputHargaSatuan" placeholder="Contoh: 15000" required>
            </div>
            </div>
            <div class="form-group">
              <label for="letak" class="col-sm-4 control-label"><small>Letak</small></label>
              <div class="col-sm-8">
                  <select name="inputIDPenyimpanan" class="form-control input-sm">
                    @if($datapenyimpanan -> count() > 0)
                      @foreach($datapenyimpanan as $penyimpanan)
                        <option value="{{ $penyimpanan -> id_penyimpanan }}">{{ $penyimpanan -> id_penyimpanan }} - {{ $penyimpanan -> penyimpanan }}</option>
                      @endforeach
                    @else
                        <option value="0">Belum ada data Penyimpanan</option>
                    @endif
                  </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Tambah Data Obat</button>
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
                <table width="100%" border="0">
                  <tr>
                    <td width="60%">
                      <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="filterDataObat">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        Cari Berdasarkan: 
                          <div class="form-group">
                            <select class="form-control input-sm" name="filter-kategori">
                              <option value="1">ID Obat</option>
                              <option value="2">Nama Obat</option>
                            </select>
                        </div> 
                        <div class="form-group">
                          <input type="text" class="form-control input-sm" id="keyword" name="keyword-pencarian" placeholder="Kata Kunci Pencarian" required>
                        </div>
                          <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span></button>
                          <a href="dataobat" class="btn btn-warning btn-sm">Reset Tabel</a>
                      </form>
                    </td>
                    <td width="40%" style="text-align: right;">
                      <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="exportDataObat">
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
								<th style="vertical-align: middle;">No</th>
								<th style="vertical-align: middle;">ID Obat</th>
								<th style="vertical-align: middle;">Nama</th>
								<th style="vertical-align: middle;">Satuan / Satuan Kemasan</th>
								<th style="vertical-align: middle;">Harga</th>
								<th style="vertical-align: middle;">Letak</th>
								<th style="vertical-align: middle;">Stok</th>
								<th style="vertical-align: middle;">Aksi</th>
							</tr>
						</thead>
						<tbody>
              <?php $no = 1; ?>
              @if($dataobat -> count() > 0)
                @foreach($dataobat as $obat)
                  <tr>
                    <td style="text-align: right;">{{ $no++ }}</td>
                    <td>{{ $obat->id_obat }}</td>
                    <td>{{ $obat->obat }}</td>
                    <td>
                    @if($datasatuan -> count() > 0)
                      @foreach($datasatuan as $ds)
                        @if($ds -> id_satuan == $obat->id_satuan)
                          @if($datakemasan -> count() > 0)
                            @foreach($datakemasan as $dk)
                              @if($dk -> id_satuan_kemasan == $ds -> id_satuan_kemasan)
                                {{ $ds -> satuan }} / {{ $dk -> satuan_kemasan }}
                              @else
                              @endif
                            @endforeach
                          @endif
                        @else
                        @endif
                      @endforeach
                    @endif
                    </td>
                    <td style="text-align: right;">{{ $obat->harga }}</td>
                    <td>
                      @if($datapenyimpanan -> count() >0)
                        @foreach($datapenyimpanan as $penyimpanan)
                          @if( $penyimpanan -> id_penyimpanan == $obat->id_penyimpanan)
                            {{ $penyimpanan -> penyimpanan }}
                          @else
                          @endif
                        @endforeach
                      @else
                      @endif
                    </td>
                    <td style="text-align: right;">{{ $obat->stok }}</td>
                    <td style="text-align: center"><a href="selectDataObat/{{ $obat->id }}" title="edit data" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;<a href="hapusDataObat/{{ $obat->id }}" class="btn btn-xs btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?');" title="hapus data"><span class="glyphicon glyphicon-remove"></span></a></td>
                  </tr>
                @endforeach
              @else
                  <tr>
                    <td colspan="12" style="text-align: center"><i>Belum ada data obat</i></td>
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