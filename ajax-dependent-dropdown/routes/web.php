<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\WebsiteController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\StudentController;

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

// Route::get('/', [WebsiteController::class, 'index']);


// Route::get('/', [StudentController::class, 'loadAddStudent']);
// Route::post('/', [StudentController::class, 'addstudent']);
// Route::get('/get-plans/{id}', [StudentController::class, 'getPlans']);
// Route::get('/edit-plans/{id}', [StudentController::class, 'editStudentLoad']);

    ///// Dependent Dropdown //////////
    Route::get('dropdown' , [DropdownController::class, 'index'])->name('dropdowm');
    Route::post('api/fetch-state' , [DropdownController::class, 'state'])->name('state');
    Route::post('api/fetch-city' , [DropdownController::class, 'city'])->name('city');