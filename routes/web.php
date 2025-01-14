<?php  
  
use App\Http\Controllers\MenuController;  
use App\Http\Controllers\TransaksiController;  
use Illuminate\Support\Facades\Route;  
  
// Menggunakan Route::resource untuk menus dan transaksis  
Route::resource('menus', MenuController::class);  
Route::resource('transaksis', TransaksiController::class);  
