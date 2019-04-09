@extends('layouts.app')
<?php

use Illuminate\Support\Facades\DB;

if(!isset($_SESSION)){
        session_start();
    }
?>
<!doctype html>
<html>
<head>
    <title>Create Availability</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
<style>
   html, body {
    background-color: #fff;
    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font-weight: 400;
    height: 100vh;
    margin: 0;
    }
</style>
</head>
<body>
<?php
$patientErr = $doctorErr = $typeErr = $dateErr = $timeErr= "";
$patientId = $doctorId = $walkIn = $annual  = $date = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["doctor-id"])) {
        $doctorErr = "Doctor ID is required";
    } else {
        $doctorId = test_input($_POST["doctor-id"]);
        if ((!preg_match("/^[0-9][0-9]*$/",$doctorId))||(strlen($_POST["doctor-id"])) != 7) {
            $doctorErr = "Please enter a valid Physician Permit Number (e.g., 2345679)";
        }
    }
    if (($_POST["date"]) == null) {
        $dateErr = "Please select a date";
    } else {
        $date = test_input($_POST["date"]);
    }

    if (($_POST["times"]) == null) {
        $timeErr = "Please select a time";
    } else {
        $time = test_input($_POST["times"]);
    }

    if (($_POST["appointment-type"]) == "null") {
        $typeErr = "Please select a type";
    }
    else if (($_POST["appointment-type"]) == "walk-in") {
        $walkIn = "selected";
    }
    else if (($_POST["appointment-type"]) == "annual-checkup") {
        $annual = "selected";
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$duration = 0;

if ($walkIn == "selected"){
    $duration = 20;
}
else if ($annual == "selected") {
    $duration = 60;
}

$time = "";

if ($time == "") {
    $time = "<option>Choose Another Date</option>";
}

if (Auth::user()->healthCard != null) {
    $patientId = Auth::user()->healthCard;
}

if (array_key_exists("add-to-cart-button", $_POST)) {
    DB::table('availabilities')->insert(  [
        'physicianNumber' => $doctorId,
        'start_time' => $date,
        'duration' => $duration . " " . $time,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')]);
    header("Location: /createAvailability");
    exit;
}
?>
@section('content')
<h1 id="header" class="text-center">
    Create Availabilities
</h1>

<div class="col-lg-4 col-lg-offset-4">

<script> $('#datepicker').datepicker({
    daysOfWeekDisabled: [0,6];
});</script>

    <form method= "post" action="{{route('createAvailability')}}">
        @csrf
        <div class="form-group">
            <label for="date">Physician Permit Number</label>
            <input class="form-control" type="text" name="doctor-id" value="<?php echo $doctorId?>" required>
            <span class="error" style="color: red;"><?php echo $doctorErr;?></span>
        </div>
        <div class="form-group">
        <label for="date">Choose an Appointment Date</label>
            <input class="form-control" type="date" id="date" name="date" 
            min="<?php date_default_timezone_set('America/Toronto'); 
            echo date("Y-m-d");?>" value="<?php echo $date;?>" required>
            <span class="error" style="color:red;"><?php echo $dateErr;?></span>
        </div>

        <div>
            <label for="times">Select Appointment Time</label>
            <input class="form-control" value="08:00" type="time" id="times" name="times" 
            min="<?php  
            echo date("H:i");?>" value="<?php echo $time;?>" required>
            <span class="error" style="color:red;"><?php echo $timeErr;?></span>
        </div>

        <div class="form-group">
          <label for="appointment-type">Select the Appointment Type</label>
          <select class="form-control" id="appointment-type" name="appointment-type" required>
              <option value="null">Select Type</option>
              <option value="walk-in" <?php echo $walkIn;?>>Walk-In Visit (20 minutes)</option>
              <option value= "annual-checkup" <?php echo $annual;?>>Annual Checkup (60 minutes)</option>
          </select>
            <span class="error" style="color: red;"><?php echo $typeErr;?></span>
        </div>

        <div class="form-group">
            <input type="submit" name="add-to-cart-button" id="add-to-cart-button" class="btn btn-primary" value="Add Availability">
        </div>
    </form>
</div>
</body>
@endsection
</html>