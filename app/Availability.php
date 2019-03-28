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
        'id', 'physician_id', 'start_time', 'duration'
    ];

    public $timestamps = true;
}
