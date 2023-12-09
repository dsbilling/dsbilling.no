<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/cv', function () {
    return view('about');
})->name('cv');

Route::resource('blog', BlogController::class);
Route::get('/uses', function () {
    return redirect()->route('blog.show', ['blog' => config('blog.uses')]);
})->name('uses');

Route::prefix('tools')->group(function () {
    Route::get('/liter', \App\Http\Livewire\LiterTool::class)->name('liter-calculator');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified', 'role:super-admin'])->group(function () {
    Route::get('/timeline', [HomeController::class, 'timeline'])->middleware(['permission:timeline'])->name('timeline');
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
