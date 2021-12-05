<?php

include "config.php";

/*$aname = $_POST['aname'];
$phone = $_POST['phone'];

$sql_statement = "INSERT INTO agency(aname, phone) VALUES ('$aname','$phone')";
$result = mysqli_query($db, $sql_statement);
echo $result;*/

if(isset($_POST['aname'])){

    $aname = $_POST['aname'];
    $phone = $_POST['phone'];
    $bcode = $_POST['bcode'];
    $bname = $_POST['bname'];
    $address = $_POST['address'];
    $cname = $_POST['cname'];
    $surname = $_POST['surname'];
    $license_plate = $_POST['license_plate'];
    $type = $_POST['type'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $opponent_licensepl = $_POST['opponent_licensepl'];
    $location = $_POST['location'];
    $policy_type = $_POST['policy_type'];
    $cost = $_POST['cost'];
    $begin_date = $_POST['begin_date'];
    $accident_date = $_POST['accident_date'];


    $sql_statement = "INSERT INTO agency(aname, phone) VALUES ('$aname','$phone')";
    $result = mysqli_query($db, $sql_statement);
    $sql_statement = "INSERT INTO AgencyBranches(aname, bcode, address) VALUES ('$aname','$bcode','$address')";
    $result = mysqli_query($db, $sql_statement);
    $sql_statement = "INSERT INTO customer(cname, surname) VALUES ('$cname','$surname')";
    $result = mysqli_query($db, $sql_statement);
    $sql_statement = "INSERT INTO accidents(opponent_licensepl, location) VALUES ('$opponent_licensepl','$location')";
    $result = mysqli_query($db, $sql_statement);
    $sql_statement = "INSERT INTO policy(policy_type, cost) VALUES ('$policy_type','$cost')";
    $result = mysqli_query($db, $sql_statement);

    $sql_statement = "SELECT C.cid, A.accident_id, P_pid 
    FROM customer C, accidents A, policy P 
    WHERE (C.cname = '$cname' AND C.surname = '$surname') AND 
    (A.location = '$location' AND A.accident_date = '$accident_date') AND
    (P.policy_type = '$policy_type' AND P.cost = '$cost')";
    $result = mysqli_query($db,$sql_statement);
    $cid = $result['cid'];
    $accident_id = $result['accident_id'];
    $pid = $result['pid'];
    echo $cid . " ". $pid . " ". $accident_id;

    
    $sql_statement = "INSERT INTO BranchCustomers(bcode,cid) VALUES ('$bcode','$cid')";
    $result = mysqli_query($db, $sql_statement);
    $sql_statement = "INSERT INTO CustomerCars(cid,license_plate, type, brand, model) VALUES ('$cid','$license_plate','$type','$brand', '$model')";
    $result = mysqli_query($db, $sql_statement);
    $sql_statement = "INSERT INTO CarAccidents(accident_id, accident_date, license_plate) VALUES ('$accident_id','$accident_date','$license_plate')";
    $result = mysqli_query($db, $sql_statement);
    $sql_statement = "INSERT INTO CarPolicies(pid, license_plate, begin_date) VALUES ('$pid','$license_plate','$begin_date')";
    $result = mysqli_query($db, $sql_statement);
    
}
else{
    echo "The form is not set.";
}


?>