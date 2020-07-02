<?php

Route::get('/', 'HomeController@index')->name('dashboard');

Route::get('/Pengiriman', 'PengirimanController@index')->name('pengiriman.home');

Route::get('/Pengiriman/data', 'PengirimanController@PengirimanData')->name('pengiriman.data');

Route::get('/Pengiriman/search', 'PengirimanController@searchbystatus')->name('pengiriman.search');

Route::get('/Pengiriman/{id_payment}/view', 'PengirimanController@Detail')->name('pengiriman.detail');

Route::post('/Pengiriman/update','PengirimanController@ShippingOrder')->name('pengiriman.update');