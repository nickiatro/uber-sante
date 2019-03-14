<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appointment;

class AppointmentController extends Controller
{   

    /**
     * Store a newly created appointment in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {       
        $appointment = new Appointment;
        $appointment->clinic_id = $request->clinic_id;
        $appointment->start_time = $request->start_time;
        $appointment->duration = $request->duration;
        $appointment->patient_id = $request->patient_id;
        $appointment->physician_id = $request->physician_id;
        $appointment->room_id = $request->room_id;
        $appointment->save();
    }

    /**
     * Display the specified appointment.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
		$appointment = Appointment::find($id);
		$collection = collect([
			'clinic_id' => $appointment->clinic_id
			'start_time' => $appointment->start_time 
			'duration' => $appointment->duration 
			'patient_id' => $appointment->patient_id 
			'physician_id' => $appointment->physician_id 
			'room_id' => $appointment->room_id		
		]);		
		return $collection;
    }


    /**
     * Update the specified appointment in storage.
     *
     * @param  int  $id
	 * TO ADD OTHER VARS
     * @return Response
     */
    public function update($id, $clinic_id, $start_time, $duration, $patient_id, $physician_id, $room_id)
    {
		$appointment = Appointment::find($id);
        $appointment->clinic_id = $clinic_id;
        $appointment->start_time = $start_time;
        $appointment->duration = $duration;
        $appointment->patient_id = $patient_id;
        $appointment->physician_id = $physician_id;
        $appointment->room_id = $room_id;
        $appointment->save();
    }

    /**
     * Remove the specified appointment from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       $appointment = Appointment::find($id);
	   $appointment->delete();
    }
	
}
