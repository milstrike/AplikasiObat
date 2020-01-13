<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Redirect;
use Session;
use View;
use Auth;
use Excel;

date_default_timezone_set('Asia/Jakarta');

class obatcontroller extends Controller
{

    public function generateSerializeID($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function createLog($aktivitas){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
            $dates = date('Y-m-d H:i:s');
            $userID = SESSION::get('adminpuskesmas');
            $nama_user = SESSION::get('namauser');
            $aktivitasUser = $aktivitas;

            $data = array(
                'id' => null,
                'tanggal' => $dates,
                'id_user' => $userID,
                'nama_user' => $nama_user,
                'aktivitas' => $aktivitasUser
                );

            DB::table('log')->insert($data);
        }
    }

    public function home(){
    	return View::make('login/index');
    }

    public function logout(){
        $this->createLog("User Logout");
    	Session::flush();
    	return Redirect::to('/');
    }
    
//Sub-Controller
    public function getNamaByNIP($nip){
        $data = DB::table('pegawai')->where('nip','=',$nip)->first();
        return $data->nama;
    }

    public function checkpassword($password){
        $data = DB::table('user')->where('password','=',$password)->get();
        return $data;
    }

    public function updatePassword($password){
        $data = array(
            'password' => md5($password),
            );
        DB::table('user')->where('nip','=',Session::get('nip'))->update($data);
    }

    public function getDataPasienByID($id){
        $data = DB::table('pasien')->where('id_pasien','=',$id)->get();
        return $data;
    }

    public function getDataPasienByName($name){
        $data = DB::table('pasien')->where('nama','LIKE','%'.$name.'%')->get();
        return $data;
    }

    public function getDataObatByName($nama){
        $data = DB::table('obat')->where('obat','=',$nama)->get();
        return $data;
    }

    public function getDataObatGudangByName($name, $dosis){
        $data = DB::table('gudang_obat')->where('nama_obat','=',$name)->where('kadaluarsa','!=','1')->orderBy('stok','ASC')->get();
        return $data;   
    }

    public function getDataObatGudangByBatch($batch){
        $data = DB::table('gudang_obat')->where('batch','=',$batch)->get();
        return $data;   
    }    

    public function getDataObatByID($id){
        $data = DB::table('obat')->where('id_obat','=',$id)->get();
        return $data;   
    }

    public function getSatuanByID($id){
        $data = DB::table('satuan')->where('id_satuan','=',$id)->get();
        return $data;
    }

    public function getSatuanKemasanByID($id){
        $data = DB::table('satuan_kemasan')->where('id_satuan_kemasan','=',$id)->get();
        return $data;
    }    

    public function getDataPermintaanByID($id, $id_obat){
        $data = DB::table('permintaan')->where('id_permintaan','=',$id)->where('id_obat','=',$id_obat)->get();
        return $data;      
    }

    public function getDataBonByDate($date){

        $data = DB::table('bon')->where('periode','=',$date)->get();
        return $data;      
    }

    public function getDetailBonByID($idBon, $id_obat){
        $data = DB::table('detail_bon')->where('id_bon','=',$idBon)->where('id_obat','=',$id_obat)->get();
        return $data;
    }

    public function getIDBonByPeriode($periode){
        $data = DB::table('bon')->where('periode','=',$periode)->get();
        $idBon = "";
        if($data -> count() > 0){
            $idBon = $data->first()->id_bon;
        }
        else{
            $idBon = "0";
        }
    }

    public function stockUpdater($id, $stock){
        $data = array(
            'stok' => $stock
        );

        DB::table('gudang_obat')->where('_id','=',$id)->update($data);
    }

    public function stockUpdaterOneByOne($id_obat, $jumlah){
        $data = DB::table('gudang_obat')->where('id_obat','=',$id_obat)->orderBy('stok', 'ASC')->get();
        $totalKeluar = $jumlah;

        foreach ($data as $do) {
            if($totalKeluar > 0){
                $maxs = $do -> stok;
                $totalKeluar = $totalKeluar - $maxs;
                if($totalKeluar > 0){
                    $this->stockUpdater($do->_id, 0);
                }
                else{
                    $this->stockUpdater($do->_id, (-1)*$totalKeluar);   
                }
            }
        }

    }

    public function generalStockUpdater($id_obat, $stock){

        $dataX = DB::table('obat')->where('id_obat','=',$id_obat)->get();
        $stokawal = $dataX -> first() -> stok;

        $data = array(
            'stok' => $stokawal + $stock
        );

        DB::table('obat')->where('id_obat','=',$id_obat)->update($data);   
    }

    public function stockCounter($id_obat){
        $data = DB::table('gudang_obat')->where('id_obat','=',$id_obat)->get();   
        $totalData = 0;
        foreach ($data as $datastok) {
            $totalData = $totalData + $datastok -> stok;
        }

        $this->generalStockUpdater($id_obat, $totalData);
    }

    public function stockCounting($id_obat){
        $data = DB::table('gudang_obat')->where('id_obat','=',$id_obat)->get();   
        $totalData = 0;
        foreach ($data as $datastok) {
            $totalData = $totalData + $datastok -> stok;
        }

        return $totalData;
    }

    public function getJumlahPemakaian($obat, $tanggal){
        $data = DB::table('resep')->where('tanggal','LIKE',$tanggal.'-%')->where('nama_obat','=',$obat)->get();
        $totaldata = 0;
        foreach ($data as $datacounter) {
            $totaldata = $totaldata + $datacounter->dosis;
        }
        return $totaldata;
    }

    public function getJumlahRusak($id_obat){
        $data = DB::table('gudang_obat')->where('id_obat','=',$id_obat)->get();
        $totalData = 0;
        foreach ($data as $datastok) {
            $totalData = $totalData + $datastok -> rusak;
        }
        return $totalData;

    }

    public function getJumlahMasuk($id_obat, $tanggal_bulan){
        $data = DB::table('kartustok')->where('id_obat','=',$id_obat)->where('keterangan','=',$tanggal_bulan)->get();
        $totalData = 0;
        if($data -> count() > 0){
            foreach($data as $dataMasuk){
            $totalData = $totalData + $dataMasuk -> masuk;
            }
        }
        else{
            $totalData = 0;
        }
        return $totalData;
    }

    public function getPenerimaanLalu($id_obat, $tanggal_bulan){
        $data = DB::table('penerimaan')->where('id_obat','=',$id_obat)->where('tanggal_permintaan','=',$tanggal_bulan)->get();
        $totalData = 0;
        if($data -> count() > 0){
            $totalData = $data->first()->jumlah;
        }   
        else{
            $totalData = 0;
        }
        return $totalData;
    }

    public function countAge($ages){
          //date in mm/dd/yyyy format; or it can be in other formats as well
          $birthDate = $ages;
          //explode the date to get month, day and year
          $birthDate = explode("-", $birthDate);
          //get age from date or birthdate
          $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));
          return $age;
    }

    public function getPermintaanLalu($tanggal, $id){
        $data = DB::table('penerimaan')->where($tanggal,'LIKE',$tanggal.'/%')->where('id_obat','=','$id')->get();
        return $data;
    }

    public function getFirstID($tanggal){
        $data = DB::table('log')->where('tanggal','LIKE',$tanggal.'%')->get();
        $id = $data->first()->id;
        return $id;
    }

    public function getLastID($tanggal){
        $data = DB::table('log')->where('tanggal','LIKE',$tanggal.'%')->orderBy('id', 'DESC')->get();
        $id = $data->first()->id;
        return $id;
    }

    public function getIDObatGudangObatByID($id){
        $data = DB::table('gudang_obat')->where('_id','=',$id)->get();
        $_id = $data->first()->id_obat;
        return $_id;
    }

    public function getNamaObatGudangObatByID($id){
        $data = DB::table('gudang_obat')->where('_id','=',$id)->get();
        $nama_obat = $data->first()->nama_obat;
        return $nama_obat;
    }

    public function getRecentStokObat($id){
        $data = DB::table('obat')->where('id_obat','=',$id)->get();
        $stok = $data->first()->stok;
        return $stok;
    }

    public function counterTotalBPJS($periode){
        $total = 0;
        if($periode == "1"){
            $data = DB::table('transaksi')->get();
            if($data -> count() >0){
                foreach ($data as $dt) {
                    $total = $total + $dt -> bpjs;
                }
            }
            else{
                $total = 0;
            }
        }
        else{
            $data = DB::table('transaksi')->where('periode','=',$periode)->get();
            if($data -> count() >0){
                foreach ($data as $dt) {
                    $total = $total + $dt -> bpjs;
                }
            }
            else{
                $total = 0;
            }
        }
        return $total;
    }

    public function counterTotalMandiri($periode){
        $total = 0;
        if($periode == "1"){
            $data = DB::table('transaksi')->get();
            if($data -> count() >0){
                foreach ($data as $dt) {
                    $total = $total + $dt -> mandiri;
                }
            }
            else{
                $total = 0;
            }
        }
        else{
            $data = DB::table('transaksi')->where('periode','=',$periode)->get();
            if($data -> count() >0){
                foreach ($data as $dt) {
                    $total = $total + $dt -> mandiri;
                }
            }
            else{
                $total = 0;
            }
        }
        return $total;
    }

    public function counterTotalLainnya($periode){
        $total = 0;
        if($periode == "1"){
            $data = DB::table('transaksi')->get();
            if($data -> count() >0){
                foreach ($data as $dt) {
                    $total = $total + $dt -> lainnya;
                }
            }
            else{
                $total = 0;
            }
        }
        else{
            $data = DB::table('transaksi')->where('periode','=',$periode)->get();
            if($data -> count() >0){
                foreach ($data as $dt) {
                    $total = $total + $dt -> lainnya;
                }
            }
            else{
                $total = 0;
            }
        }
        return $total;
    }

    public function getPeriodeLPLPO($idlaporan){
        $data = DB::table('lplpo')->where('id_laporan','=',$idlaporan)->get();
        return $data->first()->periode;
    }

    public function getPeriodePenerimaan($idlaporan){
        $data = DB::table('penerimaan')->where('id_permintaan','=',$idlaporan)->get();
        return $data->first()->tanggal_permintaan;
    }


//Validator Controller
    public function NIPValidator($ids){
        $id = $ids;
        $data = DB::table('dokter')->where('nip','=',$id)->get();
        $status = 0;
        if($data -> count() > 0){
            $status = 1;
        }
        else{
            $status = 0;
        }
        echo $status;
    } 

    public function IDPoliValidator($ids){
        $id = $ids;
        $data = DB::table('poli')->where('id_poli','=',$id)->get();
        $status = 0;
        if($data -> count() > 0){
            $status = 1;
        }
        else{
            $status = 0;
        }
        echo $status;
    }      

    public function IDPasienValidator($ids){
        $id = $ids;
        $data = DB::table('pasien')->where('id_pasien','=',$id)->get();
        $status = 0;
        if($data -> count() > 0){
            $status = 1;
        }
        else{
            $status = 0;
        }
        echo $status;
    }

    public function NIPPegawaiValidator($ids){
        $id = $ids;
        $data = DB::table('pegawai')->where('nip','=',$id)->get();
        $status = 0;
        if($data -> count() > 0){
            $status = 1;
        }
        else{
            $status = 0;
        }
        echo $status;
    }       

    public function IDUserValidator($ids){
        $id = $ids;
        $data = DB::table('user')->where('id_user','=',$id)->get();
        $status = 0;
        if($data -> count() > 0){
            $status = 1;
        }
        else{
            $status = 0;
        }
        echo $status;
    }

    public function IDKemasanValidator($ids){
        $id = $ids;
        $data = DB::table('satuan_kemasan')->where('id_satuan_kemasan','=',$id)->get();
        $status = 0;
        if($data -> count() > 0){
            $status = 1;
        }
        else{
            $status = 0;
        }
        echo $status;
    }

    public function IDSatuanValidator($ids){
        $id = $ids;
        $data = DB::table('satuan')->where('id_satuan','=',$id)->get();
        $status = 0;
        if($data -> count() > 0){
            $status = 1;
        }
        else{
            $status = 0;
        }
        echo $status;
    }

    public function IDObatValidator($ids){
        $id = $ids;
        $data = DB::table('obat')->where('id_obat','=',$id)->get();
        $status = 0;
        if($data -> count() > 0){
            $status = 1;
        }
        else{
            $status = 0;
        }
        echo $status;
    }

    public function IDPenyimpananValidator($ids){
        $id = $ids;
        $data = DB::table('penyimpanan')->where('id_penyimpanan','=',$id)->get();
        $status = 0;
        if($data -> count() > 0){
            $status = 1;
        }
        else{
            $status = 0;
        }
        echo $status;
    }

    public function IDSupplierValidator($ids){
        $id = $ids;
        $data = DB::table('supplier')->where('id_supplier','=',$id)->get();
        $status = 0;
        if($data -> count() > 0){
            $status = 1;
        }
        else{
            $status = 0;
        }
        echo $status;
    }

    public function IDPermintaanValidator($ids){
        $id = $ids;
        $data = DB::table('permintaan')->where('id_permintaan','=',$id)->get();
        $status = 0;
        if($data -> count() > 0){
            $status = 1;
        }
        else{
            $status = 0;
        }
        echo $status;
    }

    public function CekStokObatTersedia($ids){
        $id = $ids;
        $data = DB::table('obat')->where('obat','=',$id)->get();
        $status = $data -> first() -> stok;
        echo $status;
    }

//Main Controller
    public function login(){
        $matchThese = ['username' => Input::get('username'), 'password' => md5(Input::get('password'))];
        $resultData = DB::table('user')->where($matchThese)->get();
        if(count($resultData) > 0){
            $userid = $resultData->first()->id_user;
            $nip = $resultData->first()->nip;
            Session::put('adminpuskesmas',$userid);
            Session::put('nip',$nip);
            Session::put("namauser",$this->getNamaByNIP(Session::get('nip')));

            $this->createLog("user login");

            return Redirect::to('beranda');
        }
        else{
            return Redirect::to('/')->with('message','Username atau password salah!');  
        }
    }

    public function beranda(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
            $dataObat = DB::table('obat')->where('stok','<',90)->get();
            $this->createLog("Masuk ke Beranda");
            return View::make('beranda/index')->with('beranda','class=active')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','')->with('akun','')->with('dataObat',$dataObat);
        }
    }

    public function penerimaanresep(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
            $this->createLog("Masuk ke Penerimaan Resep");

            $dataresep = DB::table('resep')->get();
            $datapasien = DB::table('pasien')->get();
            $dataobat = DB::table('obat')->get();
            $datadokter = DB::table('dokter')->get();

            return View::make('beranda/penerimaanresep')->with('beranda','')->with('penerimaanresep','class=active')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','')->with('akun','')->with('dataresep',$dataresep)->with('dataobat',$dataobat)->with('datadokter',$datadokter)->with('datapasien',$datapasien);
        }
    }

//Controller Dokter
    public function createDataDokter(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $data = array(
            'id' => NULL,
            'nip' => Input::get('inputNIP'),
            'nama' => Input::get('inputNama'),
            'id_poli' => Input::get('inputPoli'),
            'alamat' => Input::get('inputAlamat'),
            'telepon' => Input::get('inputTelepon')
        );

        $this->createLog('Menambah Data Dokter denga NIP: '.Input::get('inputNIP').', Nama Dokter: '. Input::get('inputNama').', ID Poli: '.Input::get('inputPoli').', Alamat: '.Input::get('inputAlamat').', No Telepon: '.Input::get('inputTelepon'));
        DB::table('dokter')->insert($data);
        return Redirect::to('dokter')->with('message', 'Berhasil menambah data dokter.');
        }
    }

    public function updateDataDokter(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $id = Input::get('id_dokter');
        $data = array(
            'nip' => Input::get('inputNIP'),
            'nama' => Input::get('inputNama'),
            'id_poli' => Input::get('inputPoli'),
            'alamat' => Input::get('inputAlamat'),
            'telepon' => Input::get('inputTelepon')         
        );
        $this->createLog('Menambah Data Dokter denga NIP: '.Input::get('inputNIP').', Nama Dokter: '. Input::get('inputNama').', ID Poli: '.Input::get('inputPoli').', Alamat: '.Input::get('inputAlamat').', No Telepon: '.Input::get('inputTelepon'));
        DB::table('dokter')->where('id','=',$id)->update($data);
        return Redirect::to('dokter')->with('message', 'Berhasil mengedit data dokter.');
        }
    }

    public function hapusDataDokter($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog("Menghapus data Dokter dengan ID: ".$id);
        DB::table('dokter')->where('id','=',$id)->delete();
        return Redirect::to('dokter')->with('message', 'Berhasil menghapus data dokter.');
        }
    }

    public function selectDataDokter($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog("Memilih data Dokter dengan ID: ".$id);
        $selectdokter = DB::table('dokter')->where('id','=',$id)->get();
        return Redirect::to('dokter')->with('select','data dokter select')->with('id',$selectdokter->first()->id)->with('nip',$selectdokter->first()->nip)->with('nama',$selectdokter->first()->nama)->with('id_poli',$selectdokter->first()->id_poli)->with('alamat',$selectdokter->first()->alamat)->with('telepon',$selectdokter->first()->telepon);
        }
    }

    public function dokter(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Masuk ke menu data Dokter');
        $datadokter = DB::table('dokter')->get();
        $datapoli = DB::table('poli')->get();
        return View::make('master/dokter')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datadokter',$datadokter)->with('datapoli',$datapoli);
        }
    }

    public function filterDataDokterMain(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $kategori = Input::get('filter-kategori');
        $keyword = Input::get('keyword-pencarian');

        $this->createLog("Mencari data Dokter dengan kategori: ".$kategori." dan keyword: ".$keyword);

        switch($kategori){
            case 1:
                $datadokter = DB::table('dokter')->where('nip','LIKE','%'.$keyword.'%')->get();
                $datapoli = DB::table('poli')->get();
                return View::make('master/dokter')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datadokter',$datadokter)->with('datapoli',$datapoli);
            break;

            case 2:
                $datadokter = DB::table('dokter')->where('nama','LIKE','%'.$keyword.'%')->get();
                $datapoli = DB::table('poli')->get();
                return View::make('master/dokter')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datadokter',$datadokter)->with('datapoli',$datapoli);
            break;

            case 3:
                $datadokter = DB::table('dokter')->where('alamat','LIKE','%'.$keyword.'%')->get();
                $datapoli = DB::table('poli')->get();
                return View::make('master/dokter')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datadokter',$datadokter)->with('datapoli',$datapoli);
            break;

            case 4:
                $datadokter = DB::table('dokter')->where('telepon','LIKE','%'.$keyword.'%')->get();
                $datapoli = DB::table('poli')->get();
                return View::make('master/dokter')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datadokter',$datadokter)->with('datapoli',$datapoli);
            break;
        }
        }
    }

    public function exportDataDokter(){

        $this->createLog("Mengexport ke excel data Dokter");

        $period = date('Y-m-d');
        $dataDokter = DB::table('dokter')->select('nip', 'nama', 'id_poli', 'alamat', 'telepon')->orderBy('id','ASC')->get();        

        $dataDokterArray = [];
        $dataDokterArray[] = ['NIP', 'Nama', 'ID Poli', 'Alamat', 'Telepon'];

        foreach($dataDokter as $DataDokter) {
            //$dataRapotArray[] = $DataRapot->toArray();
            $dataDokterArray[] = (array) $DataDokter;
        }

        // Generate and return the spreadsheet
        Excel::create('Data Dokter - '.$period, function($excel) use ($dataDokterArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Data Dokter');
        $excel->setCreator('Aplikasi Manajemen Dokter Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
        $excel->setDescription('Data Dokter');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataDokterArray) {
            $sheet->fromArray($dataDokterArray, null, 'A1', false, false);
        });

    })->download('xls');
    }

//Controller Obat
    public function createDataObat(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $data = array(
            'id' => NULL,
            'id_obat' => Input::get('inputIDObat'),
            'obat' => Input::get('inputObat'),
            'id_satuan' => Input::get('inputIDSatuan'),
            'harga' => Input::get('inputHargaSatuan'),            
            'id_penyimpanan' => Input::get('inputIDPenyimpanan'),
            'stok' => "0"
        );

        DB::table('obat')->insert($data);
        $this->createLog("Menambah data Obat dengan ID Obat: ".Input::get('inputIDObat').", Nama Obat: ".Input::get('inputObat').", ID Satuan: ".Input::get('inputIDSatuan')."Harga : ".Input::get('inputHargaSatuan').", ID Penyimpanan: ".Input::get('inputIDPenyimpanan'));
        return Redirect::to('dataobat')->with('message', 'Berhasil menambah data obat.');
        }
    }

    public function updateDataObat(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $id = Input::get('id_obat');
        $data = array(
            'id_obat' => Input::get('inputIDObat'),
            'obat' => Input::get('inputObat'),
            'id_satuan' => Input::get('inputIDSatuan'),
            'harga' => Input::get('inputHargaSatuan'),            
            'id_penyimpanan' => Input::get('inputIDPenyimpanan')
        );

        DB::table('obat')->where('id','=',$id)->update($data);
        $this->createLog("Mengupdate data Obat dengan ID Obat: ".Input::get('inputIDObat').", Nama Obat: ".Input::get('inputObat').", ID Satuan: ".Input::get('inputIDSatuan')."Harga : ".Input::get('inputHargaSatuan').", ID Penyimpanan: ".Input::get('inputIDPenyimpanan'));
        return Redirect::to('dataobat')->with('message', 'Berhasil mengedit data obat.');
        }
    }

    public function updateStokDataObat($id, $stok){

    }

    public function hapusDataObat($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        DB::table('obat')->where('id','=',$id)->delete();
        $this->createLog("Menghapus data Obat dengan ID: ".$id);
        return Redirect::to('dataobat')->with('message', 'Berhasil menghapus data obat.');
        }
    }

    public function selectDataObat($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $selectobat = DB::table('obat')->where('id','=',$id)->get();
        $datasatuan = DB::table('satuan')->get();
        $datakemasan = DB::table('satuan_kemasan')->get();
        $datapenyimpanan = DB::table('penyimpanan')->get();
        $this->createLog("Memilih data Obat dengan ID: ".$id);
        return Redirect::to('dataobat')->with('select','data obat selected')->with('id',$selectobat->first()->id)->with('id_obat',$selectobat->first()->id_obat)->with('obat',$selectobat->first()->obat)->with('id_satuan',$selectobat->first()->id_satuan)->with('harga',$selectobat->first()->harga)->with('id_penyimpanan',$selectobat->first()->id_penyimpanan)->with('stok',$selectobat->first()->stok)->with('datasatuan',$datasatuan)->with('datapenyimpanan',$datapenyimpanan)->with('datakemasan',$datakemasan);
        }
    }

    public function dataobat(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $dataobat = DB::table('obat')->get();
        $datasatuan = DB::table('satuan')->get();
        $datakemasan = DB::table('satuan_kemasan')->get();
        $datapenyimpanan = DB::table('penyimpanan')->get();
        $this->createLog('Masuk ke menu data Obat');
        return View::make('obat/index')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataobat',$dataobat)->with('datasatuan',$datasatuan)->with('datapenyimpanan',$datapenyimpanan)->with('datakemasan',$datakemasan);
        }
    }

    public function filterDataObatMain(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $kategori = Input::get('filter-kategori');
        $keyword = Input::get('keyword-pencarian');

        $this->createLog("Mencari data Obat dengan kategori: ".$kategori." dan keyword: ".$keyword);

        switch($kategori){
            case 1:
                $dataobat = DB::table('obat')->where('id_obat','LIKE', '%'.$keyword.'%')->get();
                $datasatuan = DB::table('satuan')->get();
                $datapenyimpanan = DB::table('penyimpanan')->get();
                $datakemasan = DB::table('satuan_kemasan')->get();
                return View::make('obat/index')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataobat',$dataobat)->with('datasatuan',$datasatuan)->with('datapenyimpanan',$datapenyimpanan)->with('datakemasan',$datakemasan);
            break;

            case 2:
                $dataobat = DB::table('obat')->where('obat','LIKE', '%'.$keyword.'%')->get();
                $datasatuan = DB::table('satuan')->get();
                $datapenyimpanan = DB::table('penyimpanan')->get();
                $datakemasan = DB::table('satuan_kemasan')->get();
                return View::make('obat/index')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataobat',$dataobat)->with('datasatuan',$datasatuan)->with('datapenyimpanan',$datapenyimpanan)->with('datakemasan',$datakemasan);
            break;
        }
        }
    }    

    public function exportDataObat(){
        $this->createLog("Mengexport ke excel data Obat");
        $id_obat = Input::get('inputObat');
        $period = date('Y-m-d');

        $dataObat = DB::table('obat')->select("id_obat", "obat", "id_satuan", "harga", "id_penyimpanan", "stok")->orderBy('id','ASC')->get();

        $dataObatArray = [];
        $dataObatArray[] = ['ID Obat', 'Nama Obat', 'ID Satuan', 'Harga', 'ID Penyimpanan', 'Stok'];

        foreach($dataObat as $DataObat) {
            //$dataRapotArray[] = $DataRapot->toArray();
            $dataObatArray[] = (array) $DataObat;
        }

        // Generate and return the spreadsheet
        Excel::create('Data Obat - '.$period, function($excel) use ($dataObatArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Data Obat');
        $excel->setCreator('Aplikasi Manajemen Obat Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
        $excel->setDescription('Data Obat');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataObatArray) {
            $sheet->fromArray($dataObatArray, null, 'A1', false, false);
        });

    })->download('xls');
    }

//Controller Pasien
    public function createDataPasien(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $data = array(
            'id' => NULL,
            'id_pasien' => Input::get('inputID'),
            'nama' => Input::get('inputNama'),
            'jenis_kelamin' => Input::get('inputJenisKelamin'),
            'tempat_lahir' => Input::get('inputTempatLahir'),
            'tanggal_lahir' => Input::get('inputTanggalLahir'),
            'alamat' => Input::get('inputAlamat'),
            'telepon' => Input::get('inputTelepon'),
            'jaminan' => Input::get('inputAsuransi')
        );
        $this->createLog('Menambah data Pasien dengan ID: '.Input::get('inputID').', Nama: '.Input::get('inputNama').', Jenis Kelamin: '.Input::get('inputJenisKelamin').', Tempat Lahir: '.Input::get('inputTempatLahir').', Tanggal Lahir: '.Input::get('inputTanggalLahir').', Alamat: '.Input::get('inputAlamat').', Telepon: '.Input::get('inputTelepon'));
        DB::table('pasien')->insert($data);
        return Redirect::to('pasien')->with('message', 'Berhasil menambah data pasien.');
        }
    }

    public function updateDataPasien(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $id = Input::get('id_pasien');
        $data = array(
            'nama' => Input::get('inputNama'),
            'jenis_kelamin' => Input::get('inputJenisKelamin'),
            'tempat_lahir' => Input::get('inputTempatLahir'),
            'tanggal_lahir' => Input::get('inputTanggalLahir'),
            'alamat' => Input::get('inputAlamat'),
            'telepon' => Input::get('inputTelepon'),    
            'jaminan' => Input::get('inputAsuransi')    
        );
        $this->createLog('Mengupdate data Pasien dengan ID: '.$id.', Nama: '.Input::get('inputNama').', Jenis Kelamin: '.Input::get('inputJenisKelamin').', Tempat Lahir: '.Input::get('inputTempatLahir').', Tanggal Lahir: '.Input::get('inputTanggalLahir').', Alamat: '.Input::get('inputAlamat').', Telepon: '.Input::get('inputTelepon'));
        DB::table('pasien')->where('id','=',$id)->update($data);
        return Redirect::to('pasien')->with('message', 'Berhasil mengedit data pasien.');
        }
    }

    public function hapusDataPasien($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog("Menghapus data Pasien dengan ID: ".$id);
        DB::table('pasien')->where('id','=',$id)->delete();
        return Redirect::to('pasien')->with('message', 'Berhasil menghapus data pasien.');
        }
    }

    public function selectDataPasien($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog("Memilih data Pasien dengan ID: ".$id);
        $selectPasien = DB::table('pasien')->where('id','=',$id)->get();
        return Redirect::to('pasien')->with('select','Memuat data berhasil')->with('id',$selectPasien->first()->id)->with('id_pasien',$selectPasien->first()->id_pasien)->with('nama',$selectPasien->first()->nama)->with('jenis_kelamin',$selectPasien->first()->jenis_kelamin)->with('tempat_lahir',$selectPasien->first()->tempat_lahir)->with('tanggal_lahir',$selectPasien->first()->tanggal_lahir)->with('alamat',$selectPasien->first()->alamat)->with('telepon',$selectPasien->first()->telepon)->with('asuransi',$selectPasien->first()->jaminan);
        }
    }

    public function pasien(){
         if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Masuk ke menu data Pasien');
        $datapasien = DB::table('pasien')->get();
        return View::make('master/pasien')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapasien',$datapasien);
        }
        
    }

    public function filterDataPasienMain(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $kategori = Input::get('filter-kategori');
        $keyword = Input::get('keyword-pencarian');

        $this->createLog("Mencari data Pasien dengan kategori: ".$kategori." dan keyword: ".$keyword);

        switch($kategori){
            case 1:
                $datapasien = DB::table('pasien')->where('id_pasien','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/pasien')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapasien',$datapasien);
            break;

            case 2:
                $datapasien = DB::table('pasien')->where('nama','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/pasien')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapasien',$datapasien);
            break;

            case 3:
                $datapasien = DB::table('pasien')->where('jenis_kelamin','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/pasien')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapasien',$datapasien);
            break;

            case 4:
                $datapasien = DB::table('pasien')->where('tempat_lahir','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/pasien')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapasien',$datapasien);
            break;

            case 5:
                $datapasien = DB::table('pasien')->where('tanggal_lahir','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/pasien')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapasien',$datapasien);
            break;

            case 6:
                $datapasien = DB::table('pasien')->where('alamat','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/pasien')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapasien',$datapasien);
            break;

            case 7:
                $datapasien = DB::table('pasien')->where('telepon','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/pasien')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapasien',$datapasien);
            break;
        }
        }
    }       

    public function exportDataPasien(){
        $this->createLog("Mengexport ke excel data Pasien");
        $period = date('Y-m-d');
        $dataPasien = DB::table('pasien')->select('id_pasien', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'telepon')->orderBy('id','ASC')->get();        

        $dataPasienArray = [];
        $dataPasienArray[] = ['ID Pasien', 'Nama', 'Jenis Kelamin', 'Tempat Lahir', 'Tanggal Lahir', 'Alamat', 'Telepon'];

        foreach($dataPasien as $DataPasien) {
            //$dataRapotArray[] = $DataRapot->toArray();
            $dataPasienArray[] = (array) $DataPasien;
        }

        // Generate and return the spreadsheet
        Excel::create('Data Pasien - '.$period, function($excel) use ($dataPasienArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Data Pasien');
        $excel->setCreator('Aplikasi Manajemen Pasien Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
        $excel->setDescription('Data Pasien');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataPasienArray) {
            $sheet->fromArray($dataPasienArray, null, 'A1', false, false);
        });

    })->download('xls');
    }

//Controller Pegawai
    public function createDataPegawai(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $data = array(
            'id' => NULL,
            'nip' => Input::get('inputNIP'),
            'nama' => Input::get('inputNama'),
            'jenis_kelamin' => Input::get('inputJenisKelamin'),
            'jabatan' => Input::get('inputJabatan')
        );

        $this->createLog('Menambah Data Pegawai dengan NIP: '.Input::get('inputNIP').', Nama: '.Input::get('inputNama').', Jenis Kelamin: '.Input::get('inputJenisKelamin').', Jabatan: '.Input::get('inputJabatan'));
        DB::table('pegawai')->insert($data);
        return Redirect::to('pegawai')->with('message', 'Berhasil menambah data pegawai.');
        }
    }

    public function updateDataPegawai(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $id = Input::get('id_pegawai');
        $data = array(
            'nip' => Input::get('inputNIP'),
            'nama' => Input::get('inputNama'),
            'jenis_kelamin' => Input::get('inputJenisKelamin'),
            'jabatan' => Input::get('inputJabatan')       
        );
        $this->createLog('Mengupdate Data Pegawai dengan NIP: '.Input::get('inputNIP').', Nama: '.Input::get('inputNama').', Jenis Kelamin: '.Input::get('inputJenisKelamin').', Jabatan: '.Input::get('inputJabatan'));
        DB::table('pegawai')->where('id','=',$id)->update($data);
        return Redirect::to('pegawai')->with('message', 'Berhasil mengedit data pegawai.');
        }
    }

    public function hapusDataPegawai($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Menghapus Data Pegawai dengan ID: '.$id);
        DB::table('pegawai')->where('id','=',$id)->delete();
        return Redirect::to('pegawai')->with('message', 'Berhasil menghapus data pegawai.');
        }
    }

    public function selectDataPegawai($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Memilih Data Pegawai dengan ID: '.$id);
        $selectpegawai = DB::table('pegawai')->where('id','=',$id)->get();
        return Redirect::to('pegawai')->with('select','Memuat data berhasil')->with('id_pegawai',$selectpegawai->first()->id)->with('nama',$selectpegawai->first()->nama)->with('nip',$selectpegawai->first()->nip)->with('jenis_kelamin',$selectpegawai->first()->jenis_kelamin)->with('jabatan',$selectpegawai->first()->jabatan);
        }
    }


    public function pegawai(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Masuk ke menu Data Pegawai');
        $datapegawai = DB::table('pegawai')->get();
        return View::make('master/pegawai')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapegawai',$datapegawai);
        }
        
    }

    public function filterDataPegawaiMain(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $kategori = Input::get('filter-kategori');
        $keyword = Input::get('keyword-pencarian');

        $this->createLog("Mencari data Pegawai dengan kategori: ".$kategori." dan keyword: ".$keyword);

        switch($kategori){
            case 1:
                $datapegawai = DB::table('pegawai')->where('nip','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/pegawai')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapegawai',$datapegawai);
            break;

            case 2:
                $datapegawai = DB::table('pegawai')->where('nama','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/pegawai')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapegawai',$datapegawai);
            break;

            case 3:
                $datapegawai = DB::table('pegawai')->where('jenis_kelamin','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/pegawai')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapegawai',$datapegawai);
            break;

            case 4:
                $datapegawai = DB::table('pegawai')->where('jabatan','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/pegawai')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapegawai',$datapegawai);
            break;
        }
        }
    }    

    public function exportDataPegawai(){
        $this->createLog("Mengexport ke excel data Pegawai");
        $period = date('Y-m-d');
        $dataPegawai = DB::table('pegawai')->select('nip', 'nama', 'jenis_kelamin', 'jabatan')->orderBy('id','ASC')->get();        

        $dataPegawaiArray = [];
        $dataPegawaiArray[] = ['NIP', 'Nama', 'Jenis Kelamin', 'Jabatan'];

        foreach($dataPegawai as $DataPegawai) {
            //$dataRapotArray[] = $DataRapot->toArray();
            $dataPegawaiArray[] = (array) $DataPegawai;
        }

        // Generate and return the spreadsheet
        Excel::create('Data Pegawai - '.$period, function($excel) use ($dataPegawaiArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Data Pegawai');
        $excel->setCreator('Aplikasi Manajemen Pegawai Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
        $excel->setDescription('Data Pegawai');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataPegawaiArray) {
            $sheet->fromArray($dataPegawaiArray, null, 'A1', false, false);
        });

    })->download('xls');
    }

//Controller Pemakaian
    public function createDataPemakaian(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $data = array(
            'id' => NULL,
            'id_penerimaan' => Input::get('inputIDPenerimaan'),
            'no_resep' => Input::get('inputNoResep'),
            'jumlah_pemakaian' => Input::get('inputJumlahPemakaian'),
            'id_user' => Input::get('inputIDUser'),
            'keterangan' => Input::get('inputKeterangan')
        );


        DB::table('pemakaian')->insert($data);
        return Redirect::to('pemakaian')->with('message', 'Berhasil menambah data pemakaian.');
        }
    }

    public function selectDataPemakaian(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{

        $tanggal = Input::get('tanggal');
        Session::put('selectedTanggal', $tanggal);
        $datapakai = DB::table('pemakaian')->select('tanggal')->groupBy('tanggal')->get();
        $dataobat = DB::table('gudang_obat')->get();
        $datapemakaian = DB::table('pemakaian')->select('no_batch','nama_obat', DB::raw('SUM(jumlah) as total'))->groupBy('no_batch','nama_obat')->where('tanggal','=',$tanggal)->get();
        $periodepemakaian = "";
        $this->createLog('Memilih Data Pemakaian tanggal: '.$tanggal);

        return View::make('transaksi/pemakaian')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','class=active')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','active')->with('akun','')->with('datapemakaian',$datapemakaian)->with('dataobat',$dataobat)->with('datatanggal',$datapakai)->with('periodepemakaian', $periodepemakaian);
        }
    }

    public function cetakRekapPemakaian(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{

        $tanggal = Session::get('selectedTanggal');
        $datapakai = DB::table('pemakaian')->select('tanggal')->groupBy('tanggal')->get();
        $dataobat = DB::table('gudang_obat')->get();
        $datapemakaian = DB::table('pemakaian')->select('no_batch','nama_obat', DB::raw('SUM(jumlah) as total'))->groupBy('no_batch','nama_obat')->where('tanggal','=',$tanggal)->get();

        $this->createLog('Memilih Data Pemakaian tanggal: '.$tanggal);

        return View::make('transaksi/cetakRekapPemakaian')->with('datapemakaian',$datapemakaian)->with('dataobat',$dataobat)->with('datatanggal',$datapakai)->with('tanggal',$tanggal);
        }

    }

    public function pemakaian(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Masuk ke menu Data Pemakaian');
        Session::put('selectedTanggal', '');
        $dataobat = DB::table('gudang_obat')->get();
        $datapakai = DB::table('pemakaian')->select('tanggal')->groupBy('tanggal')->get();
        $datapemakaian = DB::table('pemakaian')->select('no_batch','nama_obat', DB::raw('SUM(jumlah) as total'))->groupBy('no_batch','nama_obat')->get();
        $periodepemakaian = "Semua Periode";
        return View::make('transaksi/pemakaian')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','class=active')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','active')->with('akun','')->with('datapemakaian',$datapemakaian)->with('dataobat',$dataobat)->with('datatanggal',$datapakai)->with('periodepemakaian', $periodepemakaian);
        }
    }

    public function filterPeriodePemakaian(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $bulan = Input::get('bulan');
        $tahun = Input::get('tahun');
        $periode = "";
        $bulantahun = $bulan."-".$tahun;
        switch($bulan){
            case "01": $periode = "Januari"; break;
            case "02": $periode = "Februari"; break;
            case "03": $periode = "Maret"; break;
            case "04": $periode = "April"; break;
            case "05": $periode = "Mei"; break;
            case "06": $periode = "Juni"; break;
            case "07": $periode = "Juli"; break;
            case "08": $periode = "Agustus"; break;
            case "09": $periode = "September"; break;
            case "10": $periode = "Oktober"; break;
            case "11": $periode = "November"; break;
            case "12": $periode = "Desember"; break;
        }
        $this->createLog('Masuk ke menu Data Pemakaian');
        Session::put('selectedTanggal', '');
        $dataobat = DB::table('gudang_obat')->get();
        $datapakai = DB::table('pemakaian')->select('tanggal')->where('tanggal','LIKE', '%'.$bulantahun)->groupBy('tanggal')->get();
        $datapemakaian = DB::table('pemakaian')->select('no_batch','nama_obat', DB::raw('SUM(jumlah) as total'))->groupBy('no_batch','nama_obat')->get();
        $periodepemakaian = $periode." ".$tahun;
        return View::make('transaksi/pemakaian')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','class=active')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','active')->with('akun','')->with('datapemakaian',$datapemakaian)->with('dataobat',$dataobat)->with('datatanggal',$datapakai)->with('periodepemakaian', $periodepemakaian);
        }
    }

    public function filterDataPemakaianMain(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $kategori = Input::get('filter-kategori');
        $keyword = Input::get('keyword-pencarian');

        $this->createLog("Mencari data Pemakaian dengan kategori: ".$kategori." dan keyword: ".$keyword);
        $periodepemakaian = "";
        switch($kategori){
            case 1:
                $dataobat = DB::table('gudang_obat')->where('batch','LIKE', '%'.$keyword.'%')->get();
                $datapakai = DB::table('pemakaian')->select('tanggal')->groupBy('tanggal')->get();
                $datapemakaian = DB::table('pemakaian')->select('no_batch','nama_obat', 'tanggal', DB::raw('SUM(jumlah) as total'))->where('no_batch','LIKE', '%'.$keyword.'%')->where('tanggal','=',Session::get('selectedTanggal'))->groupBy('no_batch','nama_obat', 'tanggal')->get();
                return View::make('transaksi/pemakaian')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','class=active')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','active')->with('akun','')->with('datapemakaian',$datapemakaian)->with('dataobat',$dataobat)->with('datatanggal',$datapakai)->with('periodepemakaian', $periodepemakaian);
            break;

            case 2:
                $dataobat = DB::table('gudang_obat')->where('nama_obat','LIKE', '%'.$keyword.'%')->get();
                $datapakai = DB::table('pemakaian')->select('tanggal')->groupBy('tanggal')->get();
                $datapemakaian = DB::table('pemakaian')->select('no_batch','nama_obat', 'tanggal', DB::raw('SUM(jumlah) as total'))->where('nama_obat','LIKE', '%'.$keyword.'%')->where('tanggal','=',Session::get('selectedTanggal'))->groupBy('no_batch','nama_obat', 'tanggal')->get();
                return View::make('transaksi/pemakaian')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','class=active')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','active')->with('akun','')->with('datapemakaian',$datapemakaian)->with('dataobat',$dataobat)->with('datatanggal',$datapakai)->with('periodepemakaian', $periodepemakaian);
            break;
        }
        }
    }   



    public function exportDataPemakaian(){
        if(!Session::has('selectedTanggal'))
        {

        }
        else{
            $this->createLog("Mengexport ke excel data Pemakaian");
            $period = Session::get('selectedTanggal');
            $dataPemakaian = DB::table('pemakaian')->select('nama_obat', DB::raw('SUM(jumlah) as total'))->groupBy('nama_obat')->WHERE('tanggal','=',$period)->get();

            $dataPemakaianArray = [];
            $dataPemakaianArray[] = ['Nama Obat', 'Pemakaian'];

        foreach($dataPemakaian as $DataPemakaian) {
            //$dataRapotArray[] = $DataRapot->toArray();
            $dataPemakaianArray[] = (array) $DataPemakaian;
        }

        // Generate and return the spreadsheet
        Excel::create('Data Pemakaian - '.$period, function($excel) use ($dataPemakaianArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Data Pemakaian');
        $excel->setCreator('Aplikasi Manajemen Pemakaian Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
        $excel->setDescription('Data Pemakaian');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataPemakaianArray) {
            $sheet->fromArray($dataPemakaianArray, null, 'A1', false, false);
        });

    })->download('xls');
        }
    }

//Controller Poli
    public function createDataPoli(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $data = array(
            'id' => NULL,
            'id_poli' => Input::get('inputIDPoli'),
            'nama_poli' => Input::get('inputNamaPoli')
        );
        $this->createLog("Menambah data Poli dengan ID: ".Input::get('inputIDPoli').", Nama Poli: ".Input::get('inputNamaPoli'));
        DB::table('poli')->insert($data);
        return Redirect::to('poli')->with('message', 'Berhasil menambah data poli.');
        }
    }

    public function updateDataPoli(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $id = Input::get('id_poli');
        $data = array(
            'id_poli' => Input::get('inputIDPoli'),
            'nama_poli' => Input::get('inputNamaPoli') 
        );
        $this->createLog("Mengupdate data Poli dengan ID: ".Input::get('inputIDPoli').", Nama Poli: ".Input::get('inputNamaPoli'));
        DB::table('poli')->where('id','=',$id)->update($data);
        return Redirect::to('poli')->with('message', 'Berhasil mengupdate data poli');
        }
    }

    public function hapusDataPoli($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog("Menghapus data Poli dengan ID: ".$id);
        DB::table('poli')->where('id','=',$id)->delete();
        return Redirect::to('poli')->with('message', 'Berhasil menghapus data poli.');
        }
    }

    public function selectDataPoli($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog("Memilih data Poli dengan ID: ".$id);
        $selectPoli = DB::table('poli')->where('id','=',$id)->get();
        return Redirect::to('poli')->with('select','selected data poli')->with('id',$selectPoli->first()->id)->with('id_poli',$selectPoli->first()->id_poli)->with('nama_poli',$selectPoli->first()->nama_poli);;
        }
    }

    public function poli(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Masuk ke menu data Poli');
        $datapoli = DB::table('poli')->get();
        return View::make('master/poli')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapoli',$datapoli);
        }
    }

    public function filterDataPoliMain(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $kategori = Input::get('filter-kategori');
        $keyword = Input::get('keyword-pencarian');

        $this->createLog("Mencari data Poli dengan kategori: ".$kategori." dan keyword: ".$keyword);

        switch($kategori){
            case 1:
                $datapoli = DB::table('poli')->where('id_poli','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/poli')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapoli',$datapoli);
            break;

            case 2:
                $datapoli = DB::table('poli')->where('nama_poli','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/poli')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapoli',$datapoli);
            break;
        }
        }
    }    

    public function exportDataPoli(){
        $this->createLog("Mengexport ke excel data Poli");
        $period = date('Y-m-d');
        $dataPoli = DB::table('poli')->select('id_poli', 'nama_poli')->orderBy('id','ASC')->get();        

        $dataPoliArray = [];
        $dataPoliArray[] = ['ID Poli', 'Nama Poli'];

        foreach($dataPoli as $DataPoli) {
            //$dataRapotArray[] = $DataRapot->toArray();
            $dataPoliArray[] = (array) $DataPoli;
        }

        // Generate and return the spreadsheet
        Excel::create('Data Poli - '.$period, function($excel) use ($dataPoliArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Data Poli');
        $excel->setCreator('Aplikasi Manajemen Poli Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
        $excel->setDescription('Data Poli');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataPoliArray) {
            $sheet->fromArray($dataPoliArray, null, 'A1', false, false);
        });

    })->download('xls');
    }

//Controller Resep
    public function createDataResep(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{

            $nama = Input::get('inputNama');
            $no_resep = $nama;
            $tanggal = Input::get('inputTanggal');
            $umur = $this->countAge($this->getDataPasienByID(Input::get('inputNama'))->first()->tanggal_lahir);
            $dokter = Input::get('inputDokter');
            $daftar_obat = Input::get('inputObat');
            $dosis = Input::get('inputDosis');
            $keterangan = Input::get('inputCatatan');
            $asuransi = Input::get('asuransi');

            $transaksi_asuransi = 1;
            switch($asuransi){

                case "Data Pasien":
                    $getJaminan = $this->getDataPasienByID($nama)->first()->jaminan;
                    switch($getJaminan){
                        case "Mandiri":
                            $transaksi_asuransi = 1;
                            $asuransi = "Mandiri";
                        break;

                        case "BPJS Kesehatan":
                            $transaksi_asuransi = 2;
                            $asuransi = "BPJS Kesehatan";
                        break;

                        case "Jaminan Kesehatan Lain":
                            $transaksi_asuransi = 3;
                            $asuransi = "Jaminan Kesehatan Lain";
                        break;                        
                    }
                break;

                case "Mandiri":
                    $transaksi_asuransi = 1;
                    $asuransi = "Mandiri";
                break;

                case "BPJS Kesehatan":
                    $transaksi_asuransi = 2;
                    $asuransi = "BPJS Kesehatan";
                break;

                case "Jaminan Kesehatan Lain":
                    $transaksi_asuransi = 3;
                    $asuransi = "Jaminan Kesehatan Lain";
                break;
            }

            $total_data = count($daftar_obat);



            for($i = 0; $i<$total_data; $i++){

                $use = $dosis[$i];
                $stock = $this->getDataObatByName($daftar_obat[$i])->first()->stok;
                //$IIstock = $this->getDataObatGudangByName($daftar_obat[$i], $use)->first()->stok;
                $no_batch = $this->getDataObatGudangByName($daftar_obat[$i], $use)->first()->batch;
                $id_obat_active = $this->getDataObatGudangByName($daftar_obat[$i], $use)->first()->id_obat;
                $last = $stock - $use;
                //$IIlast = $IIstock - $use;

                $transaksi_namaobat = $daftar_obat[$i];
                $transaksi_hargaobat = $this->getDataObatByName($daftar_obat[$i])->first()->harga;
                $transaksi_dosisobat = $use;
                $transaksi_total = $transaksi_hargaobat * $transaksi_dosisobat;
                $transaksi_kalimat = $transaksi_namaobat." (".$transaksi_dosisobat." dosis @".$transaksi_hargaobat.")";

                $data = array(
                        'id' => NULL,
                        'no_resep' => $no_resep,
                        'tanggal' => $tanggal,
                        'umur' => $umur,
                        'dokter' => $dokter,
                        'nama_obat' => $daftar_obat[$i],
                        'no_batch' => $no_batch,
                        'dosis' => $dosis[$i],
                        'keterangan' => $keterangan[$i],
                        'asuransi' => $asuransi
                        );


                $data3 = array(
                        'id' => NULL,
                        'no_resep' => $no_resep,
                        'nama' => $nama
                        );

                $data2 = array(
                         'id' => NULL,
                         'no_resep' => $no_resep,
                         'tanggal' => date('d-m-Y'),
                         'id_obat' => $this->getDataObatByName($daftar_obat[$i])->first()->id_obat,
                         'nama_obat' => $daftar_obat[$i],
                         'no_batch' => $no_batch,
                         'jumlah' => $dosis[$i]
                        );    

                $this->createKartuStok($this->getDataObatByName($daftar_obat[$i])->first()->id_obat, $daftar_obat[$i], "0", $use, $last, date("m/Y"));
                //$this->stockUpdater($id_obat_active, $IIlast);
                $this->stockUpdaterOneByOne($id_obat_active, $use);
                $this->generalStockUpdater($this->getDataObatByName($daftar_obat[$i])->first()->id_obat, ($dosis[$i]*-1));

                $this->createDataTransaksi($nama, $this->getDataPasienByID(Input::get('inputNama'))->first()->nama, $transaksi_kalimat, $transaksi_asuransi, $transaksi_total);
                DB::table('detail_resep')->insert($data);
                DB::table('resep')->insert($data3);
                DB::table('pemakaian')->insert($data2);
            }
            $this->createLog('Menambah '.$total_data.' resep dengan No Resep: '.$no_resep);

            $transact = DB::table('detail_resep')->where('no_resep','=',$no_resep)->where('tanggal','=',$tanggal)->where('dokter','=',$dokter)->get();
            $transactObat = DB::table('obat')->get();

            Session::put("transact_no_resep", $no_resep);
            Session::put("transact_tanggal", $tanggal);
            Session::put("transact_dokter", $dokter);
            
            return View::make('beranda/rekaptransaksi')->with('beranda','')->with('penerimaanresep','class=active')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','')->with('akun','')->with('noresep',$no_resep)->with('nama',$this->getDataPasienByID(Input::get('inputNama'))->first()->nama)->with('tanggal',$tanggal)->with('dokter',$dokter)->with('dataresep',$transact)->with('dataobat',$transactObat);
        }
    }

    public function cetakRekapitulasiTransaksi(){
        $no_resep =  Session::get("transact_no_resep");
        $tanggal  =  Session::get("transact_tanggal");
        $dokter   =  Session::get("transact_dokter");

        $transact = DB::table('detail_resep')->where('no_resep','=',$no_resep)->where('tanggal','=',$tanggal)->where('dokter','=',$dokter)->get();
        $transactObat = DB::table('obat')->get();

        return View::make('beranda/cetakrekaptransaksi')->with('noresep',$no_resep)->with('nama',$this->getDataPasienByID($no_resep)->first()->nama)->with('tanggal',$tanggal)->with('dokter',$dokter)->with('dataresep',$transact)->with('dataobat',$transactObat);
    }

    public function cetakRekapLabel(){
        $no_resep =  Session::get("transact_no_resep");
        $tanggal  =  Session::get("transact_tanggal");
        $dokter   =  Session::get("transact_dokter");

        $transact = DB::table('detail_resep')->where('no_resep','=',$no_resep)->where('tanggal','=',$tanggal)->where('dokter','=',$dokter)->get();
        $transactObat = DB::table('obat')->get();
        return View::make('beranda/cetakrekaplabel')->with('noresep',$no_resep)->with('nama',$this->getDataPasienByID($no_resep)->first()->nama)->with('tanggal',$tanggal)->with('dokter',$dokter)->with('dataresep',$transact)->with('dataobat',$transactObat);
    }    


    public function updateDataResep(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $id = Input::get('id_resep');
        $data = array(
            'no_resep' => Input::get('inputID'),
            'tanggal' => Input::get('inputTanggal'),
            'nama' => Input::get('inputNama'),
            'umur' => $this->countAge($this->getDataPasienByID(Input::get('inputNama'))->first()->tanggal_lahir),
            'dokter' => Input::get('inputDokter'),
            'nama_obat' => Input::get('inputObat'),
            'dosis' => Input::get('inputDosis')
        );
        DB::table('resep')->where('id','=',$id)->update($data);
        return Redirect::to('resep')->with('message', 'Berhasil mengedit data resep.');
        }
    }

    public function hapusDataResep($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Menghapus Data Resep dengan ID: '.$id);
        DB::table('resep')->where('no_resep','=',$id)->delete();
        DB::table('detail_resep')->where('no_resep','=',$id)->delete();
        return Redirect::to('resep')->with('message', 'Berhasil menghapus data resep.');
        }
    }

    public function cetakLabelResep($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $data = DB::table('detail_resep')->where('id','=',$id)->get();
        $data2 = DB::table('resep')->where('id','=',$id)->get();
        $namaPasien = $this->getDataPasienByID($data2->first()->nama);
        $this->createLog("Mencetak data Resep dengan ID; ".$id);
        return View::make('master/cetakLabel')->with('namapasien',$namaPasien)->with('dataresep',$data);
        }
    }


    public function resep(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Masuk ke menu Data Resep');
        $dataresep = DB::table('resep')->select('no_resep')->groupBy('no_resep')->get();
        $datapasien = DB::table('pasien')->get();
        $dataobat = DB::table('obat')->where('stok','>',0)->get();
        $datadokter = DB::table('dokter')->get();
        $selectedDataResep = DB::table('detail_resep')->where('no_resep','=','')->get();
        return View::make('master/resep')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataresep',$dataresep)->with('dataobat',$dataobat)->with('datadokter',$datadokter)->with('datapasien',$datapasien)->with('selectResep',$selectedDataResep);
        }
    }

    public function selectResep($noResep){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Masuk ke menu Data Resep');
        $dataresep = DB::table('resep')->select('no_resep')->groupBy('no_resep')->get();
        $datapasien = DB::table('pasien')->get();
        $dataobat = DB::table('obat')->where('stok','>',0)->get();
        $datadokter = DB::table('dokter')->get();
        $selectedDataResep = DB::table('detail_resep')->where('no_resep','=',$noResep)->get();;
        return View::make('master/resep')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataresep',$dataresep)->with('dataobat',$dataobat)->with('datadokter',$datadokter)->with('datapasien',$datapasien)->with('selectResep',$selectedDataResep);
        }
    }

    public function filterDataResepMain(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $kategori = Input::get('filter-kategori');
        $keyword = Input::get('keyword-pencarian');

        $this->createLog("Mencari data Resep dengan kategori: ".$kategori." dan keyword: ".$keyword);
        $selectedDataResep = DB::table('detail_resep')->where('no_resep','=','')->get();

        switch($kategori){
            case 1:
                $dataresep = DB::table('resep')->select('no_resep')->where('no_resep','LIKE', '%'.$keyword.'%')->groupBy('no_resep')->get();
                $datapasien = DB::table('pasien')->get();
                $dataobat = DB::table('obat')->get();
                $datadokter = DB::table('dokter')->get();
                return View::make('master/resep')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataresep',$dataresep)->with('dataobat',$dataobat)->with('datadokter',$datadokter)->with('datapasien',$datapasien)->with('selectResep',$selectedDataResep);
            break;

            case 2:
                $dataresep = DB::table('resep')->select('no_resep')->where('tanggal','LIKE', '%'.$keyword.'%')->groupBy('no_resep')->get();
                $datapasien = DB::table('pasien')->get();
                $dataobat = DB::table('obat')->get();
                $datadokter = DB::table('dokter')->get();
                return View::make('master/resep')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataresep',$dataresep)->with('dataobat',$dataobat)->with('datadokter',$datadokter)->with('datapasien',$datapasien)->with('selectResep',$selectedDataResep);
            break;

            case 3:
                $dataresep = DB::table('resep')->select('no_resep')->where('nama','LIKE', '%'.$this->getDataPasienByName($keyword)->first()->id_pasien.'%')->groupBy('no_resep')->get();
                $datapasien = DB::table('pasien')->get();
                $dataobat = DB::table('obat')->get();
                $datadokter = DB::table('dokter')->get();
                return View::make('master/resep')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataresep',$dataresep)->with('dataobat',$dataobat)->with('datadokter',$datadokter)->with('datapasien',$datapasien)->with('selectResep',$selectedDataResep);
            break;

            case 4:
                $dataresep = DB::table('resep')->select('no_resep')->where('umur','LIKE', '%'.$keyword.'%')->groupBy('no_resep')>get();
                $datapasien = DB::table('pasien')->get();
                $dataobat = DB::table('obat')->get();
                $datadokter = DB::table('dokter')->get();
                return View::make('master/resep')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataresep',$dataresep)->with('dataobat',$dataobat)->with('datadokter',$datadokter)->with('datapasien',$datapasien)->with('selectResep',$selectedDataResep);
            break;

            case 5:
                $dataresep = DB::table('resep')->select('no_resep')->where('dokter','LIKE', '%'.$keyword.'%')->groupBy('no_resep')->get();
                $datapasien = DB::table('pasien')->get();
                $dataobat = DB::table('obat')->get();
                $datadokter = DB::table('dokter')->get();
                return View::make('master/resep')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataresep',$dataresep)->with('dataobat',$dataobat)->with('datadokter',$datadokter)->with('datapasien',$datapasien)->with('selectResep',$selectedDataResep);
            break;

            case 6:
                $dataresep = DB::table('resep')->select('no_resep')->where('nama_obat','LIKE', '%'.$keyword.'%')->groupBy('no_resep')->get();
                $datapasien = DB::table('pasien')->get();
                $dataobat = DB::table('obat')->get();
                $datadokter = DB::table('dokter')->get();
                return View::make('master/resep')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataresep',$dataresep)->with('dataobat',$dataobat)->with('datadokter',$datadokter)->with('datapasien',$datapasien)->with('selectResep',$selectedDataResep);
            break;

            case 7:
                $dataresep = DB::table('resep')->select('no_resep')->where('dosis','LIKE', '%'.$keyword.'%')->groupBy('no_resep')->get();
                $datapasien = DB::table('pasien')->get();
                $dataobat = DB::table('obat')->get();
                $datadokter = DB::table('dokter')->get();
                return View::make('master/resep')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataresep',$dataresep)->with('dataobat',$dataobat)->with('datadokter',$datadokter)->with('datapasien',$datapasien)->with('selectResep',$selectedDataResep);
            break;
        }
        }
    }    

    public function exportDataResep(){
        $this->createLog("Mengexport ke excel data Resep");
        $period = date('Y-m-d');
        $dataResep = DB::table('resep')->select('no_resep', 'tanggal', 'nama', 'umur', 'dokter', 'nama_obat', 'dosis')->orderBy('id','ASC')->get();

        $dataResepArray = [];
        $dataResepArray[] = ['No. Resep', 'Tanggal Resep', 'Nama Pasien', 'Umur', 'Dokter', 'Nama Obat', 'Dosis'];

        foreach($dataResep as $DataResep) {
            //$dataRapotArray[] = $DataRapot->toArray();
            $dataResepArray[] = (array) $DataResep;
        }

        // Generate and return the spreadsheet
        Excel::create('Data Resep - '.$period, function($excel) use ($dataResepArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Data Resep');
        $excel->setCreator('Aplikasi Manajemen Resep Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
        $excel->setDescription('Data Resep');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataResepArray) {
            $sheet->fromArray($dataResepArray, null, 'A1', false, false);
        });

    })->download('xls');
    }

    public function tambahDataResep(){
        $dataresep = DB::table('resep')->get();
        $datapasien = DB::table('pasien')->get();
        $dataobat = DB::table('obat')->get();
        $datadokter = DB::table('dokter')->get();
        $this->createLog('Masuk ke menu Tambah Data Resep');
        return View::make('master/tambahDataResep')->with('dataresep',$dataresep)->with('dataobat',$dataobat)->with('datadokter',$datadokter)->with('datapasien',$datapasien);
    }

//Controller Satuan
    public function createDataSatuan(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $data = array(
            'id' => NULL,
            'id_satuan' => Input::get('inputIDSatuan'),
            'satuan' => Input::get('inputSatuan'),
            'id_satuan_kemasan' => Input::get('inputSatuanKemasan')
        );

        DB::table('satuan')->insert($data);
        $this->createLog("Menambah data Satuan dengan ID Satuan: ".Input::get('inputIDSatuan').", Satuan: ".Input::get('inputSatuan').", ID Satuan Kemasan: ".Input::get('inputSatuanKemasan'));
        return Redirect::to('datasatuan')->with('message', 'Berhasil menambah data satuan.');
        }
    }

    public function updateDataSatuan(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $id = Input::get('id_satuan');
        $data = array(
            'id_satuan' => Input::get('inputIDSatuan'),
            'satuan' => Input::get('inputSatuan'),
            'id_satuan_kemasan' => Input::get('inputSatuanKemasan')
        );

        DB::table('satuan')->where('id','=',$id)->update($data);
        $this->createLog("Mengubah data Satuan dengan ID Satuan: ".Input::get('inputIDSatuan').", Satuan: ".Input::get('inputSatuan').", ID Satuan Kemasan: ".Input::get('inputSatuanKemasan'));
        return Redirect::to('datasatuan')->with('message', 'Berhasil mengedit data satuan.');
        }
    }

    public function hapusDataSatuan($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        DB::table('satuan')->where('id','=',$id)->delete();
        $this->createLog("Menghapus data Satuan dengan ID: ".$id);
        return Redirect::to('datasatuan')->with('message', 'Berhasil menghapus data satuan.');
        }
    }

    public function selectDataSatuan($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $selectSatuan = DB::table('satuan')->where('id','=',$id)->get();
        $this->createLog("Memilih data Satuan dengan ID: ".$id);
        return Redirect::to('datasatuan')->with('select','Data Satuan Selected')->with('id',$selectSatuan->first()->id)->with('id_satuan',$selectSatuan->first()->id_satuan)->with('satuan',$selectSatuan->first()->satuan)->with('id_satuan_kemasan',$selectSatuan->first()->id_satuan_kemasan);
        }
    }

    public function datasatuan(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $datasatuan = DB::table('satuan')->get();
        $datakemasan = DB::table('satuan_kemasan')->get();
        $this->createLog('Masuk ke menu data Satuan');
        return View::make('obat/satuan')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datasatuan',$datasatuan)->with('datakemasan',$datakemasan);
        }
    }

    public function filterDataSatuanMain(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $kategori = Input::get('filter-kategori');
        $keyword = Input::get('keyword-pencarian');

        $this->createLog("Mencari data Satuan dengan kategori: ".$kategori." dan keyword: ".$keyword);

        switch($kategori){
            case 1:
                $datasatuan = DB::table('satuan')->where('id_satuan','LIKE','%'.$keyword.'%')->get();
                $datakemasan = DB::table('satuan_kemasan')->get();
                return View::make('obat/satuan')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datasatuan',$datasatuan)->with('datakemasan',$datakemasan);
            break;

            case 2:
                $datasatuan = DB::table('satuan')->where('satuan','LIKE','%'.$keyword.'%')->get();
                $datakemasan = DB::table('satuan_kemasan')->get();
                return View::make('obat/satuan')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datasatuan',$datasatuan)->with('datakemasan',$datakemasan);
            break;
        }
        }
    }    

    public function exportDataSatuan(){
        $this->createLog("Mengexport ke excel data Satuan ");
        $period = date('Y-m-d');
        $dataSatuan = DB::table('satuan')->select('id_satuan', 'satuan', 'id_satuan_kemasan')->orderBy('id','ASC')->get();        

        $dataSatuanArray = [];
        $dataSatuanArray[] = ['ID Satuan', 'Satuan', 'ID Satuan Kemasan'];

        foreach($dataSatuan as $DataSatuan) {
            //$dataRapotArray[] = $DataRapot->toArray();
            $dataSatuanArray[] = (array) $DataSatuan;
        }

        // Generate and return the spreadsheet
        Excel::create('Data Satuan - '.$period, function($excel) use ($dataSatuanArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Data Satuan');
        $excel->setCreator('Aplikasi Manajemen Satuan Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
        $excel->setDescription('Data Satuan');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataSatuanArray) {
            $sheet->fromArray($dataSatuanArray, null, 'A1', false, false);
        });

    })->download('xls');
    }

//Controller Satuan Kemasan
    public function createDataKemasan(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $data = array(
            'id' => NULL,
            'id_satuan_kemasan' => Input::get('inputIDSatuanKemasan'),
            'satuan_kemasan' => Input::get('inputSatuanKemasan')
        );

        
        DB::table('satuan_kemasan')->insert($data);
        $this->createLog("Menambah data Satuan Kemasan: ID: ".Input::get('inputIDSatuanKemasan').", Satuan Kemasan: ".Input::get('inputSatuanKemasan'));
        return Redirect::to('datakemasan')->with('message', 'Berhasil menambah data satuan kemasan.');
        }
    }

    public function updateDataKemasan(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $id = Input::get('id_kemasan');
        $data = array(
            'id_satuan_kemasan' => Input::get('inputIDSatuanKemasan'),
            'satuan_kemasan' => Input::get('inputSatuanKemasan')
        );

        DB::table('satuan_kemasan')->where('id','=',$id)->update($data);
        $this->createLog("Mengupdate data Satuan Kemasan dengan ID(".$id."): ID: ".Input::get('inputIDSatuanKemasan').", Satuan Kemasan: ".Input::get('inputSatuanKemasan'));
        return Redirect::to('datakemasan')->with('message', 'Berhasil mengedit data satuan kemasan.');
        }
    }

    public function hapusDataKemasan($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        DB::table('satuan_kemasan')->where('id','=',$id)->delete();
        $this->createLog("Menghapus data Satuan Kemasan dengan ID: ".$id);
        return Redirect::to('datakemasan')->with('message', 'Berhasil menghapus data satuan kemasan.');
        }
    }

    public function selectDataKemasan($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $selectkemasan = DB::table('satuan_kemasan')->where('id','=',$id)->get();
        $this->createLog("Memilih data Satuan Kemasan dengan ID: ".$id);
        return Redirect::to('datakemasan')->with('select','Data Kemasan Selected')->with('id',$selectkemasan->first()->id)->with('id_satuan_kemasan',$selectkemasan->first()->id_satuan_kemasan)->with('satuan_kemasan',$selectkemasan->first()->satuan_kemasan);
        }
    }

    public function datakemasan(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $datakemasan = DB::table('satuan_kemasan')->get();
        $this->createLog("Masuk ke menu data Satuan Kemasan");
        return View::make('obat/kemasan')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datakemasan',$datakemasan);
        }    
    }

        public function filterDataKemasanMain(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $kategori = Input::get('filter-kategori');
        $keyword = Input::get('keyword-pencarian');

        $this->createLog("Mencari data Satuan Kemasan dengan kategori: ".$kategori." dan keyword: ".$keyword);

        switch($kategori){
            case 1:
                $datakemasan = DB::table('satuan_kemasan')->where('id_satuan_kemasan','LIKE','%'.$keyword.'%')->get();
                return View::make('obat/kemasan')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datakemasan',$datakemasan);
            break;

            case 2:
                $datakemasan = DB::table('satuan_kemasan')->where('satuan_kemasan','LIKE','%'.$keyword.'%')->get();
                return View::make('obat/kemasan')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datakemasan',$datakemasan);
            break;
        }
        }
    }

    public function exportDataKemasan(){
        $this->createLog("Mengexport ke excel data Satuan Kemasan");
        $period = date('Y-m-d');
        $dataKemasan = DB::table('satuan_kemasan')->select('id_satuan_kemasan', 'satuan_kemasan')->orderBy('id','ASC')->get();        

        $dataKemasanArray = [];
        $dataKemasanArray[] = ['ID Satuan Kemasan', 'Satuan Kemasan'];

        foreach($dataKemasan as $DataKemasan) {
            //$dataRapotArray[] = $DataRapot->toArray();
            $dataKemasanArray[] = (array) $DataKemasan;
        }

        // Generate and return the spreadsheet
        Excel::create('Data Kemasan - '.$period, function($excel) use ($dataKemasanArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Data Kemasan');
        $excel->setCreator('Aplikasi Manajemen Kemasan Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
        $excel->setDescription('Data Kemasan');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataKemasanArray) {
            $sheet->fromArray($dataKemasanArray, null, 'A1', false, false);
        });

    })->download('xls');
    }

//Controller Supplier
    public function createDataSupplier(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $data = array(
            'id' => NULL,
            'id_supplier' => Input::get('inputIDSupplier'),
            'supplier' => Input::get('inputSupplier'),
            'alamat' => Input::get('inputAlamat'),
            'telepon' => Input::get('inputTelepon')
        );
        $this->createLog('Menambah Data Supplier dengan ID: '.Input::get('inputIDSupplier').', Nama Supplier: '.Input::get('inputSupplier').', Alamat: '.Input::get('inputAlamat').', Telepon: '.Input::get('inputTelepon'));
        DB::table('supplier')->insert($data);
        return Redirect::to('supplier')->with('message', 'Berhasil menambah data supplier.');
        }
    }

    public function updateDataSupplier(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $id = Input::get('id_supplier');
        $data = array(
            'id_supplier' => Input::get('inputIDSupplier'),
            'supplier' => Input::get('inputSupplier'),
            'alamat' => Input::get('inputAlamat'),
            'telepon' => Input::get('inputTelepon')     
        );
        $this->createLog('Menambah Data Supplier dengan ID: '.Input::get('inputIDSupplier').', Nama Supplier: '.Input::get('inputSupplier').', Alamat: '.Input::get('inputAlamat').', Telepon: '.Input::get('inputTelepon'));
        DB::table('supplier')->where('id','=',$id)->update($data);
        return Redirect::to('supplier')->with('message', 'Berhasil mengedit data supplier.');
        }
    }

    public function hapusDataSupplier($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Menghapus Data Supplier dengan ID: '.$id);
        DB::table('supplier')->where('id','=',$id)->delete();
        return Redirect::to('supplier')->with('message', 'Berhasil menghapus data supplier.');
        }
    }

    public function selectDataSupplier($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Memilih Data Supplier dengan ID: '.$id);
        $selectsupplier = DB::table('supplier')->where('id','=',$id)->get();
        return Redirect::to('supplier')->with('select','Data Supplier selected')->with('id',$selectsupplier->first()->id)->with('id_supplier',$selectsupplier->first()->id_supplier)->with('supplier',$selectsupplier->first()->supplier)->with('alamat',$selectsupplier->first()->alamat)->with('telepon',$selectsupplier->first()->telepon);
        }
    }

    public function supplier(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Masuk ke menu Data Supplier');
        $datasupplier = DB::table('supplier')->get();
        return View::make('master/supplier')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datasupplier',$datasupplier);
        }
    }

    public function filterDataSupplierMain(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $kategori = Input::get('filter-kategori');
        $keyword = Input::get('keyword-pencarian');

        $this->createLog("Mencari data Supplier dengan kategori: ".$kategori." dan keyword: ".$keyword);

        switch($kategori){
            case 1:
                $datasupplier = DB::table('supplier')->where('id_supplier','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/supplier')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datasupplier',$datasupplier);
            break;

            case 2:
                $datasupplier = DB::table('supplier')->where('supplier','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/supplier')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datasupplier',$datasupplier);
            break;

            case 3:
                $datasupplier = DB::table('supplier')->where('alamat','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/supplier')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datasupplier',$datasupplier);
            break;

            case 4:
                $datasupplier = DB::table('supplier')->where('telepon','LIKE', '%'.$keyword.'%')->get();
                return View::make('master/supplier')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datasupplier',$datasupplier);
            break;
        }
        }
    }    

    public function exportDataSupplier(){
        $this->createLog("Mengexport ke excel data Supplier");
        $period = date('Y-m-d');
        $dataSupplier = DB::table('supplier')->select('id_supplier', 'supplier', 'alamat', 'telepon')->orderBy('id','ASC')->get();        

        $dataSupplierArray = [];
        $dataSupplierArray[] = ['ID Supplier', 'Supplier', 'Alamat', 'telepon'];

        foreach($dataSupplier as $DataSupplier) {
            //$dataRapotArray[] = $DataRapot->toArray();
            $dataSupplierArray[] = (array) $DataSupplier;
        }

        // Generate and return the spreadsheet
        Excel::create('Data Supplier - '.$period, function($excel) use ($dataSupplierArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Data Supplier');
        $excel->setCreator('Aplikasi Manajemen Supplier Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
        $excel->setDescription('Data Supplier');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataSupplierArray) {
            $sheet->fromArray($dataSupplierArray, null, 'A1', false, false);
        });

    })->download('xls');
    }

//Controller Penyimpanan
    public function createDataPenyimpanan(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $data = array(
            'id' => NULL,
            'id_penyimpanan' => Input::get('inputIDPenyimpanan'),
            'penyimpanan' => Input::get('inputPenyimpanan')
        );

        $this->createLog("Menambah data Penyimpanan dengan ID Penyimpanan: ".Input::get('inputIDPenyimpanan').", Nama Penyimpanan: ".Input::get('inputPenyimpanan'));
        DB::table('penyimpanan')->insert($data);
        return Redirect::to('letakobat')->with('message', 'Berhasil menambah data penyimpanan.');
        }
    }

    public function updateDataPenyimpanan(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $id = Input::get('id_penyimpanan');
        $data = array(
            'id_penyimpanan' => Input::get('inputIDPenyimpanan'),
            'penyimpanan' => Input::get('inputPenyimpanan')
        );
        $this->createLog("Mengupdate data Penyimpanan dengan ID Penyimpanan: ".Input::get('inputIDPenyimpanan').", Nama Penyimpanan: ".Input::get('inputPenyimpanan'));
        DB::table('penyimpanan')->where('id','=',$id)->update($data);
        return Redirect::to('letakobat')->with('message', 'Berhasil mengedit data penyimpanan.');
        }
    }

    public function hapusDataPenyimpanan($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog("Menghapus data Penyimpanan dengan ID: ".$id);
        DB::table('penyimpanan')->where('id','=',$id)->delete();
        return Redirect::to('letakobat')->with('message', 'Berhasil menghapus data penyimpanan.');
        }
    }

    public function selectDataPenyimpanan($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog("Memilih data Penyimpanan dengan ID: ".$id);
        $selectpenyimpanan = DB::table('penyimpanan')->where('id','=',$id)->get();
        return Redirect::to('letakobat')->with('select','dataupdate')->with('id',$selectpenyimpanan->first()->id)->with('id_penyimpanan',$selectpenyimpanan->first()->id_penyimpanan)->with('penyimpanan',$selectpenyimpanan->first()->penyimpanan);
        }
    }

    public function letakobat(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Masuk ke menu data Penyimpanan');
        $datapenyimpanan = DB::table('penyimpanan')->get();
        return View::make('master/letakobat')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapenyimpanan',$datapenyimpanan);
        }          
    }

    public function filterDataPenyimpananMain(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $kategori = Input::get('filter-kategori');
        $keyword = Input::get('keyword-pencarian');

        $this->createLog("Mencari data Penyimpanan dengan kategori: ".$kategori." dan keyword: ".$keyword);

        switch($kategori){
            case 1:
                $datapenyimpanan = DB::table('penyimpanan')->where('id_penyimpanan','LIKE','%'.$keyword.'%')->get();
                return View::make('master/letakobat')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapenyimpanan',$datapenyimpanan);
            break;

            case 2:
                $datapenyimpanan = DB::table('penyimpanan')->where('penyimpanan','LIKE','%'.$keyword.'%')->get();
                return View::make('master/letakobat')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapenyimpanan',$datapenyimpanan);
            break;
        }
        }
    }    

    public function exportDataPenyimpanan(){
        $this->createLog("Mengexport ke excel data penyimpanan");
        $dataPenyimpanan = DB::table('penyimpanan')->select('id_penyimpanan', 'penyimpanan')->orderBy('id','ASC')->get();        

        $dataPenyimpananArray = [];
        $dataPenyimpananArray[] = ['ID Penyimpanan', 'Penyimpanan'];

        foreach($dataPenyimpanan as $DataPenyimpanan) {
            //$dataRapotArray[] = $DataRapot->toArray();
            $dataPenyimpananArray[] = (array) $DataPenyimpanan;
        }

        // Generate and return the spreadsheet
        Excel::create('Data Penyimpanan', function($excel) use ($dataPenyimpananArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Data Penyimpanan');
        $excel->setCreator('Aplikasi Manajemen Penyimpanan Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
        $excel->setDescription('Data Penyimpanan');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataPenyimpananArray) {
            $sheet->fromArray($dataPenyimpananArray, null, 'A1', false, false);
        });

    })->download('xls');
    }

//Controller User
    public function createDataUser(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $data = array(
            'id' => NULL,
            'id_user' => Input::get('inputIDUser'),
            'username' => Input::get('inputUsername'),
            'password' => md5(Input::get('inputPassword')),
            'nip' => Input::get('inputNIP')
        );
        $this->createLog('Menambah data User dengan ID: '.Input::get('inputIDUser').', Username: '.Input::get('inputUsername').', NIP: '.Input::get('inputNIP'));
        DB::table('user')->insert($data);
        return Redirect::to('user')->with('message', 'Berhasil menambah data user.');
        }
    }

    public function updateDataUser(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $id = Input::get('id_user');
        $data = array(
            'id_user' => Input::get('inputIDUser'),
            'username' => Input::get('inputUsername'),
            'password' => md5(Input::get('inputPassword')),
            'nip' => Input::get('inputNIP')
        );
        $this->createLog('Mengupdate data User dengan ID: '.Input::get('inputIDUser').', Username: '.Input::get('inputUsername').', NIP: '.Input::get('inputNIP'));
        DB::table('user')->where('id','=',$id)->update($data);
        return Redirect::to('user')->with('message', 'Berhasil mengedit data user.');
        }
    }

    public function hapusDataUser($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Menghapus Data User dengan ID: '.$id);            
        DB::table('user')->where('id','=',$id)->delete();
        return Redirect::to('user')->with('message', 'Berhasil menghapus data user.');
        }
    }

    public function selectDataUser($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Memilih Data User dengan ID: '.$id);
        $selectuser = DB::table('user')->where('id','=',$id)->get();
        return Redirect::to('user')->with('select',"memuat data berhasil")->with('id_user',$selectuser->first()->id_user)->with('username',$selectuser->first()->username)->with('nip',$selectuser->first()->nip)->with('id',$selectuser->first()->id);
        }
    }

    public function user(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Masuk ke menu Data User');
        $logdata = DB::table('log')->get();
        Session::put("log_print", $logdata);
        $datauser = DB::table('user')->get();
        $datapegawai = DB::table('pegawai')->get();
        return View::make('master/user')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datauser',$datauser)->with('datapegawai',$datapegawai)->with('logdata', $logdata)->with('activeUser','active')->with('activeLog','');
        }
    }

    public function filterDataLog(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $kategori = Input::get('inputKategori');
        $keyword = Input::get('inputKeyword');
        $startDate = $this->getFirstID(Input::get('startDate'));
        $endDate = $this->getLastID(Input::get('endDate'));

        $this->createLog("Mencari data Log User dengan kategori: ".$kategori." dan keyword: ".$keyword);

        switch($kategori){
            case 1:
                $logdata = DB::table('log')->where('id_user','=',$keyword)->whereBetween('id', [$startDate, $endDate])->get();
                $datauser = DB::table('user')->get();
                $datapegawai = DB::table('pegawai')->get();
                Session::put("log_print", $logdata);
                return View::make('master/user')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datauser',$datauser)->with('datapegawai',$datapegawai)->with('logdata', $logdata)->with('activeUser','')->with('activeLog','active');
            break;

            case 2:
                $logdata = DB::table('log')->where('nama_user','=',$keyword)->whereBetween('id', [$startDate, $endDate])->get();
                $datauser = DB::table('user')->get();
                $datapegawai = DB::table('pegawai')->get();
                Session::put("log_print", $logdata);
                return View::make('master/user')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datauser',$datauser)->with('datapegawai',$datapegawai)->with('logdata', $logdata)->with('activeUser','')->with('activeLog','active');
            break;
        }
        }
    }

    public function resetTableLog(){
        $this->createLog('Reset Table Log');
        $logdata = DB::table('log')->get();
        $datauser = DB::table('user')->get();
        $datapegawai = DB::table('pegawai')->get();
        Session::put("log_print", $logdata);
        return View::make('master/user')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datauser',$datauser)->with('datapegawai',$datapegawai)->with('logdata', $logdata)->with('activeUser','')->with('activeLog','active');
    }

    public function exportDataLog(){
        $this->createLog("Mengexport ke excel data Log");
        $dataLog = Session::get("log_print");

        $dataLogArray = [];
        $dataLogArray[] = ['ID Log', 'Tanggal', 'ID User', 'User Profile', 'Aktivitas'];

        foreach($dataLog as $DataLog) {
            //$dataRapotArray[] = $DataRapot->toArray();
            $dataLogArray[] = (array) $DataLog;
        }

        // Generate and return the spreadsheet
        Excel::create('Data Log', function($excel) use ($dataLogArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Data Log');
        $excel->setCreator('Aplikasi Manajemen Penyimpanan Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
        $excel->setDescription('Data Log');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataLogArray) {
            $sheet->fromArray($dataLogArray, null, 'A1', false, false);
        });

    })->download('xls');
    }

    public function removeLog(){
        DB::table('log')->truncate();
        $this->createLog('Flush Table Log');
        $logdata = DB::table('log')->get();
        $datauser = DB::table('user')->get();
        $datapegawai = DB::table('pegawai')->get();
        Session::put("log_print", $logdata);
        return View::make('master/user')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datauser',$datauser)->with('datapegawai',$datapegawai)->with('logdata', $logdata)->with('activeUser','')->with('activeLog','active');
    }

    public function filterDataUserMain(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $kategori = Input::get('filter-kategori');
        $keyword = Input::get('keyword-pencarian');

        $this->createLog("Mencari data User dengan kategori: ".$kategori." dan keyword: ".$keyword);

        $logdata = DB::table('log')->get();

        switch($kategori){
            case 1:
                $datauser = DB::table('user')->where('id_user','LIKE', '%'.$keyword.'%')->get();
                $datapegawai = DB::table('pegawai')->get();
                return View::make('master/user')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datauser',$datauser)->with('datapegawai',$datapegawai)->with('logdata', $logdata)->with('activeUser','active')->with('activeLog','');
            break;

            case 2:
                $datauser = DB::table('user')->where('username','LIKE', '%'.$keyword.'%')->get();
                $datapegawai = DB::table('pegawai')->get();
                return View::make('master/user')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datauser',$datauser)->with('datapegawai',$datapegawai)->with('logdata', $logdata)->with('activeUser','active')->with('activeLog','');
            break;

            case 3:
                $datauser = DB::table('user')->where('nip','LIKE', '%'.$keyword.'%')->get();
                $datapegawai = DB::table('pegawai')->get();
                return View::make('master/user')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datauser',$datauser)->with('datapegawai',$datapegawai)->with('logdata', $logdata)->with('activeUser','active')->with('activeLog','');
            break;
        }
        }
    }        

//Controller Pengaturan Akun
    public function akun(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');
        }
        else{
        $this->createLog('Masuk ke menu Pengaturan Akun');
        $datauser = DB::table('user')->where('nip','=',Session::get('nip'))->get();
        $datapegawai = DB::table('pegawai')->where('nip','=',Session::get('nip'))->get();
        return View::make('beranda/akun')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','')->with('akun','active')->with('datauser',$datauser)->with('datapegawai',$datapegawai);
        }
    }

    public function updateAkunPegawai(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $data = array(
            'nama' => Input::get('inputNama')
            );
        $this->createLog('Mengupdate data Akun ke nama: '.Input::get('inputNama'));
        DB::table('pegawai')->where('nip',Session::get('nip'))->update($data);
        return Redirect::to('akun')->with('message',"update profil berhasil.");
        }
    }

    public function updateAkun(){
        $oldpassword = md5(Input::get('inputOldPassword'));
        $newpassword = Input::get('inputNewPassword');
        $repassword = Input::get('inputNewPassword1');


        $cekpassword = $this -> checkpassword($oldpassword);
        if(count($cekpassword) > 0){
            if($newpassword != $repassword){
                return Redirect::to('akun')->with('message','Password baru yang dimasukkan tidak cocok');   
            }
            else{
               $this->createLog('Mengupdate kredensial akun');
               $this->updatePassword($repassword);
               return Redirect::to('akun')->with('message','Password berhasil diupdate');  
            }
        }
        else{
        return Redirect::to('akun')->with('message','Password lama tidak cocok');
        }
    }

//Controller Kedaluarsa
    public function datakedaluarsa(){
        $this->createLog('Masuk ke menu data Gudang Obat');
        $datastok = DB::table('gudang_obat')->orderBy('nama_obat', 'ASC')->get();
        $dataobat = DB::table('obat')->orderBy('obat', 'ASC')->get();
        return View::make('obat/kedaluarsa')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataobat',$dataobat)->with('datastok',$datastok);
    }

    public function createDataStok(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $data = array(
            '_id' => NULL,
            'id_obat' => Input::get('inputNamaObat'),
            'nama_obat' => $this->getDataObatByID(Input::get('inputNamaObat'))->first()->obat,
            'batch' => Input::get('inputBatch'),
            'tanggal_kadaluarsa' => Input::get('inputTanggalKadaluarsa'),
            'kadaluarsa' => "0",
            'stok' => Input::get('inputStok'),
            'rusak' => "0"
        );
        $this->createLog('Menambah Data Stok Gudang Obat dengan ID: '.Input::get('inputNamaObat').', Nama Obat: '.$this->getDataObatByID(Input::get('inputNamaObat'))->first()->obat.', No Batch:'.Input::get('inputBatch').', Tanggal Kadaluarsa: '.Input::get('inputTanggalKadaluarsa').', Jumlah Stok: '.Input::get('inputStok'));
        DB::table('gudang_obat')->insert($data);
        $this->createKartuStokGudang(Input::get('inputNamaObat'),$this->getDataObatByID(Input::get('inputNamaObat'))->first()->obat, Input::get('inputStok'));
        $this->generalStockUpdater(Input::get('inputNamaObat'), Input::get('inputStok'));
        return Redirect::to('datakedaluarsa')->with('message', 'Berhasil menambah data stok obat.');
        }
    }

    public function cekObatTerperiksa(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $cek = key(Input::get('save'));
        $id_obat = $this->getIDObatGudangObatByID($cek);
        $data = array(
            'kadaluarsa' => Input::get('updateKadaluarsa-'.$cek),
            'stok' => (Input::get('updateStok-'.$cek)-Input::get('updateRusak-'.$cek)),
            'rusak' => Input::get('updateRusak-'.$cek)
        );
        $this->createLog('Mengupdate Data Stok Gudang Obat dengan ID: '.$cek.', Status Kadaluarsa: '.Input::get('updateKadaluarsa-'.$cek).', Jumlah Stok: '.Input::get('updateStok-'.$cek).', Stok Rusak: '.Input::get('updateRusak-'.$cek));
        DB::table('gudang_obat')->where('_id','=', $cek)->update($data);
        $this->generalStockUpdater($id_obat , (Input::get('updateRusak-'.$cek)*-1));
        return Redirect::to('datakedaluarsa')->with('message', 'Berhasil mengubah data stok.');
        }
    }

    public function hapusDataStok($id){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog("Menghapus Data Stok Gudang Obat dengan ID: ".$id);
        DB::table('gudang_obat')->where('_id','=',$id)->delete();
        return Redirect::to('datakedaluarsa')->with('message', 'Berhasil menghapus data stok.');
        }
    }

    public function filterDataObat(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $id_obat = Input::get('inputJenisObat');
        $kadaluarsa = Input::get('inputJenisKadaluarsa');

        //echo $id_obat."_".$kadaluarsa;

        if($id_obat == "0"){
            switch ($kadaluarsa) {
                    case "0":
                        $datastok = DB::table('gudang_obat')->where('kadaluarsa','=','0')->get();
                        $dataobat = DB::table('obat')->get();
                        return View::make('obat/kedaluarsa')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataobat',$dataobat)->with('datastok',$datastok);
                        break;
                    
                    case "1":
                        $datastok = DB::table('gudang_obat')->where('kadaluarsa','=','1')->get();
                        $dataobat = DB::table('obat')->get();
                        return View::make('obat/kedaluarsa')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataobat',$dataobat)->with('datastok',$datastok);
                        break;

                    default:
                        $datastok = DB::table('gudang_obat')->get();
                        $dataobat = DB::table('obat')->get();
                        return View::make('obat/kedaluarsa')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataobat',$dataobat)->with('datastok',$datastok);
                        break;
                }
        }
        else{
            switch ($kadaluarsa) {
                    case "0":
                        $datastok = DB::table('gudang_obat')->where('id_obat','=',$id_obat)->get();
                        $dataobat = DB::table('obat')->get();
                        return View::make('obat/kedaluarsa')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataobat',$dataobat)->with('datastok',$datastok);
                        break;
                    
                    case "1":
                        $datastok = DB::table('gudang_obat')->where('id_obat','=',$id_obat)->get();
                        $dataobat = DB::table('obat')->get();
                        return View::make('obat/kedaluarsa')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataobat',$dataobat)->with('datastok',$datastok);
                        break;

                    default:
                        $datastok = DB::table('gudang_obat')->where('id_obat','=',$id_obat)->get();
                        $dataobat = DB::table('obat')->get();
                        return View::make('obat/kedaluarsa')->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('dataobat',$dataobat)->with('datastok',$datastok);
                        break;
                }
        }
        $this->createLog("Filter Data Stok Gudang Obat dengan ID Obat: ".Input::get('inputJenisObat')." dan Status Kadaluarsa: ".Input::get('inputJenisKadaluarsa'));
         }
    }


//Controller Permintaan
    public function permintaan(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
            $this->createLog('Masuk ke menu Data Permintaan');
            $datapermintaan = DB::table('permintaan')->where('id_permintaan','=',"0")->get();
            $data = DB::table('permintaan')->select('id_permintaan', 'tanggal_permintaan')->groupBy('id_permintaan', 'tanggal_permintaan')->get();
            $dataobat = DB::table('obat')->get();
            $periodePermintaan = "Semua Periode";
            return View::make('transaksi/permintaan')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','class=active')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','')->with('akun','')->with('datapermintaan', $data)->with('tabelpermintaan', $datapermintaan)->with('dataobat',$dataobat)->with('periodepermintaan',$periodePermintaan);
        }
    }

    public function filterPeriodePermintaan(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{

        $tahun = Input::get('tahun');
        $periode = "";

            $this->createLog('Masuk ke menu Data Permintaan');
            $datapermintaan = DB::table('permintaan')->where('id_permintaan','=',"0")->get();
            $data = DB::table('permintaan')->select('id_permintaan', 'tanggal_permintaan')->where('tanggal_permintaan','LIKE',$tahun.'%')->groupBy('id_permintaan', 'tanggal_permintaan')->get();
            $dataobat = DB::table('obat')->get();
            $periodePermintaan = $tahun;
            return View::make('transaksi/permintaan')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','class=active')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','')->with('akun','')->with('datapermintaan', $data)->with('tabelpermintaan', $datapermintaan)->with('dataobat',$dataobat)->with('periodepermintaan',$periodePermintaan);
        }
    }

    public function filterDataPermintaanMain(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $kategori = Input::get('filter-kategori');
        $keyword = Input::get('keyword-pencarian');

        $this->createLog("Mencari data Permintaan dengan kategori: ".$kategori." dan keyword: ".$keyword);
        $periodePermintaan = "";
        switch($kategori){
            case 1:
                $datapermintaan = DB::table('permintaan')->where('id_obat','LIKE', '%'.$keyword.'%')->get();
                $data = DB::table('permintaan')->select('id_permintaan', 'tanggal_permintaan')->groupBy('id_permintaan', 'tanggal_permintaan')->get();
                return View::make('transaksi/permintaan')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','class=active')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','')->with('akun','')->with('datapermintaan', $data)->with('tabelpermintaan', $datapermintaan)->with('periodepermintaan',$periodePermintaan);
            break;

            case 2:
                $datapermintaan = DB::table('permintaan')->where('nama_obat','LIKE', '%'.$keyword.'%')->get();
                $data = DB::table('permintaan')->select('id_permintaan', 'tanggal_permintaan')->groupBy('id_permintaan', 'tanggal_permintaan')->get();
                return View::make('transaksi/permintaan')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','class=active')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','')->with('akun','')->with('datapermintaan', $data)->with('tabelpermintaan', $datapermintaan)->with('periodepermintaan',$periodePermintaan);
            break;
        }
        }
    }   

    public function selectDataPermintaan(){
        $idPermintaan = Input::get("idpermintaan");
        Session::put('selectedID', $idPermintaan);
        $datapermintaan = DB::table('permintaan')->where('id_permintaan','=',$idPermintaan)->where('jumlah_permintaan','>',0)->get();
        $data = DB::table('permintaan')->select('id_permintaan', 'tanggal_permintaan')->groupBy('id_permintaan', 'tanggal_permintaan')->get();

        $this->createLog('Memilih Data Permintaan dengan ID: '.$idPermintaan);
        $dataobat = DB::table('obat')->get();
        //echo $idPermintaan;
        $periodePermintaan = "";
        return View::make('transaksi/permintaan')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','class=active')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','')->with('akun','')->with('datapermintaan', $data)->with('tabelpermintaan', $datapermintaan)->with('dataobat',$dataobat)->with('periodepermintaan',$periodePermintaan);
    }

    public function cetakTransaksiPermintaan(){
        $idPermintaan = Session::get('selectedID');
        $datapermintaan = DB::table('permintaan')->where('id_permintaan','=',$idPermintaan)->where('jumlah_permintaan','>',0)->get();
        $data = DB::table('permintaan')->select('id_permintaan', 'tanggal_permintaan')->groupBy('id_permintaan', 'tanggal_permintaan')->get();

        $this->createLog('Memilih Data Permintaan dengan ID: '.$idPermintaan);
        $dataobat = DB::table('obat')->get();
        //echo $idPermintaan;

            $todayday = date('d');
            $todaymonth = date("m");
            $todayyear = date("Y");

            $setmonth = "";

            switch ($todaymonth) {
            case '01': $setmonth = "Januari"; break;
            case '02': $setmonth = "Februari"; break;
            case '03': $setmonth = "Maret"; break;
            case '04': $setmonth = "April"; break;
            case '05': $setmonth = "Mei"; break;
            case '06': $setmonth = "Juni"; break;
            case '07': $setmonth = "Juli"; break;
            case '08': $setmonth = "Agustus"; break;
            case '09': $setmonth = "September"; break;
            case '10': $setmonth = "Oktober"; break;
            case '11': $setmonth = "November"; break;
            case '12': $setmonth = "Desember"; break;
            }

            $declareDate = "Yogyakarta, ".$todayday." ".$setmonth." ".$todayyear;

        return View::make('transaksi/cetaktransaksipermintaan')->with('datapermintaan', $data)->with('tabelpermintaan', $datapermintaan)->with('dataobat',$dataobat)->with('declaredate',$declareDate);
    }

    public function insertDataPermintaan($id, $idobat, $namaobat, $tanggal, $penerimaan_lalu, $stok, $pemakaian, $stok_rusak, $sisa, $optimum, $bon){
        
        $datapermintaan = (2*$pemakaian) - $sisa - $bon;
        if($datapermintaan < 0 && $bon == 0){
            $datapermintaan = 0;
        }
        elseif ($datapermintaan < 0 && $bon > 0) {
            $datapermintaan = -1 * $bon;   
        }



        $data = array(
            'id' => null,
            'id_permintaan' => $id,
            'id_obat' => $idobat,
            'nama_obat' => $namaobat,
            'jumlah_permintaan' => $datapermintaan,
            'tanggal_permintaan' => $tanggal,
            'penerimaan_lalu' => $penerimaan_lalu,
            'stok' => $stok,
            'pemakaian' => $pemakaian,
            'rusak' => $stok_rusak,
            'sisa_stok' => $sisa,
            'stok_optimum' => (2*($pemakaian))
            );

        DB::table("permintaan")->insert($data);
        if($datapermintaan > 0){
            $this -> insertDataPenerimaan($id, $idobat, $namaobat, $tanggal);
        }
    }

    public function insertDataPenerimaan($id, $idobat, $namaobat, $tanggal){
        $data = array(
            'id' => null,
            'id_permintaan' => $id,
            'tanggal_permintaan' => $tanggal,
            'id_obat' => $idobat,
            'nama_obat' => $namaobat,
            'tanggal' => "",
            'tgl_kadaluarsa' => "",
            'jumlah' => "",
            'supplier' => "",
            'no_batch' => "",
            'status' => "0"
            );

        DB::table("penerimaan")->insert($data);
    }

    public function createDataPermintaan(){
        $IDPermintaan = Input::get('id_permintaan');
        $tanggalPermintaan = date("Y-m");

        $bon;

        $recentDates = date("m");
        $recentYears = date("Y");

        $datesForPenerimaanLalu = "";
        $pastDates = sprintf("%02d", ($recentDates - 1));
        if($pastDates == 0){
            $pastDates = 12;
            $datesForPenerimaanLalu = $recentYears - 1;
        }
        else{
            $datesForPenerimaanLalu = $recentYears;
        }


        $dateFormulae = $pastDates."/".$datesForPenerimaanLalu;
        $dateFormulae2 = $datesForPenerimaanLalu."-".$pastDates;

        $IDBon = $this->getDataBonByDate($dateFormulae2);
        

        $dataobat = DB::table('obat')->get();
        if($dataobat -> count() >0){
            foreach ($dataobat as $obat) {
                $idobat = $obat->id_obat;
                $penerimaanLalu = $this->getPenerimaanLalu($idobat, $dateFormulae2);
                $stok = $this->getJumlahMasuk($idobat, $dateFormulae);
                $namaobat = $obat->obat;
                $jumlahPemakaian = $this->getJumlahPemakaian($obat->obat, $dateFormulae2);
                $stokrusak = $this->getJumlahRusak($obat->id_obat);
                $sisa_stok = $obat->stok;
                $stokOptimum = 2 * $jumlahPemakaian;

                if($IDBon -> count() > 0){
                    $IDObat = $this->getDetailBonByID($IDBon->first()->id_bon, $idobat);
                    if($IDObat -> count() > 0){
                        $bon = $IDObat -> first() -> jumlah;
                    }
                    else{
                        $bon = 0;
                    }
                }
                else{
                    $bon = 0;
                }

                $this->insertDataPermintaan($IDPermintaan, $idobat, $namaobat, $tanggalPermintaan, $penerimaanLalu, $stok, $jumlahPemakaian, $stokrusak, $sisa_stok, $stokOptimum, $bon);
            }
        return Redirect::to('permintaan')->with('message','Data Permintaan berhasil dibuat, silakan edit data yang diperlukan!');
        }
        else{
        return Redirect::to('permintaan')->with('message','Data Obat belum ditemukan!');
        }

    }

    public function exportDataPermintaan(){
        if(!Session::has('selectedID'))
        {
            return Redirect::to('permintaan')->with('message','Pilih dan Buka Data permintaan dulu!');   
        }
        else{
            $this->createLog("Mengexport ke excel data Permintaan");
            $period = Session::get('selectedID');
            $dataPermintaan = DB::table('permintaan')->select('id_obat', 'nama_obat', 'jumlah_permintaan', 'tanggal_permintaan', 'penerimaan_lalu', 'stok', 'pemakaian', 'rusak', 'sisa_stok', 'stok_optimum')->where('id_permintaan','=',$period)->where('jumlah_permintaan','!=','0')->get();

            $dataPermintaanArray = [];
            $dataPermintaanArray[] = ['ID Obat', 'Nama Obat', 'Jumlah Permintaan', 'Tanggal Permintaan', 'Penerimaan Lalu', 'Stok', 'Pemakaian', 'Rusak', 'Sisa Stok', 'Stok Optimum'];

        foreach($dataPermintaan as $DataPermintaan) {
            //$dataRapotArray[] = $DataRapot->toArray();
            $dataPermintaanArray[] = (array) $DataPermintaan;
        }

        // Generate and return the spreadsheet
        Excel::create('Data Permintaan - '.$period, function($excel) use ($dataPermintaanArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Data Permintaan');
        $excel->setCreator('Aplikasi Manajemen Permintaan Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
        $excel->setDescription('Data Permintaan');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataPermintaanArray) {
            $sheet->fromArray($dataPermintaanArray, null, 'A1', false, false);
        });

    })->download('xls');
        }
    }

    //controller penerimaan
    public function penerimaan(){
        $this->createLog('Masuk ke menu Data Penerimaan');
        $datasupplier = DB::table('supplier')->get();
        $datapermintaan = DB::table('penerimaan')->where('id_permintaan','=',"0")->get();
        $data = DB::table('penerimaan')->select('id_permintaan', 'tanggal_permintaan')->groupBy('id_permintaan', 'tanggal_permintaan')->get();
        $okprint = "0";
        $periodePermintaan = "Semua Periode";
        return View::make('transaksi/penerimaan')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','class=active')->with('retur','')->with('indukdata','')->with('laporan','')->with('akun','')->with('datapermintaan', $data)->with('tabelpermintaan', $datapermintaan)->with('datasupplier', $datasupplier)->with('okprint',$okprint)->with('periodepermintaan',$periodePermintaan);
    }

    public function filterperiodePenerimaan(){

        $tahun = Input::get('tahun');
        $periode = "";

        $this->createLog('Masuk ke menu Data Penerimaan');
        $datasupplier = DB::table('supplier')->get();
        $datapermintaan = DB::table('penerimaan')->where('id_permintaan','=',"0")->get();
        $data = DB::table('penerimaan')->select('id_permintaan', 'tanggal_permintaan')->where('tanggal_permintaan','LIKE',$tahun.'%')->groupBy('id_permintaan', 'tanggal_permintaan')->get();
        $okprint = "0";
        $periodePermintaan = $periode;
        return View::make('transaksi/penerimaan')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','class=active')->with('retur','')->with('indukdata','')->with('laporan','')->with('akun','')->with('datapermintaan', $data)->with('tabelpermintaan', $datapermintaan)->with('datasupplier', $datasupplier)->with('okprint',$okprint)->with('periodepermintaan',$periodePermintaan);
    }

    public function selectDataPenerimaan(){
        $idPermintaan = Input::get("idpermintaan");
        Session::put('selectedID', $idPermintaan);
        $datasupplier = DB::table('supplier')->get();
        $datapermintaan = DB::table('penerimaan')->where('id_permintaan','=',$idPermintaan)->get();
        $data = DB::table('penerimaan')->select('id_permintaan', 'tanggal_permintaan')->groupBy('id_permintaan', 'tanggal_permintaan')->get();
        $okprint = $datapermintaan -> first() -> status;

        $this->createLog('Memilih Data Penerimaan dengan ID: '.$idPermintaan);
        $periodePermintaan = "Semua Periode";
        return View::make('transaksi/penerimaan')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','class=active')->with('retur','')->with('indukdata','')->with('laporan','')->with('akun','')->with('datapermintaan', $data)->with('tabelpermintaan', $datapermintaan)->with('datasupplier', $datasupplier)->with('okprint',$okprint)->with('periodepermintaan',$periodePermintaan);
    }

    public function penerimaanReal(){
        $idPermintaan = Session::get('selectedID');

        $periodeLaporan = $this->getPeriodePenerimaan($idPermintaan);

        $pieces = explode("-", $periodeLaporan);
        $bulan =  $pieces[1]; 
        $tahun = $pieces[0];

        $setmonth = "";

        $todayday = ltrim(date("d"), '0');
        $todaymonth = date("m");
        $todayyear = date("Y");

            switch ($todaymonth) {
            case '01': $setmonth = "Januari"; break;
            case '02': $setmonth = "Februari"; break;
            case '03': $setmonth = "Maret"; break;
            case '04': $setmonth = "April"; break;
            case '05': $setmonth = "Mei"; break;
            case '06': $setmonth = "Juni"; break;
            case '07': $setmonth = "Juli"; break;
            case '08': $setmonth = "Agustus"; break;
            case '09': $setmonth = "September"; break;
            case '10': $setmonth = "Oktober"; break;
            case '11': $setmonth = "November"; break;
            case '12': $setmonth = "Desember"; break;
            }

        switch ($bulan) {
            case '01': $setmonth = "Januari"; break;
            case '02': $setmonth = "Februari"; break;
            case '03': $setmonth = "Maret"; break;
            case '04': $setmonth = "April"; break;
            case '05': $setmonth = "Mei"; break;
            case '06': $setmonth = "Juni"; break;
            case '07': $setmonth = "Juli"; break;
            case '08': $setmonth = "Agustus"; break;
            case '09': $setmonth = "September"; break;
            case '10': $setmonth = "Oktober"; break;
            case '11': $setmonth = "November"; break;
            case '12': $setmonth = "Desember"; break;
            }        

        $declareDate = "Yogyakarta, ".$todayday." ".$setmonth." ".$todayyear;

        $datapermintaan = DB::table('permintaan')->where('id_permintaan','=',$idPermintaan)->get();
        $datapenerimaan = DB::table('penerimaan')->where('id_permintaan','=',$idPermintaan)->get();
        $datasatuan = DB::table('satuan')->get();
        $dataobat = DB::table('obat')->get();
        $realdate = $setmonth." ".$tahun;

        $this->createLog('Cetak Data Penerimaan dengan ID: '.$idPermintaan);

        return View::make('transaksi/laporanpenerimaan')->with('datapermintaan', $datapermintaan)->with('datapenerimaan', $datapenerimaan)->with('datasatuan', $datasatuan)->with('dataobat', $dataobat)->with('realdate', $realdate)->with('declaredate', $declareDate);
    }

    public function updateDataPenerimaan(){

        $this->createLog('Mengupdate Data Penerimaan');

        $keyvalidator = key(Input::get('cek'));
        $id_penerimaan = Input::get("id_data-".$keyvalidator);
        $id_permintaan = Input::get("id_permintaan-".$keyvalidator);
        $jumlah_penerimaan = Input::get('inputJumlahPenerimaan-'.$keyvalidator); 
        $tanggal_kadaluarsa = Input::get('inputTanggalKadaluarsa-'.$keyvalidator);
        $id_obat = Input::get('id_obat-'.$keyvalidator);
        $data = array(
                'tanggal' => Input::get('inputTanggalPenerimaan-'.$keyvalidator),
                'tgl_kadaluarsa' => $tanggal_kadaluarsa,
                'jumlah' => $jumlah_penerimaan,
                'supplier' => Input::get('inputSupplier-'.$keyvalidator),
                'no_batch' => Input::get('inputNoBatch-'.$keyvalidator),
                'status' => "1"
            );
        DB::table("penerimaan")->where('id','=',$id_penerimaan)->where('id_obat','=',$id_obat)->update($data);
        $this -> updateStokObat(Input::get('inputNoBatch-'.$keyvalidator), $id_obat, $jumlah_penerimaan, $tanggal_kadaluarsa);

        $datasupplier = DB::table('supplier')->get();
        $datapermintaan = DB::table('penerimaan')->where('id_permintaan','=',Session::get('selectedID'))->get();
        $data = DB::table('penerimaan')->select('id_permintaan', 'tanggal_permintaan')->groupBy('id_permintaan', 'tanggal_permintaan')->get();
        $okprint = $datapermintaan -> first() -> status;
        $periodePermintaan = "Semua Periode";
        return View::make('transaksi/penerimaan')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','active')->with('penerimaan','class=active')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','')->with('datapermintaan', $data)->with('tabelpermintaan', $datapermintaan)->with('datasupplier', $datasupplier)->with('okprint',$okprint)->with('periodepermintaan',$periodePermintaan)->with('message','Data Penerimaan berhasil diupdate, Data Obat berhasil diupdate');
    }

    public function updateStokObat($batch, $idobat, $jumlah_penerimaan, $tanggal_kadaluarsa){

        $data2 = array(
                '_id' => null,
                'id_obat' => $idobat,
                'nama_obat' => $this->getDataObatByID($idobat)->first()->obat,
                'batch' => $batch,
                'tanggal_kadaluarsa' => $tanggal_kadaluarsa,
                'kadaluarsa' => '0',
                'stok' => $jumlah_penerimaan,
                'rusak' => '0'
            );

        DB::table('gudang_obat')->insert($data2);

        $data1 = array(
                'tanggal' => date("Y/m/d"),
                'id_obat' => $idobat,
                'nama_obat' => $this->getDataObatByID($idobat)->first()->obat,
                'masuk' => $jumlah_penerimaan,
                'keluar'=> "0",
                'stok_akhir' => $this->stockCounting($idobat),
                'keterangan' => date("m/Y")
            );

        DB::table('kartustok')->insert($data1);

        $stokAwal = $this->getRecentStokObat($idobat);
        $stokAkhir = $stokAwal + $jumlah_penerimaan;
        $this->generalStockUpdater($idobat, $jumlah_penerimaan);

    }

    public function exportDataPenerimaan(){
        if(!Session::has('selectedID'))
        {
            return Redirect::to('penerimaan')->with('message','Pilih dan Buka Data permintaan dulu!');   
        }
        else{
            $this->createLog("Mengexport ke excel data Penerimaan");
            $period = Session::get('selectedID');
            $dataPermintaan = DB::table('penerimaan')->select('id_permintaan', 'tanggal_permintaan', 'id_obat', 'nama_obat', 'tanggal', 'tgl_kadaluarsa', 'jumlah', 'supplier', 'no_batch')->where('id_permintaan','=',$period)->get();

            $dataPermintaanArray = [];
            $dataPermintaanArray[] = ['ID Permintan', 'Tanggal Permintaan', 'ID Obat', 'Nama Obat', 'Tanggal Penerimaan', 'Tanggal Kadaluarsa', 'Jumlah Penerimaan', 'Supplier', 'No Batch'];

        foreach($dataPermintaan as $DataPermintaan) {
            //$dataRapotArray[] = $DataRapot->toArray();
            $dataPermintaanArray[] = (array) $DataPermintaan;
        }

        // Generate and return the spreadsheet
        Excel::create('Data Permintaan - '.$period, function($excel) use ($dataPermintaanArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Data Permintaan');
        $excel->setCreator('Aplikasi Manajemen Permintaan Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
        $excel->setDescription('Data Permintaan');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataPermintaanArray) {
            $sheet->fromArray($dataPermintaanArray, null, 'A1', false, false);
        });

    })->download('xls');
        }
    }

    //controller Kartu Stok
    public function kartustok(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
            $this->createLog('Masuk ke menu Kartu Stok');
            $data = DB::table('kartustok')->orderBy('keterangan', 'ASC')->get();
            $dataobat = DB::table('obat')->get();
            return View::make('obat/kartustok')->with('kartustok', $data)->with('dataobat', $dataobat)->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','');   
        }
    }

    public function filterDataKartuStokMain(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $kategori = Input::get('filter-kategori');
        $keyword = Input::get('keyword-pencarian');

        $this->createLog("Mencari data Kartu Stok dengan kategori: ".$kategori." dan keyword: ".$keyword);

        switch($kategori){
            case 1:
                $data = DB::table('kartustok')->where('tanggal','LIKE', '%'.$keyword.'%')->orderBy('nama_obat', 'ASC')->get();
                $dataobat = DB::table('obat')->orderBy('obat', 'ASC')->get();
                return View::make('obat/kartustok')->with('kartustok', $data)->with('dataobat', $dataobat)->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','');   
            break;

            case 2:
                $data = DB::table('kartustok')->where('tanggal','LIKE', '%/'.$keyword.'/%')->orderBy('nama_obat', 'ASC')->get();
                $dataobat = DB::table('obat')->orderBy('obat', 'ASC')->get();
                return View::make('obat/kartustok')->with('kartustok', $data)->with('dataobat', $dataobat)->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','');   
            break;

            case 3:
                $data = DB::table('kartustok')->where('tanggal','LIKE', $keyword.'/%')->orderBy('nama_obat', 'ASC')->get();
                $dataobat = DB::table('obat')->orderBy('obat', 'ASC')->get();
                return View::make('obat/kartustok')->with('kartustok', $data)->with('dataobat', $dataobat)->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','');   
            break;

            case 4:
                $data = DB::table('kartustok')->where('id_obat','LIKE', '%'.$keyword.'%')->orderBy('nama_obat', 'ASC')->get();
                $dataobat = DB::table('obat')->orderBy('obat', 'ASC')->get();
                return View::make('obat/kartustok')->with('kartustok', $data)->with('dataobat', $dataobat)->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','');   
            break;

            case 5:
                $data = DB::table('kartustok')->where('nama_obat','LIKE', '%'.$keyword.'%')->orderBy('nama_obat', 'ASC')->get();
                $dataobat = DB::table('obat')->orderBy('obat', 'ASC')->get();
                return View::make('obat/kartustok')->with('kartustok', $data)->with('dataobat', $dataobat)->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','');   
            break;
        }
        }
    }

    public function filterDatakartuStokLevel2(){
         $id_obat = Input::get('inputObat');
         $period = Input::get('inputBulan')."/".Input::get('inputTahun');

        Session::put('IDObat', $id_obat);
        Session::put('Periode', $period);         

         $data = DB::table('kartustok')->where('keterangan','=', $period)->where('id_obat','=',$id_obat)->orderBy('id','ASC')->get();
         $dataobat = DB::table('obat')->orderBy('obat', 'ASC')->get();
         return View::make('obat/kartustok')->with('kartustok', $data)->with('dataobat', $dataobat)->with('beranda','')->with('penerimaanresep','')->with('obats','active')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','')->with('akun','');   

    }

    public function createKartuStok($id_obat, $nama_obat, $masuk, $keluar, $stok_akhir, $keterangan){

        $dataX = DB::table('obat')->where('id_obat','=',$id_obat)->get();
        $stokAwal = $dataX -> first() -> stok;

        $data = array(
                'id' => null,
                'tanggal' => date("Y/m/d"),
                'id_obat' => $id_obat,
                'nama_obat' => $nama_obat,
                'masuk' => $masuk,
                'keluar' => $keluar,
                'stok_akhir' => $stokAwal - $keluar,
                'keterangan' => date("m/Y")
            );
        $this->createLog('Menambah Data Kartu Stok dengan ID Obat: '.$id_obat.', Nama Obat: '.$nama_obat.', Stok Masuk: '.$masuk.', Stok Keluar: '.$keluar.', Stok Akhir: '.$stok_akhir.', Keterangan: '.$keterangan);
        DB::table('kartustok')->insert($data);
    }

    public function createKartuStokGudang($id_obat, $nama_obat, $stok_akhir){

        $dataX = DB::table('obat')->where('id_obat','=',$id_obat)->get();
        $stokAwal = $dataX -> first() -> stok;

        $data = array(
                'id' => null,
                'tanggal' => date("Y/m/d"),
                'id_obat' => $id_obat,
                'nama_obat' => $nama_obat,
                'masuk' => $stok_akhir,
                'keluar' => '0',
                'stok_akhir' => $stok_akhir + $stokAwal,
                'keterangan' => date("m/Y")
            );
        $this->createLog('Menambah Data Kartu Stok dari Gudang Obat dengan ID Obat: '.$id_obat.', Nama Obat: '.$nama_obat.', Stok Akhir: '.$stok_akhir.'');
        DB::table('kartustok')->insert($data);
    }

    
    public function cetakRealKartuStok(){

            $this->createLog("Cetak Real data Kartu Stok");
            $id_obat = Session::get('IDObat');
            $period = Session::get('Periode');

            $namaObat = $this->getDataObatByID($id_obat)->first->obat;
            $satuan = $this->getSatuanByID($this->getDataObatByID($id_obat)->first()->id_satuan)->first()->satuan;
            $satuan_kemasan = $this->getSatuanKemasanByID($this->getSatuanByID($this->getDataObatByID($id_obat)->first()->id_satuan)->first()->id_satuan_kemasan)->first()->satuan_kemasan;

            $dataKartuStok = DB::table('kartustok')->where('keterangan','=', $period)->where('id_obat','=',$id_obat)->orderBy('id','ASC')->get();

            return View::make('obat/cetakkartustok')->with('idobat', $id_obat)->with('namaObat', $namaObat)->with('satuan',$satuan)->with('satuankemasan',$satuan_kemasan)->with('datakartustok',$dataKartuStok);        
    }

    public function exportKartuStok($id_obat, $period){
        $this->createLog("Mengexport ke excel data Kartu Stok");
            $id_obat = $id_obat;
            $period = Input::get('inputTahun')."/".Input::get('inputBulan')."/";

            $dataKartuStok = DB::table('kartustok')->select("tanggal", "id_obat", "nama_obat", "masuk", "keluar", "stok_akhir", "keterangan")->where('tanggal','LIKE', $period.'%')->where('id_obat','=',$id_obat)->orderBy('id','ASC')->get();

            $dataKartuStokArray = [];
            $dataKartuStokArray[] = ['Tanggal', 'ID Obat', 'Nama Obat', 'Masuk', 'Keluar', 'Stok Akhir', 'Keterangan'];

            foreach($dataKartuStok as $DataKartuStok) {
                //$dataRapotArray[] = $DataRapot->toArray();
            $dataKartuStokArray[] = (array) $DataKartuStok;
            }

                // Generate and return the spreadsheet
                Excel::create('Data Kartu Stok - '.$period, function($excel) use ($dataKartuStokArray) {

                // Set the spreadsheet title, creator, and description
                    $excel->setTitle('Data Kartu Stok');
                    $excel->setCreator('Aplikasi Manajemen Obat Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
                    $excel->setDescription('Data Kartu Stok');

                // Build the spreadsheet, passing in the payments array
                    $excel->sheet('sheet1', function($sheet) use ($dataKartuStokArray) {
                    $sheet->fromArray($dataKartuStokArray, null, 'A1', false, false);
                });

        })->download('xls');        
    }

    //Controller Retur/Bon
    public function retur(){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{
            $this->createLog('Masuk ke menu Data Retur');
            $dataRetur = DB::table('retur')->get();
            $detailRetur = DB::table('detail_retur')->get();
            $dataBon = DB::table('bon')->get();
            $detailBon = DB::table('detail_bon')->get();
            return View::make('transaksi/retur')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','class=active')->with('indukdata','')->with('laporan','')->with('akun','')->with('dataRetur',$dataRetur)->with('dataDetailRetur', $detailRetur)->with('dataBon',$dataBon)->with('dataDetailBon',$detailBon);
        }
    }

    public function createDataRetur(){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{
            $idretur = "RTR-".$this->generateSerializeID(5);
            $tanggal = date("Y-m-d");
            $jumlah = "0";

            $data = array(
                'id' => null,
                'id_retur' => $idretur,
                'tanggal' => $tanggal,
                'jumlah' => $jumlah
                );

            $this->createLog('Menambah Data Retur dengan ID: '.$idretur.', Tanggal: '.$tanggal.', Jumlah: '.$jumlah);
            DB::table('retur')->insert($data);
            return Redirect::to('retur')->with('message','Data Retur berhasil dibuat, silakan edit untuk memuat data obat yang akan diretur');
        }   
    }

    public function hapusDataRetur($id, $id_retur){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{
            DB::table('retur')->where('id','=',$id)->delete();
            DB::table('detail_retur')->where('id_retur','=',$id_retur)->delete();
            $this->createLog('Menghapus Data Retur dengan ID: '.$id);
            return Redirect::to('retur')->with('message','Data Retur berhasil dihapus');
        }   
    }

    public function editDataRetur($id_retur){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{
            $dataobat = DB::table('gudang_obat')->where('rusak','!=','0')->orWhere('kadaluarsa','=','1')->get();
            $detailretur = DB::table('detail_retur')->where('id_retur','=',$id_retur)->get();
            $this->createLog('Mengupdate Data Retur dengan ID: '.$id_retur);
            return View::make('transaksi/editDataRetur')->with('dataobat',$dataobat)->with('id_retur',$id_retur)->with('dataretur',$detailretur);
        }
    }

    public function addDetailDataRetur($id_retur, $batch){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{
            $data = $this->getDataObatGudangByBatch($batch);
            $idRetur = $id_retur;
            $idObat = $data -> first() -> id_obat;
            $namaObat = $data -> first() -> nama_obat;
            $noBatch = $batch;
            $kadaluarsa = $data -> first() -> kadaluarsa;
            $jumlah = 0;
            $keterangan = "";
            if($kadaluarsa == '0'){
                $jumlah = $data -> first() -> rusak;
                $keterangan = "Obat Rusak";
            }
            else{
                $jumlah = $data -> first() -> stok;   
                $keterangan = "Obat Kadaluarsa";
            }

            $dataInput = array(
                    'id' => null,
                    'id_retur' => $idRetur,
                    'id_obat' => $idObat,
                    'nama_obat' => $namaObat,
                    'batch' => $noBatch,
                    'jumlah' => $jumlah,
                    'keterangan' => $keterangan
                );

            DB::table('detail_retur')->insert($dataInput);
            return Redirect::to('editDataRetur/'.$id_retur);
        }   
    }

    public function deleteDetailDataRetur($id_retur, $batch){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{
            
            DB::table('detail_retur')->where('id_retur','=',$id_retur)->where('batch','=',$batch)->delete();
            return Redirect::to('editDataRetur/'.$id_retur);
        }   
    }

    public function returDiterima($id_retur, $batch){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{
            
            $data = DB::table('detail_retur')->where('id_retur','=',$id_retur)->where('batch','=',$batch)->get();
            $batch = $data->first()->batch;
            $stok = $data->first()->jumlah;
            $id_obat = $data->first()->id_obat;

            $this -> updateStokByRetur($id_obat, $batch, $stok);

            DB::table('detail_retur')->where('id_retur','=',$id_retur)->where('batch','=',$batch)->delete();

            return Redirect::to('editDataRetur/'.$id_retur);
        }   
    }

    public function updateStokByRetur($id_obat, $batch, $jumlah){
        $this -> generalStockUpdater($id_obat, $jumlah);
        $stokObatLama = $this->getDataObatByID($id_obat)->first()->stok;
        $stokgudang = DB::table('gudang_obat')->where('batch','=',$batch)->get()->first()->stok;
        $stokbaru = $stokgudang + $jumlah;
        $data = array(
            'kadaluarsa' => '0',
            'stok' => $stokbaru,
            'rusak' => '0'
            );
        DB::table('gudang_obat')->where('batch','=',$batch)->update($data);
    }

    public function cetakLaporanRetur($id_retur){
        $dataRetur = DB::table('retur')->where('id_retur','=',$id_retur)->get();
        $tanggalRetur = $dataRetur -> first() -> tanggal;
        $bulanRetur = "";
        $tahunRetur = "";
        $pieces = explode("-", $tanggalRetur);
        $tahunRetur = $pieces[0]; 

        switch($pieces[1]){
            case "01": $bulanRetur = "Januari"; break;
            case "02": $bulanRetur = "Februari"; break;
            case "03": $bulanRetur = "Maret"; break;
            case "04": $bulanRetur = "April"; break;
            case "05": $bulanRetur = "Mei"; break;
            case "06": $bulanRetur = "Juni"; break;
            case "07": $bulanRetur = "Juli"; break;
            case "08": $bulanRetur = "Agustus"; break;
            case "09": $bulanRetur = "September"; break;
            case "10": $bulanRetur = "Oktober"; break;
            case "11": $bulanRetur = "November"; break;
            case "12": $bulanRetur = "Desember"; break;
        }

        $periodeLaporan = $bulanRetur." ".$tahunRetur;
        $dataLaporan = DB::table('detail_retur')->where('id_retur','=',$id_retur)->get();
        $dataObat = DB::table('obat')->get();
        $dataSatuan = DB::table('satuan')->get();

        $todayday = ltrim(date("d"), '0');
            $todaymonth = date("m");
            $todayyear = date("Y");

            $setmonth = "";

            $tahunReport = "";


            switch ($todaymonth) {
            case '01': $setmonth = "Januari"; break;
            case '02': $setmonth = "Februari"; break;
            case '03': $setmonth = "Maret"; break;
            case '04': $setmonth = "April"; break;
            case '05': $setmonth = "Mei"; break;
            case '06': $setmonth = "Juni"; break;
            case '07': $setmonth = "Juli"; break;
            case '08': $setmonth = "Agustus"; break;
            case '09': $setmonth = "September"; break;
            case '10': $setmonth = "Oktober"; break;
            case '11': $setmonth = "November"; break;
            case '12': $setmonth = "Desember"; break;
            }

            $declareDate = "Yogyakarta, ".$todayday." ".$setmonth." ".$todayyear;

        return View::make('transaksi/cetakRekapRetur')->with('periodelaporan', $periodeLaporan)->with('datalaporan', $dataLaporan)->with('dataobat', $dataObat)->with('datasatuan', $dataSatuan)->with('declaredate',$declareDate);
    }

    public function cetakDataRetur($id_retur){

        $this->createLog('Mencetak data Retur dengan ID: '.$id_retur);

        $idRetur = $id_retur;
        $tanggal = date('Y-m');

        $dataRetur = DB::table('detail_retur')->select("id_retur", "id_obat", "nama_obat", "batch", "jumlah", "keterangan")->where('id_retur','=', $idRetur)->orderBy('id','ASC')->get();

        $dataReturArray = [];
        $dataReturArray[] = ['ID Retur', 'ID Obat', 'Nama Obat', 'No. Batch', 'Jumlah', 'Keterangan'];

        foreach($dataRetur as $DataRetur) {
            //$dataRapotArray[] = $DataRapot->toArray();
            $dataReturArray[] = (array) $DataRetur;
        }

        // Generate and return the spreadsheet
        Excel::create('Data Retur - '.$tanggal, function($excel) use ($dataReturArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Data Retur');
        $excel->setCreator('Aplikasi Manajemen Obat Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
        $excel->setDescription('Data Retur');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataReturArray) {
            $sheet->fromArray($dataReturArray, null, 'A1', false, false);
        });

    })->download('xls');

    }

    public function createDataBon(){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{
            $idbon = "BON-".$this->generateSerializeID(5);
            $tanggal = date("Y-m-d");
            $periode = date("Y-m");

            $data = array(
                'id' => null,
                'id_bon' => $idbon,
                'tanggal' => $tanggal,
                'periode' => $periode
                );
            
            $this->createLog("Menambah Data Bon dengan ID: ".$idbon.", Tanggal: ".$tanggal);
            $this->createLaporanLPBon($idbon);
            DB::table('bon')->insert($data);
            return Redirect::to('retur')->with('message_bon','Data Bon berhasil dibuat, silakan edit untuk memuat data obat yang akan diretur');
        }   
    }

    public function cetakLaporanBon($idbon){
        $IDBon = $idbon;
        $dataBon = DB::table('bon')->where('id_bon','=',$idbon)->get();
        $detailLaporanBon = DB::table('detail_lpbon')->where('id_bon','=',$idbon)->get();
        $detailBon = DB::table('detail_bon')->where('id_bon','=',$idbon)->get();
        $dataObat = DB::table('obat')->get();
        $dataSatuan = DB::table('satuan')->get();
        $periodeBon = $dataBon -> first() -> periode;
        $bulanBon = "";


        $pieces = explode("-", $periodeBon);
        $tahunBon = $pieces[0]; 

        switch($pieces[1]){
            case "01": $bulanBon = "Januari"; break;
            case "02": $bulanBon = "Februari"; break;
            case "03": $bulanBon = "Maret"; break;
            case "04": $bulanBon = "April"; break;
            case "05": $bulanBon = "Mei"; break;
            case "06": $bulanBon = "Juni"; break;
            case "07": $bulanBon = "Juli"; break;
            case "08": $bulanBon = "Agustus"; break;
            case "09": $bulanBon = "September"; break;
            case "10": $bulanBon = "Oktober"; break;
            case "11": $bulanBon = "November"; break;
            case "12": $bulanBon = "Desember"; break;
        }

        $periodeLaporan = $bulanBon." ".$tahunBon;


            $todayday = ltrim(date("d"), '0');
            $todaymonth = date("m");
            $todayyear = date("Y");

            $setmonth = "";

            $tahunReport = "";


            switch ($todaymonth) {
            case '01': $setmonth = "Januari"; break;
            case '02': $setmonth = "Februari"; break;
            case '03': $setmonth = "Maret"; break;
            case '04': $setmonth = "April"; break;
            case '05': $setmonth = "Mei"; break;
            case '06': $setmonth = "Juni"; break;
            case '07': $setmonth = "Juli"; break;
            case '08': $setmonth = "Agustus"; break;
            case '09': $setmonth = "September"; break;
            case '10': $setmonth = "Oktober"; break;
            case '11': $setmonth = "November"; break;
            case '12': $setmonth = "Desember"; break;
            }

            $declareDate = "Yogyakarta, ".$todayday." ".$setmonth." ".$todayyear;

            return View::make('transaksi/cetakRekapLaporanBon')->with('periodelaporan', $periodeLaporan)->with('databon', $dataBon)->with('detailbon', $detailBon)->with('detaillaporanbon', $detailLaporanBon)->with('dataobat', $dataObat)->with('datasatuan', $dataSatuan)->with('tahunpemakaian',$periodeLaporan)->with('declaredate',$declareDate);

    }

    public function createLaporanLPBon($idbon){
        $IDPermintaan = Input::get('id_permintaan');
        $tanggalPermintaan = date("Y-m");

        $bon;

        $recentDates = date("m");
        $recentYears = date("Y");


        $dateFormulae = $recentDates."/".$recentYears;
        $dateFormulae2 = $recentDates."-".$recentYears;

        $IDBon = $this->getDataBonByDate($dateFormulae2);
        

        $dataobat = DB::table('obat')->get();
        if($dataobat -> count() >0){
            foreach ($dataobat as $obat) {
                $idobat = $obat->id_obat;
                $penerimaanLalu = $this->getPenerimaanLalu($idobat, $dateFormulae2);
                $stok = $this->getJumlahMasuk($idobat, $dateFormulae);
                $namaobat = $obat->obat;
                $jumlahPemakaian = $this->getJumlahPemakaian($obat->obat, $recentYears."-".$recentDates);
                $stokrusak = $this->getJumlahRusak($obat->id_obat);
                $sisa_stok = $obat->stok;
                $stokOptimum = 2 * $jumlahPemakaian;

                if($IDBon -> count() > 0){
                    $IDObat = $this->getDetailBonByID($IDBon->first()->id_bon, $idobat);
                    if($IDObat -> count() > 0){
                        $bon = $IDObat -> first() -> jumlah;
                    }
                    else{
                        $bon = 0;
                    }
                }
                else{
                    $bon = 0;
                }

                $this->createDetailLaporanLPBon($idbon, $idobat, $namaobat, $tanggalPermintaan, $penerimaanLalu, $stok, $jumlahPemakaian, $stokrusak, $sisa_stok, $stokOptimum, $bon);
            }
        }
        else{

        }

    }

    function createDetailLaporanLPBon($id, $idobat, $namaobat, $tanggal, $penerimaan_lalu, $stok, $pemakaian, $stok_rusak, $sisa, $optimum, $bon){
        $datapermintaan = (2*$pemakaian) - $sisa;



        $data = array(
            'id' => null,
            'id_bon' => $id,
            'id_obat' => $idobat,
            'nama_obat' => $namaobat,
            'jumlah_permintaan' => $datapermintaan,
            'tanggal_permintaan' => $tanggal,
            'penerimaan_lalu' => $penerimaan_lalu,
            'stok' => $stok,
            'pemakaian' => $pemakaian,
            'rusak' => $stok_rusak,
            'sisa_stok' => $sisa,
            'stok_optimum' => (2*($pemakaian))
            );

        DB::table("detail_lpbon")->insert($data);
    }

    public function hapusDataBon($id, $id_bon){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{
            $this->createLog('Menghapus Data Bon dengan ID: '.$id_bon);
            DB::table('bon')->where('id','=',$id)->delete();
            DB::table('detail_bon')->where('id_bon','=',$id_bon)->delete();
            return Redirect::to('retur')->with('message_bon','Data Bon berhasil dihapus');
        }   
    }

    public function deleteDetailDataBon($id_bon, $id_obat){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{
            $this->createLog('Menghapus Detaiil Bon dengan ID: '.$id_bon.'dan ID Obat: '.$id_obat.'');
            DB::table('detail_bon')->where('id_bon','=',$id_bon)->where('id_obat','=',$id_obat)->delete();
            $dataobat = DB::table('obat')->where('stok','<',90)->get();
            $detailbon = DB::table('detail_bon')->where('id_bon','=',$id_bon)->get();
            return Redirect::to('editDataBon/'.$id_bon);

        }   
    }

    public function editDataBon($id_bon){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{
            $this->createLog('Mengupdate Data Bon dengan ID: '.$id_bon);
            $dataobat = DB::table('obat')->where('stok','<',90)->get();
            $detailbon = DB::table('detail_bon')->where('id_bon','=',$id_bon)->get();
            return View::make('transaksi/editDataBon')->with('dataobat',$dataobat)->with('id_bon',$id_bon)->with('databon',$detailbon);
        }
    }

    public function addDetailDataBon(){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{
            $idBon = Input::get('id_bon');
            $keyid = key(Input::get('submitBon'));
            $idObat = Input::get('id_obat-'.$keyid);
            $namaObat = $this->getDataObatByID($idObat)->first()->obat;
            $jumlahBon = Input::get('inputBon-'.$keyid);

            $dataInput = array(
                    'id' => null,
                    'id_bon' => $idBon,
                    'id_obat' => $idObat,
                    'nama_obat' => $namaObat,
                    'jumlah' => $jumlahBon
                );

            DB::table('detail_bon')->insert($dataInput);
            return Redirect::to('editDataBon/'.$idBon);
        }   
    }

    public function terimaBon(){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{
            $idBon = Input::get('id_bon');
            $keyid = key(Input::get('terimaBon'));
            $idObat = Input::get('id_obat_terima-'.$keyid);
            $noBatch = Input::get('noBatch-'.$keyid);
            $kadaluarsa = Input::get('kadaluarsa-'.$keyid);
            $jumlah = Input::get('jumlahDiterima-'.$keyid);


            $this->updateStokByBon($idObat, $noBatch, $kadaluarsa, $jumlah);
            DB::table('detail_bon')->where('id_bon','=',$idBon)->where('id_obat','=',$idObat)->delete();
            
            return Redirect::to('editDataBon/'.$idBon);
        }   
    }

    public function updateStokByBon($id_obat, $no_batch, $kadaluarsa, $jumlah){
        $data = array(
            '_id' => null,
            'id_obat' => $id_obat,
            'nama_obat' => $this->getDataObatByID($id_obat)->first()->obat,
            'batch' => $no_batch,
            'tanggal_kadaluarsa' => $kadaluarsa,
            'kadaluarsa' => '0',
            'stok' => $jumlah,
            'rusak' => '0'
            );

        DB::table('gudang_obat') -> insert($data);
        $this -> generalStockUpdater($id_obat, $jumlah);
        $this -> createKartuStok($id_obat, $this->getDataObatByID($id_obat)->first()->obat, $jumlah, '0', '', '');


    }

    public function cetakDataBon($id_bon){
        $idBon = $id_bon;
        $tanggal = date('Y-m');

        $this->createLog('Mencetak Data Bon dengan ID: '.$id_bon);

        $dataBon = DB::table('detail_bon')->select("id_bon", "id_obat", "nama_obat", "jumlah")->where('id_bon','=', $idBon)->orderBy('nama_obat','ASC')->get();

        $dataBonArray = [];
        $dataBonArray[] = ['ID Bon', 'ID Obat', 'Nama Obat', 'Jumlah'];

        foreach($dataBon as $DataBon) {
            //$dataRapotArray[] = $DataRapot->toArray();
            $dataBonArray[] = (array) $DataBon;
        }

        // Generate and return the spreadsheet
        Excel::create('Data Bon - '.$tanggal, function($excel) use ($dataBonArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Data Bon');
        $excel->setCreator('Aplikasi Manajemen Obat Puskesmas Umbulharjo II')->setCompany('Puskesmas Umbulharjo II');
        $excel->setDescription('Data Bon');

        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($dataBonArray) {
            $sheet->fromArray($dataBonArray, null, 'A1', false, false);
        });

    })->download('xls');

    }

    //Controller Laporan
    public function laporan(){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{
            Session::put('selectedID', "");
            $lplpo = DB::table('lplpo')->get();
            $detail_lplpo = DB::table('detail_lplpo')->where('id_laporan','=',"1")->get();
            return View::make('beranda/laporan')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','active')->with('akun','')->with('dataLPLPO', $lplpo)->with('detailLPLPO',$detail_lplpo);
        }
    }

    public function laporanreal(){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{
            $idlaporan = SESSION::get('selectedID');
            $periodeLaporan = $this->getPeriodeLPLPO($idlaporan);

            $pieces = explode("/", $periodeLaporan);
            $bulan =  $pieces[0]; 
            $tahun = $pieces[1]; 

            $bulanReport = "";
            $bulanRequest = "";

            $todayday = ltrim(date("d"), '0');
            $todaymonth = date("m");
            $todayyear = date("Y");

            $setmonth = "";

            $tahunReport = "";

            switch ($bulan) {
            case '01': $bulanReport = "Desember"; $bulanRequest = "Januari"; break;
            case '02': $bulanReport = "Januari"; $bulanRequest = "Februari"; break;
            case '03': $bulanReport = "Februari"; $bulanRequest = "Maret"; break;
            case '04': $bulanReport = "Maret"; $bulanRequest = "April"; break;
            case '05': $bulanReport = "April"; $bulanRequest = "Mei"; break;
            case '06': $bulanReport = "Mei"; $bulanRequest = "Juni"; break;
            case '07': $bulanReport = "Juni"; $bulanRequest = "Juli"; break;
            case '08': $bulanReport = "Juli"; $bulanRequest = "Agustus"; break;
            case '09': $bulanReport = "Agustus"; $bulanRequest = "September"; break;
            case '10': $bulanReport = "September"; $bulanRequest = "Oktober"; break;
            case '11': $bulanReport = "Oktober"; $bulanRequest = "November"; break;
            case '12': $bulanReport = "November"; $bulanRequest = "Desember"; break;
            }

            switch ($todaymonth) {
            case '01': $setmonth = "Januari"; break;
            case '02': $setmonth = "Februari"; break;
            case '03': $setmonth = "Maret"; break;
            case '04': $setmonth = "April"; break;
            case '05': $setmonth = "Mei"; break;
            case '06': $setmonth = "Juni"; break;
            case '07': $setmonth = "Juli"; break;
            case '08': $setmonth = "Agustus"; break;
            case '09': $setmonth = "September"; break;
            case '10': $setmonth = "Oktober"; break;
            case '11': $setmonth = "November"; break;
            case '12': $setmonth = "Desember"; break;
            }

            if($bulan == "01"){
                $tahunReport = $tahun - 1;
            }
            else{
                $tahunReport = $tahun;
            }

            $tahunPemakaian = $bulanReport." ".$tahunReport;
            $tahunPermintaan = $bulanRequest." ".$tahun;

            $declareDate = "Yogyakarta, ".$todayday." ".$setmonth." ".$todayyear;

            $lplpo = DB::table('lplpo')->get();
            $detail_lplpo = DB::table('detail_lplpo')->where('id_laporan','=',$idlaporan)->get();
            return View::make('beranda/cetaklaporan')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','active')->with('laporan','active')->with('akun','')->with('dataLPLPO', $lplpo)->with('detailLPLPO',$detail_lplpo)->with('tahunpermintaan',$tahunPermintaan)->with('tahunpemakaian',$tahunPemakaian)->with('declaredate',$declareDate);
        }
    }

    public function selectLaporan(){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{

            $id_laporan = Input::get('idlaporan');

            Session::put('selectedID', $id_laporan);

            $lplpo = DB::table('lplpo')->get();
            $detail_lplpo = DB::table('detail_lplpo')->where('id_laporan','=',$id_laporan)->get();
            return View::make('beranda/laporan')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','active')->with('akun','')->with('dataLPLPO', $lplpo)->with('detailLPLPO',$detail_lplpo);
        }
    }

    public function createLPLPO(){
        if(!Session::has('adminpuskesmas')){
            return Redirect::to('/');;
        }
        else{
            $id_laporan = "LPLPO - ".$this->generateSerializeID(5);
            $bulan = Input::get('bulan');
            $tahun = Input::get('tahun');
            
            $periode = $bulan."/".$tahun;

            $data = array(
                "_id" => null,
                "id_laporan" => $id_laporan,
                "periode" => $periode
            );

            $this -> createDetailLaporanLPLPO($id_laporan, $bulan, $tahun);

            DB::table("lplpo")->insert($data);
            echo $periode;
            return Redirect::to('laporan');
        }
    }

    public function createDetailLaporanLPLPO($id_laporan, $bulan, $tahun){
        $idlaporan = $id_laporan;
        $periode1 = $tahun."-".$bulan;

        $dataPermintaan = DB::table("permintaan")->where('tanggal_permintaan','=',$periode1)->get();
        if($dataPermintaan -> count() > 0){
            foreach($dataPermintaan as $dP){
                $id_obat = $dP -> id_obat;
                $nama_obat = $dP -> nama_obat;
                $satuan = $this->getSatuanByID($this->getDataObatByID($id_obat)->first()->id_satuan)->first()->satuan;
                $stok_awal = ($dP -> stok) - ($dP -> penerimaan_lalu);
                $penerimaan = $dP -> penerimaan_lalu;
                $persediaan = $dP -> stok;
                $pemakaian = $dP -> pemakaian;
                $rusak = $dP -> rusak;
                $sisa_stok = $dP -> sisa_stok;
                $stok_optimum = $dP -> stok_optimum;
                $permintaan = $dP -> jumlah_permintaan;
                $idBon = $this->getIDBonByPeriode($periode1);
                $bon = $this->getDetailBonByID($idBon,$id_obat);

                if($bon -> count() > 0){
                    $bon = $bon->first()->jumlah;
                }
                else{
                    $bon = "0";
                }
                
                $this -> insertDetailLaporanLPLPO($idlaporan, $id_obat, $nama_obat, $satuan, $stok_awal, $penerimaan, $persediaan, $pemakaian, $rusak, $sisa_stok, $stok_optimum, $permintaan, $bon);
            }
        }
        else{

        }

    }

    public function insertDetailLaporanLPLPO($id_laporan, $id_obat, $nama_obat, $satuan, $stok_awal, $penerimaan, $persediaan, $pemakaian, $rusak, $sisa_stok, $stok_optimum, $permintaan, $bon){
        $data = array(
            '_id' => null,
            'id_laporan' => $id_laporan,
            'id_obat' => $id_obat,
            'nama_obat' => $nama_obat,
            'satuan' => $satuan,
            'stok_awal' => $stok_awal,
            'penerimaan' => $penerimaan,
            'persediaan' => $persediaan,
            'pemakaian' => $pemakaian,
            'rusak' => $rusak,
            'sisa_stok' => $sisa_stok,
            'stok_optimum' => $stok_optimum,
            'permintaan' => $permintaan,
            'pemberian' => "0",
            'bon' => $bon
        );

        DB::table('detail_lplpo')->insert($data);
    }

    public function getIDKartuStok($tanggal){
        $data = DB::table('kartu_stok')->where('tanggal','=',$tanggal);
        return $data;
    }

    public function getIDPermintaan($tanggal){
        $tgl = str_replace("/","-",$tanggal);
        $realtgl = substr($tgl, 0, -3);
        $data = DB::table('permintaan')->where('tanggal_permintaan','=',$realtgl);
        return $data;
    }




    //Controller Transaksi

    public function hapusTransaksi(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        DB::table('transaksi')->truncate();
        $this->createLog('Flush Table Transaksi');
        return Redirect::to('transaksi');
        }
    }

    public function createDataTransaksi($idPasien, $namaPasien, $transaksi, $metodepembayaran, $pembayaran){
        $periode = date("Y-m");
        switch($metodepembayaran){
            case 1:
                $data = array(
                    '_id' => null,
                    'id_pasien' => $idPasien,
                    'nama_pasien' => $namaPasien,
                    'transaksi' => $transaksi,
                    'bpjs' => "",
                    'mandiri' => $pembayaran,
                    'lainnya' => "",
                    'tanggal' => null, 
                    'periode' => $periode
                );

                DB::table('transaksi')->insert($data);
            break;

            case 2:
                $data = array(
                    '_id' => null,
                    'id_pasien' => $idPasien,
                    'nama_pasien' => $namaPasien,
                    'transaksi' => $transaksi,
                    'bpjs' => $pembayaran,
                    'mandiri' => "",
                    'lainnya' => "",
                    'tanggal' => null, 
                    'periode' => $periode
                );

                DB::table('transaksi')->insert($data);
            break;

            case 3:
                $data = array(
                    '_id' => null,
                    'id_pasien' => $idPasien,
                    'nama_pasien' => $namaPasien,
                    'transaksi' => $transaksi,
                    'bpjs' => "",
                    'mandiri' => "",
                    'lainnya' => $pembayaran,
                    'tanggal' => null, 
                    'periode' => $periode
                );

                DB::table('transaksi')->insert($data);
            break;
        }
    }

    public function laporantransaksi(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $this->createLog('Masuk ke menu laporan transaksi');
        $totalBPJS = $this->counterTotalBPJS("1");
        $totalMandiri = $this->counterTotalMandiri("1");
        $totalLainnya = $this->counterTotalLainnya("1");
        $datatransaksi = DB::table('transaksi')->get();
        $periodesasi = "Semua Periode";
        return View::make('beranda/transaksi')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','active')->with('akun','')->with('datatransaksi',$datatransaksi)->with('totalBPJS',$totalBPJS)->with('totalMandiri',$totalMandiri)->with('totalLainnya',$totalLainnya)->with('periodesasi',$periodesasi);
        }
    }

    public function filterDataTransaksiMain(){
        if(!Session::has('adminpuskesmas'))
        {
            return Redirect::to('/');;
        }
        else{
        $bulan = Input::get('bulan');
        $tahun = Input::get('tahun');
        $periode = $tahun."-".$bulan;

        $bulanperiode = "";
        switch ($bulan) {
            case '01': $bulanperiode = "Januari"; break;
            case '02': $bulanperiode = "Februari"; break;
            case '03': $bulanperiode = "Maret"; break;
            case '04': $bulanperiode = "April"; break;
            case '05': $bulanperiode = "Mei"; break;
            case '06': $bulanperiode = "Juni"; break;
            case '07': $bulanperiode = "Juli"; break;
            case '08': $bulanperiode = "Agustus"; break;
            case '09': $bulanperiode = "September"; break;
            case '10': $bulanperiode = "Oktober"; break;
            case '11': $bulanperiode = "November"; break;
            case '12': $bulanperiode = "Desember"; break;
        }

        $periodesasi = $bulanperiode." ".$tahun;
            
        $this->createLog('Filter laporan transaksi dengan data filter: bulan: '.$bulan.' dan tahun: '.$tahun);
        $totalBPJS = $this->counterTotalBPJS($periode);
        $totalMandiri = $this->counterTotalMandiri($periode);
        $totalLainnya = $this->counterTotalLainnya($periode);
        $datatransaksi = DB::table('transaksi')->where('periode','=',$periode)->get();
        return View::make('beranda/transaksi')->with('beranda','')->with('penerimaanresep','')->with('obats','')->with('pemakaian','')->with('permintaan','')->with('penerimaan','')->with('retur','')->with('indukdata','')->with('laporan','active')->with('akun','')->with('datatransaksi',$datatransaksi)->with('totalBPJS',$totalBPJS)->with('totalMandiri',$totalMandiri)->with('totalLainnya',$totalLainnya)->with('periodesasi',$periodesasi);
        }
    }

    


}
