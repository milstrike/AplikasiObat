@extends('template/t_index')        
@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-md-3">
              <div>
                <small>
                <form class="form" role="form" method="POST" enctype="multipart/form-data" action="filterPeriodePermintaan">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <span><strong>Filter Periode: {{ $periodepermintaan }} </strong></span><br/>
              <select id="tahun" class="input-sm form-control" name="tahun">
                <option value="0000">-------</option>
                @for($i = 2000; $i < 2045; $i++)
                  <option value="{{ $i }}">{{ $i }}</option>
                @endfor
              </select> 
              <div class="pull-right" style="margin-top: 5px;">
                <button type="input" class="input-sm btn btn-info btn-sm" style="margin-bottom: 5px;"><span class="glyphicon glyphicon-filter"></span></button>
              <a href="permintaan" class="btn btn-sm btn-warning" style="margin-bottom: 5px;"><span class="glyphicon glyphicon-refresh"></span></a>
              </div>
            </form>
          </small>
              </div>
              <div style="margin-top: 40px;">
                <span><small><strong>Daftar Data Permintaan</strong></small></span>
                <?php $no = 1; $total=0;?>
                <form class="form" role="form" method="POST" enctype="multipart/form-data" action="selectdatapermintaan">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">                  
                  <select class="form-control input-sm" multiple style="height: 200px;" id="idpermintaan" name="idpermintaan">
                    @if($datapermintaan -> count() >0)
                      @foreach($datapermintaan as $dataminta)
                        @if(Session::get('selectedID') == $dataminta -> id_permintaan )
                      <option value="{{ $dataminta -> id_permintaan }}" selected>{{ $dataminta -> id_permintaan }} ({{$dataminta -> tanggal_permintaan}})</option>
                      @else
                      <option value="{{ $dataminta -> id_permintaan }}">{{ $dataminta -> id_permintaan }} ({{$dataminta -> tanggal_permintaan}})</option>
                      @endif
                      @endforeach
                    @else
                      <option value="0">Belum ada data permintaan</option>
                    @endif
                  </select>
                  <button type="submit" class="btn btn-primary btn-sm pull-right" style="margin-top: 5px;">Buka Data Permintaan</button>
                </form>
              </div>
              <div style="margin-top: 40px;">
                <form class="form" role="form" method="POST" enctype="multipart/form-data" action="createdatapermintaan">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">                  
                  <span><small><strong>Buat ID Permintaan</strong></small></span>
                  <input type="text" name="id_permintaan" id="id_permintaan" required class="form-control input-sm">
                  <div id="messagewarning" style="font-size: 10px; padding-left: 5px; margin-top: 5px;">
                                                            
                  </div>
                  <button type="submit" class="btn btn-danger btn-sm pull-right">Buat Data Permintaan</button>
                </form>
              </div>
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
                    <table style="margin:0; padding: 0;" width="100%">
        <tr>
        <td>
          <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="filterDataPermintaan">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          Cari Berdasarkan: 
                        <div class="form-group">
                          <select class="form-control input-sm" name="filter-kategori">
                            <option value="1">ID Obat</option>
                            <option value="2">Nama Obat</option>
                          </select>
                        </div>  
                          <div class="form-group">
                            <input type="text" class="form-control input-sm" id="keyword" name="keyword-pencarian" placeholder="Kata Kunci Pencarian">
                        </div>  
                          <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span></button>
                          <a href="permintaan" class="btn btn-warning btn-sm">Reset Tabel</a>
                      </form>
        </td>
        <td style="text-align: right;">
          @if($tabelpermintaan -> count() < 1)
          <a href="cetaktransaksipermintaan" target="_blank" title="Cetak Laporan Permintaan Lengkap" class="btn btn-warning btn-sm" disabled><span class="glyphicon glyphicon-print"></span></a>&nbsp;
          <button type="submit" onclick="write_headers_to_excel();" class="btn btn-primary btn-sm" style="margin: 0;" title="Export Laporan Permintaan ke Excel" disabled><span class="glyphicon glyphicon-download-alt"></span></button>
          @else
          <a href="cetaktransaksipermintaan" target="_blank" title="Cetak Laporan Permintaan Lengkap" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-print"></span></a>&nbsp;
          <button type="submit" onclick="write_headers_to_excel();" class="btn btn-primary btn-sm" style="margin: 0;" title="Export Laporan Permintaan ke Excel"><span class="glyphicon glyphicon-download-alt"></span></button>
          @endif
        </td>
        </tr>
        </table>
				<div class="table-responsive" style="margin-top: 10px;" id="tabel-laporan">
          <small>
					<table class="table table-bordered" border="1" width="100%">
						<thead>
							<tr>
								<th style="vertical-align: middle;">No</th>
								<th style="vertical-align: middle;">ID Obat</th>
                <th style="vertical-align: middle;">Nama Obat</th>
								<th style="vertical-align: middle;">Jumlah Permintaan</th>
                <th style="vertical-align: middle;">Penerimaan lalu</th>
                <th style="vertical-align: middle;">Stok Awal</th>
                <th style="vertical-align: middle;">Pemakaian/Pengeluaran</th>
                <th style="vertical-align: middle;">Rusak</th>
                <th style="vertical-align: middle;">Sisa Stok</th>
                <th style="vertical-align: middle;">Stok Optimum</th>
                <th style="vertical-align: middle;">Harga Satuan</th>
                <th style="vertical-align: middle;">Harga Total</th>
							</tr>
						</thead>
						<tbody>
            @if($tabelpermintaan -> count() > 0)
              @foreach($tabelpermintaan as $minta)
                <tr>
                  <td style="text-align: right;">{{ $no++ }}</td>
                  <td>{{ $minta -> id_obat }}</td>
                  <td>{{ $minta -> nama_obat}}</td>
                  <td style="text-align: right;">{{ $minta -> jumlah_permintaan}}</td>
                  <td style="text-align: right;">{{ $minta -> penerimaan_lalu}}</td>
                  <td style="text-align: right;">{{ $minta -> stok}}</td>
                  <td style="text-align: right;">{{ $minta -> pemakaian}}</td>
                  <td style="text-align: right;">{{ $minta -> rusak}}</td>
                  <td style="text-align: right;">{{ $minta -> sisa_stok}}</td>
                  <td style="text-align: right;">{{ $minta -> stok_optimum}}</td>
                  @if($dataobat -> count() > 0)
                    @foreach($dataobat as $do)
                      @if($minta -> id_obat  == $do -> id_obat)
                        <td style="text-align: right;">Rp{{ number_format($do -> harga , 0, ',', '.')}},00</td>
                      @else
                      @endif
                    @endforeach
                  @else
                  @endif
                  @if($dataobat -> count() >0)
                    @foreach($dataobat as $do)
                      @if($minta -> id_obat  == $do -> id_obat)
                        <td style="text-align: right;">Rp{{ number_format($do -> harga * $minta -> jumlah_permintaan , 0, ',', '.')}},00 <?php $total = $total + ($do -> harga * $minta -> jumlah_permintaan) ?> </td>
                      @else
                      @endif
                    @endforeach
                  @else
                  @endif
                </tr>
              @endforeach
              <tr>
                  <td colspan="11" style="text-align: center"><strong>TOTAL</strong></td>
                  <td style="text-align: right;">Rp{{ number_format($total , 0, ',', '.')}},00 </td>  
                </tr>
            @else
              <tr>
                <td colspan="12" style="text-align: center"><i>Belum ada data permintaan yang dipilih</i></td>
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