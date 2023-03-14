<?php


// Home
Route::get('/', 'HomeController@index')->name('home');

// Authentication
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//Password Reset Routes
Route::get('forget-password', 'Auth\ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
Route::post('forget-password', 'Auth\ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post');
Route::get('reset-password/{token}', 'Auth\ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'Auth\ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');

//Checkout Page
Route::get('checkout/{productid}', 'TransactionController@proceed2Checkout')->name('proceed2checkout');

//Transaction API
Route::post('api/transaction', 'TransactionController@store')->name('createtransaction');

//Voucher API
Route::get('api/voucher/{vouchercode}', 'VoucherController@verifyDiscountCode')->name('verifydiscountcode');

//Dashboard
Route::get('dashboard', 'UserController@index')->name('userdashboard');

//Download
Route::get('profiledownload/{server}', 'ProfileDownloadController@profiledownload')->name('download');

//Static Pages
Route::get('tos', 'StaticController@showTOS')->name('tospage');
Route::get('privacy', 'StaticController@showPrivacy')->name('privacy');

