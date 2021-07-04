<div class="topnav">
            <a href="index.php">Home</a>
            <a href="create-customer.php">Create Customer</a>
            <a href="change-status.php">Change Status</a>
            <a  class="active" href="announce.php">Customer Announce</a>
            <a href="cargolist.php">Cargo List</a>
</div>
<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location:index.php");
    }
    else {
       currentannounce();
    }
    function currentannounce(){
        $announce = file_get_contents('announces/customer-announce.txt');
        echo "<h3 class='welcome'><br>";
        echo "Currently Announce<br><hr style='color:white;height:4px'><br>";
        echo "<h3 class='announce'>$announce</h3>";
        echo "</h3><br><hr style='color:white;height:4px'>";
    }
    if (isset($_POST['announce-text'])) {
        $dosya = fopen('announces/customer-announce.txt','w');
        fwrite($dosya,$_POST['announce-text']);
        fclose($dosya);
        sleep(0.5);
        header("Refresh:0");
    }
?>
<html><body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><br><br>

        <h3 class="welcome">Set New Announce</h3><br>
        <form method = "POST">
            <div class="login">
            <textarea name = "announce-text" autocomplete="off" required="on" rows="15" cols="100"></textarea><br><br>
            <button class="btn btn-success" type="submit">Set</button>
            <hr style='color:white;height:4px'>
            </div>
        </form>
</body></html>
