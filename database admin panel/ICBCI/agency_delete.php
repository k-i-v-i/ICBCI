<?php

include "config.php";

if(isset($_GET['aname'])){

    $aname = $_GET['aname'];

    $sql_statement = "DELETE FROM agency WHERE aname='$aname'";
    $result = mysqli_query($db, $sql_statement);
    
    if (!$result) {
        printf("Error message: %s\n", mysqli_error($db));
      }else{
        header("Location: agency.php");
      }

}
else{
    echo "The form is not set.";
}


?>