@extends('template/t_index')        
@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-md-3 well">
                <h4>Masukan Data Dokter</h4>
                @if(Session::has('select'))
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="updateDataDokter">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_dokter" value="{{ Session::get('id') }}">
            <div class="form-group">
              <label for="nip" class="col-sm-4 control-label"><small>NIP</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm " id="inputNIP" name="inputNIP" value="{{ Session::get('nip') }}" required>
              </div>
            </div>
            <div class="form-group">
              <label for="nama" class="col-sm-4 control-label"><small>Nama</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputNama" name="inputNama" value="{{ Session::get('nama') }}" required>
              </div>
            </div>
            <div class="form-group">
              <label for="poli" class="col-sm-4 control-label"><small>Poli</small></label>
              <div class="col-sm-8">
                <select name="inputPoli" class="form-control input-sm">
                  @if($datapoli -> count() > 0)
                    @foreach($datapoli as $poli)
                      @if(Session::get('id_poli') == $poli->id_poli )
                        <option value="{{ $poli -> id_poli}}" selected>{{ $poli -> id_poli}} - {{ $poli -> nama_poli }}</option>
                      @else
                        <option value="{{ $poli -> id_poli}}">{{ $poli -> id_poli}} - {{ $poli -> nama_poli }}</option>
                      @endif
                    @endforeach
                  @else
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="alamat" class="col-sm-4 control-label"><small>Alamat</small></label>
              <div class="col-sm-8">
                  <textarea class="form-control input-sm" id="inputAlamat" name="inputAlamat" required>{{ Session::get('alamat') }}</textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="telepon" class="col-sm-4 control-label"><small>Telepon</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputTelepon" name="inputTelepon" value="{{ Session::get('telepon') }}" required>
            </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Edit Data Dokter</button>
              </div>
            </div>
        </form>
                @else
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="createDataDokter">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="nip" class="col-sm-4 control-label"><small>NIP</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm " id="inputNIP" name="inputNIP" placeholder="disesuaikan" required>
                  <div id="messagewarning" style="font-size: 10px; padding-left: 5px; margin-top: 5px;">
                                                            
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="nama" class="col-sm-4 control-label"><small>Nama</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputNama" name="inputNama" placeholder="disesuaikan" required>
              </div>
            </div>
            <div class="form-group">
              <label for="poli" class="col-sm-4 control-label"><small>Poli</small></label>
              <div class="col-sm-8">
                <select name="inputPoli" class="form-control input-sm">
                  @if($datapoli -> count() > 0)
                    @foreach($datapoli as $poli)
                      <option value="{{ $poli -> id_poli}}">{{ $poli -> id_poli}} - {{ $poli -> nama_poli }}</option>
                    @endforeach
                  @else
                  @endif
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="alamat" class="col-sm-4 control-label"><small>Alamat</small></label>
              <div class="col-sm-8">
                  <textarea class="form-control input-sm" id="inputAlamat" name="inputAlamat" required></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="telepon" class="col-sm-4 control-label"><small>Telepon</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputTelepon" name="inputTelepon" placeholder="Contoh: 081234567890" required>
            </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Tambah Data Dokter</button>
              </div>
            </div>
        </form>
                @endif
            </div>
            <div class="col-md-9">
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
                    <table width="100%">
                    <tr>
                    <td width="65%">
                <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="filterDataDokter">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          Cari Berdasarkan: 
                        <div class="form-group">
                          <select class="form-control input-sm" name="filter-kategori">
                            <option value="1">NIP</option>
                            <option value="2">Nama</option>
                            <option value="3">Alamat</option>
                            <option value="4">Telepon</option>
                          </select>
                        </div>  
                          <div class="form-group">
                            <input type="text" class="form-control input-sm" id="keyword" name="keyword-pencarian" placeholder="Kata Kunci Pencarian">
                        </div>  
                          <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></button>
                          <a href="dokter" class="btn btn-warning btn-sm">Reset Tabel</a>
                      </form>
        </td>
        <td width="35%" style="text-align: right;">
                        <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="exportDataDokter">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-download-alt"></button>
                          </form>
                      </td>
        </tr>
        </table>
				<div class="table-responsive" style="margin-top: 10px;">
          <small>
					<table class="table table-bordered" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>NIP</th>
								<th>Nama</th>
								<th>Poli</th>
								<th>Alamat</th>
								<th>Telepon</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
              <?php $no = 1; ?>
              @if($datadokter -> count() > 0)
                @foreach($datadokter as $dokter)
                  <td style="text-align: right;">{{ $no++ }}</td>
                  <td>{{ $dokter->nip }}</td>
                  <td>{{ $dokter->nama }}</td>
                  <td>
                  @if($datapoli -> count() > 0)
                    @foreach($datapoli as $poli)
                      @if( $dokter->id_poli == $poli->id_poli )
                        {{ $poli -> nama_poli }}
                      @else                        
                      @endif
                    @endforeach
                  @else
                  @endif
                  </td>
                  <td>{{ $dokter->alamat }}</td>
                  <td>{{ $dokter->telepon }}</td>
                  <td style="text-align: center"><a href="selectDataDokter/{{ $dokter->id }}"class="btn btn-xs btn-warning" title="Edit Data"><span class="glyphicon glyphicon-pencil"></span></a> <a href="hapusDataDokter/{{ $dokter->id }}" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="btn btn-xs btn-danger" title="Hapus Data"><span class="glyphicon glyphicon-remove"></span></a></td>
                </tr>
                @endforeach
              @else
                <tr>
                <td colspan="7" style="text-align: center"><i>Belum ada data dokter</i></td>
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