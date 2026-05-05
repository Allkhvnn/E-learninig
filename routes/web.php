<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\EnrollmentController;


Route::get('/', function () {
    return view('main');
});

Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);
Route::post('/contact', [PageController::class, 'sendContact']);
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [PageController::class, 'profile']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/courses/{course}/enroll', [EnrollmentController::class, 'enroll'])->name('enroll');
    Route::delete('/courses/{course}/unenroll', [EnrollmentController::class, 'unenroll'])->name('unenroll');
    Route::get('/my-courses', [EnrollmentController::class, 'myEnrollments'])->name('my-courses');
});

// Auth роуты
Route::get('/register', [AuthController::class, 'showRegister']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::post('/register', [AuthController::class, 'register']);

// Course роуты (без auth для тестирования)
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/courses/create', [CourseController::class, 'create']);
Route::post('/courses', [CourseController::class, 'store']);
Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

// Для всех авторизованных (все 4 роли)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Только editor и выше
Route::middleware(['auth', 'role:super-admin|admin|editor'])->group(function () {
    Route::get('/posts/create', function () {
        return 'Create Post — Editor';
    });
});

// Только admin и super-admin
Route::middleware(['auth', 'role:super-admin|admin'])->group(function () {
    Route::get('/admin/users', function () {
        return 'Manage Users — Admin';
    });
});

// Только super-admin
Route::middleware(['auth', 'role:super-admin'])->group(function () {
    Route::get('/admin/settings', function () {
        return 'Settings — Super Admin Only';
    });
    Route::get('/admin/roles', function () {
        return 'Manage Roles — Super Admin Only';
    });
});