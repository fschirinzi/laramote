<?php

namespace Fschirinzi\LaraMote\Http\Controllers;

use Fschirinzi\LaraMote\Http\Requests\ModelRequest;
use Fschirinzi\LaraMote\LaraMote;

class ModelController
{

    public function call(ModelRequest $request)
    {
        $modelClass = $request->get('model');
        $id = $request->get('key_value');
        $key = $request->get('key', 'id');
        $relationships = $request->get('relationships', []);
        $limit = $request->get('limit');
        $showHidden = $request->get('showHiddenModelAttr', false);

        $modelWithNamespace = LaraMote::guess_class_and_namespace($modelClass);

        $model = (new $modelWithNamespace)->where($key, $id);

        $model->when(
            $relationships, function ($q) use ($relationships) {
                return $q->with($relationships);
            }
        );

        $model->when(
            $limit || $limit === 0, function ($q) use ($limit) {
                return $q->take($limit);
            }
        );

        $result = $model->get()->collect();

        return !$showHidden
            ? $result
            : $result->map(
                function ($model) use ($relationships) {
                    return $model->makeVisible($model->getHidden())
                        ->when(
                            $relationships, function ($m) use ($relationships) {
                                foreach ($relationships as $relationship)
                                {
                                    $m->getModel()->$relationship->makeVisible($m->getModel()->$relationship->getHidden());
                                }
                            }
                        )->getModel();
                }
            );
    }
}
