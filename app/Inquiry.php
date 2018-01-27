<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Inquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'rental',
        'arrive',
        'depart',
        'recevied',
        'checkin',
        'checkout',
        'booking_id',
        'inquiry_id',
        'source',
        'adults',
        'children',
        'cost'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($object) {
            $object->pkey = Uuid::uuid4()->toString();
        });
    }
}
