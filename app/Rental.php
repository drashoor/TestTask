<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{

    protected $fillable = [
        'pkey', 'name', 'description', 'bedrooms', 'bathrooms', 'long', 'lat', 'type_id',
        'display_name', 'phone', 'archived', 'sleep_min', 'sleep_max',
        'color', 'email'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($object) {
            // $object->pkey = Uuid::uuid4()->toString();
        });
    }

    public function path()
    {
        return "/rentals/$this->pkey";
    }

    public function getRouteKeyName()
    {
        return 'pkey';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'rentals_tags');
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function getNameAttribute($value)
    {
        if ($this->display_name)
            return $this->display_name;

        return $value;
    }
}
