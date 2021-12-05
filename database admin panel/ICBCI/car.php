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
          <a class="nav-link active" href="car.php">Cars</a>
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
    <?php  
      if(isset($_GET['cid'])) {
        echo '<h2>Cars of '.$_GET['cid'].'</h2>';
      }else{
        echo '<h2>All Cars</h2>';
      }

    ?>
    
    <table class="table table-striped ">
      <thead>
        <tr>
          <th scope="col">License Plate (license_plate)</th>
          <th scope="col">Type (type)</th>
          <th scope="col">Brand (brand)</th>
          <th scope="col">Model (model)</th>
          <th scope="col">Customer ID (cid)</th>
          <th scope="col" width="300px">
            <a href="car_new.php" class="btn btn-dark">Add Car</a>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(isset($_GET['cid'])){
          $cid = $_GET['cid'];
          $sql_statement = "SELECT license_plate, type, brand, model, cid FROM customercars WHERE cid='$cid' ORDER BY license_plate desc";
          $cars   = mysqli_query($db, $sql_statement);
          print_r(mysqli_error($db));
          foreach($cars as $car){
            echo '<tr>';
            echo '<td>' . $car['license_plate'] . '</td>';
            echo '<td>' . $car['type'] . '</td>';
            echo '<td>' . $car['brand'] . '</td>';
            echo '<td>' . $car['model'] . '</td>';
            echo '<td>' . $car['cid'] . '</td>';
            echo '<td>
                  <a href="accident.php?license_plate='.$car['license_plate'].'" class="btn btn-dark">Accidents</a>
                  <a href="car_delete.php?license_plate='.$car['license_plate'].'" class="btn btn-danger">DELETE</a></td>';
            echo '</tr>';
          }
        }elseif(isset($_GET['pid'])){
          $pid = $_GET['pid'];
          $sql_statement = "SELECT CA.license_plate, CA.type, CA.brand, CA.model, CA.cid FROM customercars CA, carpolicies CP WHERE CP.pid='$pid' AND CP.license_plate=CA.license_plate ORDER BY license_plate desc";
          $cars   = mysqli_query($db, $sql_statement);
          print_r(mysqli_error($db));
          foreach($cars as $car){
            echo '<tr>';
            echo '<td>' . $car['license_plate'] . '</td>';
            echo '<td>' . $car['type'] . '</td>';
            echo '<td>' . $car['brand'] . '</td>';
            echo '<td>' . $car['model'] . '</td>';
            echo '<td>' . $car['cid'] . '</td>';
            echo '<td>
                  <a href="accident.php?license_plate='.$car['license_plate'].'" class="btn btn-dark">Accidents</a>
                  <a href="car_delete.php?license_plate='.$car['license_plate'].'" class="btn btn-danger">DELETE</a></td>';
            echo '</tr>';
          }          
        }else{
          $sql_statement = "SELECT license_plate, type, brand, model, cid FROM customercars ORDER BY license_plate desc";
          $cars   = mysqli_query($db, $sql_statement);
          //print_r(mysqli_error($db));
          foreach($cars as $car){
            echo '<tr>';
            echo '<td>' . $car['license_plate'] . '</td>';
            echo '<td>' . $car['type'] . '</td>';
            echo '<td>' . $car['brand'] . '</td>';
            echo '<td>' . $car['model'] . '</td>';
            echo '<td>' . $car['cid'] . '</td>';
            echo '<td>
                  <a href="accident.php?license_plate='.$car['license_plate'].'" class="btn btn-secondary">Accidents</a>
                  <a href="car_delete.php?license_plate='.$car['license_plate'].'" class="btn btn-danger">DELETE</a></td>';
            echo '</tr>';
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>