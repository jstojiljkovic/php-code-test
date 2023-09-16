<?php
declare( strict_types = 1 );

namespace Tymeshift\PhpTest\Domains\Task;

use Tymeshift\PhpTest\Base\BaseRepository;
use Tymeshift\PhpTest\Domains\Task\Interfaces\TaskRepositoryInterface;
use Tymeshift\PhpTest\Domains\Task\Interfaces\TaskStorageInterface;
use Tymeshift\PhpTest\Exceptions\StorageDataMissingException;
use Tymeshift\PhpTest\Interfaces\CollectionInterface;
use Tymeshift\PhpTest\Interfaces\FactoryInterface;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
	/**
	 * @param TaskStorageInterface $storage
	 * @param FactoryInterface $factory
	 */
	public function __construct(TaskStorageInterface $storage, FactoryInterface $factory)
	{
		parent::__construct($storage, $factory);
	}
	
	/**
	 * @inheritDoc
	 */
	public function getByScheduleId(int $scheduleId): CollectionInterface
	{
		$data = $this->storage->getByScheduleId($scheduleId);
		
		if (!$data) {
			throw new StorageDataMissingException();
		}
		
		return $this->factory->createCollection($data);
	}
}