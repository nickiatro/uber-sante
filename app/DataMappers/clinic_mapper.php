<?php
namespace App\DataMappers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Clinic;

class clinic_mapper{

	public function assignPhysicianToClinic(Request $data){

           DB::table('clinic')->insert([
               'clinic_id' => $data->get('clinic_id'),
               'physicianNumber' => Auth::guard('physician')->user()->physicianNumber,
           ]);
       
   }

   public function assignNurseToClinic(Request $data){

    DB::table('clinic')->insert([
        'clinic_id' => $data->get('clinic_id'),
        'accessId' => Auth::guard('nurse')->user()->accessId,
    ]);

}
}
?>