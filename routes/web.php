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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('apiNik/{nik}','NikController@cekNik');

Route::group(['middleware' => ['activity']], function () {
    Auth::routes(['verify' => true]);

    Route::get('/','WelcomeController@welcome')->name('welcome');
    Route::get('galeri-view', 'WelcomeController@galeriview');
    Route::get('sop', 'WelcomeController@sop');
    Route::get('ekliping', 'WelcomeController@ekliping');
    Route::get('alur-permohonan', 'WelcomeController@alurpermohonan');
    Route::get('alur-keberatan', 'WelcomeController@alurkeberatan');
    Route::get('alur-sengketa', 'WelcomeController@alursengketa');
    Route::get('transparansi', 'WelcomeController@transparansi');
    Route::get('statistik-kota', 'WelcomeController@statistikkota');
    Route::get('biaya-pelayanan', 'WelcomeController@biayapelayanan');
    Route::get('jadwal-pelayanan', 'WelcomeController@jadwalpelayanan');
    Route::get('prosedur-sp4n', 'WelcomeController@prosedursp4n');
    Route::get('regulasi-keterbukaan', 'WelcomeController@regulasiketerbukaan');
    Route::get('survei-kepuasan', 'WelcomeController@surveikepuasan');
    Route::get('statistik-ppid', 'WelcomeController@statistikppid');
    Route::get('feedback-ppid', 'WelcomeController@feedbackppid');

    Route::group(['prefix' => 'informasipublik'], function(){
        Route::get('dip','WelcomeController@dip')->name('informasipublik.dip');
        Route::get('berkala','WelcomeController@berkala')->name('informasipublik.berkala');
        Route::get('sertamerta','WelcomeController@sertamerta')->name('informasipublik.sertamerta');
        Route::get('setiapsaat','WelcomeController@setiapsaat')->name('informasipublik.setiapsaat');
        Route::get('sakip','WelcomeController@sakip')->name('informasipublik.sakip');

        Route::post('search','WelcomeController@search')->name('informasipublik.search');
    });

    Route::group(['prefix' => 'monev'], function(){
        Route::get('index','WelcomeController@monev')->name('monev.index');
        Route::post('skpd','WelcomeController@monev')->name('monev.skpd');
    });

    Route::group(['middleware' => ['web', 'auth']], function () {
        Route::get('/home', 'HomeController@index')->name('home');

        Route::resource('profile', 'ProfileController');

        Route::group(['middleware' => ['role:superadmin']], function () {
            Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

            Route::resource('skpd', 'SKPDController');
            Route::resource('petugas', 'PetugasController');
            Route::resource('kategori', 'KategoriController');
            Route::resource('jenis', 'JenisController');
            Route::resource('tipefile', 'TipeFileController');
            Route::resource('statusdokumen', 'StatusDokumenController');
            Route::resource('banner', 'BannerController');
            Route::resource('page', 'PageController');

            Route::get('latest', 'PermohonanInformasiController@latest')->name('permohonaninformasisss.latest');

            Route::post('keberatan/tanggapan/{id}', 'KeberatanController@tanggapan');

            Route::resource('mejalayanan', 'MejaLayananController');
        });

        Route::group(['middleware' => ['role:superadmin|adminskpd|pengunjung']], function () {
            Route::get('informasidiunduh', 'HomeController@informasidiunduh');
            Route::get('print-informasidiunduh-pdf', 'HomeController@printinformasidiunduhpdf');
            Route::get('print-informasidiunduh-excel', 'HomeController@printinformasidiunduhexcel');

            Route::get('permohonaninformasisss/detail/{id}', 'PermohonanInformasiController@detail');
            Route::get('permohonaninformasisss/edit/{id}', 'PermohonanInformasiController@edit');
            Route::get('keberatan/detail/{id}', 'KeberatanController@detail');

            Route::get('dip/download/{id}/{userId}', 'WelcomeController@downloaddip');
            Route::get('ekliping/download/{id}/{userId}', 'WelcomeController@downloadekliping');

            Route::get('anggota-forum', 'HomeController@anggotaforum');
        });

        Route::group(['middleware' => ['role:pengunjung|superadmin']], function () {
            Route::resource('permohonaninformasisss', 'PermohonanInformasiController');
            Route::resource('keberatan', 'KeberatanController');
        });

// feedback
        Route::group(['middleware' => ['role:superadmin']], function () {
            Route::get('feedback', 'HomeController@feedback')->name('feedback.feedback');
        });

        Route::group(['middleware' => ['role:superadmin|adminskpd']], function () {
            Route::resource('dip', 'DIPController');
            Route::get('dip-draft', 'DIPController@draft');
            Route::get('dip-menunggu-verifikasi', 'DIPController@menungguverifikasi');
            Route::get('dip-ditolak', 'DIPController@ditolak');
            Route::get('dip/publish/{id}', 'DIPController@publish');
            Route::post('dip/verifikasi/{id}', 'DIPController@verifikasi');

            Route::get('print-dip-pdf', 'DIPController@printdippdf');
            Route::get('print-dip-excel', 'DIPController@printdipexcel');

            Route::get('disposisi', 'PermohonanInformasiController@disposisi')->name('permohonaninformasisss.disposisi');
            Route::get('diproses', 'PermohonanInformasiController@diproses')->name('permohonaninformasisss.diproses');
            Route::get('selesai', 'PermohonanInformasiController@selesai')->name('permohonaninformasisss.selesai');
            Route::get('ditolak', 'PermohonanInformasiController@ditolak')->name('permohonaninformasisss.ditolak');
            Route::get('semuapermohonan', 'PermohonanInformasiController@semuapermohonan')->name('permohonaninformasisss.semuapermohonan');
            Route::post('permohonaninformasisss/verifikasi/{id}', 'PermohonanInformasiController@verifikasi');
        });
    });

    Route::group(['prefix' => 'profil'], function(){
        Route::get('profil', 'PageController@indexProfil')->name('index-profil');
    });


});

