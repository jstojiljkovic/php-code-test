<?php

namespace Tymeshift\PhpTest\Domains\Schedule\Interfaces;

use DateTime;
use Tymeshift\PhpTest\Interfaces\EntityInterface;

interface ScheduleEntityInterface extends EntityInterface
{
	/**
	 * @return string
	 */
	public function getName(): string;
	
	/**
	 * @param string $name
	 *
	 * @return $this
	 */
	public function setName(string $name): self;
	
	/**
	 * @return DateTime
	 */
	public function getEndTime(): DateTime;
	
	/**
	 * @param DateTime $endTime
	 *
	 * @return $this
	 */
	public function setEndTime(DateTime $endTime): self;
	
	/**
	 * @param DateTime $startTime
	 *
	 * @return self
	 */
	public function setStartTime(DateTime $startTime): self;
	
	/**
	 * @return DateTime
	 */
	public function getStartTime(): DateTime;
}