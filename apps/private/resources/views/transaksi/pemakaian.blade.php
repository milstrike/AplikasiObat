@extends('template/t_index')        
@section('content')
 
    <div class="container">
        <div class="row">
          <div class="col-md-3">
            <small>
            <form class="form" role="form" method="POST" enctype="multipart/form-data" action="filterPeriodePemakaian">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <span><strong>Filter Periode: {{  $periodepemakaian }}</strong></span><br/>
              <select id="bulan" class="input-sm" name="bulan">
                <option value="00">-------</option>
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
              <select id="tahun" class="input-sm" name="tahun">
                <option value="0000">-------</option>
                @for($i = 2000; $i < 2045; $i++)
                  <option value="{{ $i }}">{{ $i }}</option>
                @endfor
              </select>
              <button type="input" class="input-sm btn btn-info btn-sm" style="margin-bottom: 5px;"><span class="glyphicon glyphicon-filter"></span></button>
              <a href="pemakaian" class="btn btn-sm btn-warning" style="margin-bottom: 5px;"><span class="glyphicon glyphicon-refresh"></span></a>
            </form>
            <form class="form" role="form" method="POST" enctype="multipart/form-data" action="selectDataPemakaian">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <span><strong>Pilih Tanggal: </strong></span>
                  <select class="form-control" multiple style="height: 300px;" id="tanggal" name="tanggal">
                @if($datatanggal -> count() > 0)
                @foreach($datatanggal as $datatgl)
                    @if(Session::get('selectedTanggal') == $datatgl -> tanggal )
                      <option value="{{ $datatgl -> tanggal }}" selected>{{ $datatgl -> tanggal }}</option>
                    @else
                      <option value="{{ $datatgl -> tanggal }}">{{ $datatgl -> tanggal }}</option>
                    @endif
                @endforeach
                @else
                <option value="0">Data pemakaian belum ada</option>
                @endif
              </select>
                  <br/><button type="submit" class="btn btn-primary btn-sm pull-right">Cek Data Pemakaian!</button>
            </form>
          </small>
          </div>
            <div class="col-md-9">
				<div style="margin-top: 10px;">
        <table style="margin:0; padding: 0;" width="100%">
        <tr>
        <td>
          <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="filterDataPemakaian">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          Cari Berdasarkan: 
                        <div class="form-group">
                          <select class="form-control input-sm" name="filter-kategori">
                            <option value="1">No. Batch Obat</option>
                            <option value="2">Nama Obat</option>
                          </select>
                        </div>  
                          <div class="form-group">
                            <input type="text" class="form-control input-sm" id="keyword" name="keyword-pencarian" placeholder="Kata Kunci Pencarian">
                        </div>  
                          <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></button>
                          <a href="pemakaian" class="btn btn-warning btn-sm">Reset Tabel</a>
                      </form>
        </td>
        <td style="text-align: right;">
          @if($datapemakaian -> count() < 0)
            <a href="cetaktransaksipemakaian" target="_blank" title="Cetak Laporan Pemakaian Lengkap" class="btn btn-warning btn-sm" disabled><span class="glyphicon glyphicon-print"></span></a>&nbsp;<button type="submit" class="btn btn-primary btn-sm" onclick="write_headers_to_excel();" title="export laporan pemakaian ke excel" style="margin: 0;" disabled><span class="glyphicon glyphicon-download-alt"></button>
          @else
            <a href="cetaktransaksipemakaian" target="_blank" title="Cetak Laporan Pemakaian Lengkap" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-print"></span></a>&nbsp;<button type="submit" class="btn btn-primary btn-sm" onclick="write_headers_to_excel();" title="export laporan pemakaian ke excel" style="margin: 0;"><span class="glyphicon glyphicon-download-alt"></button>
          @endif
        </td>
        </tr>
        </table>
        <small>
					<table class="table table-bordered" width="100%" border="1" id="tabel-laporan" style="margin-top: 5px;">
						<thead>
							<tr>
								<th>No</th>
								<th>ID Obat</th>
								<th>Nama Obat</th>
                <th>No Batch</th>
								<th>Jumlah Terpakai</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; ?>
              @if($datapemakaian -> count() > 0)
                @foreach($datapemakaian as $datapake)
                <tr>
                  <td style="text-align: right;">{{ $no++ }}</td>
                  <td>
                    @if($dataobat -> count() > 0)
                    @foreach($dataobat as $obat)
                      @if( $datapake->no_batch == $obat->batch )
                        {{ $obat -> id_obat }}
                      @else                        
                      @endif
                    @endforeach
                  @else
                  @endif
                  </td>
                  <td>{{ $datapake -> nama_obat }}</td>
                  <td>{{ $datapake -> no_batch }}</td>
                  <td style="text-align: right;">{{ $datapake -> total }}</td>
                </tr>
                @endforeach
              @else
                <tr>
                <td colspan="5" style="text-align: center"><i>Belum ada data pemakaian obat</i></td>
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