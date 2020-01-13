@extends('template/t_index')        
@section('content')
 
    <div class="container">
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
        <div class="row well">
            <div class="col-md-6">
                <h4>Pengaturan Profil</h4>
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="updateAkunPegawai">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  					<div class="form-group">
    					<label for="nip" class="col-sm-4 control-label"><small>NIP</small></label>
    					<div class="col-sm-8">
      						<input type="text" class="form-control input-sm	" id="inputNIP" name="inputNIP" value="{{ $datapegawai->first()->nip }}" disabled>
    					</div>
  					</div>
            		<div class="form-group">
              			<label for="nama" class="col-sm-4 control-label"><small>Nama</small></label>
              			<div class="col-sm-8">
                  			<input type="text" class="form-control input-sm" id="inputNama" name="inputNama" value="{{ $datapegawai->first()->nama }}" required>
              			</div>
            		</div>
  					<div class="form-group">
    					<label for="jabatan" class="col-sm-4 control-label"><small>Jabatan</small></label>
    					<div class="col-sm-8">
      						<input type="text" class="form-control input-sm" id="inputJabatan" name="inputJabatan" value="{{ $datapegawai->first()->jabatan }}" disabled>
    					</div>
  					</div>
  					<div class="form-group">
    					<label for="jenis_kelamin" class="col-sm-4 control-label"><small>Jenis Kelamin</small></label>
    					<div class="col-sm-8">
  								<input type="text" class="form-control input-sm" id="inputJenisKelamin" name="inputJenisKelamin" value="{{ $datapegawai->first()->jenis_kelamin }}" disabled>
						</div>
  					</div>
  					<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-10">
      						<button type="submit" class="btn btn-primary btn-sm pull-right">Simpan Pengaturan Profil</button>
    					</div>
  					</div>
				</form>
            </div>
            <div class="col-md-6">
                <h4>Pengaturan Akun</h4>
                <form class="form-horizontal" role="form">
  					<div class="form-group">
    					<label for="username" class="col-sm-4 control-label"><small>Username</small></label>
    					<div class="col-sm-8">
      						<input type="text" class="form-control input-sm	" id="inputUsername" name="inputUsername" value="{{ $datauser->first()->username }}" disabled>
    					</div>
  					</div>
				</form>
				<legend></legend>
				<h4>Mengganti Password</h4>
  				<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="updateAkun">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  					<div class="form-group">
    					<label for="oldpassword" class="col-sm-4 control-label"><small>Password lama</small></label>
    					<div class="col-sm-8">
      						<input type="password" class="form-control input-sm	" id="inputOldPassword" name="inputOldPassword">
    					</div>
  					</div>
            		<div class="form-group">
              			<label for="newpassword" class="col-sm-4 control-label"><small>Password Baru</small></label>
              			<div class="col-sm-8">
                  			<input type="password" class="form-control input-sm" id="inputNewPassword" name="inputNewPassword" >
              			</div>
            		</div>
  					<div class="form-group">
    					<label for="newpassword1" class="col-sm-4 control-label"><small>Ulangi Password</small></label>
    					<div class="col-sm-8">
      						<input type="password" class="form-control input-sm" id="inputNewPassword1" name="inputNewPassword1">
    					</div>
  					</div>
  					<div class="form-group">
    					<div class="col-sm-offset-2 col-sm-10">
      						<button type="submit" class="btn btn-primary btn-sm pull-right">Simpan Pengaturan Akun</button>
    					</div>
  					</div>
  				</form>
            </div>
        </div>
    </div>
@endsection