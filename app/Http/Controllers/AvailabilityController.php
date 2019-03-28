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
        $availability->physicianNumber = $request->physicianNumber;
        $availability->start_time = $request->start_time;
        $availability->patient_id = $request->patient_id;
        $availability->save();
    }

    /**
     * Display the specified availability.
     *
     * @param  date  $date
     * @return Response
     */
    public function show($date)
    {
		$availability = select(DB::raw(1));
		return $availability;
    }


    /**
     * Update the specified availability in storage.
     *
     * @param  int  $id
     * @param  int  $physicianNumber
     * @param  dateTime  $start_time
     * @param  int  $duration
     * @return Response
     */
    public function update($id, $physicianNumber, $start_time, $duration)
    {
		$availability = Availability::find($id);
        $availability->physicianNumber = $physicianNumber;
        $availability->start_time = $start_time;
        $availability->patient_id = $patient_id;
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
