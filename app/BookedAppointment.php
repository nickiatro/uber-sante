<?php

namespace App;

use Illuminate\Notifications\Notifiable;

class BookedAppointment
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'clinic_id', 'start_time', 'duration', 'healthCard', 'physicianNumber', 'room_id'
    ];

    public $timestamps = true;
}
