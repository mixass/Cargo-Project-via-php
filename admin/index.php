<div class="topnav">
            <a class="active" href="index.php">Home</a>
            <a href="create-customer.php">Create Customer</a>
            <a href="change-status.php">Change Status</a>
            <a href="announce.php">Customer Announce</a>
</div>
<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location:index.php");
    }
    else {
       database();
    }
    
    function database(){ // Database Connection
        $namesurname = $_POST["name-surname"];
        $phone = $_POST["phone"];
        $adress = $_POST["address"];
        $trackingno = rand(1000,99999);
        $staff = $_POST["staff"];
        $ip = $_SERVER['REMOTE_ADDR'];
        $time = date("d/m/Y");
        $default_status = "Received";
        if (isset($_POST["name-surname"])){
            Check($trackingno, $namesurname, $phone, $ip, $adress, $staff, $time, $default_status); // Checking tracking number exist
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
            createCustomer($trackingno, $namesurname, $phone, $ip, $adress, $staff, $time, $default_status); // Cargo tracking is created
        }
        mysqli_close($link);
    }

    function createCustomer($trackingno, $namesurname, $phone, $ip, $adress, $staff, $time, $default_status){
        $link = mysqli_connect("localhost", "root", "12345678", "mixas");
        $sql = "INSERT INTO cargolist (trackingno, namesurname, phone, ip, adress, staff, time,status) VALUES ('$trackingno', '$namesurname','$phone', '$ip','$adress', '$staff','$time','$default_status')";
        success("Tracking created successfully. Tracking No : $trackingno");
        mysqli_query($link, $sql);
        mysqli_close($link);
    }

    function warn($message) {  
        echo "<span style='color:rgb(218, 52, 52);'>$message</span>";
    }

    function success($message) {  
        echo "<span style='color:green;'>$message</span>";
    }
?>
<html><body onselectstart="return false">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css"><br><br>
        <h3 class="welcome">Announce</h3><hr style="color:white;height:7px"><br><br>
        <h1 style="color:white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis minus reprehenderit cumque quas officia quisquam aliquid libero enim quis voluptatem iste voluptate, laudantium delectus corrupti aliquam perspiciatis tenetur unde dolor. </h1><hr>
</body>
</html>