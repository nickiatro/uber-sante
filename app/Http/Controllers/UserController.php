<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataMappers\user_mapper;

class UserController extends Controller implements GeneralUserController
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */

    public function update(User $user)
    {
        if (Auth::user()->admin_privilege == "1"){
           $uMap = new user_mapper();
           $uMap->update_user($user);
       return redirect('/admin');
    }   
        else{
            return redirect('/');
        }

    }

} 