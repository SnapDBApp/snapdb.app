<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Paddle extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'paddle';
    }
}
