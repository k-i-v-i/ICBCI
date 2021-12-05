<?php

include "config.php";

if(isset($_GET['cid'])){

    $cid = $_GET['cid'];

    $sql_statement = "DELETE FROM customer WHERE cid='$cid'";
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