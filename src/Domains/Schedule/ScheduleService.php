<?php

namespace Tymeshift\PhpTest\Domains\Schedule;

use Tymeshift\PhpTest\Domains\Schedule\Interfaces\ScheduleHydrateInterface;
use Tymeshift\PhpTest\Domains\Schedule\Interfaces\ScheduleRepositoryInterface;
use Tymeshift\PhpTest\Domains\Schedule\Interfaces\ScheduleServiceInterface;
use Tymeshift\PhpTest\Domains\Task\Interfaces\TaskRepositoryInterface;
use Tymeshift\PhpTest\Interfaces\EntityInterface;

class ScheduleService implements ScheduleServiceInterface
{
	/**
	 * @var ScheduleRepositoryInterface
	 */
	private ScheduleRepositoryInterface $scheduleRepository;
	/**
	 * @var TaskRepositoryInterface
	 */
	private TaskRepositoryInterface $taskRepository;
	/**
	 * @var ScheduleHydrateInterface
	 */
	private ScheduleHydrateInterface $scheduleHydrate;
	
	/**
	 * @param ScheduleRepositoryInterface $scheduleRepository
	 * @param TaskRepositoryInterface $taskRepository
	 */
	public function __construct(
		ScheduleRepositoryInterface $scheduleRepository,
		TaskRepositoryInterface     $taskRepository,
		ScheduleHydrateInterface    $scheduleHydrate
	)
	{
		$this->scheduleRepository = $scheduleRepository;
		$this->taskRepository = $taskRepository;
		$this->scheduleHydrate = $scheduleHydrate;
	}
	
	/**
	 * @inheritDoc
	 */
	public function fillScheduleItems(int $id): EntityInterface
	{
		$schedule = $this->scheduleRepository->getById($id);
		$tasks = $this->taskRepository->getByScheduleId($id);
		
		foreach ($tasks as $task) {
			$schedule->addItem($this->scheduleHydrate->hydrate($task));
		}
		
		return $schedule;
	}
}