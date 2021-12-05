<?php

include "config.php";

if(isset($_POST['cname'])){

    $cname = $_POST['cname'];
    $surname = $_POST['surname'];

    $sql_statement = "INSERT INTO customer(cname, surname) VALUES ('$cname','$surname')";
    $result = mysqli_query($db, $sql_statement);
    
    if (!$result) {
        printf("Error message: %s\n", mysqli_error($db));
      }else{
        header("Location: customer.php");
      }

}
else{
    echo "The form is not set.";
}


?>