<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

//Student -Image:

Route::get('Doctors',[StudentController::class,'indexing']);
Route::get('add-doctor',[StudentController::class,'create']);
Route::post('add-doctor',[StudentController::class,'store']);
Route::get('edit-doctor/{id}',[StudentController::class,'edit']);
Route::put('update-doctor/{id}',[StudentController::class,'update']);
Route::get('patient',[PatientController::class,'index']);
Route::post('patient',[PatientController::class,'store']);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
