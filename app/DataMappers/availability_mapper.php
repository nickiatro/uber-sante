<?php
namespace App\DataMappers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Availability;
class availability_mapper{

    public function showAvailability($user){

     //return DB::table('availabilities')->where('physicianNumber', '=', $physicianNumber)->get();
     return DB::table('availabilities')->get();
    }

	public function updateAvailability(Availability $availability){
         DB::table('availabilities')
            ->where('id', $availability->id)
            ->update(
                [
                'physicianNumber' => $availability->physicianNumber,
                'start_time' => $availability->start_time,
                'duration' => $availability->duration,
                'updated_at' => date('Y-m-d H:i:s'),   
                ]);
    }

    public function addAvailability(Availability $availability){
         DB::table('availabilities')->insert(
            [
            'id' =>  $availability->id,
            'physicianNumber' => $availability->physicianNumber,
            'start_time' => $availability->start_time,
            'duration' => $availability->duration,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),    
            ]);
    }

    public function removeAvailability($availabilityId){
        DB::table('availabilities')->where('id','=', $availabilityId)->delete();
   }
}
?>