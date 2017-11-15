<?php

namespace Riczescaran\LaravelLineBot\Facades;

use Illuminate\Support\Facades\Facade;

class Line extends Facade
{

    public function __construct()
    {
        protected static function getFacadeAccessor()
        {
            return 'line';
        }
    }
}

