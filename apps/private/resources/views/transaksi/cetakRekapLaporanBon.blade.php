@extends('template/t_laporan')        
@section('content')
<small><button onclick="window.print();" class="printButtonClass">Cetak Hard Copy</button>&nbsp; <button onclick="write_headers_to_excel();" class="printButtonClass">Export ke Excel</button></small>
<div style="width=100%;" id="tabel-laporan">
  <small>
            <table border="0" width="100%">
              <tr>
                <td colspan="3"><p align="center"><strong><u>LAPORAN PEMAKAIAN DAN LEMBAR PERMINTAAN BON</u></strong></p></td>
              </tr>
              <tr>
                <td width="33%">
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
                </td>
                <td width="34"></td>
                <td width="33%">
                    <table border="0" width="100%">
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>  
                    <tr>
                      <td><strong>NOMOR LPLPO</strong></td>
                      <td><strong>:</strong></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><strong>PEMAKAIAN BULAN</strong></td>
                      <td><strong>:</strong></td>
                      <td>{{ $tahunpemakaian }}</td>
                    </tr>
                    <tr>
                      <td><strong>PERMINTAAN BULAN</strong></td>
                      <td><strong>:</strong></td>
                      <td>{{ $tahunpemakaian }}</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
            <table border="1" width="100%">
              <thead>
                <tr>
                  <th rowspan="2">No</th>
                  <th rowspan="2">KODE</th>
                  <th rowspan="2">NAMA BARANG</th>
                  <th rowspan="2">SATUAN</th>
                  <th rowspan="2">STOK AWAL</th>
                  <th rowspan="2">PENERIMAAN</th>
                  <th rowspan="2">PERSEDIAAN</th>
                  <th rowspan="2">PEMAKAIAN</th>
                  <th rowspan="2">RUSAK/ED</th>
                  <th rowspan="2">JUMLAH PENGELUARAN</th>
                  <th rowspan="2">SISA STOK</th>
                  <th rowspan="2">STOK OPTIMUM</th>
                  <!-- <th rowspan="2">PERMINTAAN</th> -->
                  <th rowspan="2">PEMBERIAN</th>
                  <th colspan="2">Pemeriksaan Barang</th>
                  <th rowspan="2">Keterangan</th>
                </tr>
                <tr>
                  <th>UPT FARM</th>
                  <th>PUSK</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;?>
              @if($detaillaporanbon -> count() >0)
              @foreach($detaillaporanbon as $dl)
                <tr>
                  <td style="text-align: right;">{{ $no++ }}</td>
                  <td style="text-align: left;">{{ $dl -> id_obat}}</td>
                  <td style="text-align: left;">{{ $dl -> nama_obat}}</td>
                  @foreach($dataobat as $do)
                    @if($dl -> id_obat == $do -> id_obat)
                      @foreach($datasatuan as $ds)
                        @if($do -> id_satuan == $ds -> id_satuan)
                          <td style="text-align: left;">{{ $ds -> satuan }}</td>
                        @else
                        @endif
                      @endforeach
                    @else
                    @endif
                  @endforeach
                  <td style="text-align: right;">{{ $dl -> penerimaan_lalu + $dl -> pemakaian }}</td>
                  <td style="text-align: right;">{{ $dl -> penerimaan_lalu }}</td>
                  <td style="text-align: right;">{{ $dl -> stok }}</td>
                  <td style="text-align: right;">{{ $dl ->  pemakaian}}</td>
                  <td style="text-align: right;">{{ $dl -> rusak}}</td>
                  <td style="text-align: right;">{{ $dl -> pemakaian}}</td>
                  <td style="text-align: right;">{{ $dl -> sisa_stok}}</td>
                  <td style="text-align: right;">{{ $dl -> stok_optimum }}</td>
                  <!-- <td style="text-align: right;">{{ $dl -> jumlah_permintaan}}</td> -->
                  <td style="text-align: right;"></td>
                  <td style="text-align: right;"></td>
                  <td style="text-align: right;"></td>
                  <td style="text-align: right;">
                  @if($detailbon -> count() > 0)
                    @foreach($detailbon as $dbo)
                      @if($dl -> id_obat == $dbo -> id_obat)
                        Bon {{  $dbo -> jumlah }}
                      @else
                      @endif
                    @endforeach
                  @else
                  @endif
                  </td>
                </tr>
              @endforeach
              @else
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
</small>
</div>
@endsection