<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/admin/login')->name('login');
Route::redirect('/wali/login', '/admin/login')->name('login');
Route::redirect('/pimpinan/login', '/admin/login')->name('login');
