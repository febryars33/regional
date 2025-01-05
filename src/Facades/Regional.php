<?php

namespace Snairbef\Regional\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Snairbef\Regional\Regional
 */
class Regional extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Snairbef\Regional\Regional::class;
    }
}
