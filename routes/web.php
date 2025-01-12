<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\BloodBankController;
use App\Http\Controllers\BloodDonorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\RequestBloodController;

// Login, Register (before login)
Route::redirect('/', 'homePage');
Route::get('homePage',[AuthController::class,'homePage'])->name('auth#homePage');
Route::get('loginPage',[AuthController::class,'loginPage'])->name('auth#loginPage');
Route::get('registerPage',[AuthController::class,'registerPage'])->name('auth#registerPage');


// Admin (after login)
Route::middleware(['auth'])->group(function () {
    //dashboard
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');
    Route::middleware(['admin_auth'])->group(function () {
    //category
    Route::prefix('category')->group(function (){
    Route::get('list',[CategoryController::class,'list'])->name('category#list');
    Route::get('create/Page',[CategoryController::class,'createPage'])->name('category#createPage');
    Route::post('create',[CategoryController::class,'create'])->name('category#create');
    Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category#delete');
    Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category#edit');
    Route::post('update',[CategoryController::class,'update'])->name('category#update');
    });
    //category
    Route::prefix('bloodBank')->group(function (){
    Route::get('list',[BloodBankController::class,'list'])->name('bloodBank#list');
    Route::get('create/Page',[BloodBankController::class,'createPage'])->name('bloodBank#createPage');
    Route::post('create',[BloodBankController::class,'create'])->name('bloodBank#create');
    Route::get('delete/{id}',[BloodBankController::class,'delete'])->name('bloodBank#delete');
    Route::get('edit/{id}',[BloodBankController::class,'edit'])->name('bloodBank#edit');
    Route::post('update',[BloodBankController::class,'update'])->name('bloodBank#update');
    });
    //admin account
    Route::prefix('admin')->group(function () {
        //password
        Route::get('password/changePage', [AdminController::class,'changePasswordPage'])->name('admin#changePasswordPage');
        Route::post('change/password',[AdminController::class,'changePassword'])->name('admin#changePassword');
        //account
        Route::get('details',[AdminController::class,'details'])->name('admin#details');
        Route::get('edit',[AdminController::class,'edit'])->name('admin#edit');
        Route::post('update/{id}',[AdminController::class,'update'])->name('admin#update');
        //admin list
        Route::get('list',[AdminController::class,'list'])->name('admin#list');
        Route::get('delete/{id}',[AdminController::class,'delete'])->name('admin#delete');
        // Route::get('changeRole/{id}',[AdminController::class,'changeRole'])->name('admin#changeRole');
        Route::get('change/role',[AdminController::class,'change'])->name('admin#change');
    });
    // user lists
    Route::prefix('user')->group(function () {
        Route::get('list',[UserListController::class,'userList'])->name('admin#userList');
        Route::get('change/role',[UserListController::class,'userChangeRole'])->name('admin#userChangeRole');
        Route::get('delete/{id}',[UserListController::class,'deleteUser'])->name('admin#deleteUser');
    });
    Route::prefix('donor')->group(function () {
        Route::get('list',[UserListController::class,'donorList'])->name('donor#list');
        Route::get('delete/{id}',[UserListController::class,'deleteDonor'])->name('donor#delete');
    });
    Route::prefix('requestBlood')->group(function () {
        Route::get('list',[RequestBloodController::class,'list'])->name('requestBlood#list');
        Route::get('delete/{id}',[RequestBloodController::class,'delete'])->name('requestBlood#delete');
    });
    Route::prefix('appointment')->group(function () {
        //appointment list
        Route::get('list',[AppointmentController::class,'appointmentList'])->name('admin#appointmentList');
        Route::get('delete/{id}',[AppointmentController::class,'appointmentDelete'])->name('admin#appointmentDelete');
    });
    Route::prefix('contact')->group(function () {
        //contact list
        Route::get('list',[ContactController::class,'contactList'])->name('admin#contactList');
        Route::get('delete/{id}',[ContactController::class,'contactDelete'])->name('admin#contactDelete');
    });
});
    Route::group(['prefix'=>'user','middleware'=>'user_auth'],function(){
        Route::get('/homePage',[BloodDonorController::class,'home'])->name('user#home');
        Route::get('/contactPage',[ContactController::class,'contactPage'])->name('user#contactPage');
        Route::post('/contact',[ContactController::class,'contact'])->name('user#contact');
        // become donor
        Route::prefix('donor')->group(function () {
        Route::get('createPage',[BloodDonorController::class,'createPage'])->name('donor#createPage');
        Route::post('create',[BloodDonorController::class,'create'])->name('donor#create');
        //password
        Route::get('password/changePage', [BloodDonorController::class,'changePasswordPage'])->name('user#changePasswordPage');
        Route::post('change/password',[BloodDonorController::class,'changePassword'])->name('user#changePassword');
        //account
        Route::get('details',[BloodDonorController::class,'details'])->name('user#details');
        Route::get('edit',[BloodDonorController::class,'edit'])->name('user#edit');
        Route::post('update/{id}',[BloodDonorController::class,'update'])->name('user#update');
        });
        //book appointment
        Route::prefix('appointment')->group(function () {
        Route::get('createPage',[AppointmentController::class,'createPage'])->name('appointment#createPage');
        Route::post('create',[AppointmentController::class,'create'])->name('appointment#create');
        });
        // request blood
        Route::prefix('request/blood')->group(function () {
        Route::get('createPage',[RequestBloodController::class,'createPage'])->name('request#createPage');
        Route::post('create',[RequestBloodController::class,'create'])->name('request#create');
        });

    });
});

