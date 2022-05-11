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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/music', 'MusicController@Music')->name('music');
Route::post('/music/insert', 'MusicController@MusicInsert')->name('MusicInsert');
Route::get('/music/delete/{id}', 'MusicController@MusicDelete')->name('MusicDelete');
Route::get('/music/view-edit/{id}', 'MusicController@MusicViewEdit')->name('MusicViewEdit');
Route::post('/music/edit', 'MusicController@MusicEdit')->name('MusicEdit');

Route::get('/music/album/search/{singer}', 'MusicController@AlbumSearch')->name('AlbumSearch');
Route::get('/music/like/{id}', 'MusicController@MusicLike')->name('MusicLike');


//Ajax Fetch Route
Route::get('/music-list/fetch', 'MusicController@MusicListFetch')->name('MusicListFetch');

