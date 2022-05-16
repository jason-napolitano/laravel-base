<?php

namespace Tests\Feature\Pages\Auth;

use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;

class LoginTest extends TestCase
{
	/**
	 * Does Inertia and Laravel properly render the
	 * login page?
	 *
	 * @test
	 *
	 * @return void
	 */
	public function loginPageProperlyRenders(): void
	{
		$this->get('/auth/login')
			->assertInertia(fn(Assert $page) => $page->component('Auth/Login'));
	}
}
