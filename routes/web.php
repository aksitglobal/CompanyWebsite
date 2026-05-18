<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FormController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Page Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/courses', [PageController::class, 'courses'])->name('courses');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Form Submission Routes
Route::post('/contact', [FormController::class, 'submitContact'])->name('contact.submit');
Route::post('/enrollment', [FormController::class, 'submitEnrollment'])->name('enrollment.submit');
Route::post('/service-inquiry', [FormController::class, 'submitServiceInquiry'])->name('service.inquiry');
