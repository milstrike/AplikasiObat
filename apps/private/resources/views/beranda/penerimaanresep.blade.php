@extends('template/t_index')        
@section('content')
 
    <div class="container" style="margin-top: 20px">
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
                <div class="margin:5px;">
                  <small>
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="createDataResep" style="margin-left:0px;">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <table border="0" width="100%" class="table">
                    <tr>
                      <td width="15%">Tanggal</td>
                      <td width="85%"><div class="col-sm-5"><input type="text" class="form-control input-sm" id="inputTanggal" name="inputTanggal" value="<?php echo date("Y-m-d") ?>" readonly></div></td>
                    </tr>
                    <tr>
                      <td width="15%">Nama Pasien / No. RM</td>
                      <td width="85%">
                        <div class="col-sm-5">
                          <input type="text" list="inputNama" name="inputNama" class="form-control input-sm" required>
                            <datalist id="inputNama">
                              @if($datapasien->count() > 0)
                                @foreach($datapasien as $pasien)
                                  <option value="{{ $pasien -> id_pasien }}">{{ $pasien -> nama }} - {{ $pasien -> id_pasien }}</option>
                                @endforeach
                              @else
                                <option value="0">Belum Ada data pasien</option>
                              @endif
                            </datalist>
                        </div>                        
                      </td>
                    </tr>
                    <tr>
                      <td width="15%">Dokter</td>
                      <td width="85%">
                        <div class="col-sm-5">
                          <input type="text" list="inputDokter" name="inputDokter" class="form-control input-sm" required>
                            <datalist id="inputDokter">
                              @if($datadokter->count() > 0)
                                @foreach($datadokter as $dokter)
                                  <option value="{{ $dokter -> nama }}">{{ $dokter -> nama }}</option>
                                @endforeach
                              @else
                                <option value="0">Belum Ada data dokter</option>
                              @endif
                            </datalist>
                        </div>
                      </td>
                    </tr>
                    <tr>
                        <td width="15%">Asuransi</td>
                        <td width="85%">
                        <div class="col-sm-5">
                            <select name="asuransi" class="form-control input-sm">
                                <option value="Data Pasien">Sesuai Data Pasien</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="BPJS Kesehatan">BPJS Kesehatan</option>
                                <option value="Jaminan Kesehatan Lain">Lainnya</option>
                            </select>
                        </div>
                        </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <table class="table table-bordered table-responsive table-hover" width="100%" id="tableobat">
                          <thead>
                            <tr>
                              <th width="45%" style="vertical-align: middle;">Obat</th>
                              <th width="20%" style="vertical-align: middle;">Dosis</th>
                              <th width="30%" style="vertical-align: middle;">Catatan</th>
                              <th width="5%"><a href="#" title="Tambah Baris" onclick="cloneRow();" class="btn btn-xs btn-success" /><span class="glyphicon glyphicon-plus"></span></a></th>
                            </tr>
                          </thead>
                          <tbody id="tableToModify">
                            <tr id="rowToClone">
                              <td>
                                <div class="col-sm-12">
                                  <input type="text" list="obat-list" id="inputObat" name="inputObat[]" class="form-control input-sm" value="" placeholder="nama obat">
                                    <datalist id="obat-list">
                                      @if($dataobat->count() > 0)
                                        @foreach($dataobat as $obat)
                                          @if($obat -> stok < 1)
                                          @else
                                            <option value="{{ $obat -> obat }}">
                                          @endif
                                        @endforeach
                                      @else
                                          <option value="0">
                                      @endif
                                    </datalist>
                                  </div>
                              </td>
                              <td>
                                <div class="col-sm-12">
                                  <input type="text" class="form-control input-sm inputDosis" id="inputDosis" name="inputDosis[]" placeholder="dosis obat" value="" onfocus="if(this.value!='A new value') this.value='';">
                                  <div id="messagewarning" style="font-size: 10px; padding-left: 5px; margin-top: 5px;">
                                                          
                                </div>
                                <div id="messagewarning2" style="font-size: 10px; padding-left: 5px; margin-top: 5px;">
                                                          
                                </div>
                              </td>
                              <td>
                                <div class="col-sm-12">
                                  <textarea class="form-control input-sm inputCatatan" id="inputCatatan" name="inputCatatan[]" placeholder="Contoh: 3x1 setelah makan" value="" onfocus="if(this.value!='A new value') this.value='';"></textarea>
                                </div>
                              </td>
                              <td style="text-align: center;"><a href="#" title="Hapus baris ini" onclick="deleteRow(this)" class="btn btn-xs btn-danger"/><span class="glyphicon glyphicon-remove"></span></a></td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="pull-right">
                            <a href="resep" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-info-sign"></span> Lihat Data Resep</a>&nbsp;<button type="submit" class="btn btn-primary btn-sm">Simpan dan Cetak Data Resep</button>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </form>
              </small>  
                </div>
            </div>
        </div>
    </div>
@endsection