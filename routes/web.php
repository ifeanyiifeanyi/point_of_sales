<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix("admin")->middleware('auth')->group(function () {
    Route::controller(AdminController::class)->group(function(){
        Route::get('logout', 'logout')->name("admin.logout");
        Route::get('profile', 'show')->name("admin.profile");

        Route::post('profile/update/{user}', 'update')->name("admin.update");
        Route::get('profile/change-password', 'showPassword')->name("admin.password.show");

        Route::post('profile/password', 'updateAdminPassword')->name("admin.update.password");
    });

    Route::controller(EmployeeController::class)->group(function(){
        Route::get('employees', 'index')->name("employees.index");
        Route::get('employees/create', 'create')->name("employees.create");
        Route::post('employees', 'store')->name("employees.store");
        Route::get('employees/{employee}/edit', 'edit')->name("employees.edit");
        Route::put('employees/{employee}', 'update')->name("employees.update");
        Route::delete('employees/{employee}', 'destroy')->name("employees.destroy");
    });
});

require __DIR__.'/auth.php';
