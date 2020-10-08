<?php

namespace Fschirinzi\LaraMote\Http\Controllers;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Fschirinzi\LaraMote\Http\Requests\FactoryRequest;

class FactoryController
{
    public function call(FactoryRequest $request)
    {
        $action = $request->get('action');
        $model = $request->get('model');
        $states = $request->get('states');
        $amount = $request->get('amount', 1);
        $name = $request->get('name');
        $showHidden = $request->get('showHiddenModelAttr', false);
        $overrides = $request->get('overrides', []);

        $modelWithNamespace = $this->guess_class_and_namespace($model);

        $factory = $name
            ? factory($modelWithNamespace, $name, $amount)
            : factory($modelWithNamespace, $amount);

        $factory = $states && is_array($states)
            ? $factory->states($states)
            : $factory;

        $factoryResult = $factory->{$action}($overrides);

        return ($showHidden)
            ? is_a($factoryResult, EloquentCollection::class)
                ? $factoryResult->map(function($item) {
                    return $item->makeVisible($item->getHidden());
                })
                : $factoryResult->makeVisible($factoryResult->getHidden())
            : $factoryResult;
    }

    private function guess_class_and_namespace($model)
    {
        $modelWithNamespace = null;

        if (class_exists($model)) {
            $modelWithNamespace = get_class(new $model);
        } else {
            $modelWithNamespace = class_exists($model = 'App\\' . $model)
                ? get_class(new $model)
                : null;
        }
        return $modelWithNamespace;
    }
}