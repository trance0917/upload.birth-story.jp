<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\MaternityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('v1/g')->group(function () {
    Route::post('/{tbl_patient:code}/review', [PatientController::class, 'storeReview']);
    Route::post('/{tbl_patient:code}/story', [PatientController::class, 'storeStory']);
    Route::post('/{tbl_patient:code}/story/input', [PatientController::class, 'storeStoryInput']);
    Route::post('/{tbl_patient:code}/story/medium', [PatientController::class, 'storeStoryMedium']);
    Route::post('/{tbl_patient:code}/story/delete_medium', [PatientController::class, 'storeStoryDeleteMedium']);
    Route::post('/{tbl_patient:code}/story/medium/sort', [PatientController::class, 'storeStoryMediumSort']);
    Route::post('/maternity/set', [MaternityController::class, 'index']);
});
