<?php

namespace App;

use Illuminate\Notifications\Notifiable;

class Availability
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'physicianNumber', 'start_time', 'duration'
    ];

    public $timestamps = true;
}
