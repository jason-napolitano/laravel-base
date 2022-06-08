<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
	/**
	 * Account login page
	 *
	 * @return \Inertia\Response
	 */
	public function index(): Response
	{
		// Render the view
		return Inertia::render('Auth/Login');
	}
	
	/**
	 * Account login action
	 *
	 * @param \App\Http\Requests\Auth\LoginRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function store(LoginRequest $request): RedirectResponse
	{
		// Authenticate the user
		$request->authenticate();
		
		// Generate the session data
		$request->session()->regenerate();
		
		// Redirect with flash data
		return redirect()->route(RouteServiceProvider::HOME)->with([
			'message' => 'You\'ve been successfully logged in',
			'context' => 'success',
		]);
	}
	
	/**
	 * Account logout action
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy(Request $request): RedirectResponse
	{
		// Logout of account
		Auth::guard('web')->logout();
		
		// Invalidate session data
		$request->session()->invalidate();
		
		// Regenerate session token
		$request->session()->regenerateToken();
		
		// Redirect with flash data
		return redirect()->route('frontend.index')->with([
			'message' => 'You\'ve been successfully logged out',
			'context' => 'success',
		]);
	}
}
