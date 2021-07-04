<html>
    <body>
    <link rel="stylesheet" href="app.css">
    <div class="topnav">
        <a class = "active" href="index.php">Home</a>
        <a href="check-track.php">Check Track</a>
        <a href="adminlogin.php">Admin Panel</a>
    </div>
    <h3 class="welcome">Announce</h3><hr style="color:white;height:4px"><br><br>
    </body>
</html>

<?php
    GetAnnounce();
    function GetAnnounce(){
        $announce = file_get_contents('admin/announces/customer-announce.txt');
        echo"<h1 style='color:white'>$announce </h1><hr>";
    }
?>