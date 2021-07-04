<div class="topnav">
            <a class="active" href="index.php">Home</a>
            <a href="create-customer.php">Create Customer</a>
            <a href="change-status.php">Change Status</a>
            <a href="announce.php">Customer Announce</a>
            <a href="cargolist.php">Cargo List</a>

</div>
<html>
<body onselectstart="return false">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css"><br><br>
    <h3 class="welcome">Announce</h3><hr style="color:white;height:7px"><br><br>
</body>
</html>
<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location:index.php");
    }
    else {
       GetAnnounce();
    }
    
    function GetAnnounce(){
        $announce = file_get_contents('announces/staff-announce.txt');
        echo"<h1 style='color:white'>$announce </h1><hr>";
    }
?>
