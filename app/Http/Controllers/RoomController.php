<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;

class RoomController extends Controller
{   

    /**
     * Store a newly created room in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {       
        $rooms = new Room;
        $rooms->clinic_id = $request->clinic_id;
        $rooms->save();
    }

    /**
     * Display the specified room.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
		$rooms = Room::find($id);
		$clinic_id = $rooms->clinic_id; 
		return $clinic_id;
    }


    /**
     * Update the specified room in storage.
     *
     * @param  int  $id
     * @param  int  $clinic_id
     * @return Response
     */
    public function update($id, $clinic_id, $start_time, $duration, $patient_id, $physicianNumber, $room_id)
    {
		$rooms = Room::find($id);
        $rooms->clinic_id = $clinic_id;
        $rooms->save();
    }

    /**
     * Remove the specified rooms from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
       $rooms = Room::find($id);
	   $rooms->delete();
    }
	
}
