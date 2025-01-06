<?php

use App\Enums\UserType;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Student\DashboardController as StudentDashboard;
use App\Http\Controllers\Student\ReportController;
use App\Http\Controllers\Teacher\DashboardController as TeacherDashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/contact-admin', function () {
    return redirect(
        'https://wa.me/' . env('CONTACT_ADMIN_PHONE_NUMBER'),
        301,
        ['Location' => 'https://wa.me/' . env('CONTACT_ADMIN_PHONE_NUMBER')],
        true,
    );
})->name('contact-admin');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'type:'.UserType::ADMIN->value])->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');

    Route::prefix('accounts')->name('accounts.')->controller(AccountController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{user}/edit', 'edit')->name('edit');
        Route::put('/{user}', 'update')->name('update');
        Route::delete('/{user}', 'destroy')->name('destroy');
    });

    Route::prefix('schedules')->name('schedules.')->controller(ScheduleController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{schedule}/edit', 'edit')->name('edit');
        Route::put('/{schedule}', 'update')->name('update');
        Route::delete('/{schedule}', 'destroy')->name('destroy');
    });

    Route::prefix('informations')->name('informations.')->controller(InformationController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{information}/edit', 'edit')->name('edit');
        Route::put('/{information}', 'update')->name('update');
        Route::delete('/{information}', 'destroy')->name('destroy');
    });
});

Route::prefix('student')->name('student.')->middleware(['auth', 'type:'.UserType::STUDENT->value])->group(function () {
    Route::get('/dashboard', [StudentDashboard::class, 'index'])->name('dashboard');

    Route::prefix('reports')->name('reports.')->controller(ReportController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{report}/edit', 'edit')->name('edit');
        Route::put('/{report}', 'update')->name('update');
        Route::delete('/{report}', 'destroy')->name('destroy');
    });
});

Route::prefix('teacher')->name('teacher.')->middleware(['auth', 'type:'.UserType::TEACHER->value])->group(function () {
    Route::get('/dashboard', [TeacherDashboard::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
