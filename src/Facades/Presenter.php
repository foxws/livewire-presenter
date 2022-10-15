<?php

namespace Foxws\Presenter\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Foxws\Presenter\Presenter
 */
class Presenter extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Foxws\Presenter\Presenter::class;
    }
}
