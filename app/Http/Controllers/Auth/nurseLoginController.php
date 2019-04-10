<?php
declare(strict_types=1);
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class NurseLoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/nurses';
    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }
    
    public function guard()
    {
     return Auth::guard('nurse');
    }
    // login from for nurse
    public function showLoginForm()
    {
        return view('auth.nurse-login');
    }
 }