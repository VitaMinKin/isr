<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusScreenController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\InformatizationObjectController;
use App\Http\Controllers\ObjectDocumentController;

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
Route::resources([
    'officers' => OfficerController::class,
    'departments' => DepartmentController::class,
    'objects' => InformatizationObjectController::class
]);
Route::resource('documents', ObjectDocumentController::class)->except('index');
