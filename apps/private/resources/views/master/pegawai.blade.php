@extends('template/t_index')        
@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-md-3 well">
                <h4>Masukan Data Pegawai</h4>
                @if(Session::has('select'))
                  <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="updateDataPegawai">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_pegawai" value="{{ Session::get('id_pegawai') }}">
            <div class="form-group">
              <label for="nip" class="col-sm-4 control-label"><small>NIP</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputNIP" name="inputNIP" value="{{ Session::get('nip') }}">
              </div>
            </div>
            <div class="form-group">
              <label for="nama" class="col-sm-4 control-label"><small>Nama</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputNama" name="inputNama" value="{{ Session::get('nama') }}">
              </div>
            </div>
            <div class="form-group">
              <label for="jenis_kelamin" class="col-sm-4 control-label"><small>Jenis Kelamin</small></label>
              <div class="col-sm-8">
                  <select class="form-control input-sm" name="inputJenisKelamin" name="inputJenisKelamin">
                    @if( Session::get('jenis_kelamin')  == "Laki-laki" )
                      <option value="Laki-laki" selected>Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    @else
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan" selected>Perempuan</option>
                    @endif
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="jabatan" class="col-sm-4 control-label"><small>Jabatan</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputJabatan" name="inputJabatan" value="{{ Session::get('jabatan') }}" >
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Edit Data Pegawai</button>
              </div>
            </div>
        </form>
                @else
                  <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="createDataPegawai">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="nip" class="col-sm-4 control-label"><small>NIP</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputNIPPegawai" name="inputNIP" placeholder="Masukkan NIP">
                  <div id="messagewarning" style="font-size: 10px; padding-left: 5px; margin-top: 5px;">
                                                            
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="nama" class="col-sm-4 control-label"><small>Nama</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputNama" name="inputNama" placeholder="Masukkan Nama Lengkap">
              </div>
            </div>
            <div class="form-group">
              <label for="jenis_kelamin" class="col-sm-4 control-label"><small>Jenis Kelamin</small></label>
              <div class="col-sm-8">
                  <select class="form-control input-sm" name="inputJenisKelamin" name="inputJenisKelamin">
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="jabatan" class="col-sm-4 control-label"><small>Jabatan</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputJabatan" name="inputJabatan" placeholder="disesuaikan">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Tambah Data Pegawai</button>
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
                <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="filterDataPegawai">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          Cari Berdasarkan: 
                        <div class="form-group">
                          <select class="form-control input-sm" name="filter-kategori">
                            <option value="1">NIP</option>
                            <option value="2">Nama</option>
                            <option value="3">Jenis Kelamin</option>
                            <option value="4">Jabatan</option>
                          </select>
                        </div>  
                          <div class="form-group">
                            <input type="text" class="form-control input-sm" id="keyword" name="keyword-pencarian" placeholder="Kata Kunci Pencarian">
                        </div>  
                          <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></button>
                          <a href="pegawai" class="btn btn-warning btn-sm">Reset Tabel</a>
                      </form>
        </td>
        <td width="35%" style="text-align: right;">
                        <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="exportDataPegawai">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-download-alt"></button>
                          </form>
                      </td>
        </tr>
        </table>
				<div class="table-responsive" style="margin-top: 10px;">
          <small>
					<table class="table table-bordered table-hover table-striped" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>NIP</th>
								<th>Nama</th>
                <th>Jenis Kelamin</th>
								<th>Jabatan</th>
                <th>Aksi</th>
							</tr>
						</thead>
						<tbody>
              <?php $no = 1; ?>
              @if($datapegawai->count() > 0)
                @foreach($datapegawai as $pegawai)
                  <tr>
                    <td style="text-align:right;">{{ $no++ }}</td>
                    <td>{{ $pegawai->nip }}</td>
                    <td>{{ $pegawai->nama }}</td>
                    <td>{{ $pegawai->jenis_kelamin }}</td>
                    <td>{{ $pegawai->jabatan }}</td>
                    <td style="text-align:center;"><a href="selectDataPegawai/{{$pegawai->id}}" class="btn btn-xs btn-warning" title="Edit Data"><span class="glyphicon glyphicon-pencil"></span></a> <a href="hapusDataPegawai/{{$pegawai->id}}" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="btn btn-xs btn-danger" title="Hapus Data"><span class="glyphicon glyphicon-remove"></span></a></td>
                  </tr>                  
                @endforeach
              @else
                  <tr>
                    <td colspan="6" style="text-align: center"><i>Belum ada data pegawai</i></td>
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