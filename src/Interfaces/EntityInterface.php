<?php

namespace Tymeshift\PhpTest\Interfaces;

use DateTime;

interface EntityInterface
{
	/**
	 * @return int
	 */
	public function getId(): int;
	
	/**
	 * @param int $id
	 *
	 * @return self
	 */
	public function setId(int $id): self;
}
