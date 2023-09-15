<?php

namespace Tymeshift\PhpTest\Base;

use Tymeshift\PhpTest\Exceptions\StorageDataMissingException;
use Tymeshift\PhpTest\Interfaces\CollectionInterface;
use Tymeshift\PhpTest\Interfaces\EntityInterface;
use Tymeshift\PhpTest\Interfaces\FactoryInterface;
use Tymeshift\PhpTest\Interfaces\RepositoryInterface;
use Tymeshift\PhpTest\Interfaces\StorageInterface;

class BaseRepository implements RepositoryInterface
{
	protected StorageInterface $storage;
	
	protected FactoryInterface $factory;
	
	protected CollectionInterface $collection;
	
	public function __construct(StorageInterface $storage, FactoryInterface $factory)
	{
		$this->storage = $storage;
		$this->factory = $factory;
	}
	
	/**
	 * @throws StorageDataMissingException
	 */
	public function getById(int $id): EntityInterface
	{
		$data = $this->storage->getById($id);
		
		if (! $data) {
			throw new StorageDataMissingException();
		}
		
		return $this->factory->createEntity($data);
	}
	
	/**
	 * @throws StorageDataMissingException
	 */
	public function getByIds(array $ids): CollectionInterface
	{
		$data = $this->storage->getByIds($ids);
		
		if (! $data) {
			throw new StorageDataMissingException();
		}
		
		return $this->collection->createFromArray($data, $this->factory);
	}
}