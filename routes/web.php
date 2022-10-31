<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    // return view('welcome');
    return view('layouts.index');
});


Route::get('/home', function(){
    return view('dashboard');
});

Route::get('/login2', function(){
    return view('auth2.login');
});

Route::get('register2', function(){
    return view('auth2.register');
});
Route::post('posts', [App\Http\Controllers\RegisterController::class, 'store']);



Route::get('/dashboard', function () {
    // return view('dashboard');
    return view('layouts.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Multi authentication
Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
  //All the admin routes will be defined here...
  Route::get('/dashboard','HomeController@index')->name('home');
});

Route::namespace('Auth')->group(function(){
        
    //Login Routes
    Route::get('/login','LoginController@showLoginForm')->name('login');
    Route::post('/login','LoginController@login');
    Route::post('/logout','LoginController@logout')->name('logout');

    //Forgot Password Routes
    Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    //Reset Password Routes
    Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

});
