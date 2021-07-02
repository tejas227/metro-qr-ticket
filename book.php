<?php
    session_start();
    include('connection.php');
    $index = array("Versova"=>"1", "D N Nagar"=>"2", "Azad Nagar"=>"3","Andheri"=>"4", "Western Express Highway"=>"5", "Chakala"=>"6","Airport Road"=>"7", "Marol Naka"=>"8", "Saki Naka"=>"9","Asalpha"=>"10", "Jagruti Nagar"=>"11", "Ghatkopar"=>"12");
    //$names = array("VER"=>"Versova", "DNG"=>"D N Nagar", "AZN"=>"Azad Nagar","AND"=>"Andheri", "WEH"=>"Western Express Highway", "CHK"=>"Chakala","APR"=>"Airport Road", "MAN"=>"Marol Naka", "SAN"=>"Saki Naka","ASA"=>"Asalpha", "JNG"=>"Jagruti Nagar", "GHA"=>"Ghatkopar");
    $_source = $_destination = $_date = $_type = "";
    $index1 ;
    $index2 ;
    $diff ;
    $amount ;

    if(isset($_POST['book']))
    {
        $_source = $_POST['source']; 
        $_destination = $_POST['destination'];
        $_type = $_POST['type'];
        $_date = $_POST['date'];
        $index1 = $index[$_source];
        $index2 = $index[$_destination];
        $diff = abs((int)$index1 - (int)$index2);
        
        if($diff == 1){
            $amount = 10; 
        }
        else if($diff > 1 && $diff <5){
            $amount = 20; 
        }
        else if($diff >4 && $diff < 9){
            $amount = 30; 
        }
        else if($diff >8 && $diff < 12){
            $amount = 40; 
        }
        
        if($_type == "Return"){
            $amount = $amount *2;
        }

        $_SESSION['source']= $_source;
        $_SESSION['destination']= $_destination;
        $_SESSION['date']= $_date;
        $_SESSION['type']= $_type;
        $_SESSION['amount']= $amount;
        
        header("Location:payment.php");
    }
?>

<html>
    <head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
    .form{
            width: 350px; 
            padding: 20px;
            margin: auto;
            background-color: white;
            border: 2px solid grey;
            padding: 10px;
            border-radius: 25px;
        }

    </style>

    </head>
    <title>Book</title>
    <body>
        <div class="form">
            <form action="book.php" method="POST">
            <label>Source</label>
             <select name = "source"  class="form-control" required>
               <option name = "VER">Versova</option>
               <option name = "DNG">D N Nagar</option>
               <option name = "AZN">Azad Nagar</option>
               <option name = "AND">Andheri</option>
               <option name = "WEH">Western Express Highway</option>
               <option name = "CHK">Chakala</option>
               <option name = "APR">Airport Road</option>              
               <option name = "MAN">Marol Naka</option>
               <option name = "SAN">Saki Naka</option>
               <option name = "ASA">Asalpha</option>
               <option name = "JNG">Jagruti Nagar</option>
               <option name = "GHA">Ghatkopar</option>
             </select>
                <br>
                <label>Destination</label>
             <select name = "destination" class="form-control" required>
                <option name = "VER">Versova</option>
                <option name = "DNG">D N Nagar</option>
                <option name = "AZN">Azad Nagar</option>
                <option name = "AND">Andheri</option>
                <option name = "WEH">Western Express Highway</option>
                <option name = "CHK">Chakala</option>
                <option name = "APR">Airport Road</option>              
                <option name = "MAN">Marol Naka</option>
                <option name = "SAN">Saki Naka</option>
                <option name = "ASA">Asalpha</option>
                <option name = "JNG">Jagruti Nagar</option>
                <option name = "GHA">Ghatkopar</option>
             </select>
                <br>
            <label>Ticket Type</label>
             <select name = "type"  class="form-control" required>
                 <option name = "single">Single</option>
                 <option name = "return">Return</option>
             </select>
             <br>
             <label>Journey Date</label>
                <input type="date" name="date" required>
            <br>
            <button type="submit" name="book" class="btn btn-primary">Book</button>
            </form>
        
        </div>
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