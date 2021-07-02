<?php
    session_start();
    include('connection.php');


    //$file = $_SESSION['file'];

    $username = $_SESSION['username'];

    echo "<center><h1> My Transactions </h1></center>";

    $sql = "SELECT * from transactions where username = '$username'";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo "<table class='table'>";
                    echo "<tr class='thead-dark'>";
                        echo "<th>Source</th>";
                        echo "<th>Destination</th>";
                        echo "<th>Type Of Journey</th>";
                        echo "<th>Journey Date</th>";
                        echo "<th>Amount</th>";
                        echo "<th>Card No</th>";
                        echo "<th>Date</th>";
                        echo "<th>QR code</th>";
                    echo "</tr>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['source'] . "</td>";
                        echo "<td>" . $row['destination'] . "</td>";
                        echo "<td>" . $row['type'] . "</td>";
                        echo "<td>" . $row['journeydate'] . "</td>";
                        echo "<td>" . $row['amount'] . "</td>";
                        echo "<td>" . $row['cardno'] . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        $code = $row['qr'];
                        echo "<td>" ."<img src='$code' height = '100' width = '100'>". "</td>";
    
                    echo "</tr>";
                }
                echo "</table>";
                // Free result set
                mysqli_free_result($result);
            } else{
                echo "No records matching your query were found.";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }

        

?>

<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <title>Transactions</title>
    <body>
    <p>
        <h3>Dashboard</h3>
            <a href="dashboard.php">
            <img border="0" src="dashboard.png" width="100" height="100">
            </a>
        </p>
    </body>
</html>