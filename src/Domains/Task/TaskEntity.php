<?php
declare( strict_types = 1 );

namespace Tymeshift\PhpTest\Domains\Task;

use DateTime;
use Tymeshift\PhpTest\Domains\Task\Interfaces\TaskEntityInterface;
use Tymeshift\PhpTest\Interfaces\EntityInterface;

class TaskEntity implements TaskEntityInterface
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
	private int $duration;
	
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
	public function getScheduleId(): int
	{
		return $this->scheduleId;
	}
	
	/**
	 * @inheritDoc
	 */
	public function setScheduleId(int $scheduleId): self
	{
		$this->scheduleId = $scheduleId;
		
		return $this;
	}
	
	/**
	 * @inheritDoc
	 */
	public function getDuration(): int
	{
		return $this->duration;
	}
	
	/**
	 * @inheritDoc
	 */
	public function setDuration(int $duration): self
	{
		$this->duration = $duration;
		
		return $this;
	}
}