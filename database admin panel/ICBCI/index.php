<!DOCTYPE html>
<html>
<head>
        <title>MAIN PAGE</title>
</head>

<body>
    <div align="center">
    <b>Welcome to ICBCI Administration Panel</b>
    <br>
    <br>
    
    
    <form action="sendinfo.php" method="POST">
        <input type="text" name="aname" placeholder="Agency Name"><br>
        <input type="text" name="phone" placeholder="Agency Phone"><br>
        <input type="number" name="bcode" placeholder="Branch Code"><br>
        <input type="text" name="bname" placeholder="Branch Name"><br>
        <input type="text" name="address" placeholder="Branch Address"><br>
        <input type="text" name="cname" placeholder="Customer Name"><br>
        <input type="text" name="surname" placeholder="Customer Surname"><br>
        <input type="text" name="license_plate" placeholder="License Plate"><br>
        <input type="text" name="type" placeholder="Type"><br>
        <input type="text" name="brand" placeholder="Brand"><br>
        <input type="number" name="model" placeholder="Model"><br>
        <input type="text" name="policy_type" placeholder="Policy Type"><br>
        <input type="number" name="cost" placeholder="Policy Cost"><br>
        <input type="date" name="begin_date" placeholder="Begin Date of the Policy"><br>
        <input type="text" name="opponent_licensepl" placeholder="Opponent's License Plate"><br>
        <input type="text" name="location" placeholder="Accident Location"><br>
        <input type="date" name="accident_date" placeholder="Accident Date"><br>
        <button>Insert</button>
    </form>
    </div>
</body>
</html>