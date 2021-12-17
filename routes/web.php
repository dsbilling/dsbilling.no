<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccessController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExportController;
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
Route::resource('blog', BlogController::class);

Route::prefix('tools')->group(function () {
    Route::get('/liter', [HomeController::class, 'liter'])->name('liter-calculator');
    Route::post('/liter', [HomeController::class, 'literCalculate'])->name('liter-calculator.store');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/want-access', [AccessController::class, 'wantAccess'])->middleware(['throttle:1'])->name('want-access');
    Route::get('/timeline', [HomeController::class, 'timeline'])->middleware(['permission:timeline'])->name('timeline');
});

Route::group(['middleware' => ['auth:sanctum', 'verified', 'role:super-admin']], function () {
    Route::resource('companies', CompanyController::class);
    Route::resource('certifications', CertificationController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('socials', SocialController::class);
    Route::resource('users', UserController::class);
    Route::resource('tags', TagController::class);
    Route::resource('posts', PostController::class);
    Route::prefix('export')->group(function () {
        Route::get('/cv', [ExportController::class, 'cv'])->name('export.cv');
        Route::get('/courses', [ExportController::class, 'courses'])->name('export.cv');
    });
});