<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketresponseController;
Auth::routes(['verify'=>'false','register'=>'false']);
Route::group(['middleware'=>'auth'],function(){
    //Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
    //Route::get('/', function () {return view('welcome');});
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/tickets',TicketController::class);
    Route::group(['middleware' => ['role:clients']], function () {
    });
    Route::group(['middleware' => ['role:clients|users']], function () {
        Route::resource('/responses',TicketresponseController::class);

    });
    Route::group(['middleware' => ['role:ADMIN|users']], function () {
        //Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('/users',UserController::class);
        Route::resource('/departamentos',DepartmentController::class);
        Route::resource('/clientes',ClientController::class);
    });
});
