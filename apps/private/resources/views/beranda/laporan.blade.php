@extends('template/t_index')        
@section('content')
 
    <div class="container">
        <div class="row">
  					<div class="col-lg-12">
            <span class="pull-left">Daftar Laporan Pemakaian dan Laporan Permintaan Obat</span>
                <form class="form-inline pull-right" role="form" method="POST" enctype="multipart/form-data" action="createLaporanLPLPO" style="margin-bottom: 10px;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                      <label class="sr-only" for="bulan"></label>
                        <select name="bulan" class="form-control input-sm" required>
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
                    <div class="form-group">
                      <label class="sr-only" for="tahun"></label>
                        <select name="tahun" class="form-control input-sm" required>
                          @for($i = 2000; $i<2045; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                          @endfor
                        </select>
                    </div>
                      <input type="submit" class="btn btn-primary btn-sm" value="Buat Laporan!">
                </form>
            </div>
            <div class="col-lg-12">
                <form class="form" role="form" method="POST" enctype="multipart/form-data" action="selectLPLPO">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">                  
                  <select class="form-control" multiple style="height: 100px;" id="idlaporan" name="idlaporan">
                  @if($dataLPLPO -> count() > 0)
                    @foreach($dataLPLPO as $lplpo)
                      @if(Session::get('selectedID') == $lplpo -> id_laporan )
                        <option value="{{ $lplpo -> id_laporan }}" selected>Periode - {{ $lplpo -> periode }}</option>
                      @else
                        <option value="{{ $lplpo -> id_laporan }}">Periode - {{ $lplpo -> periode }}</option>
                      @endif
                    @endforeach
                  @else
                    
                  @endif
                  </select>
                  <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 5px; margin-bottom: 5px;"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Buka Laporan</button>
                  @if(Session::get('selectedID') == "")
                  <a href="#" class="btn btn-warning btn-sm" onclick="write_headers_to_excel();" disabled>Export ke Excel</a>
                  <a href="laporanreal" target="_blank" class="btn btn-success btn-sm" disabled>Cetak Laporan Real</a>
                  @else
                  <a href="#" class="btn btn-warning btn-sm" onclick="write_headers_to_excel();">Export ke Excel</a>
                  <a href="laporanreal" target="_blank" class="btn btn-success btn-sm">Cetak Laporan Real</a>
                  @endif
                  <a href="laporan" class="btn btn-info btn-sm">Reset Tabel</a>
                </form>
            </div>
            <div class="col-lg-12" id="tabel-laporan">
              <small>
            <table class="table table-hover table-bordered table-striped" width="100%">
              <thead>
                <tr>
                  <th>No</th>
                  <th>ID Obat</th>
                  <th>Nama Obat</th>
                  <th>Satuan</th>
                  <th>Stok Awal</th>
                  <th>Penerimaan</th>
                  <th>Persediaan</th>
                  <th>Pemakaian</th>
                  <th>Rusak</th>
                  <th>Pengeluaran</th>
                  <th>Sisa Stok</th>
                  <th>Stok Optimum</th>
                  <th>Permintaan</th>
                  <th>Pemberian</th>
                  <th>Bon</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1; ?>
              @if($detailLPLPO -> count() >0)
              @foreach($detailLPLPO as $dl)
                <tr>
                  <td style="text-align: right;">{{ $no++ }}</td>
                  <td style="text-align: right;">{{ $dl -> id_obat}}</td>
                  <td style="text-align: left;">{{ $dl -> nama_obat}}</td>
                  <td style="text-align: left;">{{ $dl -> satuan }}</td>
                  <td style="text-align: right;">{{ $dl -> stok_awal }}</td>
                  <td style="text-align: right;">{{ $dl -> penerimaan }}</td>
                  <td style="text-align: right;">{{ $dl -> persediaan }}</td>
                  <td style="text-align: right;">{{ $dl ->  pemakaian}}</td>
                  <td style="text-align: right;">{{ $dl -> rusak}}</td>
                  <td style="text-align: right;">{{ $dl -> pemakaian}}</td>
                  <td style="text-align: right;">{{ $dl -> sisa_stok}}</td>
                  <td style="text-align: right;">{{ $dl -> stok_optimum }}</td>
                  <td style="text-align: right;">{{ $dl -> permintaan}}</td>
                  <td style="text-align: right;">{{ $dl -> pemberian}}</td>
                  <td style="text-align: right;">{{ $dl -> bon}}</td>
                </tr>
              @endforeach
              @else
                <tr>
                  <td colspan="15" style="text-align: center;"><em>Belum ada laporan yang dipilih</em></td>
                </tr>
              @endif
              </tbody>
            </table>
          </small>
            </div>
        </div>
    </div>
@endsection