<?php
    session_start();
    include('connection.php');
    
    require_once 'phpqrcode/qrlib.php';

    $path = 'images/';
    $unique = uniqid();


    $file = $path.$unique.".png";

    $_SESSION['file'] = $file;
    $_SESSION['unique'] = $unique;

    if(isset($_POST['submit'])){
        $date = date("Y/m/d");
        $source = $_SESSION['source'];
        $destination = $_SESSION['destination'];
        $journeydate = $_SESSION['date'];
        $type = $_SESSION['type'];
        $amount = $_SESSION['amount'];
        $username = $_SESSION['username'];
        $cardno = $_POST['cardno'];

        


        $sql = "INSERT INTO transactions (username,source,destination,type,journeydate,amount,cardno,date,qr)
            VALUES ('$username','$source','$destination','$type','$journeydate','$amount','$cardno','$date','$file')";
        


        if (mysqli_query($link, $sql)) {
            header("Location:QR.php");
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($link);
            }


    }

?>

<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <title>Payment</title>
    <body>
        <div>
            <form action="payment.php" class="form-group" method="POST">
            <h1> Transaction Amount is <?php echo $_SESSION['amount'] ?>Rs. </h1>
            <label>Card  No</label>
                <input type="text" name="cardno" class="form-control">
            <label>CVV</label>
                <input type="password" name="cvv" class="form-control">
            
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

            </form>

        
        </div>
        
    </body>
</html>