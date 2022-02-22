<?php
  include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <title>MAIN PAGE</title>
</head>

<body class="bg-light">
  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <div class="container">
    <a class="navbar-brand" href="#">ICBCI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="agency.php">Agencies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="branch.php">Branches</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="customer.php">Customer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="car.php">Cars</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="accident.php">Accidents</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="policy.php">Policies</a>
        </li>
      </ul>
    </div>
    </div>
  </nav>
  <!--/NAVBAR-->
  <div class="container bg-white p-3">
    <h2>New Accident</h2>
    <form class="p-4" action="accident_create.php" method="POST">
      <div class="form-group ">
        <label for="license_plate">License Plate:</label><br />
        <select class="custom-select col-12 p-2" id="license_plate" name="license_plate">
          <option selected>Choose...</option>
          <?php
            $sql_statement = "SELECT license_plate FROM customercars ORDER BY license_plate desc";
            $cars   = mysqli_query($db, $sql_statement);
            foreach($cars as $car){
              echo '<option value="'.$car['license_plate'].'">';
              echo $car['license_plate'];
              echo '</option>';
            }
          ?>
        </select>
      </div>
      <br />
      <div class="form-group">
        <label for="opponent_licensepl">Opponent License Plate:</label>
        <input type="text" class="form-control" id="opponent_licensepl" name="opponent_licensepl" placeholder="opponent_licensepl">
      </div>
      <br />
      <div class="form-group">
        <label for="location">Location:</label>
        <input type="text" class="form-control" id="location" name="location" placeholder="location">
      </div>
      <br />
      <div class="form-group ">
        <label for="accident_date">Accident Date:</label>
        <input type="date" class="form-control" id="accident_date" name="accident_date" placeholder="accident_date">
      </div>
      <br />
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>
</html>