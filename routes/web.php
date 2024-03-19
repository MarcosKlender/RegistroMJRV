<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MJRVController;
use App\Http\Controllers\UserController;

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
    return view('/auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::post('/registration/search', [RegistrationController::class, 'search'])->name('registration.search');
Route::resource('registration', RegistrationController::class);

Route::resource('report', ReportController::class);

Route::post('/mjrv/search', [MJRVController::class, 'search'])->name('mjrv.search');
Route::post('/mjrv/import', [MJRVController::class, 'import'])->name('mjrv.import');
Route::resource('mjrv', MJRVController::class);

Route::post('/user/search', [UserController::class, 'search'])->name('user.search');
Route::post('/user/import', [UserController::class, 'import'])->name('user.import');
Route::resource('user', UserController::class);