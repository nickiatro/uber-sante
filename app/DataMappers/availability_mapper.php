<?php
namespace App\DataMappers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Availability;
class availability_mapper{

    public function showAvailability($start_time){
        $dt = new DateTime($start_time);
        $date = $dt->format('Y-m-d');
        $time1 = $date." 00:00:00";
        $time2 = $date." 23:59:59";
     return DB::table('availabilities')->whereBetween('start_time', [$time1, $time2])->get();
    }

	public function updateAvailability(Availability $availability){
         DB::table('availabilities')
            ->where('id', $availability->id)
            ->update(
                [
                'physician_id' => $availability->physician_id,
                'start_time' => $availability->start_time,
                'duration' => $availability->duration,
                'updated_at' => date('Y-m-d H:i:s'),   
                ]);
    }

    public function addAvailability(Availability $availability){
         DB::table('availabilities')->insert(
            [
            'id' =>  $availability->id,
            'physician_id' => $availability->physician_id,
            'start_time' => $availability->start_time,
            'duration' => $availability->duration,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),    
            ]);
    }

    public function removeAvailability($physician_id, $start_time){
        DB::table('availabilities')->where('physician_id',$physician_id)
            ->where('start_time',$start_time)->delete();
   }
}
?>