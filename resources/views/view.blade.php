@extends('layouts.app')

@section('title' , 'View')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<?php

use App\Http\Controllers\BookAppointmentsController;

$appointments = BookAppointmentsController::showAppointments();
$cart = BookAppointmentsController::getCartContent(Auth::user()->id);


?>


<div class="row">
    <div class="col-md-12">
        <br />
        <center><h1>My Appointments</h1></center>
        <br />
        <table class='table table-bordered'>
            <tr>
            
                <th>Clinic ID</th>
                <th>Start Time</th>
                <th>Duration</th>
                <th>Patient ID</th>
                <th>Physician ID</th>
                <th>Room</th>
            </tr>
            @foreach($appointments as $appointment)
            <tr>
            
                <td>{{$appointment->clinic_id}}</td>
                <td>{{$appointment->start_time}}</td>
                <td>{{$appointment->duration}}</td>
                <td>{{$appointment->patient_id}}</td>
                <td>{{$appointment->physicianNumber}}</td>
                <td>{{$appointment->room_id}}</td>

                <td><a class="btn btn-primary">Modify</a>
                <a class="btn btn-primary" href="{{route('appointment.cancelAppointment')}}">Cancel</a></td>
                
                </tr>
                @endforeach
        </table>

        
    </div>
</div>
@endsection