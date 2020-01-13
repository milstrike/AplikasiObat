<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Aplikasi Manajemen Obat Puskesmas Umbulharjo II</title>
        <link rel="shortcut icon" href="{{{ asset('images/logo.png') }}}">
        <link rel="stylesheet" href="{{{ asset('css/bootstrap.min.css') }}}" media="screen">
        <link rel="stylesheet" href="{{{ asset('css/custom.css') }}}" media="screen">
  </script>
    </head>
    <body>
    @yield('content')
    @yield('modalcontent1')
    @yield('modalcontent2')
    @yield('modalcontent3')
    <script src="{{{ asset('js/jquery.js') }}}"></script>
    <script src="{{{ asset('js/bootstrap.min.js') }}}"></script>
    <script src="{{{ asset('js/datalist.js') }}}"></script>
    </body>
</html>