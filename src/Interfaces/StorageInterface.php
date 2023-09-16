<?php

namespace Tymeshift\PhpTest\Interfaces;

interface StorageInterface
{
	/**
	 * @param array $ids
	 *
	 * @return array
	 */
	public function getByIds(array $ids): array;
	
	/**
	 * @param int $id
	 *
	 * @return array
	 */
	public function getById(int $id): array;
}