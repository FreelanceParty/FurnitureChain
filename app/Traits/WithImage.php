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

	/** @return string|NULL */
	public function getImageForHtml(): ?string
	{
		return $this->getImage() ? 'data:image/jpeg;base64,' . base64_encode($this->getImage()) : NULL;
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