<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Physician;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use App\DataMappers\physician_mapper;

class CreatePhysicianController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function showCreatePhysicianForm()
    {
        return view('auth.createPhysician');
    }

    /**
     * Where to redirect users after registration.
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
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'physicianNumber' => 'required|digits:7|unique:physicians',
            'email' => 'required|string|email|max:255|unique:physicians',
            'password' => 'required|string|min:6|confirmed',
            'specialty' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Physician
     */
    protected function create(array $data)
    {
            $user = new Physician;
            $user -> firstName = $data['firstName'];
            $user -> lastName = $data['lastName'];
            $user -> physicianNumber = $data['physicianNumber'];
            $user -> email = $data['email'];
            $user -> password = Hash::make($data['password']);
            $user -> specialty = $data['specialty'];
            $user -> city = $data['city'];
            $user -> admin_privilege = 0;
            $user -> nurse_privilege = 0;
            $user -> physician_privilege = 1;

            $pMap = new physician_mapper();
            $pMap->registerPhysician($user);

            return $user;

    }
}
