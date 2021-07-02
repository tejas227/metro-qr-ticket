<?php

session_start();
include('connection.php');

require_once 'phpqrcode/qrlib.php';

    $file = $_SESSION['file'];
    $unique = $_SESSION['unique'];

        $source = $_SESSION['source'];
        $destination = $_SESSION['destination'];
        $journeydate = $_SESSION['date'];
        $type = $_SESSION['type'];
        $amount = $_SESSION['amount'];
        $username = $_SESSION['username'];

        $text = "Source - ".$source."\n";
        $text .= "Destination - ".$destination."\n";
        $text .= "Journey Date - ".$journeydate."\n";
        $text .= "Journey Type - ".$type."\n";
        $text .= "User - ".$username."\n";
        $text .= "ID - ".$unique;

        QRcode::png($text,$file,'L',10,2);
        echo "<center> <img src ='".$file."'><center> ";

?>

<html>
    <head></head>
    <title>QR</title>
    <body>
    <center>
        <p>
        <h3>Dashboard</h3>
            <a href="dashboard.php">
            <img border="0" src="dashboard.png" width="100" height="100">
            </a>
        </p>
        </center>
    </body>
</html>
