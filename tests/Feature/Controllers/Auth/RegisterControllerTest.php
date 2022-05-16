<?php

namespace Tests\Feature\Controllers\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterControllerTest extends TestCase
{
	use RefreshDatabase;
	
	public function test_registration_screen_can_be_rendered(): void
	{
		$response = $this->get('/auth/register');
		
		$response->assertStatus(200);
	}
	
	public function test_new_users_can_register(): void
	{
		$response = $this->post('/auth/register', [
			'name'                  => 'Test User',
			'email'                 => 'test@example.com',
			'password'              => 'password',
			'password_confirmation' => 'password',
		]);
		
		$this->assertAuthenticated();
	}
}
