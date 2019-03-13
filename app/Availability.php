<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    // Note that at the moment all availabilities represent a weekly recurring availability
    // Ex. An availability for monday from 8am to 8pm means they will be available every monday
    //     from 8am to 8pm

    // All attributes are mass assignable for now
    protected $guarded = [];
}
