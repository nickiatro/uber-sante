<?php
namespace App\DataMappers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class bookAppointments_mapper{

    public function getCartContent($user){
        return DB::table('cart_appointments')->where('id', $user)->get();
    }

    public static function getAllAppointments($user){
    	return DB::table('appointments')->where('id', $id)->get();
    }

    public function addAppointmentToCart(Request $data){
        DB::table('cart_appointments')->insert(
           [
           'clinic_id' => $data->get('clinic_id'),
           'start_time' => $data->get('start_time'),
           'duration' => $data->get('duration'),
           'patient_id' => Auth::user()->id(),
           'physicianNumber' => $data->get('physicianNumber'),
           'room_id' => $data->get('room_id'),
           'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s')]);
   }

    public function removeAppointmentFromCart($user){
        DB::table('cart_appointments')->where('id',Auth::id())->where('user',$user)->delete();
   }

   public function showAppointments(){
    return DB::table('appointments')->where('id',Auth::id())->get();
   }

   public function cancelTransaction(){
    DB::table('cart_appointments')->where('id',Auth::id())->delete();
}

public function cancelAppointment(){
    DB::table('appointments')->where('id',Auth::id())->delete();
}

   public function updateAppointment(){
        DB::table('cart_appointments')->where('id', $data->get('id'))->update([
            'physicianNumber' => $data->get('physicianNumber'),
        ]);
    
   }

   public function checkoutCart(){
      $cart =  DB::table('cart_appointments')->where('id', Auth::id())->get();

      DB::table('appointments')->insert(
        [
            'clinic_id' => $cart->get('clinic_id'),
           'start_time' => $cart->get('start_time'),
           'duration' => $cart->get('duration'),
           'patient_id' => Auth::user()->id(),
           'physicianNumber' => $cart->get('physicianNumber'),
           'room_id' => $cart->get('room_id'),
           'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s')]);

                    }

   }






?>