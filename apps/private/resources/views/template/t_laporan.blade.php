<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Aplikasi Manajemen Obat Puskesmas Umbulharjo II</title>
        <style type="text/css" media="print">
          .printButtonClass{ display : none }
        </style>
        <link rel="shortcut icon" href="{{{ asset('images/logo.png') }}}">
          <script type="text/javascript">
    function write_headers_to_excel() 
    {
    var a = document.createElement('a');
    //getting data from our div that contains the HTML table
    var data_type = 'data:application/vnd.ms-excel';
    var table_div = document.getElementById('tabel-laporan');
    var table_html = table_div.outerHTML.replace(/ /g, '%20');
    a.href = data_type + ', ' + table_html;
    //setting the file name
    a.download = 'laporan.xls';
    //triggering the function
    a.click();
    //just in case, prevent default behaviour
    e.preventDefault();
  }
  </script>

    </head>
    <body style="width: 100%; margin: 1mm 1mm 1mm 1mm;">
    
    @yield('content')
    @yield('modalcontent1')
    @yield('modalcontent2')
    @yield('modalcontent3')    
    </body>
</html>