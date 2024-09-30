<?php

namespace Manza\Paisa\Facades;

use Illuminate\Support\Facades\Facade;
use Manza\Paisa\Paisa as PaisaBase;

/**
 * @see \Manza\Paisa\Paisa
 */
class Paisa extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return PaisaBase::class;
    }
}
