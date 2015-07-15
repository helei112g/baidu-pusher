<?php

namespace Riverslei\Pusher;

use Illuminate\Support\Facades\Facade;

class Pusher extends Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'pusher';
    }
}
