<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::get('/')
	->uses(FrontendController::class)
	->name('frontend.index');


// Authentication routes
Route::prefix('auth')->group(static function () {
	Route::resource('forgot', ForgotController::class);
	Route::resource('register', RegisterController::class);
	Route::resource('login', LoginController::class);
	Route::get('', static fn() => redirect()->route('login.index'))
		->name('login');
});

require_once __DIR__ . '/auth.php';
