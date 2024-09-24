<?php

namespace Manza\Paisa\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Manza\Paisa\Paisa
 */
class Paisa extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Manza\Paisa\Paisa::class;
    }
}
