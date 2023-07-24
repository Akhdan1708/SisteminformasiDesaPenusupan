<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// ** USER ** //
Route::get('/', [UserController::class, 'index']);
Route::get('profil', [UserController::class, 'profil']);
Route::get('keluhan', [UserController::class, 'keluhan']);
Route::post('keluhan/tambah', [UserController::class, 'tambah_keluhan']);
Route::get('data-penduduk', [UserController::class, 'penduduk']);
Route::get('data-kematian', [UserController::class, 'kematian']);


// Post
Route::get('posts', [PostController::class, 'berita']);
Route::get('berita/{slug}', [PostController::class, 'show']);



// ** ADMIN ** //
Route::get('log-in', [AdminController::class, 'login']);
Route::post('auth-login', [AdminController::class, 'auth_login']);
Route::get('logout', [AdminController::class, 'logout']);
Route::get('admin/dashboard', [AdminController::class, 'admin']);
Route::get('admin/keluhan', [AdminController::class, 'adm_keluhan']);
Route::post('admin/keluhan/edit/{id}', [AdminController::class, 'edit_keluhan']);
Route::get('admin/keluhan/hapus/{id}', [AdminController::class, 'hapus_keluhan']);
Route::get('admin/rw', [AdminController::class, 'rw']);
Route::post('admin/rw/tambah', [AdminController::class, 'tambah_rw']);
Route::post('admin/rw/edit/{id}', [AdminController::class, 'edit_rw']);
Route::get('admin/rw/hapus/{id}', [AdminController::class, 'hapus_rw']);
Route::get('admin/berita', [AdminController::class, 'adm_berita']);
Route::get('admin/newpost', [AdminController::class, 'newpost']);
Route::post('admin/berita/tambah', [AdminController::class, 'tambah_berita']);
Route::get('admin/berita/edit/{id}', [AdminController::class, 'tampil_edit']);
Route::post('admin/berita/update/{id}', [AdminController::class, 'edit_berita']);
Route::get('admin/berita/hapus/{id}', [AdminController::class, 'hapus_berita']);
Route::get('admin/galeri', [AdminController::class, 'adm_galeri']);
Route::post('admin/galeri/tambah', [AdminController::class, 'tambah_galeri']);
Route::post('admin/galeri/edit/{id}', [AdminController::class, 'edit_galeri']);
Route::get('admin/galeri/hapus/{id}', [AdminController::class, 'hapus_galeri']);
Route::get('admin/kematian', [AdminController::class, 'adm_kematian']);
Route::post('admin/kematian/tambah', [AdminController::class, 'tambah_kematian']);
Route::get('admin/kematian/hapus/{id}', [AdminController::class, 'hapus_kematian']);
Route::post('admin/kematian/edit/{id}', [AdminController::class, 'edit_kematian']);
Route::get('admin/penduduk', [AdminController::class, 'adm_penduduk']);
Route::post('admin/penduduk/tambah', [AdminController::class, 'tambah_penduduk']);
Route::post('admin/penduduk/edit/{id}', [AdminController::class, 'edit_penduduk']);
Route::get('admin/penduduk/hapus/{id}', [AdminController::class, 'hapus_penduduk']);
Route::get('rw/{id}/rt', [AdminController::class, 'getRT']);
Route::get('admin/rt', [AdminController::class, 'rt']);
Route::post('admin/rt/tambah', [AdminController::class, 'tambah_rt']);
Route::post('admin/rt/edit/{id}', [AdminController::class, 'edit_rt']);
Route::get('admin/rt/hapus/{id}', [AdminController::class, 'hapus_rt']);


