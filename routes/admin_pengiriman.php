<?php

Route::get('/', 'HomeController@index')->name('dashboard');

Route::get('/Pengiriman', 'PengirimanController@index')->name('pengiriman.home');

Route::get('/Pengiriman/data', 'PengirimanController@pengiriman_data')->name('pengiriman.data');

Route::get('/Pengiriman/{TransactionID}/view', 'PengirimanController@inputnumbershipping')->name('pengirim.resi');

Route::get('/Pengiriman/status/{TransactionID}', 'PengirimanController@statuspengiriman')->name('pengiriman.status');

Route::get('/Pengiriman/search', 'PengirimanController@searchbystatus')->name('pengiriman.search');

Route::get('/Pengiriman/detail/{TransactionID}', 'PengirimanController@pengirimandetail')->name('pengiriman.detail');

Route::post('/Pengiriman/update','PengirimanController@ShippingOrder')->name('pengiriman.update');




