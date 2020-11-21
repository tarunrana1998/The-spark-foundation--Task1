<?php

	$username = "krypto";
	$password = "lFF9krpbsQbzZdQF";
	$server = 'localhost';
	$db ="geeksforgeeks";	

	$con = mysqli_connect($server,$username,$password,$db);

	if($con){
		// echo "Connection Successful";
	?>
	<?php
	}else{
		echo "No connection";
	}

?>
