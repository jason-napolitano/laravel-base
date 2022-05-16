<?php

namespace App\Http\Controllers\Auth;

use Inertia\Inertia;
use Inertia\Response;
use App\Http\Controllers\Controller;

class ForgotController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(): Response
	{
		// Render the view
		return Inertia::render('Auth/Forgot');
	}
}
