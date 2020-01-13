@extends('template/t_laporan')        
@section('content')
<small>
  <button onclick="window.print();" class="printButtonClass">Cetak Hard Copy</button>&nbsp; <button onclick="write_headers_to_excel();" class="printButtonClass">Export ke Excel</button>
</small>
<div style="width:100%" id="tabel-laporan">
  <table border="0" width="100%">
              <tr>
                <td colspan="3"><p align="center"><strong><u>REKAPITULASI PEMAKAIAN TANGGAL {{ $tanggal }}</u></strong></p></td>
              </tr>
              <tr>
                <td width="50%">
                  <table border="0" width="100%">
                    <tr>
                      <td colspan="3"><strong>KODE PUSKESMAS</strong></td>
                    </tr>
                    <tr>
                      <td><strong>PUSKESMAS</strong></td>
                      <td><strong>:</strong></td>
                      <td>Umbulharjo 2</td>
                    </tr>
                    <tr>
                      <td><strong>KECAMATAN</strong></td>
                      <td><strong>:</strong></td>
                      <td>Umbulharjo</td>
                    </tr>
                    <tr>
                      <td><strong>KOTA</strong></td>
                      <td><strong>:</strong></td>
                      <td>YOGYAKARTA</td>
                    </tr>
                    <tr>
                      <td><strong>PROPINSI</strong></td>
                      <td><strong>:</strong></td>
                      <td>DAERAH ISTIMEWA YOGYAKARTA</td>
                    </tr>
                  </table>
  <table border="1" width="100%">
            <thead>
              <tr>
                <th style="vertical-align: middle;">No</th>
                <th style="vertical-align: middle;">ID Obat</th>
                <th style="vertical-align: middle;">Nama Obat</th>
                <th style="vertical-align: middle;">No. Batch</th>
                <th style="vertical-align: middle;">Jumlah Terpakai</th>
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
@endsection