<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'LoginController@logout')->name('logout');


Route::group(['middleware' => ['auth','ceklevel:admin']], function(){
    Route::resource('divisi', 'DivisiController');
    Route::resource('kategori', 'KategoriController');
    Route::resource('departemen', 'DepartemenController');
    Route::resource('useradmin', 'UseradminController');
    Route::get('/tiket/prioritas','TiketController@prioritas'); 
});

Route::group(['middleware' => ['auth','ceklevel:admin,user,pic']], function(){
    Route::get('/dashboard', 'dashboardController@index');
    Route::get('/tiket/myticket','TiketController@myticket');
    Route::get('/tiket/{id}/detail','TiketController@detail');
    Route::resource('tiket', 'TiketController');
});
