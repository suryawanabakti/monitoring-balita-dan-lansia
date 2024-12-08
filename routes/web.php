<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    $avatarColumn = config('filament-edit-profile.avatar_column', 'avatar_url');
    return $avatarColumn ? Storage::url("$avatarColumn") : null;
});

Route::redirect('/pimpinan/login', '/admin/login')->name('login');
