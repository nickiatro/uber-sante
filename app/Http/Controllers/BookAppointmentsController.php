<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\DataMappers\bookAppointments_mapper;

class BookAppointmentsController extends Controller{

public static function getAllAppointments($user){
	return DB::table('appointment')->where('id', $user)->get();
}

public static function showAppointments(){

    $aMap = new bookAppointments_mapper();
    $appointments = $aMap->showAppointments();
    return $appointments;

}

public static function getCartContent($user){

    $aMap = new bookAppointments_mapper();
    $appointments = $aMap->getCartContent($user);
    return $appointments;
}


public static function addAppointmentToCart($user){
    if (Auth::user()->admin_privilege == "0"){
    $aMap = new bookAppointments_mapper();
    $aMap->addAppointmentToCart($user);
    }

    return redirect()->back();

}

public static function removeAppointmentFromCart($user){

    if (Auth::user()->admin_privilege == "0"){
        $aMap = new bookAppointments_mapper();
        $aMap->removeAppointmentFromCart($user);
        }
    
        return redirect()->back();

    }

public static function cancelTransaction(){
    if (Auth::user()->admin_privilege == "0") {
    $lMap = new bookAppointments_mapper();
    $lMap->cancelTransaction();
}
    return redirect()->back();
}

public static function checkoutCart(){
    if (Auth::user()->admin_privilege == "0") {
    $lMap = new bookAppointments_mapper();
    $lMap->checkoutCart();
    $lMap->cancelTransaction();
}
    return redirect()->back();
}






}