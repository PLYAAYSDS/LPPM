<?php

use Illuminate\Support\Facades\Route;

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


Route::group(['middleware'=>'auth'], function(){
Route::get('/','AdminController@dashboard');

Route::get('/keluar', 'AdminController@logout');


Route::get('/bpenelitian1', 'PengajuanController@index');
Route::post('/create', 'PengajuanController@insert');
Route::get('/deleteData/{id}', 'PengajuanController@deleteData')->name('data.destroy');
Route::get('/deleteStaff/{id}', 'PengajuanController@deleteStaff')->name('staff.destroy');
Route::get('/deleteMahasiswa/{id}', 'PengajuanController@deleteMahasiswa')->name('mahasiswa.destroy');
Route::post('/update/{id}', 'PengajuanController@update');
Route::get('/updateProposal/{id}', 'PengajuanController@editProposal');
Route::get('/penelitian', 'PenelitianController@getDashb');
Route::get('/penelitianhomekaprodi', 'PenelitianController@getDashbKap');
Route::get('/penelitianhomedekan', 'PenelitianController@getDashbDek');
Route::get('/penelitianhomelppm', 'PenelitianController@getDashbLppm');
Route::get('/detailpenelitian/{id}', 'PenelitianController@getDetail');
Route::get('/detailpenelitiankaprodi/{id}', 'PenelitianController@getDetailKaprodi');
Route::get('/detailpenelitiandekan/{id}', 'PenelitianController@getDetailDekan');
Route::get('/detailpenelitianlppm/{id}', 'PenelitianController@getDetailLppm');
Route::get('/detailpenlppm/{id}', 'PenelitianController@getDetLppm');
Route::post('/create', 'PengajuanController@insert');
Route::post('/tambahreviewer/{id}','PenelitianController@insertReviewer');
Route::get('/reviewerhome','PenelitianController@getDashReviewer');
Route::get('/reviewerfinal','PenelitianController@getDashReviewerFinal');
Route::post('/beriSK/{id}','PenelitianController@pemberianSK');
Route::post('/periksaDokumen/{id}','PenelitianController@pemeriksaanLaporanKemajuan');

Route::get('/dashboard', 'CobaController@dashboard');

//Kuesioner
Route::get('/kuesionerhome', 'KuesionerControler@getDash');
Route::get('/kuesioner/{id}', 'KuesionerControler@getKuesioner');
Route::get('/finalReview/{id}', 'KuesionerControler@finalReview');
Route::post('/jawab/{id}', 'KuesionerControler@makeScore');
Route::post('/tambahkuesioner', 'KuesionerControler@insertKuseioner');

//Persetujuan
Route::post('/persetujuanKaprodi/{id}', 'PenelitianController@KaprodiAgreement');

//Pelaporan Penelitian

Route::post('/laporanharian/{id}', 'LaporanHarianController@SaveDailyReport');
Route::post('/laporanakhir/{id}', 'LaporanAkhirController@SaveFinalReport');


Route::get('/luaran','luaranController@index');
Route::get('/terima/{id}','luaranController@terima');
Route::get('/tolak/{id}','luaranController@tolak');
//Upload

Route::post('/Harian/{id}','UploadController@dailyReport');
Route::post('/Kemajuan/{id}','UploadController@Progress');
Route::post('/Final/{id}','UploadController@finalReport');
Route::post('/penilaianLaporanAkhir/{id}','UploadController@penilaianLaporan');
Route::post('/perbaikan/{id}','UploadController@perbaikan');

//Luaran

Route::get('/publikasijurnal','publikasiJurnalController@index');
Route::post('/buatjurnal', 'publikasiJurnalController@create');
Route::get('/luaranjurnal/{id}','luaranController@lihatDetail');


Route::get('/publikasimediamasa','publikasiMediaMasaController@index');
Route::post('/buatmediamasa', 'publikasiMediaMasaController@create');
Route::get('/luaranmediamassa/{id}','luaranController@lihatDetailMediaMassa');

Route::get('/publikasiforumilmiah','publikasiForumIlmiahController@index');
Route::post('/buatforumilmiah', 'publikasiForumIlmiahController@create');
Route::get('/luaranforumilmiah/{id}','luaranController@lihatDetailForumIlmiah');

Route::get('/hakkekayaaninternasional','hakKekayaanInternasionalController@index');
Route::post('/buathki', 'hakKekayaanInternasionalController@create');
Route::get('/luaranhakkekayaaninternasional/{id}','luaranController@lihatDetailHakKekayaanInternasional');

Route::get('/luaraniptek','luaranIptekController@index');
Route::post('/buatluaraniptek', 'luaranIptekController@create');
Route::get('/luaraniptek/{id}','luaranController@lihatDetailLuaranIptek');

Route::get('/produkterstandarisasi','produkTerstandarisasiController@index');
Route::post('/buatprodukstandarisasi', 'produkTerstandarisasiController@create');
Route::get('/luaranprodukterstandarisasi/{id}','luaranController@lihatDetailProdukTerstandarisasi');

Route::get('/produktersertifikasi','produkTersertifikasiController@index');
Route::post('/buatproduksertifikasi', 'produkTersertifikasiController@create');
Route::get('/luaranproduktersertifikasi/{id}','luaranController@lihatDetailProdukTersertifikasi');

Route::get('/mitrahukum','mitraHukumController@index');
Route::post('/buatmitrahukum', 'mitraHukumController@create');
Route::get('/luaranmitrahukum/{id}','luaranController@lihatDetailMitraHukum');

Route::get('/luaranbuku','luaranBukuController@index');
Route::post('/buatluaranbuku', 'luaranBukuController@create');
Route::get('/luaranbuku/{id}','luaranController@lihatDetailBuku');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Penelitian
