<?php
declare(strict_types=1);

namespace Tymeshift\PhpTest\Exceptions;

class StorageDataMissingException extends \Exception
{
	public const MESSAGE = 'Storage data is empty for called entity';
	
	public function __construct()
	{
		parent::__construct(self::MESSAGE, 400);
	}
}