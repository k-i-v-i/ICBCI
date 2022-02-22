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
          <a class="nav-link active" href="accident.php">Accidents</a>
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
      if(isset($_GET['license_plate'])) {
        echo '<h2>Accidents of '.$_GET['license_plate'].'</h2>';
      }else{
        echo '<h2>All Accidents</h2>';
      }

    ?>
    
    <table class="table table-striped ">
      <thead>
        <tr>
          <th scope="col">Accident ID (accident_id)</th>
          <th scope="col">License Plate (license_plate)</th>
          <th scope="col">Opponent License Plate (opponent_licensepl)</th>
          <th scope="col">Location (location)</th>
          <th scope="col">Accident Date (accident_date)</th>
          <th scope="col" width="300px">
            <a href="accident_new.php" class="btn btn-dark">Add Accident</a>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(isset($_GET['license_plate'])){
          $license_plate = $_GET['license_plate'];
          $sql_statement = "SELECT A.accident_id, A.opponent_licensepl, A.location, CA.license_plate, CA.accident_date FROM accidents A, caraccidents CA WHERE A.accident_id=CA.accident_id AND CA.license_plate='$license_plate' ORDER BY license_plate desc";
          $cars   = mysqli_query($db, $sql_statement);
          print_r(mysqli_error($db));
          foreach($cars as $car){
            echo '<tr>';
            echo '<td>' . $car['accident_id'] . '</td>';
            echo '<td>' . $car['license_plate'] . '</td>';
            echo '<td>' . $car['opponent_licensepl'] . '</td>';
            echo '<td>' . $car['location'] . '</td>';
            echo '<td>' . $car['accident_date'] . '</td>';
            echo '<td>
                  <a href="policy.php?license_plate='.$car['license_plate'].'" class="btn btn-secondary">Policy</a>
                  <a href="accident_delete.php?accident_id='.$car['accident_id'].'" class="btn btn-danger">DELETE</a></td>';
            echo '</tr>';
          }
        }elseif(isset($_GET['pid'])){
          $pid = $_GET['pid'];
          $sql_statement = "SELECT A.accident_id, A.opponent_licensepl, A.location, CA.license_plate, CA.accident_date FROM accidents A, caraccidents CA, policyaccidents PA WHERE A.accident_id=CA.accident_id AND A.accident_id=PA.accident_id AND PA.pid='$pid' ORDER BY license_plate desc";
          $cars   = mysqli_query($db, $sql_statement);
          print_r(mysqli_error($db));
          foreach($cars as $car){
            echo '<tr>';
            echo '<td>' . $car['accident_id'] . '</td>';
            echo '<td>' . $car['license_plate'] . '</td>';
            echo '<td>' . $car['opponent_licensepl'] . '</td>';
            echo '<td>' . $car['location'] . '</td>';
            echo '<td>' . $car['accident_date'] . '</td>';
            echo '<td>
                  <a href="policy.php?license_plate='.$car['license_plate'].'" class="btn btn-secondary">Policy</a>
                  <a href="accident_delete.php?accident_id='.$car['accident_id'].'" class="btn btn-danger">DELETE</a></td>';
            echo '</tr>';
          }
        }else{
          $sql_statement = "SELECT A.accident_id, A.opponent_licensepl, A.location, CA.license_plate, CA.accident_date FROM accidents A, caraccidents CA WHERE A.accident_id=CA.accident_id ORDER BY license_plate desc";
          $cars   = mysqli_query($db, $sql_statement);
          print_r(mysqli_error($db));
          foreach($cars as $car){
            echo '<tr>';
            echo '<td>' . $car['accident_id'] . '</td>';
            echo '<td>' . $car['license_plate'] . '</td>';
            echo '<td>' . $car['opponent_licensepl'] . '</td>';
            echo '<td>' . $car['location'] . '</td>';
            echo '<td>' . $car['accident_date'] . '</td>';
            echo '<td>
                  <a href="policy.php?license_plate='.$car['license_plate'].'" class="btn btn-secondary">Policy</a>
                  <a href="accident_delete.php?accident_id='.$car['accident_id'].'" class="btn btn-danger">DELETE</a></td>';
            echo '</tr>';
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>