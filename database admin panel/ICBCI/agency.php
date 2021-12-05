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
          <a class="nav-link active" href="agency.php">Agencies</a>
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
    <h2>Agencies</h2>
    <table class="table table-striped ">
      <thead>
        <tr>
          <th scope="col">Agency Name (aname)</th>
          <th scope="col">Agency Phone Number (phone)</th>
          <th scope="col" width="300px"><a href="agency_new.php" class="btn btn-dark">Create New Agency</a></th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql_statement = "SELECT aname, phone FROM agency ORDER BY aname desc";
          $agencies   = mysqli_query($db, $sql_statement);
          foreach($agencies as $agency){
            echo '<tr>';
            echo '<td>' . $agency['aname'] . '</td>';
            echo '<td>' . $agency['phone'] . '</td>';
            echo '<td><a href="branch.php?aname='.$agency['aname'].'" class="btn btn-secondary">Branches</a>
                  <a href="agency_delete.php?aname='.$agency['aname'].'" class="btn btn-danger">DELETE</a></td>';
            echo '</tr>';
          }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>