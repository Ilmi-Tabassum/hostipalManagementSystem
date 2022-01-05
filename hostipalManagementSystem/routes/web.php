<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;

//Student -Image:

Route::get('Doctors',[StudentController::class,'indexing'])->name('doctors');
Route::get('add-doctor',[StudentController::class,'create']);
Route::post('add-doctor',[StudentController::class,'store']);
Route::get('edit-doctor/{id}',[StudentController::class,'edit']);
Route::put('update-doctor/{id}',[StudentController::class,'update']);




Route::get('patient',[PatientController::class,'index'])->name('patient');
Route::get('fetch-patient',[PatientController::class,'fetchpatient']);
Route::get('edit-patient/{id}',[PatientController::class,'edit']);
Route::post('patient',[PatientController::class,'store']);
Route::put('update-patient/{id}',[PatientController::class,'update']);
Route::delete('delete-patient/{id}', [PatientController::class, 'destroy']);
Route::get('/', function () {
    return view('welcome');
});

Route::get('gethint',function (){
   return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/test', function () {
    return view('test');


    Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
    Route::get('login', [CustomAuthController::class, 'index'])->name('login');
    Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
    Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
    Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
    Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
});
