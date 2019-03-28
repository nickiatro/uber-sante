<?php
namespace App\DataMappers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class bookAppointments_mapper{

    public function getCartContent($user){
        return DB::table('cart_appointments')->where('id', $user)->join('id', 'unit.clinic_id', 'start_time',
        'duration', 'patient_id', 'physician_id', 'room_id', '=', 'cart_appointments.id')->get();
    }

    public function addAppointmentToCart($user){
        DB::table('cart_appointments')->insert(
           [
           'patient_id' => Auth::user()->id(),
           'physician_id' => $physicianNumber,
           'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s')]);
   }

    public function removeAppointmentFromCart($user){
        DB::table('cart_appointments')->where('id',Auth::id())->where('user',$user)->delete();
   }

   public function showAppointments(){
    return DB::table('appointments')->where('id',Auth::id())->join('id', 'unit.clinic_id', 'start_time',
    'duration', 'patient_id', 'physician_id', 'room_id', '=', 'appointments.id')->get();
   }

   public function cancelTransaction(){
    DB::table('cart_appointments')->where('id',Auth::id())->delete();
}

   public function checkoutCart(){
      $cart =  DB::table('cart_appointments')->where('id', Auth::id())->join('id', 'unit.clinic_id', 'start_time',
      'duration', 'patient_id', 'physician_id', 'room_id', '=', 'appointments.id')->get();

      DB::table('appointments')->insert(
        ['id' => $cart->id, 
        'patient_id' => Auth::id(),
        'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        
            ]);

                    }

   }






?>