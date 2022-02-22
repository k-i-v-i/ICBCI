<?php

include "config.php";

if(isset($_POST['policy_type'])){

    $policy_type = $_POST['policy_type'];
    $cost = $_POST['cost'];

    $sql_statement = "INSERT INTO policy(policy_type, cost) VALUES ('$policy_type','$cost')";
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