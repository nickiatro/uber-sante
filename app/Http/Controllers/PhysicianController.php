<?php

namespace App\Http\Controllers;

use App\Physician;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataMappers\physician_mapper;

class PhysicianController extends Controller implements GeneralUserController
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    

    public function update(Physician $user)
    {
        if (Auth::user()->admin_privilege == "1"){
           $pMap = new physician_mapper();
           $pMap->update_physician($user);
       return redirect('/admin');
    }   
        else{
            return redirect('/doctor');
        }

    }

} 