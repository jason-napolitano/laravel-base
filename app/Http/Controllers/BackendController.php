<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\{Inertia, Response};

class BackendController extends Controller
{
	/**
	 * Show the application dashboard.
	 */
	public function __invoke(Request $request): Response
	{
		return Inertia::render('Backend/Index');
	}
}
