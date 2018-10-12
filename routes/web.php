<?php

/*
|--------------------------------------------------------------------------
| Website Page Routes
|--------------------------------------------------------------------------
*/

/*Auth Admin Website*/

Auth::routes();

Route::get('/adminweb', function () {
    return redirect('adminweb/login');
});

Route::namespace('Web')->group(function () {
    
	Route::get('/', 'HomeController@sendToHome')
	->name('home');

	Route::get('/{id}/berita', 'BeritaController@showSingleBerita')
	->name('showsingle.berita');

});






