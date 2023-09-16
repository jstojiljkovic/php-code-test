<?php

namespace Tymeshift\PhpTest\Domains\Schedule;

use Tymeshift\PhpTest\Domains\Schedule\Interfaces\ScheduleHydrateInterface;
use Tymeshift\PhpTest\Domains\Schedule\Interfaces\ScheduleItemInterface;
use Tymeshift\PhpTest\Domains\Task\Interfaces\TaskEntityInterface;

class ScheduleHydrate implements ScheduleHydrateInterface
{
	/**
	 * @param TaskEntityInterface $taskEntity
	 *
	 * @return ScheduleItemInterface
	 */
	public function hydrate(TaskEntityInterface $taskEntity): ScheduleItemInterface
	{
		$scheduleItem = new ScheduleItem();
		$scheduleItem->setScheduledId($taskEntity->getScheduleId());
		$scheduleItem->setStartTime($taskEntity->getStartTime());
		$scheduleItem->setEndTime($taskEntity->getStartTime() + $taskEntity->getDuration());
		$scheduleItem->setType('Dunno');
		
		return $scheduleItem;
	}
}