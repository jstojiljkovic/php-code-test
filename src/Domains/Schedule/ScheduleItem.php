<?php

namespace Tymeshift\PhpTest\Domains\Schedule;

use Tymeshift\PhpTest\Domains\Schedule\Interfaces\ScheduleItemInterface;

class ScheduleItem implements ScheduleItemInterface
{
	/**
	 * @var int
	 */
	private int $id;
	
	/**
	 * @var int
	 */
	private int $scheduleId;
	
	/**
	 * @var int
	 */
	private int $startTime;
	
	/**
	 * @var int
	 */
	private int $endTime;
	
	/**
	 * @var string
	 */
	private string $type;
	
	/**
	 * @inheritDoc
	 */
	public function getId(): int
	{
		return $this->id;
	}
	
	/**
	 * @inheritDoc
	 */
	public function setId(int $id): self
	{
		$this->id = $id;
		
		return $this;
	}
	
	/**
	 * @inheritDoc
	 */
	public function getScheduleId(): int
	{
		return $this->scheduleId;
	}
	
	/**
	 * @inheritDoc
	 */
	public function setScheduledId(int $id): self
	{
		$this->scheduleId = $id;
		
		return $this;
	}
	
	/**
	 * @inheritDoc
	 */
	public function getStartTime(): int
	{
		return $this->startTime;
	}
	
	/**
	 * @inheritDoc
	 */
	public function setStartTime(int $startTime): self
	{
		$this->startTime = $startTime;
		
		return $this;
	}
	
	/**
	 * @inheritDoc
	 */
	public function getEndTime(): int
	{
		return $this->endTime;
	}
	
	/**
	 * @inheritDoc
	 */
	public function setEndTime(int $endTime): self
	{
		$this->endTime = $endTime;
		
		return $this;
	}
	
	/**
	 * @inheritDoc
	 */
	public function getType(): string
	{
		return $this->type;
	}
	
	/**
	 * @inheritDoc
	 */
	public function setType(string $type): self
	{
		$this->type = $type;
		
		return $this;
	}
}