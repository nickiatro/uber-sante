<?php
namespace App\DataMappers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Physician;
class physician_mapper{
	public static function update_physician(Physician $user){
         DB::table('physicians')
            ->where('id', $user->id)
            ->update(['admin_privilege' => 1]);
    }
    public static function registerPhysician(Physician $user){
         DB::table('physicians')->insert(
    [
    'firstName' =>  $user->firstName,
    'lastName' => $user->lastName,
    'physicianNumber' => $user->physicianNumber,
    'email' => $user->email,
    'password' => $user->password,
    'specialty' => $user->specialty,
    'city' => $user->city,
    'admin_privilege'=> $user->admin_privilege,
    'physician_privilege' => $user->physician_privilege,
    'nurse_privilege'=> $user->nurse_privilege,
    'created_at' => date('Y-m-d H:i:s'),
    'updated_at' => date('Y-m-d H:i:s'),
    
]);
    }
}
?>