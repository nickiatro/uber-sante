@extends('layouts.app')

@section('title' , 'View')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="row">
    <div class="col-md-12">
        <br />
        <center><h1>My Appointments</h1></center>
        <br />
        <table class='table table-bordered'>
            <tr>
                <th>Patient's name</th>
                <th>Date</th>
                <th>Start time</th>
                <th>End time</th>
                <th>Doctor</th>
                <th>Clinic</th>
                <th>Address</th>
                <th>Comments</th>
                <th>Modify/Delete an Appointment</th>
            </tr>
                <tr>
                    <td>data</td>
                    <td>data</td>
                    <td>data</td>
                    <td>data</td>
                    <td>data</td>
                    <td>data</td>
                    <td>data</td>
                    <td>data</td>
                    <td><button class="btn btn-primary">Modify</button>
                    <button class="btn btn-primary">Cancel</button></td>
                </tr>
        </table>
    </div>
</div>
@endsection