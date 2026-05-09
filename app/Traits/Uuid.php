<?php

namespace App\Traits;

use Illuminate\Support\Str;

/**
 * @method static static creating(\Closure $callback)
 */
trait Uuid
{
    protected static function bootUuid() 
    {
        static::creating(function ($model) {
            if (!$model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        }); 
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }
}

/* Note :
    the ID is not an auto-incrementing integer
    Traits made with purpose to makes it easy to call the UUID function from any model that needs it.
 */