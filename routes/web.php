<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientAuthController;
use App\Http\Controllers\DoctorAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FitnessTrackerController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ConfirmedController;
use App\Http\Controllers\DocMsgController;
use App\Http\Controllers\PatMsgController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\CartController;



Route::get('/', function () {
    return view('index');
});

//my profile

Route::get('/my_profile', function () {
    return view('my_profile');
})->name('my_profile');

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

//weight loss goal api
Route::get('/fitness/weight-goal/{email}', [FitnessTrackerController::class, 'weightLossGoalemail']);


// Fitness Tracker routes
Route::get('/fitness-tracker', function () {
    return view('ft'); 
});

Route::get('/fitness/bmi', [FitnessTrackerController::class, 'calculateBMI'])->name('fitness.bmi');


Route::get('/fitness/weight-goal', [FitnessTrackerController::class, 'weightLossGoal'])->name('fitness.goal');

// Show the prescription form
Route::get('/prescription/create', [PrescriptionController::class, 'create'])->name('prescription.create');

// Store the prescription
Route::post('/prescription/store', [PrescriptionController::class, 'store'])->name('prescription.store');

// see prescription as patient
Route::get('/prescription/view', [PrescriptionController::class, 'patient_view'])->name('patient_view');


//view prescription (final outcome)
Route::get('/prescription/view/{id}', [PrescriptionController::class, 'view_prescription'])->name('patient.prescription.view');

//confirmed consutation
Route::get('/confirmed/patient', [ConfirmedController::class, 'confirmed_patient'])->name('confirmed.patient');

// Confirmed doctors list
Route::get('/patient/confirmed', [ConfirmedController::class, 'confirmed_doctor'])->name('confirmed.doctor');

// send message doctor
Route::get('/doctor/chat/{email}', [DocMsgController::class, 'view_messages'])->name('doctor.chat');
Route::post('/doctor/send-message', [DocMsgController::class, 'send_message_post'])->name('doctor.send_message_post');


//patient send message
Route::get('/patient/chat/{email}', [PatMsgController::class, 'patient_view_messages'])->name('patient.chat');
Route::post('/patient/send-message', [PatMsgController::class, 'patient_send_message_post'])->name('patient.send_message_post');


//medicine list


Route::get('/medicine/list', [MedicineController::class, 'showMedicines'])->name('medicine.list');

//medicine Dashboard
Route::get('admin/update_medicine', function () {
    return view('medicine.med_dash');
})->name('admin.medicine');

//Update medicine
Route::get('admin/stock_update', function () {
    return view('medicine.stock_update');
})->name('update.stock');

Route::get('admin/new_stock', function () {
    return view('medicine.new_stock');
})->name('new.stock');

Route::post('/admin/new_stock_submit', [MedicineController::class, 'new_med_submit'])->name('new.stock.submit');

//search medicine
Route::get('/medicines/search', [MedicineController::class, 'search'])->name('medicines.search');

// Add to cart
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

// View cart
Route::get('/cart', function () {
    return view('cart');
})->name('cart.index');


Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/confirm', [CartController::class, 'confirmCart'])->name('cart.confirm');

?>

