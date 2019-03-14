<!doctype html>
<head>
<title>Payment Method</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<h1 class="text-center"> Payment Method</h1>
<div class="col-lg-4 col-lg-offset-4">
<form>
       <div class="form-group">
            <label for="date">Full Name</label>
            <input class="form-control" type="text" name="full Name" value="Harry Potter">
       </div>

       <div class="form-group">
          <label for="PaymentMethod">Choice of Payment</label>
          <select class="form-control" name="payment" required>
              <option value="null">Payment Type</option>
              <option value="Master Card">Master Card</option>
              <option value= "American Express"> American Express</option>
              <option value="Visa">Visa</option>
          </select>
        </div>

       <div class="form-group">
            <label for="date">Credit Card Number</label>
            <input class="form-control" type="text" name="credit card number" value="12345236">
        </div>

        <div class="form-group">
            <label for="date">Expiry Date</label>
            <input class="form-control" type="text" name="Expiry Date" value="dd/mm/yyyy">
        </div>
        <div>
        <input type="submit" class="btn btn-primary" value="Confirm Payment">
        </div>
</form>
</div>
</body>
</html>