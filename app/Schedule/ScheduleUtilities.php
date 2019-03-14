<?php

class ScheduleUtilities
{
    /**
     * Given a weekly availability, return an array of availabilities for this
     * particular day
     * 
     * @return Availability 
     */
    public static function getAvailabilityForDay($availability, $dateTime)
    {
        $extrapolated = $availability.getStartTime();
        $dayStart = clone($dateTime)->setTime(07, 59);
        $dayEnd = clone($dateTime)->setTime(20, 01);
        $past = strtotime($availability.getStartTime()) > strtotime($dateTime);

        while (strtototime($extrapolated) > strtotime($dateTime)) {
            // Check if the time falls within the current day
            if (strtotime($extrapolated) > strtotime($dayStart) && strtotime($extrapolated) < strtotime($dayEnd)) {
                $todaysAvailability = new Availability;
                $todaysAvailability->start_time = $extrapolated;
                $todaysAvailability->duration = $availability->duration;

                return $todaysAvailability;
            }
            $extrapolated->add(new DateInterval('P7D')); // advance one week
        }
        return null;
    }

    public static function hasAppointment($scheduleItems, $unixTime, $durationMinutes)
    {
        
    }

    public static function hasAvailability($scheduleItems, $dateTime, $duration)
    {

    }
}
