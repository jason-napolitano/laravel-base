<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Errors\UnauthorizedController;

Route::middleware(['auth'])->group(static function () {
	Route::get('dashboard')
		->uses(BackendController::class)
		// ->can('view dashboard')
		->name('dashboard.index');
	
	// Logout --------------------------------------
	Route::post('logout', [LoginController::class, 'destroy'])
		->name('logout');
});
