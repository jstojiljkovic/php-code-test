<?php

namespace Tymeshift\PhpTest\Domains\Task\Interfaces;

use Tymeshift\PhpTest\Exceptions\InvalidCollectionDataProvidedException;
use Tymeshift\PhpTest\Exceptions\StorageDataMissingException;
use Tymeshift\PhpTest\Interfaces\CollectionInterface;

interface TaskRepositoryInterface
{
	/**
	 * @param int $scheduleId
	 *
	 * @return CollectionInterface
	 * @throws InvalidCollectionDataProvidedException
	 * @throws StorageDataMissingException
	 */
	public function getByScheduleId(int $scheduleId): CollectionInterface;
}