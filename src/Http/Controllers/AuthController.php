<?php

namespace Fschirinzi\LaraMote\Http\Controllers;

use Fschirinzi\LaraMote\Http\Requests\AuthRequest;

class AuthController
{
    public function login(AuthRequest $request)
    {
        $id = $request->get('key_value');
        $remember = $request->get('remember', true);
        $key = $request->get('key', 'id');
        $modelClass = $request->get('model', 'App\User');

        $model = (new $modelClass)->where($key, $id)->firstOrFail();

        return auth()->login($model, $remember);
    }
}
