<?php
    session_start();
    include('connection.php');

?>

<html>
    <head>

    <style>
            * {
            box-sizing: border-box;
            }

            .column {
            float: left;
            width: 33.33%;
            padding: 5px;
            }

            .row::after {
            content: "";
            clear: both;
            display: table;
            }
            </style>
                </head>
    <title>Dashboard</title>
    <body>
    <div class= "row">
        <h1>Welcome <?php echo $_SESSION['username']?></h1>
        <div class="column">
        <p>
            <h3>Book Ticket</h3>
            <a href="book.php">
            <img border="0" src="book.png" width="100" height="100">
            </a>
        </p>
        </div>
        <div class="column">
        <p>
        <h3>My Transactions</h3>
            <a href="transactions.php">
            <img border="0" src="transactions.jpg" width="100" height="100">
            </a>
        </p>
        </div>
        <div class="column">
        <p>
        <h3>Timetable</h3>
            <a href="timetable.php">
            <img border="0" src="timetable.png" width="100" height="100">
            </a>
        </p>
        </div>
        <div class="column">
        <p>
        <h3>Live Location</h3>
            <a href="location.php">
            <img border="0" src="location.png" width="100" height="100">
            </a>
        </p>
        </div>
        <div class="column">
        <p>
        <h3>Logout</h3>
            <a href="logout.php">
            <img border="0" src="logout.png" width="100" height="100">
            </a>
        </p>
        </div>
        </div>
    </body>
</html>