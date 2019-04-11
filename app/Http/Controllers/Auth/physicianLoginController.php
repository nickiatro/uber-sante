<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PhysicianLoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/doctor';

    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }
    
    public function guard()
    {
     return Auth::guard('physician');
    }

    // login from for physician
    public function showLoginForm()
    {
        return view('auth.physician-login');
    }

 }
