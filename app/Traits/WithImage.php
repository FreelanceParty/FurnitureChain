<?php

namespace App\Traits;

/**
 * Trait WithImage
 * @property string|NULL image
 */
trait WithImage
{
	/** @return string|NULL */
	public function getImage(): ?string
	{
		return $this->image;
	}

	/**
	 * @param string|NULL $image
	 * @return void
	 */
	public function setImage(?string $image): void
	{
		$this->image = $image;
	}

}