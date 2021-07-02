<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location:index.php");
    }
    else {
       
    }
    $link = mysqli_connect("localhost", "root", "12345678", "mixas");
    $trackingno = $_POST["tracking-no"];
    $status = $_POST["status"];
    // Check track
    $setstatus = "UPDATE cargolist SET status='$status' WHERE trackingno='$trackingno';";		 
    if(isset($trackingno)) {
        if(mysqli_query($link, $setstatus)){
            //echo "Records inserted successfully.";
        } else{
            warn("ERROR: Could not able to execute $sql. " . mysqli_error($link));
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
        <h3 class="welcome">Admin Actions</h3><br>
        <form method = "POST">
            <div class="login">
                <hr>
                    <a class='check'>Change Track Status </a><br><br>
                    <input class="inp" type="text" name = "tracking-no" autocomplete="off" placeholder="Tracking No"><br><br>
                    <select class="form-select-sm" name = "status" aria-label="Default select example">
                        <option value="Received" selected>Received</option>
                        <option value="Ontheway">On the way</option>
                        <option value="Reached">Reached</option>
                    </select><br><br>
                    <button class="btn btn-success" type="submit">Change</button>
                <hr>

            </div>
        </form>
</body></html>
