<?php

namespace Fschirinzi\LaraMote;

class LaraMote
{
    public static function guess_class_and_namespace($model)
    {
        if (class_exists($model)) {
            return get_class(new $model);
        }

        if (class_exists($appModel = 'App\\'.$model)) {
            return get_class(new $appModel);
        }

        if (class_exists($appModel = 'App\\Models\\'.$model)) {
            return get_class(new $appModel);
        }

        throw new \Exception("Class '{$model}' not found.");
    }
}
