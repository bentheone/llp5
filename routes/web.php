<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicantionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\StageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [AuthController::class, 'login']);
Route::get('/', function () {
    return view('register');
});
Route::post('/register', [AuthController::class, 'register']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', DashboardController::class, 'showDashboard');
    Route::resource('jobs', JobController::class);
    Route::resource('applicants', ApplicantController::class);
    Route::resource('applications', ApplicantionController::class);
    Route::resource('stages', StageController::class);
});

