<?php 

/*
|--------------------------------------------------------------------------
| Admin API Routes
|--------------------------------------------------------------------------
*/ 

Route::get('/apiheadline', 'HeadlineController@apiHeadline');

Route::get('/apiberita', 'BeritaController@apiBerita');

Route::get('khoperasional/{tahun}', 'KhOperasionalController@chartApi')
->name('khoperasional.chart');

Route::get('ktoperasional/{tahun}', 'KtOperasionalController@chartApi')
->name('ktoperasional.chart');

Route::get('pnbp/chartpnbpapi', 'PnbpController@chartApi')
->name('pnbp.chart');

Route::get('ikm/chartikmapi', 'IkmController@chartApi')
->name('ikm.chart');
