<?php
    $link = mysqli_connect('localhost', 'root', '', 'metro');
    if(!$link){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>