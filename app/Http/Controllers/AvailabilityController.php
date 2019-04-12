<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\DataMappers\availability_mapper;
use App\Availability;

class AvailabilityController extends Controller
{    
    public static function showAvailability()
    {
      $avMap = new availability_mapper();
      $availabilities = $avMap->showAvailability(Auth::guard('physician')->user()->physicianNumber);
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
    
    public function removeAvailability($availabilityId)
    {
      $avMap = new availability_mapper();
      $avMap->removeAvailability($availabilityId);    
      return redirect()->back();
    }

} 