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
    <title>Create Appointment</title>
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
$doctorErr = $typeErr = $dateErr = "";
$doctorId = $walkIn = $annual  = $date = "";
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

$visible = "display:none;";
$times = "";
if (($doctorId != "" && $date != "" && $doctorErr == "" && $typeErr == "" && $dateErr == "")) {
        $visible = "";
}

$times = '<option value="10:00:00">10:00 AM</option> <br /> <option value="10:30:00">10:30 AM</option>';

if ($times == "") {
    $times = "<option>Choose Another Date</option>";
}

$clinic_id = 0;

$Medistat = $Super = $Alpha = $Diamant = $MediSys = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (($_POST["clinic_id"]) == "1") {
        $Medistat = "selected";
    }
    else if (($_POST["clinic_id"]) == "2") {
        $Super = "selected";
    }
    else if (($_POST["clinic_id"]) == "3") {
        $Alpha = "selected";
    }

    else if (($_POST["clinic_id"]) == "4") {
        $Diamant = "selected";
    }


    else if (($_POST["clinic_id"]) == "5") {
        $MediSys = "selected";
    }

}

if ($Medistat == "selected"){
    $clinic_id = 1;
}
else if ($Super == "selected"){
    $clinic_id = 2;
}
else if ($Alpha == "selected"){
    $clinic_id = 3;
}
else if ($Diamant == "selected"){
    $clinic_id = 4;
}
else if ($MediSys == "selected"){
    $clinic_id = 5;
}


if (array_key_exists("add-to-cart-button", $_POST)) {
    date_default_timezone_set('America/Toronto');
    DB::table('cart_appointments')->insert(  [
        'clinic_id' => $clinic_id,
        'start_time' => $date . " " . $_POST["times"],
        'duration' => $duration,
        'healthCard' => Auth::user()->healthCard,
        'physicianNumber' => $doctorId,
        'room_id' => rand(1,5),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')]);
    header("Location: /addToCart");
    exit;
}
?>
@section('content')
<h1 id="header" class="text-center">
    Search for Availabilities
</h1>

<div class="col-lg-4 col-lg-offset-4">

    <form method= "post" action="{{route('patient-create-appointment')}}">
        @csrf
        <div class="form-group">
            <label for="date">Physician Permit Number</label>
            <input class="form-control" type="text" name="doctor-id" value="<?php echo $doctorId?>" required>
            <span class="error" style="color: red;"><?php echo $doctorErr;?></span>
        </div>
        <div class="form-group">
            <label for="date">Choose an Appointment Date</label>
            <input class="form-control" type="date" id="date" name="date" 
			min="<?php date_default_timezone_set('America/Toronto'); echo date("Y-m-d");?>" 
			max='2030-12-31' 
			value="<?php echo $date;?>" required>
            <span class="error" style="color:red;"><?php echo $dateErr;?></span>
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
        <label for="clinic_id">Select the Clinic</label>
                                <select id="clinic_id" class="form-control" 
                                name="clinic_id" required>
                                    <option value="1"<?php echo $Medistat;?>>Medistat</option>
                                    <option value="2"<?php echo $Super;?>>Super-Clinic</option>
                                    <option value="3"<?php echo $Alpha;?>>Alpha Clinic</option>
                                    <option value="4"<?php echo $Diamant;?>>Diamant Clinic</option>
                                    <option value="5"<?php echo $MediSys;?>>MediSys</option>
                                </select>

                                @if ($errors->has('clinic_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('clinic_id') }}</strong>
                                    </span>
                                @endif
                            </div>
        <div class="form-group">
        <input type="submit" id="search-button" class="btn btn-primary" value="Search">
        </div>
        <div class="form-group">
        <div style="<?php echo $visible;?>">
            <label for="times">Select Appointment Time</label>
            <select id="times" name="times" class="form-control">
                <?php echo $times?>
            </select>
        </div>
        </div>
        <div class="form-group">
            <input style="<?php echo $visible;?>" type="submit" name="add-to-cart-button" id="add-to-cart-button" class="btn btn-primary" value="Add to Cart">
        </div>
    </form>
</div>
</body>
@endsection
</html>