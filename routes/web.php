<?php

use App\Http\Controllers\KomikController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\PenyewaandetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('pages.Auth.login');
});

Route::middleware(['auth'])->group(function (){
    Route::get('home', function () {
        return view('pages.dashboard');
    })->name('home');

    Route::resource('user', UserController::class);
    Route::resource('product', \App\Http\Controllers\ProductController::class);

    Route::resource('komik', KomikController::class);
    Route::resource('penyewaan', PenyewaanController::class);

    Route::get('penyewaandetail/{id}/create', [PenyewaandetailController::class, 'create'])->name('penyewaandetail.create');


    Route::post('penyewaandetail', [PenyewaandetailController::class, 'store'])->name('penyewaandetail.store');
    Route::get('penyewaandetail/{id}/list', [PenyewaandetailController::class, 'list'])->name('penyewaandetail.list');
    Route::delete('penyewaandetail/{detail_id}/delete/{penyewaan_id}', [PenyewaandetailController::class, 'destroy'])->name('penyewaandetail.destroy');
    Route::get('penyewaandetail/{id}/lunas', [PenyewaandetailController::class, 'setLunas'])->name('penyewaandetail.lunas');

    Route::get('/search-komik', [KomikController::class, 'search'])->name('search.komik');
    Route::get('/cetak', [PdfController::class, 'cetak_pdf'])->name('penyewaandetail.cetak');
    Route::get('/cetak_komik', [PdfController::class, 'cetak_komik'])->name('komik.cetak');
    Route::get('/cetak_penyewaan', [PdfController::class, 'cetak_penyewaan'])->name('penyewaan.cetak');
});

// Route::get('/login', function () {
//     return view('pages.auth.login');
// });

// Route::get('/user', function () {
//     return view('pages.users.index');
// });
