<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\BloodBankController;
use App\Http\Controllers\BloodDonorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FundDonationController;
use App\Http\Controllers\RequestBloodController;
use App\Http\Controllers\BloodInventoryController;

// Login, Register (before login)
Route::redirect('/', 'homePage');
Route::get('homePage',[AuthController::class,'homePage'])->name('auth#homePage');
Route::get('eventPage/{id}',[AuthController::class,'eventPage'])->name('auth#eventPage');
Route::get('loginPage',[AuthController::class,'loginPage'])->name('auth#loginPage');
Route::get('registerPage',[AuthController::class,'registerPage'])->name('auth#registerPage');


// Admin (after login)
Route::middleware(['auth'])->group(function () {
    //dashboard
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');

    Route::middleware(['admin_auth'])->group(function () {
    //blood group
    Route::prefix('category')->group(function (){
    Route::get('list',[CategoryController::class,'list'])->name('category#list');
    Route::get('create/Page',[CategoryController::class,'createPage'])->name('category#createPage');
    Route::post('create',[CategoryController::class,'create'])->name('category#create');
    Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category#delete');
    Route::get('edit/{id}',[CategoryController::class,'edit'])->name('category#edit');
    Route::post('update',[CategoryController::class,'update'])->name('category#update');
    });
    //blood inventory
    Route::prefix('blood/inventory')->group(function (){
        Route::get('list',[BloodInventoryController::class,'list'])->name('bloodInventory#list');
        Route::get('create/Page',[BloodInventoryController::class,'createPage'])->name('bloodInventory#createPage');
        Route::post('create',[BloodInventoryController::class,'create'])->name('bloodInventory#create');
        Route::get('delete/{id}',[BloodInventoryController::class,'delete'])->name('bloodInventory#delete');
        Route::get('edit/{id}',[BloodInventoryController::class,'edit'])->name('bloodInventory#edit');
        Route::post('update/{id}',[BloodInventoryController::class,'update'])->name('bloodInventory#update');
    });
    //blood bank
    Route::prefix('bloodBank')->group(function (){
    Route::get('list',[BloodBankController::class,'list'])->name('bloodBank#list');
    Route::get('create/Page',[BloodBankController::class,'createPage'])->name('bloodBank#createPage');
    Route::post('create',[BloodBankController::class,'create'])->name('bloodBank#create');
    Route::get('delete/{id}',[BloodBankController::class,'delete'])->name('bloodBank#delete');
    Route::get('edit/{id}',[BloodBankController::class,'edit'])->name('bloodBank#edit');
    Route::post('update',[BloodBankController::class,'update'])->name('bloodBank#update');
    });
    //doctor
    Route::prefix('doctor')->group(function (){
        Route::get('list',[DoctorController::class,'list'])->name('doctor#list');
        Route::get('create/Page',[DoctorController::class,'createPage'])->name('doctor#createPage');
        Route::post('create',[DoctorController::class,'create'])->name('doctor#create');
        Route::get('delete/{id}',[DoctorController::class,'delete'])->name('doctor#delete');
        Route::get('edit/{id}',[DoctorController::class,'edit'])->name('doctor#edit');
        Route::post('update',[DoctorController::class,'update'])->name('doctor#update');
    });
    //event post
    Route::prefix('event/post')->group(function () {
        Route::get('list',[EventsController::class,'list'])->name('events#list');
        Route::get('create/Page',[EventsController::class,'createPage'])->name('events#createPage');
        Route::post('create',[EventsController::class,'create'])->name('events#create');
        Route::get('delete/{id}',[EventsController::class,'delete'])->name('events#delete');
        Route::get('edit/{id}',[EventsController::class,'edit'])->name('events#edit');
        Route::post('update/{id}',[EventsController::class,'update'])->name('events#update');
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
    // donor lists
    Route::prefix('donor')->group(function () {
        Route::get('list',[UserListController::class,'donorList'])->name('donor#list');
        Route::get('delete/{id}',[UserListController::class,'deleteDonor'])->name('donor#delete');
    });
    // blood requests
    Route::prefix('requestBlood')->group(function () {
        Route::get('list',[RequestBloodController::class,'list'])->name('requestBlood#list');
        Route::get('delete/{id}',[RequestBloodController::class,'delete'])->name('requestBlood#delete');
        Route::post('change/status', [RequestBloodController::class, 'changeStatus'])->name('requestBlood#changeStatus');
        Route::post('ajax/change/status', [RequestBloodController::class, 'ajaxChangeStatus'])->name('requestBlood#change');
    });
    Route::prefix('appointment')->group(function () {
    // appointment list
        Route::get('list',[AppointmentController::class,'appointmentList'])->name('admin#appointmentList');
        Route::get('delete/{id}',[AppointmentController::class,'appointmentDelete'])->name('admin#appointmentDelete');
        Route::post('change/status', [AppointmentController::class, 'changeStatus'])->name('appointment#changeStatus');
        Route::post('ajax/change/status', [AppointmentController::class, 'ajaxChangeStatus'])->name('appointment#change');
    });
    Route::prefix('contact')->group(function () {
    // contact list
        Route::get('list',[ContactController::class,'contactList'])->name('admin#contactList');
        Route::get('delete/{id}',[ContactController::class,'contactDelete'])->name('admin#contactDelete');
    });
    // company lists
    Route::prefix('company')->group(function(){
        Route::get('list',[CompanyController::class,'list'])->name('admin#companyList');
        Route::get('delete/{id}',[CompanyController::class,'delete'])->name('admin#companyDelete');
    });
    // fund donation list
    Route::prefix('fund')->group(function(){
        Route::get('list',[FundDonationController::class,'list'])->name('admin#fundList');
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
        Route::get('edit/{id}',[BloodDonorController::class,'editDonor'])->name('donor#edit');
        Route::post('donor/update/{id}', [BloodDonorController::class, 'updateDonor'])->name('donor#update');
        // create company account
        Route::prefix('company')->group(function () {
        Route::get('createPage',[CompanyController::class,'createPage'])->name('company#createPage');
        Route::post('create',[CompanyController::class,'create'])->name('company#create');
        });
        // password
        Route::get('password/changePage', [BloodDonorController::class,'changePasswordPage'])->name('user#changePasswordPage');
        Route::post('change/password',[BloodDonorController::class,'changePassword'])->name('user#changePassword');
        // account
        Route::get('details',[BloodDonorController::class,'details'])->name('user#details');
        Route::get('edit',[BloodDonorController::class,'edit'])->name('user#edit');
        Route::post('update/{id}',[BloodDonorController::class,'update'])->name('user#update');
        });
        // book appointment
        Route::prefix('appointment')->group(function () {
        Route::get('createPage',[AppointmentController::class,'createPage'])->name('appointment#createPage');
        Route::post('create',[AppointmentController::class,'create'])->name('appointment#create');
        });
        // request blood
        Route::prefix('request/blood')->group(function () {
        Route::get('createPage',[RequestBloodController::class,'createPage'])->name('request#createPage');
        Route::post('create',[RequestBloodController::class,'create'])->name('request#create');
        Route::get('status', [RequestBloodController::class, 'userStatusPage'])->name('user#status');
        });
        // payment
        Route::prefix('payment')->group(function(){
        Route::get('page',[FundDonationController::class,'directPage'])->name('user#directPayment');
        Route::post('create',[FundDonationController::class,'create'])->name('payment#create');
        });
        // event
        Route::get('eventPage/{id}',[BloodDonorController::class,'eventPage'])->name('user#eventPage');

    });
});

