<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Nurse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use App\DataMappers\nurse_mapper;

class CreateNurseController extends Controller
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

    public function showCreateNurseForm()
    {
        return view('auth.createNurse');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/nurses';

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
            'accessId' => 'required|regex:/^[a-zA-Z]{3}\d{5}+$/|unique:nurses',
            'email' => 'required|string|email|max:255|unique:nurses',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Nurse
     */
    protected function create(array $data)
    {
            $user = new Nurse;
            $user -> accessId = $data['accessId'];
            $user -> email = $data['email'];
            $user -> password = Hash::make($data['password']);
            $user -> admin_privilege = 0;
            $user -> nurse_privilege = 1;
            $user -> physician_privilege = 0;

            $nMap = new nurse_mapper();
            $nMap->registerNurse($user);

            return $user;

    }
}
