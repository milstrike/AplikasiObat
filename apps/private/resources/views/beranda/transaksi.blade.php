@extends('template/t_index')        
@section('content')
 
    <div class="container">
        <div class="row">
  					<div class="col-lg-12">
            <form class="form-inline pull-right" role="form" method="POST" enctype="multipart/form-data" action="filterDataTransaksi" style="margin-bottom: 10px;">
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
                      <input type="submit" class="btn btn-primary btn-sm" value="Filter Data Transaksi!">
                      <a href="#" class="btn btn-warning btn-sm" title="Cetak Data yang tampil" onclick="write_headers_to_excel();"><span class="glyphicon glyphicon-print"></span></a>
                      <a href="cleartransaksi" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin mengosongkan data transaksi?');" title="Kosongkan data transaksi"><span class="glyphicon glyphicon-fire"></span></a>
                </form>
            </div>
            <div class="col-lg-12" id="tabel-laporan">
              <legend>Rekap Data Transaksi {{ $periodesasi }}</legend>
              <table class="table table-bordered table-hover table-striped" width="100%">
                <tbody>
                  <tr>
                    <td><strong>Transaksi BPJS</strong></td>
                    <td style="text-align: right;">Rp{{ $totalBPJS }},00</td>
                  </tr>
                  <tr>
                    <td><strong>Transaksi Mandiri</strong></td>
                    <td style="text-align: right;">Rp{{ $totalMandiri }},00</td>
                  </tr>
                  <tr>
                    <td><strong>Transaksi Lainnya</strong></td>
                    <td style="text-align: right;">Rp{{ $totalLainnya }},00</td>
                  </tr>
                </tbody>
              </table>
              <legend>Detail Transaksi {{ $periodesasi }}</legend>
                <table class="table table-bordered table-hover table-striped" width="100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Tanggal Transaksi</th>
                          <th>No.RM</th>
                          <th>Nama</th>
                          <th>Transaksi</th>
                          <th>BPJS</th>
                          <th>Mandiri</th>
                          <th>Lainnya</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    @if($datatransaksi -> count() > 0)
                      @foreach($datatransaksi as $dt)
                        <tr>
                          <td style="text-align: right;">{{ $no++ }}</td>
                          <td style="text-align: right;">{{ $dt -> tanggal }}</td>
                          <td style="text-align: right;">{{ $dt -> id_pasien}}</td>
                          <td>{{ $dt -> nama_pasien }}</td>
                          <td>{{ $dt -> transaksi }}</td>
                          <td style="text-align: right;">{{ $dt -> bpjs }}</td>
                          <td style="text-align: right;">{{ $dt -> mandiri }}</td>
                          <td style="text-align: right;">{{ $dt -> lainnya }}</td>
                        </tr>  
                      @endforeach
                    @else
                      <tr>
                          <td colspan="8" style="text-align: center;"><em>Belum ada data transaksi</em></td>
                      </tr>
                    @endif
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection