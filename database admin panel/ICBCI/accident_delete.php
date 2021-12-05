<?php

include "config.php";

if(isset($_GET['accident_id'])){

    $accident_id = $_GET['accident_id'];

    $sql_statement = "DELETE FROM accidents WHERE accident_id='$accident_id'";
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