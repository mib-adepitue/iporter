<?php

Route::get('/', function () {
    return view('index');
});

Auth::routes(['verify' => true]);

//VERIFIKASI EMAIL
Route::get('verifikasi-email-porter-create','VerifikasiEmail@porter_create')->name('verifikasi.email.porter.create');
Route::get('verifikasi-email-order-create','VerifikasiEmail@order_create')->name('verifikasi_email.order_create');
Route::get('verifikasi-email-template', 'VerifikasiEmail@template')->name('verifikasi.email.template.app');

// REGISTER
Route::post('/register-user', 'Register@register')->name('regis'); //registrasi sebagai user biasa atau penitip
Route::post('/register-porter', 'RegisterPorter@register_porter')->name('register.porter');//registrasi sebagai porter

// LENGKAPI DATA USER
Route::post('/complete-data-user', 'Register@lengkapi_data_store')->name('lengkapi_data.store'); //Lengkapi data user store

// KERANJANG DAN RIWAYAT PENITIPAN USER
Route::get('keranjang', 'Keranjang@show')->name('keranjang.show');
Route::get('riwayat-penitipan', 'Keranjang@riwayat_penitipan')->name('riwayat.penitipan_user');
Route::delete('riwayat-penitipan-hapus/{id}', 'Keranjang@riwayat_penitipan_hapus')->name('riwayat-penitipan-hapus');

// PROFILE
Route::get('profile', 'Profile@show')->name('profile.show'); // Halaman Profile User


// USER ORDER
Route::Resource('/order', 'ClientOrder');
Route::post('order/post-order', 'ClientOrder@store')->name('post.order');

// PORTER
Route::Resource('/porter', 'ClientPorter');
Route::get('email', 'HomeController@email'); //lihat contoh halaman kirim email ke porter
Route::get('email-reject', 'HomeController@email_reject'); //lihat contoh halaman kirim email reject ke porter
Route::post('/post-porter', 'ClientPorter@store');

// USER LOGOUT
Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');


// VIEW
Route::get('porter/create', 'HomeController@porter_create')->name('porter.create');
Route::get('order/create', 'HomeController@order_create')->name('order.create');
Route::get('/info-aplikasi', 'HomeController@info_aplikasi')->name('info.aplikasi');

// Route::post('/contoh', 'HomeController@contoh')->name('contoh');

// ADMIN PAGE
Route::prefix('admin-administration')->group(function() {
	Route::get('/', 'AdminController@index');
	Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
	Route::get('/login', 'Auth\AdminLoginController@showloginform')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

	//TAB DATA PORTER
	Route::prefix('data-porter')->group(function() {
		Route::Resource('porters', 'Admin\PorterController');
		Route::get('validasi-porters', 'Admin\PorterController@validasi_porters')->name('validasi.porters');
		//Penolakan pendaftaran porter
		Route::post('porters/reject/{id}', 'Admin\PorterController@porters_reject')->name('porters.reject');
		Route::put('store-validasi/{id}', 'Admin\PorterController@store_validasi')->name('store.validasi');
	});

	//TAB USER
	Route::Resource('users', 'Admin\UserController');

	// TAB DATA PENITIPAN
	Route::get('sedang-menitip', 'Admin\DataPenitipan@sedang_menitip')->name('sedang.menitip');
	Route::get('riwayat-penitipan', 'Admin\DataPenitipan@riwayat_penitipan')->name('riwayat.penitipan');
	Route::put('penitipan-done/{id}', 'Admin\DataPenitipan@penitipan_done')->name('penitipan_done');
	Route::delete('penitipan-cancel/{id}', 'Admin\DataPenitipan@penitipan_cancel')->name('penitipan_cancel');
	Route::put('penitipan-find-porter/{id}', 'Admin\DataPenitipan@penitipan_find_porter')->name('penitipan_find_porter');

});