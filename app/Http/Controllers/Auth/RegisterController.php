<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use App\Models\User;
use Inertia\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
	/**
	 * Register page
	 *
	 * @return \Inertia\Response
	 */
	public function index(): Response
	{
		// Render the view
		return Inertia::render('Auth/Register');
	}
	
	/**
	 * Register action
	 *
	 * @param \App\Http\Requests\Auth\RegisterRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(RegisterRequest $request): RedirectResponse
	{
		// Validate the request data
		$request->validated();
		
		// Create a new user record
		$user = User::create([
			'name'      => $request->name,
			'email'     => $request->email,
			'password'  => bcrypt($request->password),
			'image_url' => $request->image_url ?? 'uploads/no-avatar.jpg',
		]);
		
		// Log the new user in
		Auth::login($user);
		
		// Assign default user role
		$user->assignRole('user');
		
		// Redirect with flash data
		return redirect()->route(RouteServiceProvider::HOME)->with([
			'message' => 'You\'ve been successfully logged out',
			'context' => 'success',
		]);
	}
}
