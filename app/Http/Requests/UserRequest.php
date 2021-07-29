<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		if (request()->method() == "POST") {
			$rule = [
				'email' => [
					'required', 'string', 'unique:users',
				],
				'mobile' => [
					'required', 'min:7', 'numeric', 'unique:users',
				],
			];
		} else {
			$rule = [
				'email' => [
					'required', 'string', 'unique:users,email,' . request()->user->id,
				],
				'mobile' => [
					'required', 'min:10', 'numeric', 'unique:users,mobile,' . request()->user->id,
				],
			];
		}

		if (request()->filled('password')) {
			$rule['password'] = [ 'required', 'string', 'min:6' ];
		}

		$validation = [
			'name' => [
				'required', 'string', 'max:50',
			],
			'dob' => [
				'nullable', 'date_format:Y-m-d',
			],
			'country' => [
				'nullable', 'string', 'max:50',
			],
		];

		return $rule + $validation;
	}
}
