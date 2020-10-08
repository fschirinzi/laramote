
<?php

use Fschirinzi\LaraMote\Http\Middleware\EnsureUserIsAuthorized;
use Fschirinzi\LaraMote\Http\Middleware\ForceJsonResponse;

return [

    /*
    |--------------------------------------------------------------------------
    | LaraMote Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every LaraMote route - giving you
    | the chance to add your own middleware to this list or change any of
    | the existing middleware. Or, you can simply stick with this list.
    |
    */

    'middleware' => [
        'api',
        ForceJsonResponse::class,
        EnsureUserIsAuthorized::class,
    ],

];
