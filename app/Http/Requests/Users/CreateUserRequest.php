<?php

namespace App\Http\Requests\Users;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(): bool
	{
		return true;
	}
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(): array
	{
		return [
			'name'                  => ['required', 'string', 'max:255'],
			'email'                 => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
			'password'              => ['required', 'string', 'confirmed', Password::min(8)->mixedCase()],
			'password_confirmation' => ['required', 'string'],
		];
	}
}
