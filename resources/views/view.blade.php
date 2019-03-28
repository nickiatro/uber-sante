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
            
                <th>clinic id</th>
                <th>start time</th>
                <th>duration</th>
                <th>patient id</th>
                <th>physician id</th>
                <th>room id</th>
            </tr>
            @foreach($appointments as $appointment)
            <tr>
            
                <td>{{$appointment->clinic_id}}</td>
                <td>{{$appointment->start_time}}</td>
                <td>{{$appointment->duration}}</td>
                <td>{{$appointment->patient_id}}</td>
                <td>{{$appointment->physicianNumber}}</td>
                <td>{{$appointment->room_id}}</td>
                
                </tr>
                @endforeach

        </table>

        <button class="btn btn-primary">Modify</button>
        <button class="btn btn-primary">Cancel</button>
    </div>
</div>
@endsection