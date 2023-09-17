<?php
declare( strict_types = 1 );

namespace Tymeshift\PhpTest\Domains\Task;

use Tymeshift\PhpTest\Components\HttpClientInterface;
use Tymeshift\PhpTest\Domains\Task\Interfaces\TaskStorageInterface;
use Tymeshift\PhpTest\Enums\HttpMethodEnum;

class TaskStorage implements TaskStorageInterface
{
	/**
	 * @var HttpClientInterface
	 */
	private HttpClientInterface $client;
	
	/**
	 * @param HttpClientInterface $httpClient
	 */
	public function __construct(HttpClientInterface $httpClient)
	{
		$this->client = $httpClient;
	}
	
	/**
	 * @inheritDoc
	 */
	public function getByScheduleId(int $id): array
	{
		return $this->client->request(HttpMethodEnum::GET->value, '/api/v1/tasks/schedule/' . $id);
	}
	
	/**
	 * @inheritDoc
	 */
	public function getByIds(array $ids): array
	{
		return $this->client->request(HttpMethodEnum::GET->value, '/api/v1/tasks/' . http_build_query([ 'ids' => $ids ]));
	}
	
	/**
	 * @inheritDoc
	 */
	public function getById(int $id): array
	{
		return $this->client->request(HttpMethodEnum::GET->value, '/api/v1/tasks/' . $id);
	}
}