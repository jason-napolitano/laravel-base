<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(): void
	{
		// Reset cached roles and permissions
		app()[PermissionRegistrar::class]->forgetCachedPermissions();
		
		// dashboard
		Permission::create(['name' => 'view dashboard']);
		
		// create demo user / password = password
		$member = Role::create(['name' => 'member']);
		$user = User::factory()->create([
			'name'  => 'Member',
			'email' => 'member@example.com',
		]);
		$user->assignRole($member);
		
		// create demo manager / password = password
		$manager = Role::create(['name' => 'manager']);
		$manager->givePermissionTo('view dashboard');
		$user = User::factory()->create([
			'name'  => 'Manager',
			'email' => 'manager@example.com',
		]);
		$user->assignRole($manager);
		
		// create demo admin / password = password
		$admin = Role::create(['name' => 'admin']);
		$user = User::factory()->create([
			'name'  => 'Admin',
			'email' => 'admin@example.com',
		]);
		$user->assignRole($admin);
	}
}
