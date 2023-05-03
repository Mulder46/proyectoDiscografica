<?php

use App\Models\Artist;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiskController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ArtistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//los mostrar todos
Route::get('artists',[ArtistController::class, 'index'])->name('Artist-index');
Route::get('disks',[DiskController::class, 'index'])->name('Disk-index');
Route::get('songs',[SongController::class, 'index'])->name('song-index');
//mostrar específico
Route::post('show-artist',[ArtistController::class, 'show'])->name('show-artist'); //post le manda los datos del artista que queremos ver
Route::get('show-artist-form',[ArtistController::class, 'select']);
Route::post('show-disk',[DiskController::class, 'show'])->name('show-disk');
Route::get('show-disk-form',[DiskController::class, 'select']);
Route::post('show-song',[SongController::class, 'show'])->name('show-song');
Route::get('show-song-form',[SongController::class, 'select']);

//formularios y creaciones
Route::get('new-artist-form',[ArtistController::class, 'create'])->name('new-artist-form');
Route::post('new-artist',[ArtistController::class, 'store']);
Route::post('new-disk-formPre',[DiskController::class, 'newPre'])->name('new-disk-formPre');
Route::post('new-disk-form',[DiskController::class, 'create'])->name('new-disk-form');
Route::post('new-disk',[DiskController::class, 'store']);
Route::get('new-song-form',[SongController::class, 'create'])->name('new-song-form');
Route::post('new-song',[SongController::class, 'store']);
//formularios para editar
Route::get('edit-artist-form',[ArtistController::class, 'edit']);
Route::post('update-artist',[ArtistController::class, 'update'])->name('updateArtist');
Route::get('edit-disk-form',[DiskController::class, 'edit']);
Route::post('update-disk',[DiskController::class, 'update'])->name('updateDisk');
Route::get('edit-song-form',[SongController::class, 'edit']);
Route::post('update-song',[SongController::class, 'update'])->name('updateSong');
//editDrop
Route::post('editDeleteArtist',[ArtistController::class, 'editDelete'])->name('editDeleteArtist');
Route::post('editDeleteDisk',[DiskController::class, 'editDelete'])->name('editDeleteDisk');
Route::post('editDeleteSong',[SongController::class, 'editDelete'])->name('editDeleteSong');
//borrar
Route::post('DeleteArtist',[ArtistController::class, 'destroy'])->name('DeleteArtist');
Route::post('DeleteDisk',[DiskController::class, 'destroy'])->name('DeleteDisk');
Route::post('DeleteSong',[SongController::class, 'destroy'])->name('DeleteSong');