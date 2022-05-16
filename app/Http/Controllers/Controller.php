<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	protected function createGateUnauthorizedException(
		$ability,
		$arguments,
		$message = 'This action is unauthorized.',
		$previousException = null
	): void {
		throw $previousException;
	}
}
