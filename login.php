<?php
    session_start();
    include('connection.php');

    if(isset($_POST['login']))
    { 
        $_username = $_POST['username'];  
        $_password = $_POST['password'];  
        
        $_username = stripcslashes($_username);  
        $_password = stripcslashes($_password); 
        $_SESSION['username']= $_username;

        $sql = "select * from users where username = '$_username' and password = '$_password'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);

        if($count == 1){
            header("Location:dashboard.php");
        }
    }
?>

<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
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

        img{
            width: 350px;
            height: 100px;
            margin-left: 600px;
        }
        

    </style>
    </head>
    <title>Login</title>
    <body>
        <div class = "logo">
            <centre><img src="metro.png"></centre>
        </div>
        <div class = "form">
        <form action="login.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button type="submit" name="login" class="btn btn-primary">Submit</button>
            <p>Don't have an account? <a href="registration.php" >Sign up</a></p>
        </form>
        </div>    
    </body>
</html>