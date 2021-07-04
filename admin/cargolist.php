<div class="topnav">
            <a href="index.php">Home</a>
            <a href="create-customer.php">Create Customer</a>
            <a href="change-status.php">Change Status</a>
            <a href="announce.php">Customer Announce</a>
            <a class="active" href="cargolist.php">Cargo List</a>
</div>
<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header("Location:index.php");
    }
    else {
        CargoList();
    }
    function CargoList(){
        echo "<br><hr>";
        $sql = mysqli_connect("localhost", "root", "12345678", "mixas");
        $checkServer = "SELECT * FROM cargolist;";
        $result = mysqli_query($sql, $checkServer);
        $status = $_POST['status'];
        if (isset($status)) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if ($status == $row['status']) {
                        echo "<center><h3 class='clist'>";
                        echo "Tracking NO : ".$row['trackingno']." Name Surname : ".$row['namesurname']." Phone : ".$row['phone']." Address : ".$row['adress'];
                        echo "</h3><hr></center>";
                    } 
                }
            }
        }else {
            TotalCargoNumber();
        }

        mysqli_close($sql);
    }
    function TotalCargoNumber(){
        $conn = mysqli_connect("localhost", "root", "12345678", "mixas");
        $TotalCargoSql = "SELECT * FROM cargolist;";
        $result = mysqli_query($conn, $TotalCargoSql)->num_rows;
        echo "<br><br><h1 style='color:whitesmoke;'>Total Cargo Number<br>$result</h1>";
    }
?>
<html><body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><br><br>
        <form method = "POST">
            <div class="login">
            <select class="form-select-sm" name = "status" aria-label="Default select example">
                        <option value="Received" selected>Received</option>
                        <option value="Ontheway">On the way</option>
                        <option value="Reached">Reached</option>
            </select><br><br>
            <button class="btn btn-success" type="submit">Check</button>
            </div>
        </form>
</body></html>
