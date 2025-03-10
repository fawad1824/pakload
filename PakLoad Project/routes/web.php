<?php

use App\Http\Controllers\HomeController;
use App\Livewire\Admin\UserList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/terms', 'Website.terms')->name('terms');
Route::view('/privacy', 'Website.privacy')->name('privacy');
Route::view('/', 'Website.index')->name('home');
Route::view('/about', 'Website.about');
Route::view('/service', 'Website.service');
Route::view('/contact', 'Website.contact');
Route::view('/register', 'Website.register')->name('register');

Route::view('/load-rates', 'Website.loadRates');
Route::view('/truck-boards', 'Website.truckBoards');
Route::view('/load-boards', 'Website.loadBoards');

Route::view('book-truck', 'website.bookTruck');
Route::view('reloations', 'website.reloations');
Route::view('car-moving', 'website.carmoving');

// Admin
Route::view('admin-user-check', 'website.admin.UserList')->name('admin-user-check')->middleware(['auth']);
Route::view('admin-user-laod', 'website.admin.UserList-laod')->name('admin-user-laod')->middleware(['auth']);
Route::view('admin-user-laod-list', 'website.admin.UserList-laod-list')->name('admin-user-laod-list')->middleware(['auth']);

Route::view('loading-type', 'website.admin.loadingType')->name('loading-type')->middleware(['auth']);
Route::view('equipment-type', 'website.admin.equipmentType')->name('equipment-type')->middleware(['auth']);

Route::view('bidding-request', 'website.admin.bidding.request')->name('bidding-request')->middleware(['auth']);
Route::view('bidding-request-mani', 'website.admin.bidding.request.patient')->name('bidding-request-mani')->middleware(['auth']);

Route::view('subscriptions', 'website.admin.subscriptions.subscriptions')->name('subscriptions')->middleware(['auth']);
Route::get('subscriptions-user/{id}', [HomeController::class, 'SubscriptionPage'])->name('subscriptions-user');

Route::view('searchLoading', 'website.loading.serach')->name('searchLoading')->middleware(['auth']);
Route::view('addLoading', 'website.loading.aDDserach')->name('addLoading')->middleware(['auth']);
Route::view('storeLoading', 'website.loading.storeLoading')->name('storeLoading')->middleware(['auth']);
Route::view('editLoading/{id}', 'website.loading.editLoading')->name('editLoading')->middleware(['auth']);



Route::view('track-load', 'website.loading.track')->name('track-load')->middleware(['auth']);



Route::view('/city', 'City.index')->name('city')->middleware(['auth']);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::post('/payment/process', [HomeController::class, 'processPayment'])->name('payment.process');
Route::post('save-location', [HomeController::class, 'savelocation'])->name('save-location');
Route::get('getLocation', [HomeController::class, 'getLocation'])->name('getLocation');
Route::get('/get-truck-location', [HomeController::class, 'getTruckLocation']);


require __DIR__ . '/auth.php';
