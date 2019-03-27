<?php

namespace App\Http\Controllers;

use App\Nurse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataMappers\nurse_mapper;

class NurseController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function update(Nurse $user)
    {
        if (Auth::user()->admin_privilege == "1"){
           $nMap = new nurse_mapper();
           $nMap->update_nurse($user);
       return redirect('/admin');
    }   
        else{
            return redirect('/');
        }

    }

    public function loginNurse()
    {
        return view('nurse.login');
    }

    public function home()
  {
    return view('nurse');
  }

    public function logout()
  {
    Auth::guard('nurse')->logout();

    return redirect('/login/nurse'); 
  }

} 