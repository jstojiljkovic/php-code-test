<?php

namespace Tymeshift\PhpTest\Domains\Schedule\Interfaces;

use Tymeshift\PhpTest\Domains\Task\Interfaces\TaskEntityInterface;

interface ScheduleHydrateInterface
{
	/**
	 * @param TaskEntityInterface $taskEntity
	 *
	 * @return ScheduleItemInterface
	 */
	public function hydrate(TaskEntityInterface $taskEntity): ScheduleItemInterface;
}