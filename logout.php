<?php
	session_start();
	
	session_destroy();
	echo "You have been logged out";
	header('refresh:2;url=login.php');
 ?>