<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CartAppointment;

class CartAppointmentController extends Controller
{

    /**
     * Store a newly created cart_appointment in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {       
        $cart_appointment = new CartAppointment;
        $cart_appointment->clinic_id = $request->clinic_id;
        $cart_appointment->start_time = $request->start_time;
        $cart_appointment->duration = $request->duration;
        $cart_appointment->patient_id = $request->patient_id;
        $cart_appointment->physician_id = $request->physician_id;
        $cart_appointment->room_id = $request->room_id;
        $cart_appointment->save();
    }

    /**
     * Display the specified cart_appointment.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
		$cart_appointment = CartAppointment::find($id);
		$collection = collect([
			'clinic_id' => $cart_appointment->clinic_id
			'start_time' => $cart_appointment->start_time 
			'duration' => $cart_appointment->duration 
			'patient_id' => $cart_appointment->patient_id 
			'physician_id' => $cart_appointment->physician_id 
			'room_id' => $cart_appointment->room_id		
		]);		
		return $collection;
    }


    /**
     * Update the specified cart_appointment in storage.
     *
     * @param  int  $id
     * @param  int  $clinic_id
     * @param  dateTime  $start_time
     * @param  int  $duration
     * @param  int  $patient_id
     * @param  int  $physician_id
     * @param  int  $room_id
     * @return Response
     */
    public function update($id, $clinic_id, $start_time, $duration, $patient_id, $physician_id, $room_id)
    {
		$cart_appointment = CartAppointment::find($id);
        $cart_appointment->clinic_id = $clinic_id;
        $cart_appointment->start_time = $start_time;
        $cart_appointment->duration = $duration;
        $cart_appointment->patient_id = $patient_id;
        $cart_appointment->physician_id = $physician_id;
        $cart_appointment->room_id = $room_id;
        $cart_appointment->save();
    }

    /**
     * Remove the specified cart_appointment from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       $cart_appointment = CartAppointment::find($id);
	   $cart_appointment->delete();
    }
	
}
