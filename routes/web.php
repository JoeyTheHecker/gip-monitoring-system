<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/register-gip', [App\Http\Controllers\ApplicantController::class, 'create'])->name('applicant.create');
Route::post('/register-gip', [App\Http\Controllers\ApplicantController::class, 'store'])->name('applicant.store');
Route::get('/applicant/list', [App\Http\Controllers\ApplicantController::class, 'list'])->name('applicant.list');
Route::get('/applicant/{id}', [App\Http\Controllers\ApplicantController::class, 'show'])->name('applicant.show');

Route::post('/contract/{id}', [App\Http\Controllers\ContractController::class, 'store'])->name('contract.store');
Route::patch('/contract/resigned/{id}', [App\Http\Controllers\ContractController::class, 'resigned'])->name('contract.resigned');