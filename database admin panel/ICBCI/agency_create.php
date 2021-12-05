<?php

include "config.php";

if(isset($_POST['aname'])){

    $aname = $_POST['aname'];
    $phone = $_POST['phone'];

    $sql_statement = "INSERT INTO agency(aname, phone) VALUES ('$aname','$phone')";
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