@extends('template/t_laporan')        
@section('content')
<small><button onclick="window.print();" class="printButtonClass">Cetak Hard Copy</button>&nbsp; <button onclick="write_headers_to_excel();" class="printButtonClass">Export ke Excel</button></small>
<div style="width:100%" id="tabel-laporan">
  <table width="100%" border="0">
    <tr>
      <td style="text-align: center; font-size: 16px;"><strong>PUSKESMAS UMBULHARJO II</strong></td>
    </tr>
    <tr>
      <td style="text-align: center; font-size: 12px;">UNIT FARMASI</td>
    </tr>
    <tr>
      <td style="text-align: center; font-size: 20px;">DAFTAR TRANSAKSI OBAT</td>
    </tr>
  </table>
  <table width="50%" border="0">
    <tr>
      <td>Nama Pasien</td>
      <td>{{ $nama }}</td>
    </tr>
    <tr>
      <td>Dokter</td>
      <td>{{ $dokter }}</td>
    </tr>
    <tr>
      <td>Tanggal</td>
      <td>{{ $tanggal }}</td>
    </tr>
  </table>
  <table width="100%" border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Obat</th>
                            <th>Dosis</th>
                            <th>Harga Satuan</th>
                            <th>Total</th>
                        </tr>                        
                    </thead>
                    <tbody>
                      <?php $no = 1; $totalharga = 0;?>
                      @foreach($dataresep as $dr)
                        <tr>
                          <td style="text-align: right;">{{ $no++ }}</td>
                          <td>{{ $dr -> nama_obat }}</td>
                          <td>{{ $dr -> dosis }}</td>
                          <td style="text-align: right;">
                            @foreach($dataobat as $do)
                              @if($dr -> nama_obat == $do -> obat)
                                Rp{{ number_format($do->harga , 0, ',', '.') }},00
                              @else
                              @endif
                            @endforeach
                          </td>
                          <td style="text-align: right;">
                            @foreach($dataobat as $do)
                              @if($dr -> nama_obat == $do -> obat)
                                Rp{{  number_format($dr -> dosis * $do->harga , 0, ',', '.') }},00 <?php $totalharga = $totalharga + ($dr -> dosis * $do->harga) ?>
                              @else
                              @endif
                            @endforeach
                          </td>
                        </tr>
                      @endforeach
                      <tr>
                        <td colspan="4" style="text-align: center"><strong>Total Pembayaran<strong></td>
                        <td style="text-align: right"><strong>Rp{{ number_format($totalharga , 0, ',', '.') }},00</strong></td>
                      </tr>
                    </tbody>
                </table>
</div>
@endsection