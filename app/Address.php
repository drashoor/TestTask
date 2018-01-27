<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Address extends Model
{
    protected $fillable = [
        'CC',
        'city',
        'zip',
        'timezone',
        'address',
        'state',
        'country',
    ];

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

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
