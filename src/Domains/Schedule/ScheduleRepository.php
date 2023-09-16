<?php

namespace Tymeshift\PhpTest\Domains\Schedule;

use Tymeshift\PhpTest\Base\BaseRepository;
use Tymeshift\PhpTest\Domains\Schedule\Interfaces\ScheduleRepositoryInterface;
use Tymeshift\PhpTest\Domains\Schedule\Interfaces\ScheduleStorageInterface;
use Tymeshift\PhpTest\Interfaces\FactoryInterface;

class ScheduleRepository extends BaseRepository implements ScheduleRepositoryInterface
{
	/**
	 * @param ScheduleStorageInterface $storage
	 * @param FactoryInterface $factory
	 */
	public function __construct(ScheduleStorageInterface $storage, FactoryInterface $factory)
	{
		parent::__construct($storage, $factory);
	}
}