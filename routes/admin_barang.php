<?php

Route::get('/', 'HomeController@index')->name('dashboard');

Route::get('/product', 'ProductController@index')->name('product.show');

Route::get('/product/data', 'ProductController@productData')->name('product.data');

Route::PUT('/product/update/{id_product}', 'ProductController@update')->name('product.update');

Route::get('/product/{product}/edit','ProductController@edit')->name('product.edit');

Route::get('/product/view/{views}','ProductController@view')->name('product.view');

Route::post('/product/tambah', 'ProductController@store')->name('product.add');

route::get('/ProductAddView',function(){ return view("AdminBarang.ProductAdd");})->name('product.form');

Route::get('/product/status/{status}','ProductController@status')->name('product.status');