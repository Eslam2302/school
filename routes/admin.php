<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\WelcomeController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\TeacherController;
use App\Http\Controllers\dashboard\StudentController;
use App\Http\Controllers\dashboard\TicketController;
use App\Http\Controllers\dashboard\ShowUserController;




Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){ 

    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth','role:super_admin|admin|teacher'])->group(function() {

        // Welcome Route
        Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

        // Teacher Route
        Route::get('users/create_teacher', [TeacherController::class, 'create'])->name('users.create_teacher');
        Route::post('users/create_teacher', [TeacherController::class, 'store'])->name('users.store_teacher');
        // Student Route
        Route::get('users/create_student', [StudentController::class, 'create'])->name('users.create_student');
        Route::post('users/create_student', [StudentController::class, 'store'])->name('users.store_student');
        // Admin Route
        Route::resource('users', UserController::class);





        // Ticket Route
        Route::resource('tickets', TicketController::class)->except(['show']);


    });

});