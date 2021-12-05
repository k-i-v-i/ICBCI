<?php

include "config.php";

if(isset($_POST['aname'])){

  $aname = $_POST['aname'];
  $bname = $_POST['bname'];
  $address = $_POST['address'];

  $sql_statement = "INSERT INTO AgencyBranches(aname, address, bname) VALUES ('$aname','$address','$bname')";
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