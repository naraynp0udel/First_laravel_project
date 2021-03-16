<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsFormController;
use App\Http\Controllers\SmsController;


Route::get('mail', function () {
    return view('mail');
});


Route::get('/', function () {
    return view('index');
});

Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactUsFormController::class, 'show'])->name('contact.index')->middleware('auth');
Route::get('/contact/{id}', [ContactUsFormController::class, 'delete'])->name('contact.delete');
