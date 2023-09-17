<?php

namespace Tymeshift\PhpTest\Domains\Schedule\Interfaces;

use Tymeshift\PhpTest\Exceptions\InvalidCollectionDataProvidedException;
use Tymeshift\PhpTest\Exceptions\StorageDataMissingException;
use Tymeshift\PhpTest\Interfaces\EntityInterface;

interface ScheduleServiceInterface
{
	/**
	 * @param int $id
	 *
	 * @return EntityInterface
	 * @throws StorageDataMissingException
	 * @throws InvalidCollectionDataProvidedException
	 */
	public function fillScheduleItems(int $id): EntityInterface;
}