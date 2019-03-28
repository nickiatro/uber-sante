<?php

use App\Appointment;
use App\Availability;
use App\ScheduleUtilities;

class ScheduleController
{
    /**
     * Get the singleton instance
     * 
     * @return ScheduleController
     */
    public static function getInstance()
    {
        static $singleton = null;
        if ($singleton === null) {
            $singleton = new ScheduleController();
        }
    }

    private function __construct()
    {}

    /**
     * Gets the DaySchedule for the supplied physician id for the day
     * of the supplied date
     * 
     * 
     * @param date DateTime for the desired day
     * @return DaySchedule
     */
    public function getPhysicianScheduleForDay($physicianId, $date)
    {
        $schedule = array();
        $dayStart = clone($date)->setTime(07, 59); // Get the start of the day
        $dayEnd = clone($date)->setTime(20, 01); // Get the end of the day

        // Get the physicians appointments for the date
        $appointments = Appointment::where('physicianNumber', $physicianId)
                                   ->where('start_time', '>', strtotime($dayStart))
                                   ->where('start_time', '<', strtotime($dayEnd))
                                   ->get();

        $schedule = array_merge($schedule, $appointments);

        // Get the physicians avails
        $availabilities = Availability::where('physicianNumber', $physicianId);

        // extrapolate the availabilities to today
        foreach ($availabilities as $availability) {
            $extrapolated = ScheduleUtilities::getAvailabilityForDay($availability, $date);
            if ($extrapolated !== null) {
                $schedule = array_push($schedule, $extrapolated);
            }
        }

        return $schedule;
    }

    public function getPatientScheduleForDay($patientId, $date)
    {
        $schedule = array();
        $dayStart = clone($date)->setTime(07, 59); // Get the start of the day
        $dayEnd = clone($date)->setTime(20, 01); // Get the end of the day

        return Appointment::where('patient_id', $physicianId)
                                   ->where('start_time', '>', strtotime($dayStart))
                                   ->where('start_time', '<', strtotime($dayEnd))
                                   ->get();
    }
}
