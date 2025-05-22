<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\OtherWorkersController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PDFController;


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

Route::get('/', [MainController::class, 'show'])->name('index');


// Ruta para mostrar el formulario de “olvidé mi contraseña”
Route::get('password/forgot', [PasswordController::class, 'showForgotForm'])
     ->name('showFormForgetPassword');

// Ruta **sin token** para procesar el envío de email
Route::post('password/forgot', [PasswordController::class, 'sendEmailResetPassword'])
     ->name('sendEmailResetPassword');

// Ruta para mostrar el formulario de reset con token
Route::get('password/reset/{token}', [PasswordController::class, 'showResetPasswordForm'])
     ->name('showResetPasswordForm');

// Ruta para procesar el reset real (sin pasar token por URL aquí)
Route::post('password/reset', [PasswordController::class, 'resetPassword'])
     ->name('resetPassword');






Route::post('/sesion',[AuthController::class, 'login'])->name('login');



Route::middleware(['auth'])->group(function(){

Route::get('/panel',[MainController::class, 'panel'])->name('panel');

Route::get('panel/perfil',[MainController::class, 'profile'])->name('profile');

Route::post('/changePassword', [PasswordController::class, 'changePassword'])->name('changePassword');



Route::get('/panel/{option}',[MainController::class, 'sections'])->name('sections');

// crear usarios
Route::post('profile/registro',[AuthController::class, 'register'])->name('register');

// cerrar sesion
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Crear Fichas
Route::post('/saveStudent', [StudentController::class, 'saveStudent'])->name('saveStudent');

Route::post('/saveProfessor', [ProfessorController::class, 'saveProfessor'])->name('saveProfessor');

Route::post('/saveOthersWorker', [OtherWorkersController::class, 'saveOtherWorker'])->name('saveOtherWorker');

// eliminar regisgtros
Route::delete('/students/{id}',[StudentController::class, 'destroy_students'])->name('delete.student');

Route::delete('/professors/{id}',[ProfessorController::class, 'destroy_professors'])->name('delete.professor');

Route::delete('/othersWorkers/{id}',[OtherWorkersController::class, 'destroy_others_workers'])->name('delete.otherWorker');


// actualizar registros

   Route::put('/students/{id}', [StudentController::class, 'updateStudent'])->name('update.student');


Route::put('/professors/{id}', [ProfessorController::class, 'updateProfessor'])->name('update.professor');

Route::put('/othersWorkers/{id}', [OtherWorkersController::class, 'updateOtherWorker'])->name('update.otherWorker');


// exportar registros a PDF
Route::get('/export/pdf/{id}', [PDFController::class, 'exportToPDF'])->name('export.pdf');



});




