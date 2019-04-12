@extends('layouts.app')

@section('title' , 'Appointment Cart')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<?php

use App\Http\Controllers\BookAppointmentsController;

$appointments = BookAppointmentsController::showAppointmentsPhysician();
$cart = BookAppointmentsController::getCartContentPhysician(Auth::guard('physician')->user()->physicianNumber);

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
                <a href="{{route('appointment.removeFromCart', ['appointmentId'=> $c->id ])}}" class="btn btn-primary">Cancel</a>
                </td>
            </tr>
            @endforeach
        
        </table>

        <a class="btn btn-primary" href="{{route('physician-create-appointment')}}">Book Another Appointment</a>
        <a class="btn btn-primary" href="{{route('appointment.checkoutCartPhysician')}}">Checkout Cart</a>
        <a class="btn btn-primary" href="{{route('appointment.cancelTransactionPhysician')}}">Cancel Transaction</a>  
    </div>
</div>
@endsection