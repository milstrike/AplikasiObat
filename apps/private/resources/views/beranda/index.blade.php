@extends('template/t_index')        
@section('content')
 
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-md-12 well">
                <h3>Hai, {{ Session::get('namauser') }}</h3>
                <h4>Selamat datang di aplikasi Sistem Informasi Pengelolaan Data Obat Puskesmas Umbulharjo II Yogyakarta</h4>
            </div>
            <div class="col-lg-12">
                <legend>Status Stok Obat di bawah 90 (per satuan)</legend>
                <small>
                <table class="table table-bordered table-hover table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Obat</th>
                            <th>Nama Obat</th>
                            <th>Sisa Stok</th>
                        </tr>
                    </thead>
                    <?php $no = 1; ?>
                    <tbody>
                    @if($dataObat -> count() > 0)
                        @foreach($dataObat as $do)
                            <tr>
                                <td style="text-align: right;">{{ $no ++}}</td>
                                <td>{{ $do -> id_obat}}</td>
                                <td>{{ $do -> obat}}</td>
                                <td style="text-align: right;">{{ $do -> stok}}</td>
                            </tr>    
                        @endforeach
                    @else
                            <tr>
                                <td style="text-align: center" colspan="4"><em>Tidak ada obat dengan stok dibawah 90 (per satuan)</em></td>
                            </tr>
                    @endif
                    </tbody>
                </table>
            </small>
            </div>
        </div>
    </div>
@endsection