<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\DataMappers\availability_mapper;
use App\Availability;

class AvailabilityController extends Controller
{    
    public static function showAvailability($start_time)
    {
      $aMap = new availability_mapper();
      $availabilities = $aMap->showAvailability($start_time);
      return $availabilities;
    }
    
    public function updateAvailability(Availability $availability)
    {
      $aMap = new availability_mapper();
      $aMap->updateAvailability($availability);  
      return redirect()->back();
    }
    
    public function addAvailability(Availability $availability)
    {
      $aMap = new availability_mapper();
      $aMap->addAvailability($availability);    
      return redirect()->back();
    }
    
    public function removeAvailability($physician_id, $start_time)
    {
      $aMap = new availability_mapper();
      $aMap->removeAvailability($physician_id, $start_time);    
      return redirect()->back();
    }

} 