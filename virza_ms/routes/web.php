<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Hrm\DesignationController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => ['auth', 'permission']], function(){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix'=> 'users', 'as' => 'users.'], function(){
        Route::resource('permissions', PermissionsController::class);
        Route::resource('roles', RolesController::class);
    });
    Route::resource('users', UsersController::class);


    Route::group(['prefix'=> 'hrm', 'as' => 'hrm.'], function(){
        Route::get('/designation', [DesignationController::class, 'index'])->name('designation');
        Route::post('/designation/store', [DesignationController::class, 'store'])->name('store.designation');
        Route::delete('/designation/{id}', [DesignationController::class, 'destroy'])->name('destroy.designation');
        Route::get('/designation/{id}/edit', [DesignationController::class, 'edit'])->name('edit.designation');
        Route::put('/designation/{id}', [DesignationController::class, 'update'])->name('update.designation');


        // Route::resource('roles', RolesController::class);
    });





    Route::get('test', function(){
        return "Permission Test with Sidebar";
    })->name('test');

    Route::get('test2', function(){
        return "Permission Test with Sidebar2";
    })->name('test2');
    Route::get('test3', function(){
        return "Route for superuser without assigning";
    })->name('test3');


});

