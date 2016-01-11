<?php
Route::group(['middleware' => ['web']], function () {
	Route::resource('product', 'ProductController', ['except' => ['show']]);
	Route::get('/', function() {
		return redirect('product');
	});
});
