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

Route::get('/{maternity_code}/guide', function () {
    return view('general.guide');
})->name('guide');

Route::get('/{maternity_code}/story', function () {
    return view('general.story.index');
})->name('story-index');

Route::get('/{maternity_code}/story/confirm', function () {
    return view('general.story.confirm');
})->name('story-confirm');

Route::get('/{maternity_code}/story/complete', function () {
    return view('general.story.complete');
})->name('story-complete');

Route::get('/{maternity_code}/policy', function () {
    return view('general.policy');
})->name('policy');


Route::post('/line/webhook/{mst_maternity_id}', [App\Http\Controllers\General\WebHookController::class,'index'])->name('line-webhook');
Route::get('/line/webhook/test', [App\Http\Controllers\General\WebHookController::class,'test'])->name('line-webhook-test');













Route::get('/contact', function () {
    return view('general.contact.index');
})->name('contact');

Route::post('/contact/confirm', [App\Http\Controllers\General\ContactController::class,'confirm'])->name('contact-confirm');
Route::post('/contact/complete', [App\Http\Controllers\General\ContactController::class,'complete'])->name('contact-complete');

Route::get('/contact/confirm', function(){
    abort(400);
})->name('contact-confirm-400');

Route::get('/contact/complete', function(){
    return redirect('');
});

