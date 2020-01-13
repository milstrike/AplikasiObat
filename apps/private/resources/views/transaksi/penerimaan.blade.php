@extends('template/t_index')        
@section('content')
 
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="pull-right">
              <small>
              <form class="form" role="form" method="POST" enctype="multipart/form-data" action="filterPeriodePenerimaan">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <span><strong>Filter Periode: {{ $periodepermintaan }} </strong></span><br/>
              <select id="tahun" class="input-sm" name="tahun">
                <option value="0000">-------</option>
                @for($i = 2000; $i < 2045; $i++)
                  <option value="{{ $i }}">{{ $i }}</option>
                @endfor
              </select>
              <button type="input" class="input-sm btn btn-info btn-sm" style="margin-bottom: 5px;"><span class="glyphicon glyphicon-filter"></span></button>
              <a href="permintaan" class="btn btn-sm btn-warning" style="margin-bottom: 5px;"><span class="glyphicon glyphicon-refresh"></span></a>
            </form>
          </small>
            </div>
          </div>
               <div class="col-md-12">
                <span><small><strong>Daftar Data Permintaan</strong></small></span>
                <form class="form" role="form" method="POST" enctype="multipart/form-data" action="selectdatapenerimaan">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">                  
                  <select class="form-control input-sm" multiple style="height: 100px;" id="idpermintaan" name="idpermintaan">
                    @if($datapermintaan -> count() >0)
                      @foreach($datapermintaan as $dataminta)
                        @if(Session::get('selectedID') == $dataminta -> id_permintaan )
                      <option value="{{ $dataminta -> id_permintaan }}" selected>{{ $dataminta -> id_permintaan }} ({{$dataminta -> tanggal_permintaan}})</option>
                      @else
                      <option value="{{ $dataminta -> id_permintaan }}">{{ $dataminta -> id_permintaan }} ({{$dataminta -> tanggal_permintaan}})</option>
                      @endif
                      @endforeach
                    @else
                      <option value="0">Belum ada data permintaan</option>
                    @endif
                  </select>
                  <br/><button type="submit" class="btn btn-primary btn-sm">Buka Data Permintaan</button>&nbsp;<a href="penerimaan" class="btn btn-sm btn-info">Reset Tabel</a>
                </form>
                <form class="form-inline pull-right" role="form" method="POST" enctype="multipart/form-data" action="exportDataPenerimaan">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">@if($okprint == "0")<button type="submit" class="btn btn-warning btn-sm" title="export ke excel" disabled><span class="glyphicon glyphicon-download-alt"></span></button>@else<button type="submit" class="btn btn-warning btn-sm" title="export ke excel"><span class="glyphicon glyphicon-download-alt"></span></button>@endif
                  @if($okprint == "0")<a href="penerimaanreal" target="_blank" class="btn btn-success btn-sm" title="export dan cetak" disabled><span class="glyphicon glyphicon-print"></span></a>@else<a href="penerimaanreal" target="_blank" title="export dan cetak" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span></a>@endif
                </form>
              </div>
        </div>
        <div class="row">
            <div class="col-md-12">
             <script>
                    window.setTimeout(function() {
                        $(".alert").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove(); 
                        });
                            }, 2000);
                    </script>
                    @if(Session::has('message'))
                          <div class="alert alert-info"> {{ Session::get('message') }} </div>
                    @endif
				<div class="table-responsive" style="margin-top: 10px;">
          <small>
					<table class="table table-bordered" width="100%">
						<thead>
							<tr>
								<th style="vertical-align: middle;" width="5%">No</th>
								<th style="vertical-align: middle;" width="10%">ID Permintaan</th>
                <th style="vertical-align: middle;" width="10%">Periode Permintaan</th>
								<th style="vertical-align: middle;" width="5%">ID Obat</th>
								<th style="vertical-align: middle;" width="10%">Nama Obat</th>
                <th style="vertical-align: middle;" width="10%">No.Batch</th>
                <th style="vertical-align: middle;" width="5%">Tanggal Penerimaan</th>
                <th style="vertical-align: middle;" width="5%">Jumlah Penerimaan</th>
                <th style="vertical-align: middle;" width="10%">Tanggal Kadaluarsa</th>
                <th style="vertical-align: middle;" width="25%">Supplier</th>
								<th style="vertical-align: middle;" width="5%">Aksi</th>
							</tr>
						</thead>
            <?php $no = 1;?>
						<tbody>
           <?php $no = 1;?>
            @if($tabelpermintaan -> count() > 0)
              @foreach($tabelpermintaan as $minta)
              <form class="form" role="form" method="POST" enctype="multipart/form-data" action="updatedatapenerimaan">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_data-{{ $minta -> id }}" value="{{ $minta -> id }}">
                  <input type="hidden" name="id_permintaan-{{ $minta -> id }}" value="{{ $minta -> id_permintaan }}">
                  <input type="hidden" name="id_obat-{{ $minta -> id }}" value="{{ $minta -> id_obat }}">
                <tr>
                  <td style="text-align: right; vertical-align: middle;">{{ $no++ }}</td>
                  <td style="text-align: right; vertical-align: middle;">{{ $minta -> id_permintaan }}</td>
                  <td style="text-align: right; vertical-align: middle;">{{ $minta -> tanggal_permintaan }}</td>
                  <td style="text-align: right; vertical-align: middle;">{{ $minta -> id_obat }}</td>
                  <td>{{ $minta -> nama_obat}}</td>
                  <td style="vertical-align: middle;">
                  @if($minta -> status == "0")
                  <input type="text" class="form-control input-sm span2" name="inputNoBatch-{{ $minta -> id }}" value="{{ $minta -> no_batch}}">
                  @else
                  <input type="text" class="form-control input-sm span2" name="inputNoBatch-{{ $minta -> id }}" value="{{ $minta -> no_batch}}" readonly>
                  @endif
                  </td>
                  <td style="text-align: right; vertical-align: middle;">
                  @if($minta -> status == "0")
                  <input class="form-control input-sm span2" type="date" name="inputTanggalPenerimaan-{{ $minta -> id }}" value="{{ $minta -> tanggal}}">
                  @else
                  <input class="form-control input-sm span2" type="date" name="inputTanggalPenerimaan-{{ $minta -> id }}" value="{{ $minta -> tanggal}}" readonly>
                  @endif
                  </td>
                  <td style="text-align: right; vertical-align: middle;">
                  @if($minta -> status == "0")
                  <input class="form-control input-sm span2" type="text" name="inputJumlahPenerimaan-{{ $minta -> id }}" value="{{ $minta -> jumlah}}">
                  @else
                  <input class="form-control input-sm span2" type="text" name="inputJumlahPenerimaan-{{ $minta -> id }}" value="{{ $minta -> jumlah}}" readonly>
                  @endif
                  </td>
                  <td style="text-align: right; vertical-align: middle;">
                  @if($minta -> status == "0")
                  <input class="form-control input-sm span2" type="date" name="inputTanggalKadaluarsa-{{ $minta -> id }}" value="{{ $minta -> tgl_kadaluarsa}}">
                  @else
                  <input class="form-control input-sm span2" type="date" name="inputTanggalKadaluarsa-{{ $minta -> id }}" value="{{ $minta -> tgl_kadaluarsa}}" readonly>
                  @endif
                  </td>
                  <td style="vertical-align: middle;">
                  @if($minta -> status == "0")
                  <select class="form-control input-sm span2" name="inputSupplier-{{ $minta -> id }}">
                    @foreach($datasupplier as $supplier)
                      @if($supplier -> supplier ==  $minta -> supplier)
                        <option value="{{ $supplier -> supplier }}" selected>{{ $supplier -> supplier }}</option>
                      @else
                        <option value="{{ $supplier -> supplier }}">{{ $supplier -> supplier }}</option>
                      @endif
                      @endforeach
                  </select>
                  @else
                  <select class="form-control input-sm span2" name="inputSupplier-{{ $minta -> id }}" readonly>
                    @foreach($datasupplier as $supplier)
                      @if($supplier -> supplier ==  $minta -> supplier)
                        <option value="{{ $supplier -> supplier }}" selected>{{ $supplier -> supplier }}</option>
                      @else
                        <option value="{{ $supplier -> supplier }}">{{ $supplier -> supplier }}</option>
                      @endif
                      @endforeach
                  </select>
                  @endif
                  </td>
                  <td style="vertical-align: middle; text-align: center;">
                  @if($minta -> status == "0")
                  <button type="submit" class="btn btn-xs btn-warning" name="cek[{{ $minta -> id }}]"><span class="glyphicon glyphicon-ok"></span></button></td>
                  @else
                  <button type="submit" class="btn btn-xs" disabled><span class="glyphicon glyphicon-ok"></span></button></td>
                  @endif
                </tr>
                </form>
              @endforeach
            @else
              <tr>
                <td colspan="11" style="text-align: center"><i>Belum memilih data permintaan dari daftar permintaan</i></td>
              </tr>
            @endif
						</tbody>
					</table>
        </small>
				</div>
            </div>
        </div>
    </div>
@endsection