<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Task extends Model
{

    protected $fillable = [
        'name', 'notes', 'account', 'status', 'due', 'user_id', 'inquiry_id', 'list'
    ];

    protected $dates = [
        'created_at', 'updated_at', 'due'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Task $task) {
            $task->account = env('TOKEET_ACCOUNT_ID');
            $task->pkey = Uuid::uuid4()->toString();
        });
    }

    public function setDueAttribute($value)
    {
        $this->attributes['due'] = Carbon::createFromFormat('Y/m/d H:i:s', $value)->toDateTimeString();
    }

    public function getDueAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value);
    }

    public function getRouteKeyName()
    {
        return 'pkey';
    }



}
