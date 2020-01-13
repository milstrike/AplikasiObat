@extends('template/t_index2')        
@section('content')
 
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <p align="center"><img src ="{{{ asset('images/logo.png') }}}" style="text-align: center"></p>
                <h3 style="text-align: center;">Aplikasi Sistem Informasi Pengelolaan Data Obat</h3>
                <h4 style="text-align: center; margin-bottom: 20px;">Puskesmas Umbulharjo II Yogyakarta</h4>
                <div class="well" style="background-color: #ffffff; margin-left: 15%; margin-right: 15%;">
                    <h3>Login ke Aplikasi</h3>
                    <form method="POST" enctype="multipart/form-data" action="login">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        @if(Session::has('message'))
                        <span class="text-danger">{{ Session::get('message') }}</span><br/>
                        @endif
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection
