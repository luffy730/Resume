<?php namespace Hdphp\Facade;

use Hdphp\Kernel\Facade;

class UrlFacade extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'Url';
	}
}