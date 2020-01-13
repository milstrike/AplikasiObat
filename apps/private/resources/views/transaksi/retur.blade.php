@extends('template/t_index')        
@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-lg-6">

              <!-- Nav tabs -->
              <ul class="nav nav-tabs">
                <li class="active"><a href="#dataretur" data-toggle="tab">Data Retur</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="dataretur">

                  <script>
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove(); 
                        });
                            }, 3000);
                    </script>
                    @if(Session::has('message'))
                          <div class="alert alert-info" style="margin-top:5px; margin-bottom: 0px;"> {{ Session::get('message') }} </div>
                    @endif

                  <form class="form-inline pull-right" role="form" method="POST" enctype="multipart/form-data" action="createDataRetur" style="margin-top: 5px; margin-bottom: 5px;">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <a href="retur" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-refresh"></span> Refresh Tabel</a>
                      <button type="submit" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-plus"></span> Buat Data Retur</button>
                  </form>
                  <small>
                  <table class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="35%">ID Retur</th>
                    <th width="20%">Tanggal</th>
                    <th width="20%">Jumlah Item</th>
                    <th width="20%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $urutRetur = 1;?>
                @if($dataRetur->count() > 0)
                  @foreach($dataRetur as $dtretur)
                    <tr>
                      <td style="text-align: right">{{ $urutRetur++ }}</td>
                      <td>{{ $dtretur -> id_retur }}</td>
                      <td style="text-align: right;">{{ $dtretur -> tanggal }}</td>
                      <td style="text-align: right;">
                      <?php $totalJumlah = 0; ?>
                      @if($dataDetailRetur->count() > 0)
                        @foreach($dataDetailRetur as $dtdRetur)
                          @if($dtdRetur->id_retur == $dtretur -> id_retur)
                            <?php $totalJumlah++; ?>
                          @else
                          @endif
                        @endforeach                        
                      @else
                      @endif                      
                      {{ $totalJumlah }} Obat
                      </td>
                      <td style="text-align: center;">
                          <a href="hapusDataRetur/{{ $dtretur -> id }}/id_retur/{{ $dtretur -> id_retur }}" title="hapus data retur"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
                          <a href="editDataRetur/{{ $dtretur -> id_retur }}" title="edit data retur" onclick="window.open('editDataRetur/{{ $dtretur -> id_retur }}', 'Edit Data Retur', 'width=1100, height=768'); return false;"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                          <a href="cetakDataRetur/{{ $dtretur -> id_retur}}" title="export data retur ke excel"><span class="glyphicon glyphicon-download-alt"></span></a>&nbsp;
                          <a href="cetakLaporanRetur/{{ $dtretur -> id_retur}}" title="cetak laporan retur" target="_blank"><span class="glyphicon glyphicon-print"></span></a>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="5" style="text-align: center;"><i>Belum ada data retur</i></td>
                  </tr>
                @endif
                </tbody>
              </table>
            </small>
                </div>
              </div>              
            </div>
            <div class="col-lg-6">

              <!-- Nav tabs -->
              <ul class="nav nav-tabs">
                <li class="active"><a href="#databon" data-toggle="tab">Data Bon</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane active" id="databon">

                  <script>
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove(); 
                        });
                            }, 3000);
                    </script>
                    @if(Session::has('message_bon'))
                          <div class="alert alert-info" style="margin-top:5px; margin-bottom: 0px;"> {{ Session::get('message_bon') }} </div>
                    @endif

                  <form class="form-inline pull-right" role="form" method="POST" enctype="multipart/form-data" action="createDataBon" style="margin-top: 5px; margin-bottom: 5px;">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <a href="retur" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-refresh"></span> Refresh Tabel</a>
                      <button type="submit" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-plus"></span> Buat Data Bon</button>
                  </form>
                  <small>
                  <table class="table table-bordered table-striped table-hover" width="100%">
                <thead>
                  <tr>
                    <th width="5%">#</th>
                    <th width="35%">ID Bon</th>
                    <th width="20%">Tanggal</th>
                    <th width="20%">Jumlah Item</th>
                    <th width="20%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $urutBon = 1;?>
                @if($dataBon->count() > 0)
                  @foreach($dataBon as $dtbon)
                    <tr>
                      <td style="text-align: right">{{ $urutBon++ }}</td>
                      <td>{{ $dtbon -> id_bon }}</td>
                      <td style="text-align: right;">{{ $dtbon -> tanggal }}</td>
                      <td style="text-align: right;">
                      <?php $totalJumlahBon = 0; ?>
                      @if($dataDetailBon->count() > 0)
                        @foreach($dataDetailBon as $dtdBon)
                          @if($dtdBon->id_bon == $dtbon -> id_bon)
                            <?php $totalJumlahBon++; ?>
                          @else
                          @endif
                        @endforeach                        
                      @else
                      @endif                      
                      {{ $totalJumlahBon }} Obat
                      </td>
                      <td style="text-align: center;">
                          <a href="hapusDataBon/{{ $dtbon -> id }}/id_bon/{{ $dtbon -> id_bon }}" title="hapus data bon"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
                          <a href="editDataBon/{{ $dtbon -> id_bon }}" title="edit data bon" onclick="window.open('editDataBon/{{ $dtbon -> id_bon }}', 'Edit Data Bon', 'width=1100, height=768'); return false;"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
                          <a href="cetakDataBon/{{ $dtbon -> id_bon }}" title="cetak data bon"><span class="glyphicon glyphicon-download-alt"></span></a>&nbsp;
                          <a href="cetakLaporanBon/{{ $dtbon -> id_bon }}" target="_blank" title="cetak data bon"><span class="glyphicon glyphicon-print"></span></a>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="5" style="text-align: center;"><i>Belum ada data bon</i></td>
                  </tr>
                @endif
                </tbody>
              </table>
            </small>
                </div>
              </div>              
            </div>
        </div>
    </div>
@endsection