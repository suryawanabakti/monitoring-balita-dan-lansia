<?php

use App\Exports\RekamKesehatanBalitaExport;
use App\Exports\RekamKesehatanLansiaExport;
use App\Http\Controllers\ProfileController;
use App\Models\RekamKesehatan;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

Route::redirect('/admin/login', '/login');
Route::redirect('/admin/register', '/register');

Route::get('/', function () {
    return Inertia::location("/login");
});

Route::get('/export/balita', function () {
    return Excel::download(new RekamKesehatanBalitaExport, 'balita.xlsx');
});

Route::get('/export/lansia', function () {
    return RekamKesehatan::with('lansia')->orderBy('created_at', 'DESC')->get();
    return Excel::download(new RekamKesehatanLansiaExport, 'lansia.xlsx');
});


Route::get('/dashboard', function () {
    return Inertia::location("/admin");
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
