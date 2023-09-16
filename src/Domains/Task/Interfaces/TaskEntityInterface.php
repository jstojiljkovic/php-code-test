<?php

namespace Tymeshift\PhpTest\Domains\Task\Interfaces;

use Tymeshift\PhpTest\Interfaces\EntityInterface;

interface TaskEntityInterface extends EntityInterface
{
	/**
	 * @param int $startTime
	 *
	 * @return self
	 */
	public function setStartTime(int $startTime): self;
	
	/**
	 * @return int
	 */
	public function getStartTime(): int;
	
	/**
	 * @return int
	 */
	public function getDuration(): int;
	
	/**
	 * @param int $duration
	 *
	 * @return self
	 */
	public function setDuration(int $duration): self;
	
	/**
	 * @return int
	 */
	public function getScheduleId(): int;
	
	/**
	 * @param int $scheduleId
	 *
	 * @return self
	 */
	public function setScheduleId(int $scheduleId): self;
}