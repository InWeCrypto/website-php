<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class HttpReq extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'http_req';
	}
}
