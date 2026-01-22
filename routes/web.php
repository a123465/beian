<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\PostController;

Route::get('/', [PortalController::class, 'index'])->name('home');
Route::get('/about', [PortalController::class, 'about'])->name('about');
Route::get('/services', [PortalController::class, 'services'])->name('services');
Route::get('/contact', [PortalController::class, 'contact'])->name('contact');
Route::post('/contact', [PortalController::class, 'sendContact'])->name('contact.send');

// Case detail route (slug optional so calls to the named route without parameter won't throw)
Route::get('/cases/{slug?}', [PortalController::class, 'case'])->name('cases.show');

// Posts (public read, auth-protected write)
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::middleware('auth')->group(function () {
	Route::resource('posts', PostController::class)->except(['index','show']);
});

