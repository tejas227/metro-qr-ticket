<?php
    session_start();
    include('connection.php');
    $_name = $_username = $_email = $_mobile = $_password = "";

    if(isset($_POST['register']))
    {
        $_name = $_POST['name'];
        $_username = $_POST['username'];
        $_email = $_POST['email'];
        $_password = $_POST['password'];
        $_mobile = $_POST['mobile'];

    $sql = "INSERT INTO users (name,username,email,mobile,password)
    VALUES ('$_name','$_username','$_email','$_mobile','$_password')";

    if (mysqli_query($link, $sql)) {
    header("Location:login.php");
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
    }

?>

<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
    </style>
</head>
<title>Registration</title>
<body>
    <center> <h1> Registration Form </center></h1>
<div class = "form">
        <form action="registration.php" method="POST">
        <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>E- mail</label>
                <input type="text" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Mobile No</label>
                <input type="text" name="mobile" class="form-control" required>
            </div>
            <button type="submit" name="register" class="btn btn-primary">Submit</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
        </div>   
</body>
</html>