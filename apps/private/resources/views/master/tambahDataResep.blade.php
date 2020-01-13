@extends('template/t_index2')        
@section('content')
 
    <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
          <h4>Tambah Data Resep</h4>
          <div class="well">
            <form role="form" method="POST" enctype="multipart/form-data" action="createDataResep">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="id_resep" >No.Resep</label>
              <input type="text" class="form-control  " id="inputID" name="inputID" placeholder="disesuaikan">
            </div>
            <div class="form-group">
              <label for="tanggal" >Tanggal</label>
                  <input type="date" class="form-control " id="inputTanggal" name="inputTanggal" placeholder="YYYY-BB-TT">
            </div>

            <div class="form-group">
              <label for="test">Test</label>
              <input type="text" class="form-control" data-provide="typeahead" name="test_input" autocomplete="off">
              <script type="text/javascript">
                    jQuery(document).ready(function() {   
                      $('#test_input').typeahead({
                        source: [
                                  {id: "someId1", name: "Display name 1"},
                                  {id: "someId2", name: "Display name 2"}
                                ],
                        })
                      });
              </script>
            </div>

            <div class="form-group">
              <label for="nama" >Nama</label>
                  <select name="inputNama" class="form-control " multiple>
                    @if($datapasien->count() > 0)
                      @foreach($datapasien as $pasien)
                        <option value="{{ $pasien -> id_pasien }}">{{ $pasien -> nama }} - {{ $pasien -> id_pasien }}</option>
                      @endforeach
                    @else
                      <option value="0">Belum Ada data pasien</option>
                    @endif
                  </select>
            </div>
            <div class="form-group">
              <label for="obat" >Obat</label>
                  <select name="inputObat" class="form-control " multiple>
                    @if($dataobat->count() > 0)
                      @foreach($dataobat as $obat)
                        <option value="{{ $obat -> obat }}">{{ $obat -> obat }}</option>
                      @endforeach
                    @else
                      <option value="0">Belum Ada data obat</option>
                    @endif
                  </select>
            </div>
            <div class="form-group">
              <label for="dosis" >Dosis</label>
                  <input type="text" class="form-control " id="inputDosis" name="inputDosis" placeholder="dosis obat">
            </div>
            <div class="form-group">
              <label for="dokter" >Dokter</label>
                  <select name="inputDokter" class="form-control " multiple>
                    @if($datadokter->count() > 0)
                      @foreach($datadokter as $dokter)
                        <option value="{{ $dokter -> nama }}">{{ $dokter -> nama }}</option>
                      @endforeach
                    @else
                      <option value="0">Belum Ada data pasien</option>
                    @endif
                  </select>
            </div>
            <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-xs pull-right">Tambah Data Resep</button>
            </div>
        </form>
          </div>
          </div>
          <div class="col-md-3"></div>
        </div>
    </div>
@endsection