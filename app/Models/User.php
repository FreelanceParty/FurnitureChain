<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @class   User
 * @property int         $id
 * @property string      $email
 * @property string      $password
 * @property string|NULL $first_name
 * @property string|NULL $last_name
 * @property bool        $admin
 * @property Carbon      $created_at
 * @property Carbon      $updated_at
 * @method static where(string $column, string $operator, string $value)
 * @package App/Models
 */
class User extends Authenticatable
{
	use HasFactory;

	/*** @var string[] */
	protected $fillable = ['email', 'password'];

	/** @return int */
	public function getId(): int
	{
		return $this->id;
	}

	/** @return string */
	public function getEmail(): string
	{
		return $this->email;
	}

	/**
	 * @param string $email
	 * @return void
	 */
	public function setEmail(string $email): void
	{
		$this->email = $email;
	}

	/** @return string */
	public function getPassword(): string
	{
		return $this->password;
	}

	/**
	 * @param string $password
	 * @return void
	 */
	public function setPassword(string $password): void
	{
		$this->password = $password;
	}

	/** @return string|NULL */
	public function getFirstName(): ?string
	{
		return $this->first_name;
	}

	/**
	 * @param string|NULL $firstName
	 * @return void
	 */
	public function setFirstName(?string $firstName): void
	{
		$this->first_name = $firstName;
	}

	/** @return string|NULL */
	public function getLastName(): ?string
	{
		return $this->last_name;
	}

	/**
	 * @param string|NULL $lastName
	 * @return void
	 */
	public function setLastName(?string $lastName): void
	{
		$this->last_name = $lastName;
	}

	/** @return bool */
	public function isAdmin(): bool
	{
		return $this->admin;
	}

	/**
	 * @param bool $admin
	 * @return void
	 */
	public function setAdmin(bool $admin): void
	{
		$this->admin = $admin;
	}

	/** @return Carbon */
	public function getCreatedAt(): Carbon
	{
		return $this->created_at;
	}

	/** @return Carbon */
	public function getUpdatedAt(): Carbon
	{
		return $this->updated_at;
	}

}
