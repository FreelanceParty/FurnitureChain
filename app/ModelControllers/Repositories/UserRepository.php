<?php

namespace App\ModelControllers\Repositories;

use App\Exceptions\UserNotFoundException;
use App\Models\User;
use DB;

/**
 * Class UserRepository
 * @package App\ModelControllers\Repositories
 */
class UserRepository
{
	/**
	 * @param int $id
	 * @return User
	 * @throws UserNotFoundException()
	 */
	public function findById(int $id): User
	{
		$user = User::where('id', '=', $id)->first();
		if ($user === NULL) {
			throw new UserNotFoundException();
		}
		return $user;
	}

	/**
	 * @param string $email
	 * @return User
	 * @throws UserNotFoundException()
	 */
	public function findByEmail(string $email): User
	{
		$user = User::where('id', '=', $email)->first();
		if ($user === NULL) {
			throw new UserNotFoundException();
		}
		return $user;
	}

}