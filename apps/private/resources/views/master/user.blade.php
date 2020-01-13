@extends('template/t_index')        
@section('content')
 
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="{{ $activeUser }}"><a href="#user-manager" data-toggle="tab">Manajemen User</a></li>
  <li class="{{ $activeLog }}"><a href="#user-log" data-toggle="tab">Log User</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane {{ $activeUser }}" id="user-manager">

      <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-3 well">
                <h4>Masukan Data User</h4>
                @if(Session::has('select'))
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="updateDataUser">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_user" value="{{ Session::get('id') }}">
            <div class="form-group">
              <label for="id_user" class="col-sm-4 control-label"><small>ID User</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm " id="inputIDUser" name="inputIDUser" value="{{ Session::get('id_user') }}">
              </div>
            </div>
            <div class="form-group">
              <label for="username" class="col-sm-4 control-label"><small>Username</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputUsername" name="inputUsername" value="{{ Session::get('username') }}">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-4 control-label"><small>Password</small></label>
              <div class="col-sm-8">
                  <input type="password" class="form-control input-sm" id="inputPassword" name="inputPassword" required>
              </div>
            </div>
            <div class="form-group">
              <label for="nip" class="col-sm-4 control-label"><small>NIP</small></label>
              <div class="col-sm-8">
                  <select name="inputNIP" class="form-control input-sm">
                      @if($datapegawai->count() > 0)
                        @foreach($datapegawai as $pegawai)
                          @if($pegawai->nip == Session::get('nip'))
                          <option value="{{ $pegawai -> nip }}" selected>{{ $pegawai -> nip }}</option>
                          @else
                          <option value="{{ $pegawai -> nip }}">{{ $pegawai -> nip }}</option>
                          @endif
                        @endforeach
                      @else
                          <option value="0">Belum Ada Data Pegawai</option>
                      @endif
                  </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Edit Data User</button>
              </div>
            </div>
        </form>
                @else
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="createDataUser">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="id_user" class="col-sm-4 control-label"><small>ID User</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm " id="inputIDUser" name="inputIDUser" placeholder="ID User tidak boleh sama">
                  <div id="messagewarning" style="font-size: 10px; padding-left: 5px; margin-top: 5px;">
                                                            
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="username" class="col-sm-4 control-label"><small>Username</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputUsername" name="inputUsername" placeholder="disesuaikan">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="col-sm-4 control-label"><small>Password</small></label>
              <div class="col-sm-8">
                  <input type="password" class="form-control input-sm" id="inputPassword" name="inputPassword" placeholder="disesuaikan">
              </div>
            </div>
            <div class="form-group">
              <label for="nip" class="col-sm-4 control-label"><small>NIP</small></label>
              <div class="col-sm-8">
                  <select name="inputNIP" class="form-control input-sm">
                      @if($datapegawai->count() > 0)
                        @foreach($datapegawai as $pegawai)
                          <option value="{{ $pegawai -> nip }}">{{ $pegawai -> nip }}</option>
                        @endforeach
                      @else
                          <option value="0">Belum Ada Data Pegawai</option>
                      @endif
                  </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Tambah Data User</button>
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
                <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="filterDataUser">
                          Cari Berdasarkan: 
                        <div class="form-group">
                          <select class="form-control input-sm" name="filter-kategori">
                            <option value="1">ID User</option>
                            <option value="2">username</option>
                            <option value="3">NIP</option>
                          </select>
                        </div>  
                          <div class="form-group">
                            <input type="text" class="form-control input-sm" id="keyword" name="keyword-pencarian" placeholder="Kata Kunci Pencarian">
                        </div>  
                          <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></button>
                          <a href="user" class="btn btn-warning btn-sm">Reset Tabel</a>
                      </form>
				<div class="table-responsive" style="margin-top: 10px;">
          <small>
					<table class="table table-bordered" width="100%">
						<thead>
							<tr>
								<th>No</th>
								<th>ID User</th>
								<th>Username</th>
								<th>NIP</th>
                <th>Aksi</th>
							</tr>
						</thead>
						<tbody>
              <?php $no = 1;?>
              @if($datauser -> count() > 0)
                @foreach($datauser as $user)
                <tr>
                  <td style="text-align:right;">{{ $no++ }}</td>
                  <td>{{ $user->id_user }}</td>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->nip }}</td>
                  <td style="text-align:center;"><a href="selectDataUser/{{ $user->id }}" class="btn btn-xs btn-warning" title="Edit Data"><span class="glyphicon glyphicon-pencil"></span></a> <a href="hapusDataUser/{{ $user->id }}" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="btn btn-xs btn-danger" title="Hapus Data"><span class="glyphicon glyphicon-remove"></span></a></td>
                </tr>
                @endforeach
              @else
                <tr>
                <td colspan="5" style="text-align: center"><i>Belum ada data user</i></td>
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
  <div class="tab-pane {{ $activeLog }}" id="user-log">
    <div class="container" style="margin-top: 20px;">
      <div class="row">
        <div class="col-md-12">

          <div class="pull-right" style="margin-bottom: 10px;">

          <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="filterDataLog">
            <div class="form-group">
              <label class="sr-only" for="inputKategori">Kategori</label>
                 Kategori:
                  <select name="inputKategori" class="form-control input-sm" id="inputKategori">
                    <option value="1">ID User</option>
                    <option value="2">User Profile</option> 
                  </select>
            </div>

            <div class="form-group">
              <label class="sr-only" for="inputKeyword">Kata Kunci</label>
                Kata Kunci: <input type="text" class="form-control input-sm" id="inputKeyword" name="inputKeyword">
            </div>

            <div class="form-group">
              <label class="sr-only" for="startDate">Tanggal Awal</label>
                Tanggal Awal: <input type="date" class="form-control input-sm" id="startDate" name="startDate" placeholder="YYYY-MM-DD" value="<?php echo date("Y-m-d") ?>" required>
            </div>

            <div class="form-group">
              <label class="sr-only" for="endDate">Tanggal Akhir</label>
                Tanggal Akhir: <input type="date" class="form-control input-sm" id="endDate" name="endDate" placeholder="YYYY-MM-DD" value="<?php echo date("Y-m-d") ?>" required>
            </div>

          <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span></button>
          <a href="exportDataLog" class="btn btn-info btn-sm" title="Export tabel yang ditampilkan"><span class="glyphicon glyphicon-download"></a>
          <a data-toggle="modal" href="#bantuan" class="btn btn-warning btn-sm" title="Bantuan"><span class="glyphicon glyphicon-info-sign"></a>
          <a href="resetTableLog" class="btn btn-success btn-sm" title="Reset Table"><span class="glyphicon glyphicon-refresh"></a>
          <a href="removeLog" class="btn btn-danger btn-sm" title="Bersihkan Log" onclick="return confirm('Anda yakin ingin mengosongkan data log?');"><span class="glyphicon glyphicon-fire"></a>
        </form>
          </div>
          <small>
          <table class="table table-bordered table-hover table-striped" width="100%">
            <thead>
              <tr>
                <th style="vertical-align: middle;">No</th>
                <th style="vertical-align: middle;">Tanggal</th>
                <th style="vertical-align: middle;">ID User</th>
                <th style="vertical-align: middle;">User Profile</th>
                <th style="vertical-align: middle;">Aktivitas</th>
              </tr>
            </thead>
            <?php $no_log = 1;?>
            <tbody>
              @if($logdata -> count() > 0)
                @foreach($logdata as $log)
                  <tr>
                    <td style="text-align: right;">{{ $no_log++ }}</td>
                    <td>{{ $log -> tanggal }}</td>
                    <td>{{ $log -> id_user}}</td>
                    <td>{{ $log -> nama_user}}</td>
                    <td>{{ $log -> aktivitas}}</td>
                  </tr>
                @endforeach
              @else
                  <tr>
                    <td colspan="5" style="text-align: center;">Belum ada log</td>
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
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="bantuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Bantuan Manajemen Log</h4>
      </div>
      <div class="modal-body">
        <table class="table table-borderer table-striped" widht="100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Button</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="text-align: right">1</td>
              <td style="text-align: center"><span class="glyphicon glyphicon-search"></span></td>
              <td><i>Search Button</i>, selalu gunakan tombol ini untuk menampilkan hasil pencarian. Sebelum mengexport juga pastikan data yang dicari sudah ditampilkan dengan mengklik tombol ini.</td>
            </tr>
            <tr>
              <td style="text-align: right">2</td>
              <td style="text-align: center"><span class="glyphicon glyphicon-download"></span></td>
              <td><i>Export Button</i>, gunakan tombol ini untuk mengekspor hasil pencarian yang ditampilkan.</td>
            </tr>
            <tr>
              <td style="text-align: right">3</td>
              <td style="text-align: center"><span class="glyphicon glyphicon-info-sign"></span></td>
              <td><i>Info Button</i>, gunakan tombol ini untuk menampilkan bantuan.</td>
            </tr>
            <tr>
              <td style="text-align: right">4</td>
              <td style="text-align: center"><span class="glyphicon glyphicon-refresh"></span></td>
              <td><i>Refresh Button</i>, gunakan tombol ini untuk merefresh tampilan tabel.</td>
            </tr>
            <tr>
              <td style="text-align: right">5</td>
              <td style="text-align: center"><span class="glyphicon glyphicon-fire"></span></td>
              <td><i>Flush Button</i>, gunakan tombol ini untuk membersihkan tabel log. Seluruh isi tabel log akan bersih</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Tutup</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection