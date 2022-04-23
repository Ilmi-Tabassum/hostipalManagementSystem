<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Search_Controller;
use App\Http\Controllers\MedicineController;
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
Route::get('/search',[PatientController::class, 'index'])->name('search');
Route::get('/autocomplete',[PatientController::class, 'autocomplete'])->name('autocomplete');
Route::get('/autocomplete1',[PatientController::class, 'autocomplete1'])->name('autocomplete1');
Route::get('/', function () {
    return view('welcome');
});

Route::get('gethint',function (){
   return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/medicine', function () {
    return view('medicine');
})->name('medicine');


Route::get('/test', function () {
    return view('test');


    Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
    Route::get('login', [CustomAuthController::class, 'index'])->name('login');
    Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
    Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
    Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
    Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
});

Route::get('/search',[Search_Controller::class, 'index'])->name('search');
Route::get('/autocomplete',[Search_Controller::class, 'autocomplete'])->name('autocomplete');



// Route::get('medicine', [MedicineController::class, 'index'])->name('medicine');
// Route::post('students', [StudentController::class, 'store']);
// Route::get('fetch-students', [StudentController::class, 'fetchstudent']);
// Route::get('edit-student/{id}', [StudentController::class, 'edit']);
// Route::put('update-student/{id}', [StudentController::class, 'update']);
// Route::delete('delete-student/{id}', [StudentController::class, 'destroy']);
