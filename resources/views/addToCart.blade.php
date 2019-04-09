@extends('layouts.app')

@section('title' , 'Appointment Cart')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<?php

use App\Http\Controllers\BookAppointmentsController;

$appointments = BookAppointmentsController::showAppointments();
$cart = BookAppointmentsController::getCartContent(Auth::user()->healthCard);

?>


<div class="row">
    <div class="col-md-12">
        <br />
        <center><h1>Appointment Cart</h1></center>
        <br />
        <table class='table table-bordered'>
            <tr style="text-align:center">
            
                <th>Clinic ID</th>
                <th>Date & Time</th>
                <th>Duration</th>
                <th>Patient Health Card Number</th>
                <th>Physician Number</th>
                <th>Room Number</th>
            </tr>
            @foreach($cart as $c)
            <tr>
            
                <td>{{$c->clinic_id}}</td>
                <td>{{$c->start_time}}</td>
                <td>{{$c->duration}}</td>
                <td>{{$c->healthCard}}</td>
                <td>{{$c->physicianNumber}}</td>
                <td>{{$c->room_id}}</td>
            
                <td>
                <a class="btn btn-primary">Modify</a>
                    <a class="btn btn-primary" href="{{route('appointment.cancelAppointment', ['appointmentId'=> $appointment->id ])}}">Cancel</a>
                </td>
            </tr>
            @endforeach
        
        </table>

        <a class="btn btn-primary" href="{{route('patient-create-appointment')}}">Book Another Appointment</a>
        <a class="btn btn-primary" href="{{route('appointment.checkoutCart')}}">Checkout Cart</a>
        <a class="btn btn-primary" href="{{route('appointment.cancelTransaction')}}">Cancel Transaction</a>  
    </div>
</div>
@endsection