<?php

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

// Route::get('/', function () {
//     return view('template');
// });

Route::resource('/', 'FrontendController');
Route::get('auth/logout', 'Auth\AuthController@logout');

Route::get('/unduh', 'FrontendController@unduh');
Route::get('/unduh/{id}','FrontendController@unduh_file');
// Route::resource('/', 'TemplateController');
Route::get('/berita/{id}', 'FrontendController@show_berita');
Route::get('berita/comment/{id}','FrontendController@comment');
Route::get('kegiatan/comment/{id}','FrontendController@comment_kegiatan');
Route::get('/kegiatan/{id}', 'FrontendController@show_kegiatan');

Route::get('/dkc', 'FrontendController@dkc');
Route::get('/visimisi', 'FrontendController@visimisi');
Route::get('/strukturorganisasi', 'FrontendController@strukturorganisasi');
Route::get('/profile_', 'FrontendController@profile');

Auth::routes(['verify' => true]);
Route::auth();

Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index');
    Route::resource('users', 'UserController');
    Route::resource('categories', 'CategoryController');
    Route::resource('comments', 'CommentController');
    Route::resource('beritas', 'BeritaController');
    Route::resource('kepramukaans', 'KepramukaanController');
    Route::resource('jenisKelamins', 'JenisKelaminController');
    Route::resource('ktas', 'KtaController');
    Route::resource('tingkatans', 'TingkatanController');
    Route::resource('pendaftarans', 'PendaftaranController');
    Route::resource('downloads', 'DownloadController');
    Route::resource('kegiatans', 'kegiatanController');
    Route::resource('commentKegiatans', 'CommentKegiatanController');
    Route::get('/check', 'UserController@userOnlineStatus');
        
    Route::get('beritas/persetujuan_berita/{id}','BeritaController@status_berita');
    Route::resource('beritas', 'BeritaController');
    Route::resource('users', 'UserController');
});


