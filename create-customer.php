<?php
session_start();
date_default_timezone_set('Europe/Istanbul');
if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
    database();
}

function database(){
    $namesurname = $_POST["name-surname"];
    $phone = $_POST["phone"];
    $adress = $_POST["address"];
    $trackingno = $_POST["tracking-no"];
    $staff = $_POST["staff"];
    $ip = $_SERVER['REMOTE_ADDR'];
    $time = date("d/m/Y");
    $default_status = "Received";
    if (isset($_POST["name-surname"])){
        Check($trackingno, $namesurname, $phone, $ip, $adress, $staff, $time, $default_status);
    }
}


function Check($trackingno, $namesurname, $phone, $ip, $adress, $staff, $time, $default_status){
    $link = mysqli_connect("localhost", "root", "12345678", "mixas");
    $checkTrackno = "SELECT * FROM cargolist WHERE trackingno='$trackingno';";
    $result = mysqli_query($link, $checkTrackno);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            warn("This cargo number already exists");
        }
      } else {
        createCustomer($trackingno, $namesurname, $phone, $ip, $adress, $staff, $time, $default_status);
    }
    mysqli_close($link);
}

function createCustomer($trackingno, $namesurname, $phone, $ip, $adress, $staff, $time, $default_status){
    $link = mysqli_connect("localhost", "root", "12345678", "mixas");
    $sql = "INSERT INTO cargolist (trackingno, namesurname, phone, ip, adress, staff, time,status) VALUES ('$trackingno', '$namesurname','$phone', '$ip','$adress', '$staff','$time','$default_status')";
    mysqli_query($link, $sql);
    mysqli_close($link);
}

function warn($a) {  
    echo "<span style='color:rgb(218, 52, 52);'>$a</span>";
}

?>
<html><body >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css"><br><br>
        <h3 class="welcome">ADMIN PANEL</h3><br>
        <form method = "POST">
            <div class="login">
                Customer Name-Surname <br> <input class="inp" type="text" name = "name-surname" autocomplete="off" required="on"><br><br>
                Phone <br> <input class="inp" type="number" name = "phone" autocomplete="off" required="on"><br><br>
                Address <br> <textarea class="inp" name = "address" autocomplete="off" required="on" rows="10" cols="20"></textarea><br><br>
                Tracking No <br> <input class="inp" type="number" name = "tracking-no" autocomplete="off" required="on"><br><br>
                Staff <br> <input class="inp" type="text" name = "staff" autocomplete="off" required="on"><br><br>
            </div>
            <button class="btn btn-outline-light" type= "submit"> Create</button>
        </form>
</body></html>
