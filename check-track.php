<?php
    session_start();

    $link = mysqli_connect("localhost", "root", "12345678", "mixas");
    $trackingno = $_POST["tracking-no"];
    $trackinggno = $_POST["trackingg-no"];
    $phone = $_POST["phone-no"];

    // Check track
    $checktracking = "SELECT * FROM cargolist WHERE trackingno='$trackingno';";		 
    $result = $link->query($checktracking);
    if(isset($trackingno)) {
        while($row = $result->fetch_assoc()) { 
            success($row["status"].'<br>'.$row["namesurname"]);
        }
    }

    mysqli_close($link);
    
    function warn($a) {  
        echo "<span style='color:rgb(218, 52, 52);'>$a</span>";
    }

    function success($status) {  
        echo "<span style='color:rgb(27, 223, 18);'>$status</span>";
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
                    <input class="inp" type="text" name = "tracking-no" autocomplete="off" placeholder="Tracking No"><br><br>
                    <button class="btn btn-outline-success" type= "submit"><i class="fa fa-search"></i></button>
                <hr>

            </div>
        </form>
</body></html>
