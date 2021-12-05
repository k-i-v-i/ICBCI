<?php

include "config.php";

if(isset($_GET['bcode'])){

    $bcode = $_GET['bcode'];

    $sql_statement = "DELETE FROM agencybranches WHERE bcode='$bcode'";
    $result = mysqli_query($db, $sql_statement);
    
    if (!$result) {
        printf("Error message: %s\n", mysqli_error($db));
      }else{
        header("Location: branch.php");
      }

}
else{
    echo "The form is not set.";
}


?>