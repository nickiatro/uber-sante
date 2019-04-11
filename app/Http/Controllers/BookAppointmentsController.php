<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\DataMappers\bookAppointments_mapper;
use App\Appointment;

class BookAppointmentsController extends Controller{


public static function showAppointments(){

    $aMap = new bookAppointments_mapper();
    $appointments = $aMap->showAppointments(Auth::user()->healthCard);
    return $appointments;

}

public static function showAppointmentsPhysician(){

    $aMap = new bookAppointments_mapper();
    $appointments = $aMap->showAppointments(Auth::user()->physicianNumber);
    return $appointments;

}

public static function getCartContent($user){

    $aMap = new bookAppointments_mapper();
    $appointments = $aMap->getCartContent($user);
    return $appointments;
}

public static function updateAppointment(){

    if (Auth::user()->admin_privilege == "0"){
        $aMap = new bookAppointments_mapper();
        $aMap->updateAppointment($appointment_id);
        
        }

        return $appointments;


}


public static function addAppointmentToCart($appointment_id){
    if (Auth::user()->admin_privilege == "0"){
    $aMap = new bookAppointments_mapper();
    $aMap->addAppointmentToCart($appointment_id);
    }

    return redirect()->back();

}

public static function removeAppointmentFromCart($appointment_id){

    if (Auth::user()->admin_privilege == "0"){
        $aMap = new bookAppointments_mapper();
        $aMap->removeAppointmentFromCart($appointment_id);
        }
    
        return redirect()->back();

    }

public static function cancelTransaction(){
    if (Auth::user()->admin_privilege == "0") {
    $aMap = new bookAppointments_mapper();
    $aMap->cancelTransaction(Auth::user()->healthCard);
}
    return redirect()->back();
}

public static function cancelAppointment($appointmentId){
    if (Auth::user()->admin_privilege == "0") {
    $aMap = new bookAppointments_mapper();
    $aMap->cancelAppointment($appointmentId);
}
return redirect()->back();
}

public static function checkoutCart(){
    if (Auth::user()->admin_privilege == "0") {
    $aMap = new bookAppointments_mapper();
    $aMap->checkoutCart(Auth::user()->healthCard);
}
    return redirect()->back();
}

public static function getAllAppointments($user){
    $aMap = new bookAppointments_mapper();
    $appointments = $aMap->getAllAppointments($user);






}

}