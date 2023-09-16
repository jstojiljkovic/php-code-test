<?php
declare( strict_types = 1 );

namespace Tests;

use Codeception\Example;
use Mockery;
use Mockery\MockInterface;
use Tymeshift\PhpTest\Components\HttpClientInterface;
use Tymeshift\PhpTest\Domains\Task\TaskCollection;
use Tymeshift\PhpTest\Domains\Task\TaskFactory;
use Tymeshift\PhpTest\Domains\Task\TaskRepository;
use Tymeshift\PhpTest\Domains\Task\TaskStorage;
use Tymeshift\PhpTest\Exceptions\InvalidCollectionDataProvidedException;
use Tymeshift\PhpTest\Exceptions\StorageDataMissingException;
use UnitTester;

class TaskCest
{
	/**
	 * @var TaskRepository|null
	 */
	private ?TaskRepository $taskRepository;
	
	/**
	 * @var MockInterface|null
	 */
	private ?MockInterface $httpClientMock;
	
	
	public function _before(): void
	{
		$this->httpClientMock = Mockery::mock(HttpClientInterface::class);
		$this->taskRepository = new TaskRepository(
			new TaskStorage($this->httpClientMock),
			new TaskFactory());
	}
	
	public function _after(): void
	{
		$this->taskRepository = null;
		$this->httpClientMock = null;
		Mockery::close();
	}
	
	/**
	 * @dataProvider tasksDataProvider
	 *
	 * @param Example $example
	 * @param UnitTester $tester
	 *
	 * @throws InvalidCollectionDataProvidedException
	 * @throws StorageDataMissingException
	 */
	public function testGetTasksByScheduleSuccess(Example $example, UnitTester $tester): void
	{
		$this->httpClientMock
			->shouldReceive('request')
			->with('GET', '/api/v1/tasks/schedule/1')
			->andReturn([ ...$example ]);
		
		$tasks = $this->taskRepository->getByScheduleId(1);
		$tester->assertInstanceOf(TaskCollection::class, $tasks);
	}
	
	/**
	 * @param UnitTester $tester
	 */
	public function testGetTasksByScheduleFail(UnitTester $tester): void
	{
		$this->httpClientMock
			->shouldReceive('request')
			->with('GET', '/api/v1/tasks/schedule/1')
			->andReturn([]);
		
		$tester->expectThrowable(StorageDataMissingException::class, function () {
			$this->taskRepository->getByScheduleId(1);
		});
	}
	
	/**
	 * @dataProvider tasksDataProvider
	 * @throws StorageDataMissingException
	 */
	public function testGetTasksByIdSuccess(Example $example, UnitTester $tester): void
	{
		$data = [...$example][0];
		
		$this->httpClientMock
			->shouldReceive('request')
			->with('GET', '/api/v1/tasks/1')
			->andReturn($data);
		
		$task = $this->taskRepository->getById(1);
		$tester->assertEquals($data['id'], $task->getId());
	}
	
	/**
	 * @param UnitTester $tester
	 *
	 * @return void
	 */
	public function testGetTasksByIdFail(UnitTester $tester): void
	{
		$this->httpClientMock
			->shouldReceive('request')
			->with('GET', '/api/v1/tasks/1')
			->andReturn();
		
		$tester->expectThrowable(StorageDataMissingException::class, function () {
			$this->taskRepository->getById(1);
		});
	}
	
	/**
	 * @dataProvider tasksDataProvider
	 *
	 * @param Example $example
	 * @param UnitTester $tester
	 *
	 * @throws StorageDataMissingException
	 * @throws InvalidCollectionDataProvidedException
	 */
	public function testGetTasksByIdsSuccess(Example $example, UnitTester $tester): void
	{
		$ids = [ 1, 2, 3 ];
		$this->httpClientMock
			->shouldReceive('request')
			->with('GET', '/api/v1/tasks/' . http_build_query([ 'ids' => $ids ]))
			->andReturn([ ...$example ]);
		
		$tasks = $this->taskRepository->getByIds($ids);
		$tester->assertInstanceOf(TaskCollection::class, $tasks);
	}
	
	/**
	 * @param UnitTester $tester
	 */
	public function testGetTasksByIdsFail(UnitTester $tester): void
	{
		$ids = [ 1, 2, 3 ];
		$this->httpClientMock
			->shouldReceive('request')
			->with('GET', '/api/v1/tasks/' . http_build_query([ 'ids' => $ids ]))
			->andReturn([]);
		
		$tester->expectThrowable(StorageDataMissingException::class, function () use ($ids) {
			$this->taskRepository->getByIds($ids);
		});
	}
	
	public function tasksDataProvider(): array
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