<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
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
    return response()->download(public_path('doc/dsbilling_cv.pdf'));
})->name('cv');

Route::resource('blog', BlogController::class);
Route::resource('projects', ProjectController::class);

Route::get('/uses', function () {
    return redirect()->route('blog.show', ['blog' => config('blog.uses')]);
})->name('uses');

Route::prefix('tools')->group(function () {
    Route::get('/liter', \App\Livewire\LiterTool::class)->name('liter-calculator');
});

Route::middleware(['auth:sanctum', 'verified', 'role:super-admin'])->group(function () {
    Route::prefix('export')->group(function () {
        Route::get('/cv', [ExportController::class, 'cv'])->name('export.cv');
        Route::get('/courses', [ExportController::class, 'courses'])->name('export.cv');
    });
});

Route::get('/login', function () {
    abort(404);
})->name('login');
