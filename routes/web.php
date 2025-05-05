<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\Other_WorkersController;
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

Route::get('/form-forget-password', [PasswordController::class, 'showFormForgetPassword'])->name('showFormForgetPassword');


Route::get('/reset-password/{token}', [PasswordController::class, 'showResetPasswordForm'])->name('showResetPasswordForm');


Route::post('reset-password/{token}', [PasswordController::class, 'sendEmailResetPassword'])->name('sendEmailResetPassword');



Route::post('change-password/{token}', [PasswordController::class, 'resetPassword'])->name('resetPassword');






Route::post('/sesion',[LoginController::class, 'login'])->name('login');



Route::middleware(['auth'])->group(function(){

Route::get('/panel',[MainController::class, 'panel'])->name('panel');

Route::get('panel/perfil',[MainController::class, 'profile'])->name('profile');

Route::post('/changePassword', [PasswordController::class, 'changePassword'])->name('changePassword');



Route::get('/panel/{option}',[MainController::class, 'sections'])->name('sections');

// crear usarios
Route::post('profile/registro',[LoginController::class, 'register'])->name('register');

// cerrar sesion
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Crear Fichas
Route::post('/saveStudent', [StudentController::class, 'saveStudent'])->name('saveStudent');

Route::post('/saveProfessor', [ProfessorController::class, 'saveProfessor'])->name('saveProfessor');

Route::post('/saveOthersWorker', [Other_WorkersController::class, 'saveOtherWorker'])->name('saveOtherWorker');

// eliminar regisgtros
Route::delete('/students/{id}',[StudentController::class, 'destroy_students'])->name('delete.student');

Route::delete('/professors/{id}',[ProfessorController::class, 'destroy_professors'])->name('delete.professor');

Route::delete('/othersWorkers/{id}',[Other_WorkersController::class, 'destroy_othersWorkers'])->name('delete.otherWorker');


// actualizar registros
Route::put('/students/{id}', [StudentController::class, 'update_students'])->name('update.student');

Route::put('/professors/{id}', [ProfessorController::class, 'update_professors'])->name('update.professor');

Route::put('/othersWorkers/{id}', [Other_WorkersController::class, 'update_otherWorkers'])->name('update.otherWorker');


// exportar registros a PDF
Route::get('/export/pdf/{id}', [PDFController::class, 'exportToPDF'])->name('export.pdf');



});




