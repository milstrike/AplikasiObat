@extends('template/t_index3')        
@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <legend>Data Obat Rusak dan Kadaluarsa</legend>
            <small>
              <table width="100%" class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>ID Obat</th>
                    <th>Nama Obat</th>
                    <th>No. Batch</th>
                    <th>Jumlah Item</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <?php $noEdit = 1;?>
                <tbody>
                @if($dataobat->count() > 0)
                  @foreach($dataobat as $dtobat)
                    <tr>
                      <td style="text-align: right;">{{ $noEdit++ }}</td>
                      <td>{{ $dtobat -> id_obat }}</td>
                      <td>{{ $dtobat -> nama_obat }}</td>
                      <td>{{ $dtobat -> batch}}</td>
                        @if($dtobat -> kadaluarsa == 1)
                          <td style="text-align: right;">{{ $dtobat -> stok }}</td>
                        @else
                          <td style="text-align: right;">{{ $dtobat -> rusak}}</td>
                        @endif
                      
                        @if($dtobat -> kadaluarsa == 1)
                          <td>Obat Kadaluarsa</td>
                        @else
                          <td>Obat Rusak</td>
                        @endif
                        <td style="text-align: center;">
                        <?php $okCounter = 0; ?>
                        @if($dataretur->count() > 0)
                          @foreach($dataretur as $dtretur)
                            @if($dtretur -> batch == $dtobat-> batch)
                              <?php $okCounter++ ?>
                            @else
                            @endif
                          @endforeach
                            @if($okCounter > 0)
                              <a href="../deleteDetailDataRetur/{{ $id_retur }}/batch/{{ $dtobat -> batch }}" class="btn btn-danger btn-sm">Hapus dari daftar Retur Obat</a>
                              <a href="../returditerima/{{ $id_retur }}/batch/{{ $dtobat -> batch }}" class="btn btn-success btn-sm">Obat baru diterima</a>
                            @else
                              <a href="../addDetailDataRetur/{{ $id_retur }}/batch/{{ $dtobat -> batch }}" class="btn btn-info btn-sm">Tambahkan ke daftar Retur Obat</a>
                            @endif
                        @else
                          <a href="../addDetailDataRetur/{{ $id_retur }}/batch/{{ $dtobat -> batch }}" class="btn btn-info btn-sm">Tambahkan ke daftar Retur Obat</a>
                        @endif
                        </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="7" style="text-align: center;"><i>Tidak ada data obat rusak / kadaluarsa</i></td>
                  </tr>
                @endif
                </tbody>
              </table>
            </small>
              <a href='#' class="btn btn-sm btn-primary pull-right" onclick="window.close();">Selesai, tutup jendela ini</a>
            </div>
        </div>
    </div>
@endsection