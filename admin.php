<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location:index.php");
    }
    else {
       echo test;
    }
?>
<html><body onselectstart="return false">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css"><br><br>
        <h3 class="welcome">Admin</h3><br>
        <form method = "POST">
            <div class="login">
                <a class = "welcome" href="create-customer.php">Create Customer</a><br>
                <a class = "welcome" href="change-status.php">Change Status</a>
            </div>
        </form>
</body></html>