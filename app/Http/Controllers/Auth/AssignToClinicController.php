<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\DataMappers\clinic_mapper;
use App\Clinic;

class AssignToClinicController extends Controller
{
    
    public static function assignPhysicianToClinic($clinic_id){


    $cMap = new clinic_mapper();
    $cMap->assignPhysicianToClinic($clinic_id);

    
    }

    public static function assignNurseToClinic($clinic_id){

    $cMap = new clinic_mapper();
    $cMap->assignNurseToClinic($clinic_id);

    
    }
    
}
