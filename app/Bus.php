<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = [
        'company', 'start_location', 'end_location', 'start_time', 'end_time', 'stops', 'price'
    ];
}
