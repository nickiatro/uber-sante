@extends('layouts.app')

@section('title' , 'Availabilities')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<?php

use App\Http\Controllers\AvailabilityController;

$availabilities = AvailabilityController::showAvailability();

?>


<div class="row">
    <div class="col-md-12">
        <br />
        <center><h1>My Availabilities</h1></center>
        <br />
        <table class='table table-bordered'>
            <tr style="text-align:center">

                <th>Physician</th>
                <th>Date & Time</th>
                <th>Duration</th>
            </tr>
            @foreach($availabilities as $availability)
            <tr>
            
                <td>{{$availability->physicianNumber}}</td>
                <td>{{$availability->start_time}}</td>
                <td>{{$availability->duration}}</td>

                <td><a class="btn btn-primary">Modify</a>
                <a class="btn btn-primary" href="{{route('availability.removeAvailability', ['availabilityId'=> $availability->id ])}}">Remove</a></td>
                
                </tr>
                @endforeach
        </table>

        
    </div>
</div>
@endsection