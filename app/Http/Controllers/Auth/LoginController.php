<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $field = $this->field($request);
        return [
            $field => $request->get($this->username()),
            'password' => $request->get('password'),
        ];
    }
    /**
     * Determine if the request field is email or username.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */

    public function field(Request $request)
    {
        $email = $this->username();
        return filter_var($request->get($email), FILTER_VALIDATE_EMAIL) ? $email : 'email';
    }

    
    public function fieldPhysicians(Request $request)
    {
        $email = $this->username();
        return filter_var($request->get($email), FILTER_VALIDATE_EMAIL) ? $email : 'physicianNumber';
    }
    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLoginPhysicians(Request $request)
    {
        echo "reached phy validate"; 
        $fieldPhysicians = $this->field($request);
        $messages = ["{$this->username()}.exists" => 'The account you are trying to login is not registered or it has been disabled.'];
        $this->validate($request, [
            $this->username() => "required|exists:physicians,{$fieldPhysicians}",
            'password' => 'required',
        ], $messages);
    }

    public function fieldNurses(Request $request)
    {
        $email = $this->username();
        return filter_var($request->get($email), FILTER_VALIDATE_EMAIL) ? $email : 'accessId';
    }

    protected function validateLoginNurses(Request $request)
    {
        echo "reached nurse validate"; 
        $fieldNurses = $this->fieldNurses($request);
        $messages = ["{$this->username()}.exists" => 'The account you are trying to login is not registered or it has been disabled.'];
        $this->validate($request, [
            $this->username() => "required|exists:nurses,{$fieldNurses}",
            'password' => 'required',
        ], $messages);
    }

}
