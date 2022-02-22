<?php

include "config.php";

if(isset($_POST['license_plate'])){

    $license_plate = $_POST['license_plate'];
    $type = $_POST['type'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $cid = $_POST['cid'];

    $sql_statement = "INSERT INTO customercars(license_plate, type, brand, model, cid) VALUES ('$license_plate','$type','$brand','$model','$cid')";
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