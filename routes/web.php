<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\JobListingController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\WhatsappQueryController;
use App\Http\Controllers\MeetingBookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ApplicationController as AdminApplicationController;
use App\Http\Controllers\Admin\JobListingController as AdminJobListingController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\Admin\FeeStructureController as AdminFeeStructureController;
use App\Http\Controllers\Admin\ClassScheduleController as AdminClassScheduleController;
use App\Http\Controllers\Admin\ServiceContentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Page Routes
Route::get('/', [NewsController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/courses', [PageController::class, 'courses'])->name('courses');
Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/{blog}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
Route::get('/career', [JobListingController::class, 'index'])->name('career');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/it-solutions', [PageController::class, 'itSolutions'])->name('it-solutions');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/fee-structure', [PageController::class, 'feeStructure'])->name('fee-structure');
Route::get('/class-schedule', [PageController::class, 'classSchedule'])->name('class-schedule');
Route::get('/solutions/{slug}', [PageController::class, 'servicePage'])->name('service.page');

// Form Submission Routes
Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');
Route::post('/enrollment', [FormController::class, 'submitEnrollment'])->name('enrollment.submit');
Route::post('/service-inquiry', [FormController::class, 'submitServiceInquiry'])->name('service.inquiry');

// WhatsApp Query Route
Route::post('/whatsapp-query', [WhatsappQueryController::class, 'store'])->name('whatsapp-query.store');

// Meeting Booking Routes
Route::post('/meeting-booking', [MeetingBookingController::class, 'store'])->name('meeting-booking.store');
Route::get('/meeting-booking/check-date', [MeetingBookingController::class, 'checkDate'])->name('meeting-booking.check-date');
Route::get('/meeting-booking/booked-dates', [MeetingBookingController::class, 'bookedDates'])->name('meeting-booking.booked-dates');

// Job Application Routes
Route::get('/apply', [ApplicationController::class, 'create'])->name('apply.create');
Route::post('/apply', [ApplicationController::class, 'store'])->name('apply.store');

use App\Http\Controllers\Auth\AdminAuthController;

// ------------- ADMIN ROUTES -------------
Route::prefix('aksit-secure-2026')->group(function () {
    
    // Auth Routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Protected Routes
    Route::middleware('admin')->group(function () {

        // Change Password
        Route::get('/change-password', [AdminAuthController::class, 'showChangePasswordForm'])->name('admin.change-password');
        Route::post('/change-password', [AdminAuthController::class, 'updatePassword'])->name('admin.change-password.submit');

        // Admin News Panel
        Route::prefix('news')->name('admin.news.')->group(function () {
            Route::get('/', [NewsController::class, 'index'])->name('index');
            Route::get('/create', [NewsController::class, 'create'])->name('create');
            Route::post('/', [NewsController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [NewsController::class, 'edit'])->name('edit');
            Route::put('/{id}', [NewsController::class, 'update'])->name('update');
            Route::delete('/{id}', [NewsController::class, 'destroy'])->name('destroy');
            Route::post('/{id}/toggle', [NewsController::class, 'toggleStatus'])->name('toggle');
        });

        // Admin Applications Panel
        Route::prefix('applications')->name('admin.applications.')->group(function () {
            Route::get('/', [AdminApplicationController::class, 'index'])->name('index');
            Route::post('/{id}/mark-read', [AdminApplicationController::class, 'markRead'])->name('markRead');
            Route::delete('/{id}', [AdminApplicationController::class, 'destroy'])->name('destroy');
        });

        // Admin Jobs Panel
        Route::prefix('jobs')->name('admin.jobs.')->group(function () {
            Route::get('/', [AdminJobListingController::class, 'index'])->name('index');
            Route::get('/create', [AdminJobListingController::class, 'create'])->name('create');
            Route::post('/', [AdminJobListingController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [AdminJobListingController::class, 'edit'])->name('edit');
            Route::put('/{id}', [AdminJobListingController::class, 'update'])->name('update');
            Route::delete('/{id}', [AdminJobListingController::class, 'destroy'])->name('destroy');
            Route::post('/{id}/toggle', [AdminJobListingController::class, 'toggleStatus'])->name('toggle');
        });

        // Admin Blogs Panel
        Route::prefix('blogs')->name('admin.blogs.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\BlogController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\BlogController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Admin\BlogController::class, 'store'])->name('store');
            Route::get('/{blog}/edit', [\App\Http\Controllers\Admin\BlogController::class, 'edit'])->name('edit');
            Route::put('/{blog}', [\App\Http\Controllers\Admin\BlogController::class, 'update'])->name('update');
            Route::delete('/{blog}', [\App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('destroy');
            Route::post('/{blog}/toggle', [\App\Http\Controllers\Admin\BlogController::class, 'togglePublish'])->name('toggle');
        });

        // Admin WhatsApp Queries Panel
        Route::prefix('whatsapp-queries')->name('admin.whatsapp-queries.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\WhatsappQueryController::class, 'index'])->name('index');
            Route::post('/{id}/mark-read', [\App\Http\Controllers\Admin\WhatsappQueryController::class, 'markRead'])->name('markRead');
            Route::delete('/{id}', [\App\Http\Controllers\Admin\WhatsappQueryController::class, 'destroy'])->name('destroy');
        });

        // Admin Meeting Bookings Panel
        Route::prefix('meeting-bookings')->name('admin.meeting-bookings.')->group(function () {
            Route::get('/', [\App\Http\Controllers\Admin\MeetingBookingController::class, 'index'])->name('index');
            Route::post('/{id}/confirm', [\App\Http\Controllers\Admin\MeetingBookingController::class, 'confirm'])->name('confirm');
            Route::delete('/{id}', [\App\Http\Controllers\Admin\MeetingBookingController::class, 'destroy'])->name('destroy');
        });

        // Admin Inbox (Contact Messages)
        Route::prefix('inbox')->name('admin.inbox.')->group(function () {
            Route::get('/', [InboxController::class, 'index'])->name('index');
            Route::get('/{id}', [InboxController::class, 'show'])->name('show');
            Route::post('/{id}/mark-read', [InboxController::class, 'markAsRead'])->name('markAsRead');
            Route::delete('/{id}', [InboxController::class, 'destroy'])->name('destroy');
        });

        // Admin Fee Structure
        Route::prefix('fee-structure')->name('admin.fee-structure.')->group(function () {
            Route::get('/', [AdminFeeStructureController::class, 'index'])->name('index');
            Route::post('/upload', [AdminFeeStructureController::class, 'upload'])->name('upload');
        });

        // Admin Class Schedule
        Route::prefix('class-schedule')->name('admin.class-schedule.')->group(function () {
            Route::get('/', [AdminClassScheduleController::class, 'index'])->name('index');
            Route::post('/store', [AdminClassScheduleController::class, 'store'])->name('store');
            Route::delete('/destroy', [AdminClassScheduleController::class, 'destroy'])->name('destroy');
        });

        // Admin Services Content Management
        Route::prefix('services')->name('admin.services.')->group(function () {
            Route::get('/', [ServiceContentController::class, 'index'])->name('index');
            Route::get('/{slug}', [ServiceContentController::class, 'show'])->name('show');
            Route::post('/{slug}/store', [ServiceContentController::class, 'store'])->name('store');
            Route::delete('/{slug}/{id}', [ServiceContentController::class, 'destroy'])->name('destroy');
            Route::post('/{slug}/reorder', [ServiceContentController::class, 'reorder'])->name('reorder');
        });
        
    });
});
