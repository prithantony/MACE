<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/about-us', [SiteController::class, 'about'])->name('about');
Route::get('/departments', [SiteController::class, 'departments'])->name('departments');
Route::get('/programmes', [SiteController::class, 'programmes'])->name('programmes');
Route::get('/gallery', [SiteController::class, 'gallery'])->name('gallery');
Route::get('/latest-news', [SiteController::class, 'news'])->name('news');
Route::get('/latest-news/{post:slug}', [SiteController::class, 'newsShow'])->name('news.show');
Route::get('/contact-us', [SiteController::class, 'contact'])->name('contact');

Route::get('/staff-portal', fn () => app(SiteController::class)->portal('staff'))->name('portal.staff');
Route::get('/student-portal', fn () => app(SiteController::class)->portal('student'))->name('portal.student');
Route::get('/lms-portal', fn () => app(SiteController::class)->portal('lms'))->name('portal.lms');
Route::get('/exam-portal', fn () => app(SiteController::class)->portal('exam'))->name('portal.exam');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
    Route::get('/{resource}', [AdminController::class, 'index'])->name('resource.index');
    Route::get('/{resource}/create', [AdminController::class, 'create'])->name('resource.create');
    Route::post('/{resource}', [AdminController::class, 'store'])->name('resource.store');
    Route::get('/{resource}/{id}/edit', [AdminController::class, 'edit'])->name('resource.edit');
    Route::put('/{resource}/{id}', [AdminController::class, 'update'])->name('resource.update');
    Route::delete('/{resource}/{id}', [AdminController::class, 'destroy'])->name('resource.destroy');
});
