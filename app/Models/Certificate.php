<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [       
        'name', 'email', 'session_id', 'payment_intent', 'uuid', 'valid_till'

    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) \Illuminate\Support\Str::uuid();
            $model->valid_till = Carbon::now()->addYear()->format('Y-m-d');
        });
    }

}
