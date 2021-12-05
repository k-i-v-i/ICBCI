<?php

include "config.php";

if(isset($_GET['license_plate'])){

    $license_plate = $_GET['license_plate'];

    $sql_statement = "DELETE FROM customercars WHERE license_plate='$license_plate'";
    $result = mysqli_query($db, $sql_statement);
    
    if (!$result) {
        printf("Error message: %s\n", mysqli_error($db));
      }else{
        header("Location: car.php");
      }

}
else{
    echo "The form is not set.";
}


?>