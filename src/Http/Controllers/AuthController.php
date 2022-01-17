<?php

namespace Fschirinzi\LaraMote\Http\Controllers;

use Fschirinzi\LaraMote\Http\Requests\AuthRequest;
use Fschirinzi\LaraMote\LaraMote;

class AuthController
{
    public function login(AuthRequest $request)
    {
        $id = $request->get('key_value');
        $key = $request->get('key', 'id');
        $remember = $request->get('remember', true);
        $modelClass = $request->get('model', $this->getDefaultAuthModel());

        $modelWithNamespace = LaraMote::guess_class_and_namespace($modelClass);

        $model = (new $modelWithNamespace)->where($key, $id)->firstOrFail();

        return auth()->login($model, $remember);
    }

    protected function getDefaultAuthModel()
    {
        $authPasswordDefault = config('auth.defaults.passwords');

        return config("auth.providers.{$authPasswordDefault}.model");
    }
}
