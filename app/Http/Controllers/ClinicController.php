<?php

namespace App\Http\Controllers;

use App\Clinic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataMappers\clinic_mapper;

class ClinicController extends Controller implements GeneralUserController
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    

    public function update(Clinic $user)
    {
        if (Auth::user()->admin_privilege == "1"){
           $pMap = new clinic_mapper();
           $pMap->update_clinic($user);
       return redirect('/admin');
    }   
        else{
            return redirect('/doctor');
        }

    }

} 