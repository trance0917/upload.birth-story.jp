<?php

use Illuminate\Support\Facades\Route;

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
    return view('general.index');
})->name('toppage');


Route::get('/guide', function () {
    return view('general.guide');
})->name('guide');

Route::get('/production', function () {
    return view('general.production.index');
})->name('production-index');

Route::get('/production/confirm', function () {
    return view('general.production.confirm');
})->name('production-confirm');

Route::get('/production/complete', function () {
    return view('general.production.complete');
})->name('production-complete');

Route::get('/contact', function () {
    return view('general.contact.index');
})->name('contact');

Route::post('/contact/confirm', [App\Http\Controllers\General\ContactController::class,'confirm'])->name('contact-confirm');
Route::post('/contact/complete', [App\Http\Controllers\General\ContactController::class,'complete'])->name('contact-complete');

Route::get('/contact/confirm', function(){
    abort(400);
})->name('contact-confirm');

Route::get('/contact/complete', function(){
    return redirect('');
});

