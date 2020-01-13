<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//halaman awal - login
Route::get('/', 'obatcontroller@home');

//login
Route::post('/login', 'obatcontroller@login');

//logout
Route::get('/logout', 'obatcontroller@logout');

//beranda
Route::get('/beranda', 'obatcontroller@beranda');

//penerimaan resep
Route::get('/penerimaanresep', 'obatcontroller@penerimaanresep');


//data obat
Route::get('/dataobat', 'obatcontroller@dataobat');
//create data Obat
Route::post('createDataObat', 'obatcontroller@createDataObat');
//edit data Obat
Route::post('updateDataObat', 'obatcontroller@updateDataObat');
//select data Obat
Route::get('selectDataObat/{id}', 'obatcontroller@selectDataObat');
//delete data Obat
Route::get('hapusDataObat/{id}', 'obatcontroller@hapusDataObat');
//Export Data Obat
Route::post('exportDataObat', 'obatcontroller@exportDataObat');
//Filter Data Obat
Route::post('filterDataObat', 'obatcontroller@filterDataObatMain');

//data Satuan
Route::get('/datasatuan', 'obatcontroller@datasatuan');
//create data Satuan
Route::post('createDataSatuan', 'obatcontroller@createDataSatuan');
//edit data Satuan
Route::post('updateDataSatuan', 'obatcontroller@updateDataSatuan');
//select data Satuan
Route::get('selectDataSatuan/{id}', 'obatcontroller@selectDataSatuan');
//delete data Satuan
Route::get('hapusDataSatuan/{id}', 'obatcontroller@hapusDataSatuan');
//Export Data Satuan
Route::post('exportDataSatuan', 'obatcontroller@exportDataSatuan');
//Filter Data Satuan
Route::post('filterDataSatuan', 'obatcontroller@filterDataSatuanMain');


//data kemasan
Route::get('/datakemasan', 'obatcontroller@datakemasan');
//create data Kemasan
Route::post('createDataKemasan', 'obatcontroller@createDataKemasan');
//edit data Kemasan
Route::post('updateDataKemasan', 'obatcontroller@updateDataKemasan');
//select data Kemasan
Route::get('selectDataKemasan/{id}', 'obatcontroller@selectDataKemasan');
//delete data Kemasan
Route::get('hapusDataKemasan/{id}', 'obatcontroller@hapusDataKemasan');
//Export Data Kemasan
Route::post('exportDataKemasan', 'obatcontroller@exportDataKemasan');
//Filter Data Kemasan
Route::post('filterDataKemasan', 'obatcontroller@filterDataKemasanMain');


//data Kedaluarsa
Route::get('/datakedaluarsa', 'obatcontroller@datakedaluarsa');
//create data Stok
Route::post('createDataStokManualObat', 'obatcontroller@createDataStok');
//update data stok
Route::post('cekObatTerperiksa', 'obatcontroller@cekObatTerperiksa');
//hapus data stok
Route::get('hapusDataStok/{id}', 'obatcontroller@hapusDataStok');
//Filter data obat
Route::post('filterdaftarobat', 'obatcontroller@filterDataObat');

//kartu stok
Route::get('/kartustok', 'obatcontroller@kartustok');
//Export Kartu Stok
Route::post('filterdatakartustoklevel2', 'obatcontroller@filterDatakartuStokLevel2');
//Filter Data Kartu Stok
Route::post('filterDataKartuStok', 'obatcontroller@filterDataKartuStokMain');
//Cetak Kartu Stok
Route::get('cetarealakartustok', 'obatcontroller@cetakRealKartuStok');


//penyimpanan
Route::get('/letakobat', 'obatcontroller@letakobat');
//create data penyimpanan
Route::post('createDataPenyimpanan', 'obatcontroller@createDataPenyimpanan');
//edit data penyimpanan
Route::post('updateDataPenyimpanan', 'obatcontroller@updateDataPenyimpanan');
//select data penyimpanan
Route::get('selectDataPenyimpanan/{id}', 'obatcontroller@selectDataPenyimpanan');
//delete data penyimpanan
Route::get('hapusDataPenyimpanan/{id}', 'obatcontroller@hapusDataPenyimpanan');
//Export Data Penyimpanan
Route::post('exportDataPenyimpanan', 'obatcontroller@exportDataPenyimpanan');
//Filter Data Penyimpanan
Route::post('filterDataPenyimpanan', 'obatcontroller@filterDataPenyimpananMain');

//dokter
Route::get('/dokter', 'obatcontroller@dokter');
//create data Dokter
Route::post('createDataDokter', 'obatcontroller@createDataDokter');
//edit data Dokter
Route::post('updateDataDokter', 'obatcontroller@updateDataDokter');
//select data Dokter
Route::get('selectDataDokter/{id}', 'obatcontroller@selectDataDokter');
//delete data Dokter
Route::get('hapusDataDokter/{id}', 'obatcontroller@hapusDataDokter');
//Export Data Dokter
Route::post('exportDataDokter', 'obatcontroller@exportDataDokter');
//Filter Data Dokter
Route::post('filterDataDokter', 'obatcontroller@filterDataDokterMain');


//poli
Route::get('/poli', 'obatcontroller@poli');
//create data Poli
Route::post('createDataPoli', 'obatcontroller@createDataPoli');
//edit data Poli
Route::post('updateDataPoli', 'obatcontroller@updateDataPoli');
//select data Poli
Route::get('selectDataPoli/{id}', 'obatcontroller@selectDataPoli');
//delete data Poli
Route::get('hapusDataPoli/{id}', 'obatcontroller@hapusDataPoli');
//Export Data Poli
Route::post('exportDataPoli', 'obatcontroller@exportDataPoli');
//Filter Data Poli
Route::post('filterDataPoli', 'obatcontroller@filterDataPoliMain');

//pasien
Route::get('/pasien', 'obatcontroller@pasien');
//create data pegawai
Route::post('createDataPasien', 'obatcontroller@createDataPasien');
//edit data pegawai
Route::post('updateDataPasien', 'obatcontroller@updateDataPasien');
//select data pegawai
Route::get('selectDataPasien/{id}', 'obatcontroller@selectDataPasien');
//delete data pegawai
Route::get('hapusDataPasien/{id}', 'obatcontroller@hapusDataPasien');
//Export Data Pasien
Route::post('exportDataPasien', 'obatcontroller@exportDataPasien');
//Filter Data Pasien
Route::post('filterDataPasien', 'obatcontroller@filterDataPasienMain');

//pegawai
Route::get('/pegawai', 'obatcontroller@pegawai');
//create data pegawai
Route::post('createDataPegawai', 'obatcontroller@createDataPegawai');
//edit data pegawai
Route::post('updateDataPegawai', 'obatcontroller@updateDataPegawai');
//select data pegawai
Route::get('selectDataPegawai/{id}', 'obatcontroller@selectDataPegawai');
//delete data pegawai
Route::get('hapusDataPegawai/{id}', 'obatcontroller@hapusDataPegawai');
//Export Data Pegawai
Route::post('exportDataPegawai', 'obatcontroller@exportDataPegawai');
//Filter Data Pegawai
Route::post('filterDataPegawai', 'obatcontroller@filterDataPegawaiMain');



//user
Route::get('/user', 'obatcontroller@user');
//create data user
Route::post('createDataUser', 'obatcontroller@createDataUser');
//delete data user
Route::get('hapusDataUser/{id}', 'obatcontroller@hapusDataUser');
//select data user
Route::get('selectDataUser/{id}', 'obatcontroller@selectDataUser');
//edit data user
Route::post('updateDataUser', 'obatcontroller@updateDataUser');
//Filter Data User
Route::post('filterDataUser', 'obatcontroller@filterDataUserMain');
//Filter Data Log
Route::post('filterDataLog', 'obatcontroller@filterDataLog');
//reset Table Log
Route::get('resetTableLog', 'obatcontroller@resetTableLog');
//export Table Log
Route::get('exportDataLog', 'obatcontroller@exportDataLog');
//flush Table Log
Route::get('removeLog', 'obatcontroller@removeLog');

//resep
Route::get('/resep', 'obatcontroller@resep');
//create data resep
Route::post('createDataResep', 'obatcontroller@createDataResep');
//delete data resep
Route::get('hapusDataResep/{id}', 'obatcontroller@hapusDataResep');
//cetak label resep
Route::get('cetakLabelResep/{id}', 'obatcontroller@cetakLabelResep');
//Export Data Resep
Route::get('exportDataResep', 'obatcontroller@exportDataResep');
//Tambah Data Resep
Route::get('tambahDataResep', 'obatcontroller@tambahDataResep');
//Filter Data Resep
Route::post('filterDataResep', 'obatcontroller@filterDataResepMain');
//Select Data Resep
Route::get('selectResep/{id}', 'obatcontroller@selectResep');
//Cetak Rekap Transaksi 
Route::get('cetakrekapitulasi', 'obatcontroller@cetakRekapitulasiTransaksi');
//Cetak Rekap Label
Route::get('cetakrekaplabel', 'obatcontroller@cetakRekapLabel');


//supplier
Route::get('/supplier', 'obatcontroller@supplier');
//create data Supplier
Route::post('createDataSupplier', 'obatcontroller@createDataSupplier');
//edit data Supplier
Route::post('updateDataSupplier', 'obatcontroller@updateDataSupplier');
//select data Supplier
Route::get('selectDataSupplier/{id}', 'obatcontroller@selectDataSupplier');
//delete data Supplier
Route::get('hapusDataSupplier/{id}', 'obatcontroller@hapusDataSupplier');
//Export Data Supplier
Route::post('exportDataSupplier', 'obatcontroller@exportDataSupplier');
//Filter Data Supplier
Route::post('filterDataSupplier', 'obatcontroller@filterDataSupplierMain');

//pemakaian
Route::get('/pemakaian', 'obatcontroller@pemakaian');
//filter tahun pemakaian
Route::post('filterPeriodePemakaian', 'obatcontroller@filterPeriodePemakaian');
//select tahun pemakaian
Route::post('selectDataPemakaian', 'obatcontroller@selectDataPemakaian');
//Export Data Pemakaian
Route::post('exportDataPemakaian', 'obatcontroller@exportDataPemakaian');
//Filter Data Pemakaian
Route::post('filterDataPemakaian', 'obatcontroller@filterDataPemakaianMain');
//Cetak Laporan Pemakaian
Route::get('cetaktransaksipemakaian', 'obatcontroller@cetakRekapPemakaian');

//permintaan
Route::get('/permintaan', 'obatcontroller@permintaan');
//create data permintaan
Route::post('createdatapermintaan', 'obatcontroller@createDataPermintaan');
//filter periode permintaan
Route::post('filterPeriodePermintaan', 'obatcontroller@filterPeriodePermintaan');
//select data permintaan
Route::post('selectdatapermintaan', 'obatcontroller@selectDataPermintaan');
//Export Data Permintaan
Route::post('exportDataPermintaan', 'obatcontroller@exportDataPermintaan');
//Cetak Laporan permintaan
Route::get('cetaktransaksipermintaan', 'obatcontroller@cetakTransaksiPermintaan');


//penerimaan
Route::get('/penerimaan', 'obatcontroller@penerimaan');
//select data penerimaan
Route::post('selectdatapenerimaan', 'obatcontroller@selectDataPenerimaan');
//filter periode permintaan
Route::post('filterPeriodePenerimaan', 'obatcontroller@filterperiodePenerimaan');
//update data penerimaan
Route::post('updatedatapenerimaan', 'obatcontroller@updateDataPenerimaan');
//Export Data Penerimaan
Route::post('exportDataPenerimaan', 'obatcontroller@exportDataPenerimaan');
//penerimaan
Route::get('/penerimaanreal', 'obatcontroller@penerimaanReal');


//retur
Route::get('/retur', 'obatcontroller@retur');
//create data retur
Route::post('createDataRetur', 'obatcontroller@createDataRetur');
//delete data retur
Route::get('hapusDataRetur/{id}/id_retur/{id_retur}', 'obatcontroller@hapusDataRetur');
//edit data retur
Route::get('editDataRetur/{id_retur}', 'obatcontroller@editDataRetur');
//add detail data retur
Route::get('addDetailDataRetur/{id_retur}/batch/{batch}', 'obatcontroller@addDetailDataRetur');
//delete detail data retur
Route::get('deleteDetailDataRetur/{id_retur}/batch/{batch}', 'obatcontroller@deleteDetailDataRetur');
//retur diterima
Route::get('returditerima/{id_retur}/batch/{batch}', 'obatcontroller@returDiterima');
//cetak Data Retur
Route::get('cetakDataRetur/{id_retur}', 'obatcontroller@cetakDataRetur');
//cetak laporan Retur
Route::get('cetakLaporanRetur/{id_retur}', 'obatcontroller@cetakLaporanRetur');


//create data bon
Route::post('createDataBon', 'obatcontroller@createDataBon');
//delete data bon
Route::get('hapusDataBon/{id}/id_bon/{id_retur}', 'obatcontroller@hapusDataBon');
//edit data bon
Route::get('editDataBon/{id_bon}', 'obatcontroller@editDataBon');
//add detail data bon
Route::post('addDetailDataBon', 'obatcontroller@addDetailDataBon');
//terima permintaan bon
Route::post('obatbonditerima', 'obatcontroller@terimaBon');
//cetak Data Bon
Route::get('cetakDataBon/{id_bon}', 'obatcontroller@cetakDataBon');
//cetak Laporan Bon
Route::get('cetakLaporanBon/{id_bon}', 'obatcontroller@cetakLaporanBon');
//Hapus Detail Data Bon
Route::get('deleteDetailDataBon/{id_bon}/id_obat/{id_obat}', 'obatcontroller@deleteDetailDataBon');

//laporan
Route::get('/laporan', 'obatcontroller@laporan');
//Create Laporan
Route::post('createLaporanLPLPO', 'obatcontroller@createLPLPO');
//Select LPLPO
Route::post('selectLPLPO', 'obatcontroller@selectLaporan');
//Cetak Laporan Real
//laporan
Route::get('/laporanreal', 'obatcontroller@laporanreal');

//manajemen akun
Route::get('/akun', 'obatcontroller@akun');
//edit data Akun Pegawai
Route::post('updateAkunPegawai', 'obatcontroller@updateAkunPegawai');
//edit data Akun
Route::post('updateAkun', 'obatcontroller@updateAkun');


//transaksi
Route::get('/laporantransaksi', 'obatcontroller@laporantransaksi');
//filter transaksi
Route::post('filterDataTransaksi', 'obatcontroller@filterDataTransaksiMain');
//clear transaksi
Route::get('/cleartransaksi', 'obatcontroller@hapusTransaksi');

//validator
//nip validator
Route::get('nipvalidator/{id}', 'obatcontroller@NIPValidator');
//id polo validator
Route::get('polivalidator/{id}', 'obatcontroller@IDPoliValidator');
//id pasien validator
Route::get('pasienvalidator/{id}', 'obatcontroller@IDPasienValidator');
//id pegawai validator
Route::get('pegawaivalidator/{id}', 'obatcontroller@NIPPegawaiValidator');
//id user validator
Route::get('uservalidator/{id}', 'obatcontroller@IDUserValidator');
//id kemasan validator
Route::get('kemasanvalidator/{id}', 'obatcontroller@IDKemasanValidator');
//id satuan validator
Route::get('satuanvalidator/{id}', 'obatcontroller@IDSatuanValidator');
//id obat validator
Route::get('obatvalidator/{id}', 'obatcontroller@IDObatValidator');
//id penyimpanan validator
Route::get('penyimpanvalidator/{id}', 'obatcontroller@IDPenyimpananValidator');
//id supplier validator
Route::get('suppliervalidator/{id}', 'obatcontroller@IDSupplierValidator');
//id permintan validator
Route::get('permintaanvalidator/{id}', 'obatcontroller@IDPermintaanValidator');
//cek stok obat
Route::get('cekstokobat/{id}', 'obatcontroller@CekStokObatTersedia');