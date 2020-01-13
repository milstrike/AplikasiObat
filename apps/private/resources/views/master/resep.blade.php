@extends('template/t_index')        
@section('content')

<?php $namaPasien = ""; $umurPasien = ""; $noRM = "";?>
 
        <div class="row">
            <div class="col-md-4">

              <div style="margin-left: 10px;">
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

                    <div>
                      @if($selectResep -> count() > 0)
                        <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="../filterDataResep">   
                      @else
                        <form class="form-inline" role="form" method="POST" enctype="multipart/form-data" action="filterDataResep">
                      @endif      
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          Cari Berdasarkan: <br/>
                        <div class="form-group">
                          <select class="form-control input-sm" name="filter-kategori">
                            <option value="1">No Resep</option>
                            <!-- <option value="2">Tanggal</option> -->
                            <option value="3">Nama Pasien</option>
                            <!-- <option value="4">Umur</option>
                            <option value="5">Dokter</option>
                            <option value="6">Nama Obat</option>
                            <option value="7">Dosis Obat</option> -->
                          </select>
                        </div>  
                          <div class="form-group">
                            <input type="text" class="form-control input-sm" id="keyword" name="keyword-pencarian" placeholder="Kata Kunci Pencarian">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span></button>
                          @if($selectResep -> count() > 0)
                            <a href="../resep" class="btn btn-warning btn-sm" title="Reset Table"><span class="glyphicon glyphicon-refresh"></span></a>
                            <a href="../exportDataResep" class="btn btn-info btn-sm" title="Reset Table"><span class="glyphicon glyphicon-download-alt"></span></a>
                          @else
                            <a href="resep" class="btn btn-warning btn-sm" title="Reset Table"><span class="glyphicon glyphicon-refresh"></span></a>
                            <a href="exportDataResep" class="btn btn-info btn-sm" title="Reset Table"><span class="glyphicon glyphicon-download-alt"></span></a>
                          @endif
                        </div>
                        </form>
                    </div>
        </tr>
        </table>
        <div class="table-responsive table-striped table-hover" style="margin-top: 10px;">
          <small>
          <table class="table table-bordered" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>No.RM</th>
                <!-- <th>Tanggal</th> -->
                <th>Nama</th>
                <!-- <th>Umur</th>
                <th>Obat</th>
                <th>No. Batch</th>
                <th>Dosis</th>
                <th>Catatan</th>
                <th>Dokter</th>
                <th>Asuransi</th> -->
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              @if($dataresep -> count() > 0)
                @foreach($dataresep as $resep)
                @if($selectResep -> count() > 0)
                    @if($selectResep -> first() -> no_resep == $resep->no_resep)
                      <tr style="background-color: #CCFFFF;">
                      <?php $noRM = $resep->no_resep; $namaPasien = $resep->no_resep; ?>
                    @else
                      <tr>
                    @endif
                @else
                  <tr>
                @endif
                  <td style="text-align: right;">{{ $no++ }}</td>
                  <td>{{ $resep->no_resep }}</td>
                  <td>
                  @if($datapasien -> count() > 0)
                    @foreach($datapasien as $listpasien)
                      @if( $resep->no_resep == $listpasien->id_pasien)
                        {{ $listpasien -> nama }}
                      @else                        
                      @endif
                    @endforeach
                  @else
                  @endif
                  </td>
                  
                  <td style="text-align: center">
                  @if($selectResep -> count() > 0)
                    <a href="../hapusDataResep/{{ $resep->no_resep }}" onclick="return confirm('Anda yakin ingin seluruh resep dengan No RM ini?');" title="Hapus Data Resep"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
                    <a href="../selectResep/{{ $resep->no_resep }}" title="Tampilkan Rekap Resep"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;
                    <!-- <a href="../cetakLabelResep/{{ $resep->no_resep }}" onclick="window.open('../cetakLabelResep/{{ $resep->no_resep }}', 'Cetak Label Resep', 'width=500, height=600'); return false;" title="Cetak Label"><span class="glyphicon glyphicon-print"></span></a> -->
                  @else
                    <a href="hapusDataResep/{{ $resep->no_resep }}" onclick="return confirm('Anda yakin ingin seluruh resep dengan No RM ini?');" title="Hapus Data Resep"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
                    <a href="selectResep/{{ $resep->no_resep }}" title="Tampilkan Rekap Resep"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;
                    <!-- <a href="cetakLabelResep/{{ $resep->no_resep }}" onclick="window.open('cetakLabelResep/{{ $resep->no_resep }}', 'Cetak Label Resep', 'width=500, height=600'); return false;" title="Cetak Label"><span class="glyphicon glyphicon-print"></span></a> -->
                  @endif
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                <td colspan="11" style="text-align: center"><i>Belum ada data Resep</i></td>
              </tr>
              @endif
            </tbody>
          </table>
          </small>

          </div>                        
            </div>
       </div>     

        <div class="col-md-8">
          @if($selectResep -> count() > 0)
            <div style="margin-left: 10px; margin-right;">
              <legend><strong>Rekap Resep</strong> | <strong>No. RM: </strong> {{ $noRM }} | <strong>Nama: </strong>

                @if($datapasien -> count() > 0)
                    @foreach($datapasien as $listpasien)
                      @if( $namaPasien == $listpasien->id_pasien)
                        {{ $listpasien -> nama }}
                      @else                        
                      @endif
                    @endforeach
                  @else
                  @endif


               | <strong>Umur:</strong>  {{ $selectResep -> last() -> umur }} tahun
              </legend>
              <table class="table table-bordered" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Obat</th>
                <th>No. Batch</th>
                <th>Dosis</th>
                <th>Catatan</th>
                <th>Dokter</th>
                <th>Asuransi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $nox = 1; ?>
              @if($selectResep -> count() > 0)
                @foreach($selectResep as $sr)
                  <td style="text-align: right;">{{ $nox++ }}</td>
                  <td>{{ $sr->tanggal }}</td>
                  <td>{{ $sr->nama_obat }}</td>
                  <td>{{ $sr->no_batch}}</td>
                  <td style="text-align: right;">{{ $sr->dosis }}</td>
                  <td>{{ $sr->keterangan }}</td>
                  <td>{{ $sr->dokter }}</td>
                  <td>{{ $sr->asuransi }}</td>
                  
                  <td style="text-align: center">
                  <!-- <a href="hapusDataResep/{{ $resep->no_resep }}" onclick="return confirm('Anda yakin ingin seluruh resep dengan No RM ini?');" title="Hapus Data Resep"><span class="glyphicon glyphicon-remove"></span></a>&nbsp;
                  <a href="selectResep/{{ $resep->no_resep }}" title="Tampilkan Rekap Resep"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp; -->
                  <a href="../cetakLabelResep/{{ $sr->id }}" onclick="window.open('../cetakLabelResep/{{ $sr->id }}', 'Cetak Label Resep', 'width=500, height=600'); return false;" title="Cetak Label"><span class="glyphicon glyphicon-print"></span></a>
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                <td colspan="11" style="text-align: center"><i>Belum ada data Resep</i></td>
              </tr>
              @endif
            </tbody>
          </table>
            </div>
          @else
            <div style="text-align: center; margin-top: 50px;">
              <h1 style="color: #D8D8D8;">Pilih Salah Satu No.RM</h1>
            </div>
          @endif
        </div>
@endsection