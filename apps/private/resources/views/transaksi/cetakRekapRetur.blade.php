@extends('template/t_laporan')        
@section('content')
<small>
  <button onclick="window.print();" class="printButtonClass">Cetak Hard Copy</button>&nbsp; <button onclick="write_headers_to_excel();" class="printButtonClass">Export ke Excel</button>
</small>
<div style="width:100%" id="tabel-laporan">
  <table border="0" width="100%">
              <tr>
                <td colspan="3"><p align="center"><strong><u>REKAPITULASI RETUR OBAT BULAN {{ strtoupper($periodelaporan) }}</u></strong></p></td>
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
                <th style="vertical-align: middle;">Keterangan</th>
                <th style="vertical-align: middle;">Satuan</th>
                <th style="vertical-align: middle;">Jumlah</th>
                <th style="vertical-align: middle;">Harga Satuan</th>
                <th style="vertical-align: middle;">Jumlah Harga</th>
              </tr>
            </thead>
            <tbody>
            <?php $no = 1; $harga = 0;?>
            @foreach($datalaporan as $dl)
              <tr>
                <td style="text-align: right;">{{ $no++ }}</td>
                <td>{{ $dl -> id_obat }}</td>
                <td>{{ $dl -> nama_obat }}</td>
                <td>{{ $dl -> batch }}</td>
                <td>{{ $dl -> keterangan }}</td>
                @foreach($dataobat as $do)
                  @if($dl -> id_obat == $do -> id_obat)
                    @foreach($datasatuan as $ds)
                      @if($do -> id_satuan == $ds -> id_satuan)
                        <td>{{ $ds -> satuan }}</td>
                      @else
                      @endif
                    @endforeach
                  @else
                  @endif
                @endforeach
                <td style="text-align: right;">{{ $dl -> jumlah }}</td>
                @foreach($dataobat as $do)
                  @if($dl -> id_obat == $do -> id_obat)
                    <td style="text-align: right;">Rp{{ number_format($do -> harga , 0, ',', '.')}},00<?php $harga = $do -> harga;?></td>
                  @else
                  @endif
                @endforeach
                <td style="text-align: right;">Rp{{ number_format($dl -> jumlah * $harga , 0, ',', '.')}},00</td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <table width="100%" border="0">
              <tr>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="20%"><p align="center">{{ $declaredate }}</p></td>
              </tr>
              <tr>
                <td width="20%">
                  <p align="center">
                    Yang Menyerahkan,<br/>
                    Puskesmas<br/>
                    <br/><br/><br/>
                    (____________________________)<br/>
                    NIP.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </p>
                </td>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="20%">
                  <p align="center">
                    Yang Menerima,<br/>
                    UPT Farmasi dan Alat Kesehatan<br/>
                    <br/><br/><br/>
                    (____________________________)<br/>
                    NIP.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </p>
                </td>
              </tr>
            </table>
@endsection