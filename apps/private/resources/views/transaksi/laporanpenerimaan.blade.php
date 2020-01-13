@extends('template/t_laporan')        
@section('content')
<small><button onclick="window.print();" class="printButtonClass">Cetak Hard Copy</button>&nbsp; <button onclick="write_headers_to_excel();" class="printButtonClass">Export ke Excel</button></small>
<div style="width=100%;" id="tabel-laporan">
  <small>
            <table border="0" width="100%">
              <tr>
                <td colspan="3"><p align="center"><strong><u>REKAP PENERIMAAN OBAT, REAGEN, AMPH, VAKSIN DAN PERBEKKES</u></strong></p></td>
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
                </td>
                <td width="17%"></td>
                <td width="33%">
                    <table border="0" width="100%">
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><strong>BULAN</strong></td>
                      <td><strong>:</strong></td>
                      <td>{{ $realdate }}</td>
                    </tr>  
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
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
                  <th>No</th>
                  <th>KODE</th>
                  <th>NAMA BARANG</th>
                  <th>SATUAN</th>
                  <th>JUMLAH</th>
                  <th>No. BA</th>
                </tr>
                <tr>
                  <th style="font-size: 10px; border-left: none; border-right: none;">1</th>
                  <th style="font-size: 10px; border-left: none; border-right: none;">2</th>
                  <th style="font-size: 10px; border-left: none; border-right: none;">3</th>
                  <th style="font-size: 10px; border-left: none; border-right: none;">4</th>
                  <th style="font-size: 10px; border-left: none; border-right: none;">5</th>
                  <th style="font-size: 10px; border-left: none; border-right: none;">6</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1; ?>
              @if($datapenerimaan -> count() >0)
                @foreach($datapenerimaan as $dp)
                  <tr>
                    <td style="text-align: right;">{{ $no++ }}</td>
                    <td style="text-align: left;">{{ $dp -> id_obat }}</td>
                    <td style="text-align: left;">{{ $dp -> nama_obat }}</td>
                    @foreach($dataobat as $do)
                      @if($dp -> id_obat == $do -> id_obat)
                        @foreach($datasatuan as $ds)
                          @if($do -> id_satuan == $ds -> id_satuan)
                            <td style="text-align: left;">{{ $ds -> satuan }}</td>
                          @else
                          @endif
                        @endforeach
                      @else
                      @endif
                    @endforeach
                    <td style="text-align: right;">{{ $dp -> jumlah }}</td>
                    <td></td>
                  </tr>
                @endforeach
              @else
              @endif
              </tbody>
            </table>
            <table width="100%" border="0">
              <tr>
                <td width="33%"></td>
                <td width="34%"></td>
                <td width="33%"><p align="center">{{ $declaredate }}</p></td>
              </tr>
              <tr>
                <td width="33%">
                  <p align="center">
                    Yang Meminta,<br/>
                    Kepala Puskesmas Umbulharjo 2<br/>
                    <br/><br/><br/>
                    (____________________________)<br/>
                    NIP.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </p>
                </td>
                <td width="34%">
                  <p align="center">
                    Yang Menyerahkan,<br/>
                    UPT Farmasi dan Alat Kesehatan<br/>
                    <br/><br/><br/>
                    (____________________________)<br/>
                    NIP.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </p>
                </td>
                <td width="33%">
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