<?php
session_start();
 
if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
    database();
}


function database(){
    $namesurname = $_POST["name-surname"];
    $adress = $_POST["address"];
    $trackingno = $_POST["tracking-no"];
    $staff = $_POST["staff"];
    
    if (isset($_POST["name-surname"])){
        $link = mysqli_connect("localhost", "root", "12345678", "mixas");

        $sql = "INSERT INTO test (trackingno, namesurname, adress, staff) VALUES ('$trackingno', '$namesurname', '$adress', '$staff')";
        if(mysqli_query($link, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        
        mysqli_close($link);

    }
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
                Address <br> <input class="inp" type="text" name = "address" autocomplete="off" required="on"><br><br>
                Tracking No <br> <input class="inp" type="text" name = "tracking-no" autocomplete="off" required="on"><br><br>
                Staff <br> <input class="inp" type="text" name = "staff" autocomplete="off" required="on"><br><br>
            </div>
            <button class="btn btn-outline-light" type= "submit"> Create</button>
        </form>
</body></html>