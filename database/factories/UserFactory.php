<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @class UserFactory
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
	/**
	 * The current password being used by the factory.
	 * @var string|NULL
	 */
	protected static ?string $password;

	/**
	 * Define the model's default state.
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		return [
			'email'      => fake()->unique()->safeEmail(),
			'password'   => static::$password ??= Hash::make('password'),
			'first_name' => fake()->firstName(),
			'last_name'  => fake()->lastName(),
			'admin'      => fake()->boolean(30),
		];
	}
}
