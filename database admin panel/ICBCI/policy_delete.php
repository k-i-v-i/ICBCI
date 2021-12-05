<?php

include "config.php";

if(isset($_GET['pid'])){

    $pid = $_GET['pid'];

    $sql_statement = "DELETE FROM policy WHERE pid='$pid'";
    $result = mysqli_query($db, $sql_statement);
    
    if (!$result) {
        printf("Error message: %s\n", mysqli_error($db));
      }else{
        header("Location: policy.php");
      }

}
else{
    echo "The form is not set.";
}


?>