<?php

namespace Fschirinzi\LaraMote\Http\Controllers;

use Fschirinzi\LaraMote\LaraMote;
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
        $showHidden = $request->get('showHiddenModelAttr', false);
        $overrides = $request->get('overrides', []);

        $modelWithNamespace = LaraMote::guess_class_and_namespace($model);

        $factory = $modelWithNamespace::factory()->count($amount);

        $factory = $this->applyStates($factory, $states);

        $factoryResult = $factory->{$action}($overrides);

        return ($showHidden)
            ? is_a($factoryResult, EloquentCollection::class)
                ? $factoryResult->map(function($item) {
                    return $item->makeVisible($item->getHidden());
                })
                : $factoryResult->makeVisible($factoryResult->getHidden())
            : $factoryResult;
    }

    protected function applyStates($factory, array $states)
    {
        if(!$states && is_array($states)){
            return $factory;
        }

        if($this->array_has_string_keys($states)) {
            foreach ($states as $key => $value) {
                if($value){
                    $factory = $factory->{$key}($value);
                    continue;
                }

                $factory = $factory->{$key}();
            }

            return $factory;
        }

        foreach ($states as $value) {
            $factory = $factory->{$value}();
        }

        return $factory;
    }

    protected function array_has_string_keys(array $array) {
        return count(array_filter(array_keys($array), 'is_string')) > 0;
    }
}
