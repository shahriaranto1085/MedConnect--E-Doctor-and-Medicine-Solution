<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientAuthController;
use App\Http\Controllers\DoctorAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FitnessTrackerController;



Route::get('/', function () {
    return view('index');
});



// Patient routes
Route::get('/patient/login', [PatientAuthController::class, 'showLogin'])->name('patient.login');
Route::post('/patient/login', [PatientAuthController::class, 'login'])->name('patient.login.submit');

Route::get('/patient/register', [PatientAuthController::class, 'showRegister'])->name('patient.register');
Route::post('/patient/register', [PatientAuthController::class, 'register'])->name('patient.register.submit');


// Doctor routes
Route::get('/doctor/login', [DoctorAuthController::class, 'showLogin'])->name('doctor.login');
Route::post('/doctor/login', [DoctorAuthController::class, 'login'])->name('doctor.login.submit');
Route::get('/doctor/register', [DoctorAuthController::class, 'showRegister'])->name('doctor.register');
Route::post('/doctor/register', [DoctorAuthController::class, 'register'])->name('doctor.register.submit');

Route::get('/doctor/not-verified', [DoctorAuthController::class, 'notVerified'])->name('doctor.notVerified');
Route::get('/doctor/dashboard', function () {return view('doc_dash');})->name('doctor.dashboard'); //so simple so implemented here

//admin
// Admin Panel Routes
Route::get('/admin', [AdminController::class, 'showLogin'])->name('admin');
Route::post('/admin', [AdminController::class, 'admin_login'])->name('admin.submit');
Route::get('/admin/doctors', [AdminController::class, 'showUnverified'])->name('admin.doctors');
Route::get('/admin/doctors/accept/{email}', [AdminController::class, 'acceptDoctor'])->name('admin.accept');
Route::get('/admin/doctors/delete/{email}', [AdminController::class, 'deleteDoctor'])->name('admin.delete');
Route::get('/admin/doctors/profile/{email}', [AdminController::class, 'viewProfile'])->name('admin.profile');

// Logout routes
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Fitness Tracker routes
Route::get('/fitness-tracker', function () {
    return view('ft'); 
});

Route::get('/fitness/bmi', [FitnessTrackerController::class, 'calculateBMI'])->name('fitness.bmi');
Route::get('/fitness/weight-goal', [FitnessTrackerController::class, 'weightLossGoal'])->name('fitness.goal');






?>