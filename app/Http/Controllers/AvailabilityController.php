<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Availability;

class AvailabilityController extends Controller
{   

    /**
     * Store a newly created availability in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {       
        $availability = new Availability;
        $availability->duration = $request->duration;
        $availability->patient_id = $request->patient_id;
        $availability->physician_id = $request->physician_id;
        $availability->save();
    }

    /**
     * Display the specified availability.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
		$availability = Availability::find($id);
		$collection = collect([
			'duration' => $availability->duration 
			'patient_id' => $availability->patient_id 
			'physician_id' => $availability->physician_id 
		]);		
		return $collection;
    }


    /**
     * Update the specified availability in storage.
     *
     * @param  int  $id
     * @param  int  $duration
     * @param  int  $patient_id
     * @param  int  $physician_id
     * @return Response
     */
    public function update($id, $clinic_id, $start_time, $duration, $patient_id, $physician_id, $room_id)
    {
		$availability = Availability::find($id);
        $availability->duration = $duration;
        $availability->patient_id = $patient_id;
        $availability->physician_id = $physician_id;
        $availability->save();
    }

    /**
     * Remove the specified availability from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       $availability = Availability::find($id);
	   $availability->delete();
    }
	
}
