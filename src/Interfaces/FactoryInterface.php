<?php
declare(strict_types=1);

namespace Tymeshift\PhpTest\Interfaces;

use Tymeshift\PhpTest\Exceptions\InvalidCollectionDataProvidedException;

interface FactoryInterface
{
	/**
	 * @param array $data
	 *
	 * @return EntityInterface
	 */
    public function createEntity(array $data):EntityInterface;
	
	/**
	 * @param array $data
	 *
	 * @return CollectionInterface
	 * @throws InvalidCollectionDataProvidedException
	 */
	public function createCollection(array $data):CollectionInterface;
}