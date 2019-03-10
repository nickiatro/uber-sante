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
<h2 id="header" class="text-center" style="padding-bottom: 5%;">
    Search for Availabilities
</h2>
<div class="col-lg-4 col-lg-offset-4">
    <form class="needs-validation" novalidate>
        <div class="form-group">
            <label for="date">Choose an Appointment Date</label>
            <input class="form-control" type="date" id="date">
        </div>
        <div class="form-group">
          <label for="appointment-type">Select the Appointment Type</label>
          <select class="form-control" id="appointment-type">
            <option value="walk-in">Walk-In Clinic (20 minutes)</option>
            <option value= "annual-checkup">Annual Checkup (60 minutes)</option>
          </select>
        </div>
        <input type="button" class="btn" value="Submit">
    </form>
</div>
</body>
</html>