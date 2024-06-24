<?php

use App\Http\Controllers\CheckController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\MaternityController;
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

Route::get('/{tbl_patient:code}/howto', function () {
    return view('general.howto');
})->name('howto');



Route::get('/{tbl_patient:code}/policy', function () {
    return view('general.policy');
})->name('policy');


Route::post('/github/webhook/', [\App\Http\Controllers\WebHookController::class,'github'])->name('github-webhook');
Route::get('/line/webhook', [\App\Http\Controllers\WebHookController::class,'index'])->name('line-webhook');
Route::post('/line/webhook', [\App\Http\Controllers\WebHookController::class,'index'])->name('line-webhook');
Route::get('/line/webhook/test', [\App\Http\Controllers\WebHookController::class,'test'])->name('line-webhook-test');
Route::get('/line/webhook/test2', [\App\Http\Controllers\WebHookController::class,'test2'])->name('line-webhook-test2');



Route::get('/{tbl_patient:code}/check', [CheckController::class,'index'])->name('check-index');

Route::get('/{tbl_patient:code}/instagram', [IndexController::class,'instagram'])->name('instagram-index');

Route::get('/{tbl_patient:code}/story', [StoryController::class,'index'])->name('story-index');
Route::get('/{tbl_patient:code}/story_json', [StoryController::class,'index_json'])->name('story-index_json');

Route::post('/{tbl_patient:code}/story/confirm', [StoryController::class,'confirm'])->name('story-confirm');

Route::post('/{tbl_patient:code}/story/complete', [StoryController::class,'complete'])->name('story-complete');

Route::get('/{tbl_patient:code}/review', [IndexController::class,'review'])->name('review');
Route::get('/{tbl_patient:code}/review_json', [IndexController::class,'review_json'])->name('review_json');

    Route::get('/{tbl_patient:code}', [IndexController::class,'index'])->name('guide');

//Route::group(['middleware' => 'set_maternity'], function() {});



Route::group(['middleware' => 'basicauth'], function() {
    Route::get('/dl/{tbl_patient:code}', [StoryController::class,'dl'])->name('story-dl');
});

Route::get('maternity/{mst_maternity:code}', [MaternityController::class,'index'])->name('maternity');

