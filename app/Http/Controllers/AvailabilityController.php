<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\DatavMappers\availability_mapper;
use App\Availability;

class AvailabilityController extends Controller
{    
    public static function showAvailability($start_time)
    {
      $avMap = new availability_mapper();
      $availabilities = $avMap->showAvailability($start_time);
      return $availabilities;
    }
    
    public function updateAvailability(Availability $availability)
    {
      $avMap = new availability_mapper();
      $avMap->updateAvailability($availability);  
      return redirect()->back();
    }
    
    public function addAvailability(Availability $availability)
    {
      $avMap = new availability_mapper();
      $avMap->addAvailability($availability);    
      return redirect()->back();
    }
    
    public function removeAvailability($physicianNumber, $start_time)
    {
      $avMap = new availability_mapper();
      $avMap->removeAvailability($physicianNumber, $start_time);    
      return redirect()->back();
    }

} 