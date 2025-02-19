<?php

namespace Tymeshift\PhpTest\Enums;

enum HttpMethodEnum: string
{
	case GET = 'GET';
	case POST = 'POST';
	case PUT = 'PUT';
	case DELETE = 'DELETE';
}