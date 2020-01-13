@extends('template/t_index')        
@section('content')
 
    <div class="container">
        <div class="row">
            <div class="col-md-3 well">
                <h4>Masukan Data Supplier</h4>
                @if(Session::has('select'))
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="updateDataSupplier">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="id_supplier" value="{{ Session::get('id') }}">
            <div class="form-group">
              <label for="id_supplier" class="col-sm-4 control-label"><small>ID Supplier</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm " id="inputIDSupplier" name="inputIDSupplier" value="{{ Session::get('id_supplier') }}" required>
              </div>
            </div>
            <div class="form-group">
              <label for="supplier" class="col-sm-4 control-label"><small>Supplier</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputSupplier" name="inputSupplier" value="{{ Session::get('supplier') }}" required>
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
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Edit Data Supplier</button>
              </div>
            </div>
        </form>
                @else
                <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="createDataSupplier">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="id_supplier" class="col-sm-4 control-label"><small>ID Supplier</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm " id="inputIDSupplier" name="inputIDSupplier" placeholder="disesuaikan" required>
                  <div id="messagewarning" style="font-size: 10px; padding-left: 5px; margin-top: 5px;">
                                                            
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="supplier" class="col-sm-4 control-label"><small>Supplier</small></label>
              <div class="col-sm-8">
                  <input type="text" class="form-control input-sm" id="inputSupplier" name="inputSupplier" placeholder="disesuaikan" required>
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
                  <button type="submit" class="btn btn-primary btn-sm pull-right">Tambah Data Supplier</button>
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
                <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="filterDataSupplier">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          Cari Berdasarkan: 
                        <div class="form-group">
                          <select class="form-control input-sm" name="filter-kategori">
                            <option value="1">ID Supplier</option>
                            <option value="2">Supplier</option>
                            <option value="3">Alamat</option>
                            <option value="4">Telepon</option>
                          </select>
                        </div>  
                          <div class="form-group">
                            <input type="text" class="form-control input-sm" id="keyword" name="keyword-pencarian" placeholder="Kata Kunci Pencarian">
                        </div>  
                          <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></button>
                          <a href="supplier" class="btn btn-warning btn-sm">Reset Tabel</a>
                      </form>
        </td>
        <td width="35%" style="text-align: right;">
                        <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="exportDataSupplier">
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
								<th>ID Supplier</th>
								<th>Supplier</th>
								<th>Alamat</th>
								<th>Telepon</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
              <?php $no = 1; ?>
              @if($datasupplier -> count() > 0)
                @foreach($datasupplier as $supplier)
                  <tr>
                    <td style="text-align: right;">{{ $no++ }}</td>
                    <td>{{ $supplier -> id_supplier }}</td>
                    <td>{{ $supplier -> supplier }}</td>
                    <td>{{ $supplier -> alamat }}</td>
                    <td>{{ $supplier -> telepon }}</td>
                    <td style="text-align: center"><a href="selectDataSupplier/{{ $supplier->id }}" class="btn btn-xs btn-warning" title="Edit Data"><span class="glyphicon glyphicon-pencil"></span></a> <a href="hapusDataSupplier/{{ $supplier->id }}" onclick="return confirm('Anda yakin ingin menghapus data ini?');" class="btn btn-xs btn-danger" title="Hapus Data"><span class="glyphicon glyphicon-remove"></span></a></td>
                  </tr>
                @endforeach
              @else
                <tr>
                    <td colspan="6" style="text-align: center"><i>Belum ada data supplier</i></td>
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