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
          <a class="nav-link active" href="customer.php">Customer</a>
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
    <?php  
      if(isset($_GET['bcode'])) {
        echo '<h2>Customers of '.$_GET['bcode'].'</h2>';
      }else{
        echo '<h2>All customers</h2>';
      }

    ?>
    
    <table class="table table-striped ">
      <thead>
        <tr>
          <th scope="col">Customer ID (cid)</th>
          <th scope="col">Customer Name (cname)</th>
          <th scope="col">Surname (surname)</th>
          <th scope="col" width="300px">
            <a href="customer_new.php" class="btn btn-dark">Create New Customer</a>
            <a href="branchcustomer_new.php" class="btn btn-secondary">Add Customer to Branch</a>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(isset($_GET['bcode'])){
          $bcode = $_GET['bcode'];
          $sql_statement = "SELECT C.cid, C.cname, C.surname FROM customer C, branchcustomers BC WHERE BC.bcode='$bcode' AND BC.cid=C.cid ORDER BY cid desc";
          $customers   = mysqli_query($db, $sql_statement);
          print_r(mysqli_error($db));
          foreach($customers as $customer){
            echo '<tr>';
            echo '<td>' . $customer['cid'] . '</td>';
            echo '<td>' . $customer['cname'] . '</td>';
            echo '<td>' . $customer['surname'] . '</td>';
            echo '<td><a href="car.php?cid='.$customer['cid'].'" class="btn btn-secondary">Cars</a>
                  <a href="branchcustomer_new.php?cid='.$customer['cid'].'" class="btn btn-dark">Add to a Branch</a>
                  <a href="customer_delete.php?cid='.$customer['cid'].'" class="btn btn-danger">DELETE</a></td>';
            echo '</tr>';
          }
        }else{
          $sql_statement = "SELECT cid, cname, surname FROM customer ORDER BY cid desc";
          $customers   = mysqli_query($db, $sql_statement);
          //print_r(mysqli_error($db));
          foreach($customers as $customer){
            echo '<tr>';
            echo '<td>' . $customer['cid'] . '</td>';
            echo '<td>' . $customer['cname'] . '</td>';
            echo '<td>' . $customer['surname'] . '</td>';
            echo '<td><a href="car.php?cid='.$customer['cid'].'" class="btn btn-secondary">Cars</a>
                  <a href="branchcustomer_new.php?cid='.$customer['cid'].'" class="btn btn-dark">Add to a Branch</a>
                  <a href="customer_delete.php?cid='.$customer['cid'].'" class="btn btn-danger">DELETE</a></td>';
            echo '</tr>';
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>