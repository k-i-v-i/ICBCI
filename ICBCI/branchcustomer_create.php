<?php

include "config.php";

if(isset($_POST['bcode'])){

    $bcode = $_POST['bcode'];
    $cid = $_POST['cid'];

    $sql_statement = "INSERT INTO branchcustomers(bcode, cid) VALUES ('$bcode','$cid')";
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