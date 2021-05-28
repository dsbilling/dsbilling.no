<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\CertificationController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth:sanctum', 'verified'])->name('dashboard');

Route::prefix('tools')->group(function () {
    Route::get('/liter', [HomeController::class, 'liter'])->name('liter-calculator');
    Route::post('/liter', [HomeController::class, 'literCalculate'])->name('liter-calculator.store');
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::resource('companies', CompanyController::class);
    Route::resource('certifications', CertificationController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('socials', SocialController::class);
});