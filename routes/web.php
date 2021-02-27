<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusScreenController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\InformatizationObjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [StatusScreenController::class, 'show']);
Route::resource('officers', OfficerController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('objects', InformatizationObjectController::class);
