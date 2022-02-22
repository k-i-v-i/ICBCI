<?php

include "config.php";

if(isset($_POST['license_plate'])){

    $license_plate = $_POST['license_plate'];
    $opponent_licensepl = $_POST['opponent_licensepl'];
    $location = $_POST['location'];
    $accident_date = $_POST['accident_date'];

    $sql_statement = "INSERT INTO accidents(opponent_licensepl, location) VALUES ('$opponent_licensepl','$location')";
    $result = mysqli_query($db, $sql_statement);

    $accident_id = mysqli_insert_id($db);

    $sql_statement = "INSERT INTO caraccidents(license_plate, accident_id, accident_date) VALUES ('$license_plate','$accident_id','$accident_date')";
    $result = mysqli_query($db, $sql_statement);
    
    if (!$result) {
        printf("Error message: %s\n", mysqli_error($db));
      }else{
        header("Location: accident.php");
      }

}
else{
    echo "The form is not set.";
}


?>