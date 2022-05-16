<?php

namespace Tests\Feature\Pages\Auth;

use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;

class RegisterTest extends TestCase
{
	/**
	 * Does Inertia and Laravel properly render the
	 * register page?
	 *
	 * @test
	 *
	 * @return void
	 */
	public function registerPageProperlyRenders(): void
	{
		$this->get('/auth/register')
			->assertInertia(fn(Assert $page) => $page->component('Auth/Register'));
	}
}
