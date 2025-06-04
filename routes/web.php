<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\JobController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SavejobController;


Route::get('admin', function () {
    return view('admin');
});
// Route::get('register', function () {
//     return view('register');
// })->name('register');
Route::get('login', function () {
    return view('login');
})->name('login');
Route::get('showaccount', function () {
    return view('showaccount');
})->name('showaccount');
Route::get('post_job', function () {
    return view('post_job');
})->name('post_job');
// Route::get('job', function () {
//     return view('job');
// })->name('job');
// Route::get('job_details', function () {
//     return view('job_details');
// })->name('job_details');
Route::get('account', function () {
    return view('account');
})->name('account');
// Route::get('my_job', function () {
//     return view('my_job');
// })->name('my_job');
// Route::get('job_apply', function () {
//     return view('job_apply');
// })->name('job_apply');
Route::get('save_job', function () {
    return view('save_job');
})->name('save_job');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/register/store', [HomeController::class, 'processregister'])->name('register.store');
Route::post('/login', [HomeController::class, 'processlogin'])->name('login.store');
Route::get('/account', [HomeController::class, 'profile'])->name('account.profile');
Route::put('/profile', [HomeController::class, 'update_profile'])->name('account.update_profile');
Route::post('/update-propic', [HomeController::class, 'update_propic'])->name('update_propic');
Route::put('/changepass', [HomeController::class, 'changepass'])->name('changepass');
Route::get('forgot', [HomeController::class, 'forgotpassword'])->name('forgot');
Route::post('forgot', [HomeController::class, 'processforgot'])->name('forgot.store');
Route::get('reset/{token}', [HomeController::class, 'resetpassword'])->name('reset');


Route::post('/post_job', [SavejobController::class, 'savejob'])->name('savejob.store');
// Route::get('/my_job', [SavejobController::class, 'showjob'])->name('showjob.store');
Route::get('/my_job', [SavejobController::class, 'showjob'])->name('my_job');
Route::get('/my_job/edit/{id}', [SavejobController::class, 'editjob'])->name('editjob');
Route::post('/my_job/update', [SavejobController::class, 'updatejob'])->name('updatejob.store');
Route::post('job/delete/{id}', [SavejobController::class, 'deletejob'])->name('deletejob');
Route::get('/job_apply', [SavejobController::class, 'jobapply'])->name('jobapply');
Route::get('/job_details/{id}', [SavejobController::class, 'showjob_details'])->name('jobdetails');
// Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/admin', [RoleController::class, 'index'])->middleware('checkAdmin:admin')->name('admin');
Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
Route::post('/role/store', [RoleController::class, 'store'])->name('role.store');
Route::get('/users', [RoleController::class, 'showuser'])->name('users');
Route::get('/admin/post', [RoleController::class, 'showpost'])->name('admin.post');
Route::get('/update/{id}', [RoleController::class, 'update'])->name('edituser');
Route::put('/edituser/{id}', [RoleController::class, 'edituser'])->name('edituser.store');
Route::delete('/deleteuser/{id}', [RoleController::class, 'deleteuser'])->name('deleteuser.store');
Route::get('/job/edit/{id}', [RoleController::class, 'updatejob'])->name('editjob');
Route::post('/job/edit/{id}', [RoleController::class, 'editjob'])->name('editjob.store');
Route::delete('/job/delete/{id}', [RoleController::class, 'deletejob'])->name('deletejob.store');

// Route::get('/job', [JobController::class, 'index'])->name('job');

Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
