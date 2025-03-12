<?php

namespace App\Traits;

/**
 * Trait WithTitle
 * @property string title
 */
trait WithTitle
{
	/** @return string */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return void
	 */
	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

}