<?php
declare( strict_types = 1 );

namespace Tymeshift\PhpTest\Domains\Schedule;

use DateTime;
use Tymeshift\PhpTest\Domains\Schedule\Interfaces\ScheduleEntityInterface;
use Tymeshift\PhpTest\Domains\Schedule\Interfaces\ScheduleItemInterface;

class ScheduleEntity implements ScheduleEntityInterface
{
	/**
	 * @var int
	 */
	private int $id;
	
	/**
	 * @var string
	 */
	private string $name;
	
	/**
	 * @var DateTime
	 */
	private DateTime $startTime;
	
	/**
	 * @var DateTime
	 */
	private DateTime $endTime;
	
	/**
	 * @var ScheduleItemInterface[]
	 */
	private array $items;
	
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
	public function getName(): string
	{
		return $this->name;
	}
	
	/**
	 * @inheritDoc
	 */
	public function setName(string $name): self
	{
		$this->name = $name;
		return $this;
	}
	
	/**
	 * @inheritDoc
	 */
	public function getStartTime(): DateTime
	{
		return $this->startTime;
	}
	
	/**
	 * @inheritDoc
	 */
	public function setStartTime(DateTime $startTime): self
	{
		$this->startTime = $startTime;
		return $this;
	}
	
	/**
	 * @inheritDoc
	 */
	public function getEndTime(): DateTime
	{
		return $this->endTime;
	}
	
	/**
	 * @inheritDoc
	 */
	public function setEndTime(DateTime $endTime): self
	{
		$this->endTime = $endTime;
		return $this;
	}
}