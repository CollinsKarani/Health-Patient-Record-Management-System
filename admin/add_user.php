<?php
	if(ISSET($_POST['save_user'])){	
		$username = $_POST['username']; 
		$password = $_POST['password']; 
		$firstname = $_POST['firstname']; 
		$middlename = $_POST['middlename']; 
		$lastname = $_POST['lastname']; 
		$section = $_POST['section']; 
		$conn = new mysqli("localhost", "root", "", "hcpms");
		$q1 = $conn->query("SELECT * FROM `user` WHERE `username` = '$username'") or die(mysqli_error());
		$f1 = $q1->fetch_array();
		$c1 = $q1->num_rows;
			if($c1 > 0){
				echo "<script>alert('Username already taken')</script>";
			}else{
				$conn->query("INSERT INTO `user` VALUES('', '$username', '$password', '$firstname', '$middlename', '$lastname', '$section')");
				header("location: user.php");
			}
	}
		
