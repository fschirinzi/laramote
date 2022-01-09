<?php

namespace Fschirinzi\LaraMote\Http\Controllers;

use Fschirinzi\LaraMote\Http\Requests\ArtisanRequest;

class ArtisanController
{
    public function call(ArtisanRequest $request)
    {
        $command = $request->get('command');
        $parameters = $request->get('parameters', []);

        \Artisan::call($command, $parameters);

        return response()->json(
            [
                'command' => $command,
                'parameters' => $parameters,
                'log' => \Artisan::output(),
            ]
        );
    }
}
