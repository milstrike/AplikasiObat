@extends('template/t_index')        
@section('content')
 
    <div class="container">
        <div class="row">
        <div class="col-md-3">
        <div class="well" style="padding: 10px;">
        <h4>Tambah Data Manual Stok Obat</h4>
        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="createDataStokManualObat">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="inputNamaObat" class="col-sm-4 control-label"><small>Nama Obat</small></label>
              <div class="col-sm-8">
                  <select name="inputNamaObat" class="form-control input-sm">
                  @if($dataobat -> count() > 0)
					@foreach($dataobat as $obat)
						<option value="{{ $obat -> id_obat }}">{{ $obat -> obat}}</option>
					@endforeach
				@else
					<option value="null">Belum ada data obat</option>
				@endif
                        
                  </select>               
              </div>
            </div>
            <div class="form-group">
              <label for="inputStok" class="col-sm-4 control-label"><small>Batch Obat</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputBatch" name="inputBatch" placeholder="Kode Batch" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputStok" class="col-sm-4 control-label"><small>Stok Obat</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputStok" name="inputStok" placeholder="contoh: 3" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputTanggalKadaluarsa" class="col-sm-4 control-label"><small>Kadaluarsa</small></label>
              <div class="col-sm-8">
                  <input type="date" class="form-control input-sm" id="inputTanggalKadaluarsa" name="inputTanggalKadaluarsa" placeholder="YYYY-BB-TT" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Tambah Data Stok Obat</button>
              </div>
            </div>
        </form>
        </div>
        <div class="well" style="padding: 10px;">
        <h4>Filter</h4>
        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="filterdaftarobat">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
              <label for="inputJenisObat" class="col-sm-4 control-label"><small>Jenis Obat</small></label>
              <div class="col-sm-8">
                  <select name="inputJenisObat" class="form-control input-sm">
                  <option value="0">Semua Obat</option>
                  @if($dataobat -> count() > 0)
					@foreach($dataobat as $obat)
						<option value="{{ $obat -> id_obat }}">{{ $obat -> obat}}</option>
					@endforeach
				@else
					<option value="null">Belum ada data obat</option>
				@endif
                  </select>               
              </div>
        </div>
        <div class="form-group">
              <label for="inputJenisKadaluarsa" class="col-sm-4 control-label"><small>Kadaluarsa</small></label>
              <div class="col-sm-8">
                  <select name="inputJenisKadaluarsa" class="form-control input-sm">
                  	<option value="2">Semua</option>
                  	<option value="0">Belum Kadaluarsa</option>
                  	<option value="1">Kadaluarsa</option>
                  </select>               
              </div>
        </div>
        <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="pull-right">
                    <a href="datakedaluarsa" class="btn btn-info btn-sm" title="Reset Tabel"><span class="glyphicon glyphicon-refresh"></span></a>
                  <button type="submit" class="btn btn-primary btn-sm" title="Filter Tabel"><span class="glyphicon glyphicon-filter"></span></button>
                </div>
              </div>
            </div>
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
            	<div class="table-responsive" style="margin-top: 10px;">
                <small>
            		<table class="table table-bordered" width="100%">
				<thead>
					<tr>
						<th>No</th>
						<th>ID Obat</th>
						<th>Nama Obat</th>
						<th>Batch</th>
						<th>Kadaluarsa</th>
						<th>Status Kadaluarsa</th>
						<th>Stok</th>
						<th>Rusak</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
				<?php $no = 1; ?>
				@if($datastok -> count() > 0)
					@foreach($datastok as $stok)
						<tr>
						<form method="POST" enctype="multipart/form-data" action="cekObatTerperiksa">
						<!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
						<input type="hidden" name="id_data-{{ $stok -> _id }}" value="{{ $stok -> _id }}">
							<td style="text-align: right; vertical-align: middle;">{{ $no++ }}</td>
							<td style="vertical-align: middle;">{{ $stok -> id_obat }}</td>
							<td style="vertical-align: middle;">{{ $stok -> nama_obat}}</td>
							<td style="vertical-align: middle;">{{ $stok -> batch}}</td>
							<td style="text-align: right; vertical-align: middle;">{{ $stok -> tanggal_kadaluarsa }}</td>
							<td style="text-align: center;">
								<select name="updateKadaluarsa-{{ $stok -> _id }}" class="form-control input-sm">
                  					@if($stok -> kadaluarsa == 0)
										<option value="0" selected>Belum Kadaluarsa</option>
										<option value="1">Kadaluarsa</option>
									@else
										<option value="0">Belum Kadaluarsa</option>
										<option value="1" selected>Kadaluarsa</option>	
									@endif
                        
                  				</select>    
                  			</td>
							<td style="text-align: center;"><input type="text" class="form-control input-sm" id="updateStok" name="updateStok-{{ $stok -> _id }}" value="{{ $stok -> stok }}" style="text-align: right; width:60px;" required readonly></td>
							<td style="text-align: center;"><input type="text" class="form-control input-sm" id="updateRusak" name="updateRusak-{{ $stok -> _id }}" value="{{ $stok -> rusak }}" style="text-align: right; width:60px;" required></td>
							<td style="text-align: center;">
							<a href="hapusDataStok/{{ $stok -> _id }}" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ingin menghapus data ini?');"><span class="glyphicon glyphicon-remove"></span></a>
							<button type="submit" class="btn btn-success btn-xs" name="save[{{ $stok -> _id }}]" ><span class="glyphicon glyphicon-ok"></span></button>
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="9" style="text-align: center"><i>Belum ada data stok</i></td>
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