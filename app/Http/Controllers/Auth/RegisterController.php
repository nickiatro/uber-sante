<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use App\DataMappers\user_mapper;

class RegisterController extends Controller
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'healthCard' => 'required|string|size:10|unique:users',
            'birthday' => 'required|date_format:d/m/Y|max:255',
            'gender' => 'required|string|max:255',
            'phone' => 'required|string|size:10',
            'country' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postalCode' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
            $user = new User;
            $user -> firstName = $data['firstName'];
            $user -> lastName = $data['lastName'];
            $user -> email = $data['email'];
            $user -> password = Hash::make($data['password']);
            $user -> healthCard = $data['healthCard'];
            $user -> birthday = $data['birthday'];
            $user -> gender = $data['gender'];
            $user -> phone = $data['phone'];
            $user -> country = $data['country'];
            $user -> province = $data['province'];
            $user -> postalCode = $data['postalCode'];
            $user -> city = $data['city'];
            $user -> street = $data['street'];
            $user -> admin_privilege = 0;

            $uMap = new user_mapper();
            $uMap->registerUser($user);

            return $user;

    }
}
