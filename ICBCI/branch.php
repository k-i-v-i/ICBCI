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
          <a class="nav-link active" href="branch.php">Branches</a>
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
    <?php  
      if(isset($_GET['aname'])) {
        echo '<h2>Branches of '.$_GET['aname'].'</h2>';
      }else{
        echo '<h2>All Agency Branches</h2>';
      }

    ?>
    
    <table class="table table-striped ">
      <thead>
        <tr>
          <th scope="col">Agency Name (bcode)</th>
          <th scope="col">Agency Phone Number (bname)</th>
          <th scope="col">Agency Name (aname)</th>
          <th scope="col">Agency Phone Number (address)</th>
          <th scope="col" width="300px"><a href="branch_new.php" class="btn btn-dark">Create New Branch</a></th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(isset($_GET['aname'])){
          $aname = $_GET['aname'];
          $sql_statement = "SELECT * FROM agencybranches WHERE aname='$aname' ORDER BY aname desc";
          $branches   = mysqli_query($db, $sql_statement);
          foreach($branches as $branch){
            echo '<tr>';
            echo '<td>' . $branch['bcode'] . '</td>';
            echo '<td>' . $branch['bname'] . '</td>';
            echo '<td>' . $branch['aname'] . '</td>';
            echo '<td>' . $branch['address'] . '</td>';
            echo '<td><a href="customer.php?bcode='.$branch['bcode'].'" class="btn btn-secondary">Branch Customers</a>
                  <a href="branch_delete.php?bcode='.$branch['bcode'].'" class="btn btn-danger">DELETE</a></td>';
            echo '</tr>';
          }
        }else{
          $sql_statement = "SELECT bcode, bname, aname, address FROM agencybranches ORDER BY aname desc";
          $branches   = mysqli_query($db, $sql_statement);
          foreach($branches as $branch){
            echo '<tr>';
            echo '<td>' . $branch['bcode'] . '</td>';
            echo '<td>' . $branch['bname'] . '</td>';
            echo '<td>' . $branch['aname'] . '</td>';
            echo '<td>' . $branch['address'] . '</td>';
            echo '<td><a href="customer.php?bcode='.$branch['bcode'].'" class="btn btn-secondary">Branch Customers</a>
                  <a href="branch_delete.php?bcode='.$branch['bcode'].'" class="btn btn-danger">DELETE</a></td>';
            echo '</tr>';
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>