<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\StudentController;
use App\Http\Controllers\Api\V1\ProfessorController;
use App\Http\Controllers\Api\V1\PasswordController;
use App\Http\Controllers\Api\V1\OtherWorkerController;
use App\Http\Controllers\Api\V1\PdfController;

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
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('students', StudentController::class);
});
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('professors', ProfessorController::class);
});
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::apiResource('otherWorkers', OtherWorkerController::class);
});
Route::prefix('v1')->group(function () {
    Route::get('/password/change', [PasswordController::class, 'showChangeForm']);
    Route::post('/password/change', [PasswordController::class, 'changePassword']);
    Route::get('/password/forgot', [PasswordController::class, 'showForgotForm']);
    Route::post('/password/forgot', [PasswordController::class, 'sendEmailResetPassword']);
    Route::get('/password/reset/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [PasswordController::class, 'resetPassword'])->name('password.update');
});
Route::prefix('v1')->group(function () {
    Route::get('/pdf/student/{id}', [PdfController::class, 'exportStudentPdf']);
    Route::get('/pdf/professor/{id}', [PdfController::class, 'exportProfessorPdf']);
    Route::get('/pdf/otherWorker/{id}', [PdfController::class, 'exportOtherWorkerPdf']);
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/Login',    [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
