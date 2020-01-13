@extends('template/t_index')        
@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <table width="100%" border="0">
            	<tr>
            		<td width="50%">
            			<form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="filterDataKartuStok">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          Cari Berdasarkan: 
                        <div class="form-group">
                          <select class="form-control input-sm" name="filter-kategori">
                            <option value="1">Tanggal</option>
                            <option value="2">Bulan</option>
                            <option value="3">Tahun</option>
                            <option value="4">ID Obat</option>
                            <option value="5">Nama Obat</option>
                          </select>
                        </div>  
                          <div class="form-group">
                            <input type="text" class="form-control input-sm" id="keyword" name="keyword-pencarian" placeholder="Kata Kunci Pencarian">
                        </div>  
                          <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></button>
                          <a href="kartustok" class="btn btn-warning btn-sm">Reset Tabel</a>
                      </form>
            		</td>
            		<td width="50%">
            			<div class="pull-right">
            				<form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="filterdatakartustoklevel2">
                  		<input type="hidden" name="_token" value="{{ csrf_token() }}">
                		Cetak Data:
							<div class="form-group">
    							<select class="form-control input-sm" name="inputObat" name="inputObat">
	    							@if($dataobat -> count() > 0)
	    								@foreach($dataobat as $obat)
	    									<option value="{{ $obat -> id_obat }}">{{ $obat -> obat }}</option>
	    								@endforeach
	    							@else
	    									<option value="0">Belum ada Data Obat</option>
	    							@endif
    							</select>
  							</div>	
  							<div class="form-group">
    							<select class="form-control input-sm" name="inputBulan" name="inputBulan">
	    							<option value="01">Januari</option>
	    							<option value="02">Februari</option>
	    							<option value="03">Maret</option>
	    							<option value="04">April</option>
	    							<option value="05">Mei</option>
	    							<option value="06">Juni</option>
	    							<option value="07">Juli</option>
	    							<option value="08">Agustus</option>
	    							<option value="09">September</option>
	    							<option value="10">Oktober</option>
	    							<option value="11">November</option>
	    							<option value="12">Desember</option>
    							</select>
  							</div>
  							<?php $tahun = 2000; $currentYear = date('Y'); ?>	
  							<div class="form-group">
    							<select class="form-control input-sm" name="inputTahun" name="inputTahun">
	    							@while($tahun < 2050)
	    								@if($tahun == $currentYear)
	    									<option value="{{ $tahun }}" selected>{{ $tahun++ }}</option>
	    								@else
	    									<option value="{{ $tahun }}">{{ $tahun++ }}</option>
	    								@endif
	    							@endwhile
    							</select>
  							</div>
  							<button type="submit" class="btn btn-info btn-sm" title="filter data" name="export_excel" value="Export"><span class="glyphicon glyphicon-filter"></span></button>
  							<a href="#" onclick="write_headers_to_excel();" class="btn btn-primary btn-sm" title="Export data"><span class="glyphicon glyphicon-download-alt"></a>
  							<a href="cetarealakartustok" target="_blank" class="btn btn-success btn-sm" title="Export dan cetak data"><span class="glyphicon glyphicon-print"></a>
						</form>
            			</div>
            		</td>
            	</tr>
            </table>
                

				<div class="table-responsive" style="margin-top: 10px;">
					<small>
					<table class="table table-bordered table-striped table-hover" border="1" width="100%" id="tabel-laporan">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal</th>
								<th>ID Obat</th>
								<th>Nama Obat</th>
								<th>Masuk</th>
								<th>Keluar</th>
								<th>Stok Akhir</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
						<?php $no = 1 ?>
						@if($kartustok -> count() > 0)
							@foreach($kartustok as $kartu)
								<tr>
									<td style="text-align: right;">{{ $no++ }}</td>
									<td style="text-align: right;">{{ $kartu -> tanggal }}</td>
									<td style="text-align: right;">{{ $kartu -> id_obat }}</td>
									<td>{{ $kartu -> nama_obat }}</td>
									<td style="text-align: right;">{{ $kartu -> masuk }}</td>
									<td style="text-align: right;">{{ $kartu -> keluar }}</td>
									<td style="text-align: right;">{{ $kartu -> stok_akhir }}</td>
									<td style="text-align: right;">{{ $kartu -> keterangan }}</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="9" style="text-align: center"><i>Belum ada data kartu stok</i></td>
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