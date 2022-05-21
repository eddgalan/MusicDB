<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongsController;
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

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'show'])->name('home');
Route::get('/artists', [ArtistsController::class, 'index'])->name('artists');
Route::post('/artists', [ArtistsController::class, 'store'])->name('artists_store');
Route::post('/artists/update', [ArtistsController::class, 'update'])->name('artists_update');
Route::post('/artists/delete', [ArtistsController::class, 'destroy'])->name('artists_delete');
Route::get('/api/artists', [ArtistsController::class, 'getArtists'])->name('api_get_artists');
Route::get('/api/artists/{id}', [ArtistsController::class, 'show'])->name('api_get_artist');
Route::get('/albums', [AlbumController::class, 'index'])->name('album');
Route::get('/albums/nuevo', [AlbumController::class, 'create'])->name('album_create');
Route::post('/albums/store', [AlbumController::class, 'store'])->name('album_store');
Route::get('/albums/{id}', [AlbumController::class, 'show'])->name('albums_show');
Route::post('/albums/{id}', [AlbumController::class, 'update'])->name('albums_update');
Route::delete('/albums/{id}', [AlbumController::class, 'destroy'])->name('albums_delete');
Route::get('/api/getalbums', [AlbumController::class, 'getAlbums'])->name('api_get_albums');
Route::post('/songs', [SongsController::class, 'store'])->name('song_store');
