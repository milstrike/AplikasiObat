@extends('template/t_index')        
@section('content')
 
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-md-12">
                <legend>Rekap Data Transaksi</legend>
                <dl class="dl-horizontal">
                    <dt>No. Rekam Medis</dt>
                    <dd>{{ $noresep }}</dd>
                    <dt>Nama Pasien</dt>
                    <dd>{{ $nama }}</dd>
                    <dt>Tanggal</dt>
                    <dd>{{ $tanggal }}</dd>
                    <dt>Dokter</dt>
                    <dd>{{ $dokter }}</dd>
                </dl>
                <table class="table table-hover table-bordered table-striped">
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
                <div class="pull-right" style="margin-bottom: 50px;">
                <a href="cetakrekapitulasi" target="_blank" class="btn btn-primary btn-sm">Cetak Rekapitulasi</a>&nbsp;
                <a href="cetakrekaplabel" target="_blank" class="btn btn-warning btn-sm">Cetak Label</a>
                <a href="penerimaanresep" class="btn btn-success btn-sm">Selesai, kembali ke Penerimaan Resep</a>
              </div>
            </div>
        </div>
    </div>
@endsection