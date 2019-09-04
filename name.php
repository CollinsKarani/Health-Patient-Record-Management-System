<?php
	require'connect.php';
	$query = mysqli_query($conn, "SELECT * FROM `user`") or die(mysqli_error());
	$fetch = mysqli_fetch_array($query);
	$name = $fetch['name'];
	
	
