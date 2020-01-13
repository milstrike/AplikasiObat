@extends('template/t_laporan')        
@section('content')
<small><button onclick="window.print();" class="printButtonClass">Cetak Hard Copy</button>&nbsp; <button onclick="write_headers_to_excel();" class="printButtonClass">Export ke Excel</button></small>
<div style="width:100%" id="tabel-laporan">
  <table border="0" width="100%">
              <tr>
                <td colspan="3"><p align="center"><strong><u>REKAPITULASI PERMINTAAN</u></strong></p></td>
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
            <?php $no = 1; $total=0;?>
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
          <table width="100%" border="0">
              <tr>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="20%"><p align="center">{{ $declaredate }}</p></td>
              </tr>
              <tr>
                <td width="20%"></td>
                <td width="20%"></td>
                <td width="20%">
                  <p align="center">
                    Yang Meminta,<br/>
                    Kepala Puskesmas Umbulharjo 2<br/>
                    <br/><br/><br/>
                    (____________________________)<br/>
                    NIP.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </p>
                </td>
                <td width="20%">
                  <p align="center">
                    Yang Menyerahkan,<br/>
                    UPT Farmasi dan Alat Kesehatan<br/>
                    <br/><br/><br/>
                    (____________________________)<br/>
                    NIP.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </p>
                </td>
                <td width="20%">
                  <p align="center">
                    Yang Menerima,<br/>
                    Pengelola Obat Puskesmas Umbulharjo 2<br/>
                    <br/><br/><br/>
                    (____________________________)<br/>
                    NIP.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </p>
                </td>
              </tr>
            </table>
</div>
@endsection