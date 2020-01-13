@extends('template/t_laporan')        
@section('content')
<?php $no = 1; $total=0;?>
<small><button onclick="window.print();" class="printButtonClass">Cetak Hard Copy</button>&nbsp; <button onclick="write_headers_to_excel();" class="printButtonClass">Export ke Excel</button></small>
<div style="width:384px" id="tabel-laporan">
          <table width="100%">
              <tr>
                <td colspan="3"><p align="center"><strong>PEMERINTAH KOTA YOGYAKARTA</strong></p>
                <p align="center"><strong>DINAS KESEHATAN</strong></p>
                <hr width="80%" align="center/">
                <p align="center" style="font-size: 12px;">KARTU STOCK GUDANG FARMASI</p></td>
              </tr>
                <td width="50%">
                  <table border="0" width="100%">
                    <tr>
                      <td><strong>Nama Obat</strong></td>
                      <td><strong>:</strong></td>
                      <td>{{ $datakartustok -> first() -> nama_obat }}</td>
                    </tr>
                    <tr>
                      <td><strong>Satuan</strong></td>
                      <td><strong>:</strong></td>
                      <td>{{ $satuan }}</td>
                    </tr>
                    <tr>
                      <td><strong>Satuan Kemasan</strong></td>
                      <td><strong>:</strong></td>
                      <td>{{ $satuankemasan }}</td>
                    </tr>
                    <tr>
                      <td><strong>Sumber / Asal</strong></td>
                      <td><strong>:</strong></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><strong>Nomor Kode</strong></td>
                      <td><strong>:</strong></td>
                      <td>{{ $idobat }}</td>
                    </tr>
                    <tr>
                      <td><strong>Puskesmas</strong></td>
                      <td><strong>:</strong></td>
                      <td>Umbulharjo II</td>
                    </tr>
                    <tr>
                      <td><strong>Kecamatan</strong></td>
                      <td><strong>:</strong></td>
                      <td>Umbulharjo</td>
                    </tr>
                  </table>
  <table border="1" width="100%">
            <thead>
              <tr>
                <th style="vertical-align: middle;">No</th>
                <th style="vertical-align: middle;">Tanggal</th>
                <th style="vertical-align: middle;">Dari/Kepada</th>
                <th style="vertical-align: middle;">Masuk</th>
                <th style="vertical-align: middle;">Keluar</th>
                <th style="vertical-align: middle;">Sisa</th>
                <th style="vertical-align: middle;">ED</th>
                <th style="vertical-align: middle;">Ket</th>
                <th style="vertical-align: middle;">Paraf</th>
              </tr>
            </thead>
            <tbody>
            @if($datakartustok -> count() > 0)
              @foreach($datakartustok as $kartu)
                <tr>
                  <td style="text-align: right;">{{ $no++ }}</td>
                  <td style="text-align: right;">{{ $kartu -> tanggal }}</td>
                  <td></td>                  
                  <td style="text-align: right;">{{ $kartu -> masuk }}</td>
                  <td style="text-align: right;">{{ $kartu -> keluar }}</td>
                  <td style="text-align: right;">{{ $kartu -> stok_akhir }}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan="8" style="text-align: center"><i>Tidak ada data kartu stok</i></td>
              </tr>
            @endif
            @for($a = $no; $a < 31; $a++)
              <tr>
                  <td>&nbsp;</td>
                  <td></td>
                  <td></td>                  
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
            @endfor
            </tbody>
          </table>
</div>
@endsection