<?php
    session_start();

    $link = mysqli_connect("localhost", "root", "12345678", "mixas");
    $trackingno = $_POST["tracking-no"];
    $sql = "SELECT * FROM cargolist WHERE trackingno='$trackingno';";		 
    $result = $link->query($sql);
    if(isset($trackingno)) {
        while($row = $result->fetch_assoc()) { 
            success($row["status"]);
        }
    }

    mysqli_close($link);
    
    function warn($a) {  
        echo "<span style='color:rgb(218, 52, 52);'>$a</span>";
    }

    function success($message) {  
        echo "<span style='color:rgb(27, 223, 18);'>$message</span>";
    }
?>
<html><body>
    <style>
        .check{
            font-size: 120%;
            text-decoration: none;
            color:white;
        }
        .check:hover{
            color:white;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><br><br>
        <h3 class="welcome">Customer Actions</h3><br>
        <form method = "POST">
            <div class="login">
                <hr>
                    <a class='check'>Check Track Status </a><br><br>
                    <input class="inp" type="text" name = "tracking-no" autocomplete="off" placeholder="Tracking No" required="on"><br><br>
                    <button class="btn btn-outline-success" type= "submit"><i class="fa fa-search"></i></button>
                <hr>
                <a class='check'>Change Cargo Address </a><br><br>
                    <input class="inp" type="number" name = "phone-no" autocomplete="off" placeholder="Phone Number" required="on"><br><br>
                    <input class="inp" type="number" name = "tracking-no" autocomplete="off" placeholder="Tracking No" required="on"><br><br>
                    New Address <br> <textarea class="inp" name = "address" autocomplete="off" required="on" rows="10" cols="20"></textarea><br><br>
                    <button class="btn btn-success" type= "submit">Change Cargo Address</button>
                <hr>
            </div>
        </form>
</body></html>