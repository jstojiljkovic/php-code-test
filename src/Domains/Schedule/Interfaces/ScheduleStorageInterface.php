<?php

namespace Tymeshift\PhpTest\Domains\Schedule\Interfaces;

use Tymeshift\PhpTest\Interfaces\StorageInterface;

interface ScheduleStorageInterface extends StorageInterface
{
	public function getById(int $id):array;
}