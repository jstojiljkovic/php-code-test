<?php
declare(strict_types=1);

namespace Tymeshift\PhpTest\Domains\Schedule\Interfaces;

interface ScheduleItemInterface
{
	/**
	 * @return int
	 */
	public function getId(): int;
	
	/**
	 * @param int $id
	 * @return self
	 */
	public function setId(int $id): self;
	
    /**
     * @return int
     */
    public function getScheduleId():int;
	
	/**
	 * @param int $id
	 *
	 * @return $this
	 */
	public function setScheduledId(int $id): self;

    /**
     * @return int
     */
    public function getStartTime():int;
	
	/**
	 * @param int $startTime
	 *
	 * @return $this
	 */
	public function setStartTime(int $startTime): self;

    /**
     * @return int
     */
    public function getEndTime():int;
	
	/**
	 * @param int $endTime
	 *
	 * @return $this
	 */
	public function setEndTime(int $endTime): self;

    /**
     * @return string
     */
    public function getType():string;
	
	/**
	 * @param string $type
	 *
	 * @return $this
	 */
	public function setType(string $type): self;
}