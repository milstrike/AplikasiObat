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
        <link rel="stylesheet" href="{{{ asset('css/dropdown.css') }}}" media="screen">
          <script type="text/javascript">
    function cloneRow() {
      var row = document.getElementById("rowToClone"); // find row to copy
      var table = document.getElementById("tableToModify"); // find table to append to
      var clone = row.cloneNode(true); // copy children too
      clone.id = "newID"; // change id or other attributes/contents
      table.appendChild(clone); // add new row to end of table
      document.getElementById('inputObat').value = "";
      document.getElementById('inputDosis').value = "";
      document.getElementById('inputCatatan').value = "";
      document.getElementById('messagewarning').innerHTML=""; 
      document.getElementById('messagewarning2').innerHTML=""; 
    }

    function createRow() {
      var row = document.createElement('tr'); // create row node
      var col = document.createElement('td'); // create column node
      var col2 = document.createElement('td'); // create second column node
      row.appendChild(col); // append first column to row
      row.appendChild(col2); // append second column to row
      col.innerHTML = "qwe"; // put data in first column
      col2.innerHTML = "rty"; // put data in second column
      var table = document.getElementById("tableToModify"); // find table to append to
      table.appendChild(row); // append row to table
    }

    function deleteRow(btn) {
      var rowCount = $('#tableobat tr').length;
      if(rowCount < 3){

      }
      else{
        var row = document.getElementById("newID");
        row.parentNode.removeChild(row);  
      }
      
    }

    function makeid()
    {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for( var i=0; i < 10; i++ ){
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        }
        text = "RSP" + text
        document.getElementById("inputID").value = text;
    }

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

  function checkDuplicate(valuesX){
    $('td:first-child').each(function() {
        if (valuesX == $(this).text()){
          alert("ID Sudah Digunakan");
        }
    });
  }
  </script>

    </head>
    <body style="overflow-y: scroll; overflow-x: hidden;">
    <nav class="navbar navbar-default" role="navigation">
  <div id="Intro" width="100%">
      <table width="100%" border="0" style="margin:20px;">
          <tr>
              <td width="33%" style="padding-top:5px;"><p align="right"><img src="{{{ asset('images/logo.png') }}}" width="40"></p></td>
              <td width="33%"><h4 style="margin:0; padding:0; text-align: center;">SISTEM INFORMASI PENGELOLAAN DATA OBAT <br/>PUSKESMAS UMBULHARJO II YOGYAKARTA</h4></td>
              <td width="34%"></td>
          </tr>
      </table>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-inverse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li {{ $beranda }}><a href="<?php echo url('/'); ?>/beranda"><span class="glyphicon glyphicon-home"></span></a></li>
      <li class="dropdown {{ $indukdata }}">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master Data <b class="caret"></b></a>
        <ul class="dropdown-menu multi-level">
          <li class="dropdown-submenu">
            <a tabindex="-1" href="#">Data Puskesmas</a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo url('/'); ?>/dokter">Data Dokter</a></li>
              <li><a href="<?php echo url('/'); ?>/poli">Data Poli</a></li>
              <li><a href="<?php echo url('/'); ?>/pasien">Data Pasien</a></li>
              <li><a href="<?php echo url('/'); ?>/pegawai">Data Pegawai</a></li>
              <li><a href="<?php echo url('/'); ?>/user">Data User</a></li>
              <li><a href="<?php echo url('/'); ?>/resep">Data Resep</a></li>
            </ul>
          </li>
          <li class="divider"></li>
            <li class="dropdown-submenu">
              <a tabindex="-1" href="#">Data Obat</a>
              <ul class="dropdown-menu">
                  <li><a href="<?php echo url('/'); ?>/datakemasan">Data Satuan Kemasan</a></li>
                  <li><a href="<?php echo url('/'); ?>/datasatuan">Data Satuan</a></li>
                  <li><a href="<?php echo url('/'); ?>/dataobat">Data Obat</a></li>
                  <li><a href="<?php echo url('/'); ?>/letakobat">Letak Obat</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo url('/'); ?>/datakedaluarsa">Penyimpanan obat</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo url('/'); ?>/kartustok">Kartu Stok Obat</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo url('/'); ?>/supplier">Data Supplier Obat</a></li>
              </ul>
            </li>
        </ul>
      </li>
      <li {{ $penerimaanresep }}><a href="<?php echo url('/'); ?>/penerimaanresep">Penerimaan Resep</a></li>
      <li {{ $permintaan }}><a href="<?php echo url('/'); ?>/permintaan">Permintaan</a></li>
      <li {{ $penerimaan }}><a href="<?php echo url('/'); ?>/penerimaan">Penerimaan</a></li>
      <li {{ $retur }}><a href="retur">Retur & Bon</a></li>
      <li class="dropdown {{ $laporan }}">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan - Laporan <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo url('/'); ?>/pemakaian">Pemakaian</a></li>
          <li><a href="<?php echo url('/'); ?>/laporan">Laporan LPLPO</a></li>
          <li><a href="<?php echo url('/'); ?>/laporantransaksi">Laporan Transaksi</a></li>
      </ul>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown {{ $akun }}">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akun <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo url('/'); ?>/akun">Konfigurasi Akun</a></li>
          <li><a href="<?php echo url('/'); ?>/logout">Logout</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
</div>
    @yield('content')
    @yield('modalcontent1')
    @yield('modalcontent2')
    @yield('modalcontent3')
    <script src="{{{ asset('js/jquery.js') }}}"></script>
    <script src="{{{ asset('js/bootstrap.min.js') }}}"></script>
    <script src="{{{ asset('js/datalist.js') }}}"></script>
    <script src="{{{ asset('js/validator.js') }}}"></script>
    </body>
</html>