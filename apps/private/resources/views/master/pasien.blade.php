@extends('template/t_index')        
@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-md-3 well">
                <h4>Masukan Data Pasien</h4>
                @if(Session::has('select'))
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="updateDataPasien">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_pasien" value="{{ Session::get('id') }}">
            <div class="form-group">
              <label for="no_resep" class="col-sm-4 control-label"><small>No. RM</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm " id="inputID" name="inputID" value="{{ Session::get('id_pasien') }}" disabled>
              </div>
            </div>
            <div class="form-group">
              <label for="nama_kk" class="col-sm-4 control-label"><small>Nama</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputNama" name="inputNama" value="{{ Session::get('nama') }}" required>
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
              <label for="tempatlahir" class="col-sm-4 control-label"><small>Tempat Lahir</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputTempatLahir" name="inputTempatLahir" value="{{ Session::get('tempat_lahir') }}" required>
              </div>
            </div>
            <div class="form-group">
              <label for="tanggal_lahir" class="col-sm-4 control-label"><small>Tanggal Lahir</small></label>
              <div class="col-sm-8">
                  <input type="date" class="form-control input-sm" id="inputTanggalLahir" name="inputTanggalLahir" value="{{ Session::get('tanggal_lahir') }}" required>
              </div>
            </div>
            <div class="form-group">
              <label for="telepon" class="col-sm-4 control-label"><small>Telepon</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputTelepon" name="inputTelepon" value="{{ Session::get('telepon') }}" required>
              </div>
            </div>
            <div class="form-group">
              <label for="telepon" class="col-sm-4 control-label"><small>Alamat</small></label>
              <div class="col-sm-8">
                  <textarea class="form-control input-sm" required name="inputAlamat" id="inputAlamat" required>{{ Session::get('alamat') }}</textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="asuransi" class="col-sm-4 control-label"><small>Asuransi</small></label>
              <div class="col-sm-8">
                  <select class="form-control input-sm" name="inputAsuransi" name="inputAsuransi">
                    @if( Session::get('asuransi')  == "Mandiri" )
                      <option value="Mandiri" selected>Mandiri</option>
                      <option value="BPJS Kesehatan">BPJS Kesehatan</option>
                      <option value="Jaminan Kesehatan Lain">Lainnya</option>
                    @elseif( Session::get('asuransi')  == "BPJS Kesehatan" )
                      <option value="Mandiri">Mandiri</option>
                      <option value="BPJS Kesehatan" selected>BPJS Kesehatan</option>
                      <option value="Jaminan Kesehatan Lain">Lainnya</option>
                    @else
                      <option value="Mandiri">Mandiri</option>
                      <option value="BPJS Kesehatan">BPJS Kesehatan</option>
                      <option value="Jaminan Kesehatan Lain" selected>Lainnya</option>
                    @endif
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Edit Data Pasien</button>
              </div>
            </div>
        </form>
                @else
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="createDataPasien">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="no_resep" class="col-sm-4 control-label"><small>No. RM</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm " id="inputIDPasien" name="inputID" placeholder="disesuaikan" required>
                  <div id="messagewarning" style="font-size: 10px; padding-left: 5px; margin-top: 5px;">
                                                            
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="nama_kk" class="col-sm-4 control-label"><small>Nama</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputNama" name="inputNama" placeholder="disesuaikan" required>
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
              <label for="tempatlahir" class="col-sm-4 control-label"><small>Tempat Lahir</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputTempatLahir" name="inputTempatLahir" placeholder="disesuaikan" required>
              </div>
            </div>
            <div class="form-group">
              <label for="tanggal_lahir" class="col-sm-4 control-label"><small>Tanggal Lahir</small></label>
              <div class="col-sm-8">
                  <input type="date" class="form-control input-sm" id="inputTanggalLahir" name="inputTanggalLahir" placeholder="YYYY-BB-TT" required>
              </div>
            </div>
            <div class="form-group">
              <label for="telepon" class="col-sm-4 control-label"><small>Telepon</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputTelepon" name="inputTelepon" placeholder="contoh: 081234567890" required>
              </div>
            </div>
            <div class="form-group">
              <label for="telepon" class="col-sm-4 control-label"><small>Alamat</small></label>
              <div class="col-sm-8">
                  <textarea class="form-control input-sm" required name="inputAlamat" id="inputAlamat"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="asuransi" class="col-sm-4 control-label"><small>Asuransi</small></label>
              <div class="col-sm-8">
                  <select class="form-control input-sm" name="inputAsuransi" name="inputAsuransi">
                    <option value="Mandiri">Mandiri</option>
                    <option value="BPJS Kesehatan">BPJS Kesehatan</option>
                    <option value="Jaminan Kesehatan Lain">Lainnya</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right" onsubmit="return checkDuplicate(document.getElementById('inputID').value);">Tambah Data Pasien</button>
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
                    <td>
                <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="filterDataPasien">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          Cari Berdasarkan: 
                        <div class="form-group">
                          <select class="form-control input-sm" name="filter-kategori">
                            <option value="1">ID Pasien</option>
                            <option value="2">Nama Pasien</option>
                            <option value="3">Jenis Kelamin</option>
                            <option value="4">Tempat Lahir</option>
                            <option value="5">Tanggal Lahir</option>
                            <option value="6">Alamat</option>
                            <option value="7">Telepon</option>
                          </select>
                        </div>  
                          <div class="form-group">
                            <input type="text" class="form-control input-sm" id="keyword" name="keyword-pencarian" placeholder="Kata Kunci Pencarian">
                        </div>  
                          <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></button>
                          <a href="pasien" class="btn btn-warning btn-sm">Reset Tabel</a>
                      </form>
        </td>
        <td width="35%" style="text-align: right;">
                        <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="exportDataPasien">
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
								<th style="vertical-align: middle;">No</th>
								<th style="vertical-align: middle;">RM</th>
								<th style="vertical-align: middle;">Nama</th>
								<th style="vertical-align: middle;">Jenis Kelamin</th>
								<th style="vertical-align: middle;">Tempat, Tanggal lahir</th>
                <th style="vertical-align: middle;">Alamat</th>
								<th style="vertical-align: middle;">Telepon</th>
                <th style="vertical-align: middle;">Asuransi</th>
                <th style="vertical-align: middle;">Aksi</th>
							</tr>
						</thead>
						<tbody>
              <?php $no = 1; ?>
              @if($datapasien->count() > 0)
                @foreach($datapasien as $pasien)
                  <tr>
                    <td style="text-align:right;">{{ $no++ }}</td>
                    <td>{{ $pasien->id_pasien }}</td>
                    <td>{{ $pasien->nama }}</td>
                    <td>{{ $pasien->jenis_kelamin }}</td>
                    <td>{{ $pasien->tempat_lahir }},{{ $pasien->tanggal_lahir }}</td>
                    <td>{{ $pasien->alamat }}</td>
                    <td>{{ $pasien->telepon }}</td>
                    <td>{{ $pasien->jaminan }}</td>
                    <td style="text-align:center;"><a href="selectDataPasien/{{$pasien->id}}" class="btn btn-xs btn-warning" title="Edit Data"><span class="glyphicon glyphicon-pencil"></span></a> <a href="hapusDataPasien/{{$pasien->id}}" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="btn btn-xs btn-danger" title="Hapus Data"><span class="glyphicon glyphicon-remove"></span></a></td>
                  </tr>                  
                @endforeach
              @else
                  <tr>
                    <td colspan="8" style="text-align: center"><i>Belum ada data pasien</i></td>
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