<?php

namespace Tests;

use Codeception\Example;
use Mockery;
use Mockery\MockInterface;
use Tymeshift\PhpTest\Components\DatabaseInterface;
use Tymeshift\PhpTest\Components\HttpClientInterface;
use Tymeshift\PhpTest\Domains\Schedule\ScheduleFactory;
use Tymeshift\PhpTest\Domains\Schedule\ScheduleHydrate;
use Tymeshift\PhpTest\Domains\Schedule\ScheduleRepository;
use Tymeshift\PhpTest\Domains\Schedule\ScheduleService;
use Tymeshift\PhpTest\Domains\Schedule\ScheduleStorage;
use Tymeshift\PhpTest\Domains\Task\TaskFactory;
use Tymeshift\PhpTest\Domains\Task\TaskRepository;
use Tymeshift\PhpTest\Domains\Task\TaskStorage;
use Tymeshift\PhpTest\Enums\HttpMethodEnum;
use UnitTester;

class ScheduleServiceCest
{
	/**
	 * @var MockInterface|null
	 */
	private ?MockInterface $db;
	/**
	 * @var MockInterface|null
	 */
	private ?MockInterface $httpClientMock;
	/**
	 * @var ScheduleService|null
	 */
	private ?ScheduleService $scheduleService;
	
	public function _before(): void
	{
		$this->httpClientMock = Mockery::mock(HttpClientInterface::class);
		$this->db = Mockery::mock(DatabaseInterface::class);
		$this->scheduleService = new ScheduleService(
			new ScheduleRepository(
				new ScheduleStorage(
					$this->db
				),
				new ScheduleFactory()
			),
			new TaskRepository(
				new TaskStorage(
					$this->httpClientMock
				),
				new TaskFactory()
			),
			new ScheduleHydrate()
		);
	}
	
	public function _after(): void
	{
		$this->httpClientMock = null;
		$this->db = null;
		Mockery::close();
	}
	
	/**
	 * @dataProvider tasksDataProvider
	 */
	public function testFillScheduleItemsSuccess(Example $example, UnitTester $tester): void
	{
		$this->httpClientMock
			->shouldReceive('request')
			->with(HttpMethodEnum::GET->value, '/api/v1/tasks/schedule/1')
			->andReturn([ ...$example ]);
		
		$this->db
			->shouldReceive('query')
			->with('SELECT * FROM schedules WHERE id=:id', [ "id" => 1 ])
			->andReturn([ 'id' => 1, 'start_time' => 1631232000, 'end_time' => 1631232000 + 86400, 'name' => 'Test' ]);
		
		$schedule = $this->scheduleService->fillScheduleItems(1);
		$items = $schedule->getItems();
		$tester->assertEquals(1, $schedule->getId());
		$tester->assertCount(3, $schedule->getItems());
		$tester->assertEquals($items[0]->getScheduleId(), $schedule->getId());
		$tester->assertEquals($items[0]->getType(), 'Dunno');
	}
	
	/**
	 * @return array[]
	 */
	protected function tasksDataProvider(): array
	{
		return [
			[
				[ "id" => 123, "schedule_id" => 1, "start_time" => 0, "duration" => 3600 ],
				[ "id" => 431, "schedule_id" => 1, "start_time" => 3600, "duration" => 650 ],
				[ "id" => 332, "schedule_id" => 1, "start_time" => 5600, "duration" => 3600 ],
			]
		];
	}
}