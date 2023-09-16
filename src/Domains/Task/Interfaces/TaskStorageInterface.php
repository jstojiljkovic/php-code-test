<?php

namespace Tymeshift\PhpTest\Domains\Task\Interfaces;

use Tymeshift\PhpTest\Interfaces\StorageInterface;

interface TaskStorageInterface extends StorageInterface
{
	/**
	 * @param int $scheduledId
	 *
	 * @return array
	 */
	public function getByScheduleId(int $scheduledId): array;
}