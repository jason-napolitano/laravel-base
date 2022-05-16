<?php

namespace Tests\Feature\Controllers\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginControllerTest extends TestCase
{
	use RefreshDatabase;
	
	public function test_users_can_authenticate_using_the_login_screen(): void
	{
		$user = User::factory()->create();
		
		$response = $this->post('/auth/login', [
			'email'    => $user->email,
			'password' => 'password',
		]);
		
		$this->assertAuthenticated();
	}
	
	public function test_users_can_not_authenticate_with_invalid_password(): void
	{
		$user = User::factory()->create();
		
		$this->post('/auth/login', [
			'email'    => $user->email,
			'password' => 'wrong-password',
		]);
		
		$this->assertGuest();
	}
}