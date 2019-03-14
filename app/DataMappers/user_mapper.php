<?php
namespace App\DataMappers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
class user_mapper{
	public static function update_user(User $user){
         DB::table('users')
            ->where('id', $user->id)
            ->update(['admin_privilege' => 1]);
    }
    public static function registerUser(User $user){
         DB::table('users')->insert(
    ['email' =>  $user->email,
    'password' => $user->password,
    'healthCard' => $user->healthCard,
    'birthday' => $user->birthday,
    'gender' => $user->gender,
    'phone' => $user->phone,
    'country' => $user->country,
    'province' => $user->province,
    'postalCode' => $user->postalCode,
    'city' => $user->city,
    'street' => $user->street,
    'admin_privilege'=> $user->admin_privilege,
    'created_at' => date('Y-m-d H:i:s'),
    'updated_at' => date('Y-m-d H:i:s'),
    
]);
    }
}
?>