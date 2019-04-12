<?php

namespace App;

use Illuminate\Notifications\Notifiable;

class Clinic
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'clinic_id', 'physicianNumber', 'accessId'
    ];

    public $timestamps = true;
}
