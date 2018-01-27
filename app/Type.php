<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Type extends Model
{
    protected $fillable = ['pkey', 'name'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($object) {
            $object->pkey = Uuid::uuid4()->toString();
        });
    }

    public function getRouteKey()
    {
        return 'pkey';
    }

}
