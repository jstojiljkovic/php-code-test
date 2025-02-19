<?php
declare(strict_types=1);

namespace Tymeshift\PhpTest\Interfaces;

use Tymeshift\PhpTest\Exceptions\InvalidCollectionDataProvidedException;

interface CollectionInterface
{
    /**
     * Adds item to collection
     * @param EntityInterface $entity
     * @return $this
     */
    public function add(EntityInterface $entity):self;

    /**
     * Creates Collection from array
     * @param array $data
     * @param FactoryInterface $factory
     * @return $this
     * @throws InvalidCollectionDataProvidedException
     */
    public function createFromArray(array $data, FactoryInterface $factory):self;

    /**
     * Creates array from collection
     * @return array
     */
    public function toArray():array;
}
