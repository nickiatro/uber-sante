<?php
namespace App\DataMappers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Nurse;
class nurse_mapper{
	public static function update_nurse(Nurse $user){
         DB::table('nurses')
            ->where('id', $user->id)
            ->update(['admin_privilege' => 1]);
    }
    public static function registerNurse(Nurse $user){
         DB::table('nurses')->insert(
    ['accessId' =>  $user->accessId,
    'email' => $user->email,
    'password' => $user->password,
    'admin_privilege'=> $user->admin_privilege,
    'created_at' => date('Y-m-d H:i:s'),
    'updated_at' => date('Y-m-d H:i:s'),
    
]);
    }
}
?>