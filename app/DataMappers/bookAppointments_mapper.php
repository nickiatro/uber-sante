<?php
namespace App\DataMappers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class bookAppointments_mapper{

    public function getCartContent($user){
        return DB::table('cart_appointments')->where('healthCard', $user)->get();
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
           'healthCard' => Auth::user()->healthcard(),
           'physicianNumber' => $data->get('physicianNumber'),
           'room_id' => $data->get('room_id'),
           'created_at' => date('Y-m-d H:i:s'),
               'updated_at' => date('Y-m-d H:i:s')]);
   }

    public function removeAppointmentFromCart($user){
        DB::table('cart_appointments')->where('id',Auth::id())->where('user',$user)->delete();
   }

   public function showAppointments($healthCard){
    return DB::table('appointments')->where('healthCard', '=', $healthCard)->get();
   }

   public function cancelTransaction($healthCard){
       DB::table('cart_appointments')->where('healthCard','=', $healthCard)->delete();
}

public function cancelAppointment($appointmentId){
    DB::table('appointments')->where('id','=', $appointmentId)->delete();
}

   public function updateAppointment(){
        DB::table('cart_appointments')->where('id', $data->get('id'))->update([
            'physicianNumber' => $data->get('physicianNumber'),
        ]);
    
   }

   public function checkoutCart($healthCard){
        $cart = DB::table('cart_appointments')->where('healthCard','=' , $healthCard)->get();

       foreach ($cart as $c) {
           DB::table('appointments')->insert([
               'clinic_id' => $c->clinic_id,
               'start_time' => $c->start_time,
               'duration' => $c->duration,
               'healthCard' => $c->healthCard,
               'physicianNumber' => $c->physicianNumber,
               'room_id' => $c->room_id,
               'created_at' => $c->created_at,
               'updated_at' => $c->updated_at
           ]);
       }

       DB::table('cart_appointments')->where('healthCard','=' , $healthCard)->truncate();
   }

   }






?>