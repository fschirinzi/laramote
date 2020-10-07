<?php

namespace Fschirinzi\LaraMote;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Fschirinzi\LaraMote\Skeleton\SkeletonClass
 */
class LaraMoteFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laramote';
    }
}
