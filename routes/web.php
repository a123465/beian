<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortalController;

Route::get('/', [PortalController::class, 'index'])->name('home');
Route::get('/about', [PortalController::class, 'about'])->name('about');
Route::get('/services', [PortalController::class, 'services'])->name('services');
Route::get('/contact', [PortalController::class, 'contact'])->name('contact');

