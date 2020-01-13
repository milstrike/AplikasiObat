@extends('template/t_index3')        
@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <legend>Data Obat dengan jumlah stok dibawa 90 (per satuan)</legend>
            <small>
              <table width="100%" class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>ID Obat</th>
                    <th>Nama Obat</th>
                    <th>Sisa Stok</th>
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
                      <td>{{ $dtobat -> obat }}</td>
                      <td style="text-align:right">{{ $dtobat -> stok }}</td>
                        <td style="text-align: center;">
                        <?php $okCounter = 0; ?>
                        @if($databon->count() > 0)
                          @foreach($databon as $dtbon)
                            @if($dtbon -> id_obat == $dtobat-> id_obat)
                              <?php $okCounter++ ?>
                            @else
                            @endif
                          @endforeach
                            @if($okCounter > 0)
                              <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="../obatbonditerima">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id_obat_terima-{{ $dtobat -> id_obat }}" value="{{ $dtobat -> id_obat }}">
                                <input type="hidden" name="id_bon" value="{{ $id_bon }}">
                                <div class="form-group">
                                    <input type="text" class="form-control input-sm" name="noBatch-{{ $dtobat -> id_obat }}" placeholder="No. Batch">
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control input-sm" name="jumlahDiterima-{{ $dtobat -> id_obat }}" placeholder="Masukkan Jumlah">
                                </div>
                                <div class="form-group">
                                  <input type="date" class="form-control input-sm" id="kadaluarsa-{{ $dtobat -> id_obat }}" name="kadaluarsa-{{ $dtobat -> id_obat }}" placeholder="YYYY-BB-TT" required>
                                </div>  
                                  <button type="submit" class="btn btn-success btn-sm" name="terimaBon[{{ $dtobat -> id_obat }}]"><span class="glyphicon glyphicon-ok"></span></button>&nbsp;<a href="../deleteDetailDataBon/{{ $id_bon }}/id_obat/{{ $dtobat -> id_obat }}" class="btn btn-danger btn-sm" title="Hapus obat dari daftar bon"><span class="glyphicon glyphicon-remove"></span></a>
                              </form>
                            @else
                              <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="../addDetailDataBon">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id_obat-{{ $dtobat -> id_obat }}" value="{{ $dtobat -> id_obat }}">
                                <input type="hidden" name="id_bon" value="{{ $id_bon }}">
                                <div class="form-group">
                                    <input type="number" class="form-control input-sm" name="inputBon-{{ $dtobat -> id_obat }}" placeholder="Masukkan Jumlah">
                                </div>
                                  <button type="submit" class="btn btn-warning btn-sm" name="submitBon[{{ $dtobat -> id_obat }}]"><span class="glyphicon glyphicon-plus"></span></button>
                              </form>
                            @endif
                        @else
                          <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="../addDetailDataBon">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id_obat-{{ $dtobat -> id_obat }}" value="{{ $dtobat -> id_obat }}">
                                <input type="hidden" name="id_bon" value="{{ $id_bon }}">
                                <div class="form-group">
                                    <input type="number" class="form-control input-sm" name="inputBon-{{ $dtobat -> id_obat }}" placeholder="Masukkan Jumlah">
                                </div>
                                  <button type="submit" class="btn btn-warning btn-sm" name="submitBon[{{ $dtobat -> id_obat }}]"><span class="glyphicon glyphicon-plus"></span></button>
                              </form>
                        @endif
                        </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="5" style="text-align: center;"><i>Belum ada data obat dengan stok 0</i></td>
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