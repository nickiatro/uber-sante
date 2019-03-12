<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
   html, body {
    background-color: #fff;
    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font-weight: 200;
    height: 100vh;
    margin: 0;
    }

</style>
</head>
<body>
<?php
$patientErr = $doctorErr = $typeErr = $dateErr = "";
$patientId = $doctorId = $type = $date = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["doctor-id"])) {
        $doctorErr = "Doctor ID is required";
    } else {
        $doctorId = test_input($_POST["doctor-id"]);
        if (!preg_match("/[0-9]/",$doctorId)) {
            $doctorErr = "Please enter a valid ID";
        }
    }

    if (empty($_POST["patient-id"])) {
        $patientErr = "Patient ID is required";
    } else {
        $patientId = test_input($_POST["patient-id"]);
        if (!preg_match("/[0-9]/",$patientId)) {
            $patientErr = "Please enter a valid ID";
        }
    }

    if (($_POST["date"]) == null) {
        $dateErr = "Please select a date";
    } else {
        $date = test_input($_POST["date"]);
    }

    if (($_POST["appointment-type"]) == "null") {
        $typeErr = "Please select a type";
    } else {
        $type = test_input($_POST["appointment-type"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2 id="header" class="text-center" style="padding-bottom: 5%;">
    Search for Availabilities
</h2>

<div class="col-lg-4 col-lg-offset-4">

    <form method= "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <label for="date">Patient ID</label>
            <input class="form-control" type="text" name="patient-id" value="<?php echo $patientId;?>" required>
            <span class="error" style="color: red;"><?php echo $patientErr;?></span>
        </div>
        <div class="form-group">
            <label for="date">Doctor ID</label>
            <input class="form-control" type="text" name="doctor-id" value="<?php echo $doctorId?>"required>
            <span class="error" style="color: red;"><?php echo $doctorErr;?></span>
        </div>
        <div class="form-group">
            <label for="date">Choose an Appointment Date</label>
            <input class="form-control" type="date" name="date" value="<?php echo $date; ?>" required>
            <span class="error" style="color:red;"><?php echo $dateErr;?></span>
        </div>
        <div class="form-group">
          <label for="appointment-type">Select the Appointment Type</label>
          <select class="form-control" name="appointment-type" value="<?php echo $type;?>"required>
              <option value="null">Select Type</option>
              <option value="walk-in">Walk-In Clinic (20 minutes)</option>
              <option value= "annual-checkup">Annual Checkup (60 minutes)</option>
          </select>
            <span class="error" style="color: red;"><?php echo $typeErr;?></span>
        </div>
        <input type="submit" id="button" class="btn" value="Submit">
    </form>

</div>

</body>
<script type="text/javascript">
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    if(dd < 10){
        dd ='0'+ dd
    }
    if(mm < 10){
        mm ='0'+ mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("date").setAttribute("min", today);

    document.getElementById("button").addEventListener("click", function(){

    });

</script>
</html>