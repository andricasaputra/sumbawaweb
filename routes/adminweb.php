<?php

/*
|--------------------------------------------------------------------------
| Admin Page Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['auth']], function () {
    
	/*
	|
	|PENGADUAN ROUTES
	|
	*/

	Route::resource('pengaduan', 'PengaduanController')
	->except(['edit', 'update', 'destroy']);

	/*
	|
	|HEADLINE ROUTES
	|
	*/

	Route::resource('headline', 'HeadlineController');

	/*
	|
	|BERITA ROUTES
	|
	*/

	Route::resource('berita', 'BeritaController');

	/*
	|
	|OPERASIONAL KARANTINA HEWAN ROUTES
	|
	*/

	Route::resource('khoperasional', 'KhOperasionalController', [
	    'except' => ['destroy', 'show']
	]);

	/*
	|
	|OPERASIONAL KARANTINA TUMBUHAN ROUTES
	|
	*/

	Route::resource('ktoperasional', 'KtOperasionalController', [
	    'except' => ['destroy', 'show']
	]);

	/*
	|
	|PNBP ROUTES
	|
	*/

	Route::resource('pnbp', 'PnbpController', [
	    'except' => ['destroy', 'show']
	]);

	/*
	|
	|IKM ROUTES
	|
	*/

	Route::resource('ikm', 'IkmController', [
	    'except' => ['destroy', 'show']
	]);

	/*
	|
	|FILES/UPLOAD DOKUMEN ROUTES
	|
	*/

	Route::resource('files', 'UploadDokumen');

	Route::get('files/download/{file}', function ($file = '') {
	    return response()->file(storage_path('app/public/ourfiles/' .$file));
	})->name('files.download');

	/*
	|
	|KEUANGAN ROUTES
	|
	*/

	Route::prefix('keuangan')->group(function () {

		Route::resources([
		    'dipa' => 'KeuanganDipaController',
		    'rka_kl' => 'KeuanganRkaklContoller',
		    'realisasi_anggaran' => 'KeuanganRealisasiController',
		    'neraca_keuangan' => 'KeuanganNeracaController',
		    'daftar_aset' => 'KeuanganDaftarAsetController'
		]);

	});

	/*
	|
	|PPID ROUTES
	|
	*/

	Route::prefix('ppid')->group(function () {

	    Route::resources([
		    'informasi_berkala' => 'PpidBerkalaController',
		    'informasi_sertamerta' => 'PpidSertamertaController',
		    'informasi_setiapsaat' => 'PpidSetiapsaatController',
		    'regulasi' => 'PpidRegulasiController'
		]);
		
	});

	/*
	|
	|LAPORAN ROUTES
	|
	*/
	Route::prefix('laporan')->group(function () {

	    Route::resources([
		    'tahunan' => 'LaporanTahunanController',
		    'keuangan' => 'LaporanKeuanganController',
		    'kinerja' => 'LaporanKinerjaContoller',
		    'ppid' => 'LaporanPpidContoller',
		    'kekayaan' => 'LaporanPpidContoller'
		]);

	});

	/*
	|
	|EVENTS ROUTES
	|
	*/

	Route::resource('events', 'EventController');

	Route::get('fullcalendar', 'EventController@calendar')->name('events.calendar');

});/*End Route Group Middleware Admin*/




