<?php
	session_start();
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
		$query = $conn->query("SELECT * FROM `user` WHERE `username` = '$username' && `password` = '$password'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$valid = $query->num_rows;
		$section = $fetch['section'];	
			if($valid > 0){
				if($section == "Fecalysis"){
					$_SESSION['user_id'] = $fetch['user_id'];
					header("location: fecalysis.php");
				}
				if($section == "Maternity"){
					$_SESSION['user_id'] = $fetch['user_id'];
					header("location: maternity.php");
				}
				if($section == "Hematology"){
					$_SESSION['user_id'] = $fetch['user_id'];
					header("location: hematology.php");
				}
				if($section == "Dental"){
					$_SESSION['user_id'] = $fetch['user_id'];
					header("location: dental.php");
				}
				if($section == "Xray"){
					$_SESSION['user_id'] = $fetch['user_id'];
					header("location: xray.php");
				}
				if($section == "Rehabilitation"){
					$_SESSION['user_id'] = $fetch['user_id'];
					header("location: rehabilitation.php");
				}
				if($section == "Sputum"){
					$_SESSION['user_id'] = $fetch['user_id'];
					header("location: sputum.php");
				}
				if($section == "Urinalysis"){
					$_SESSION['user_id'] = $fetch['user_id'];
					header("location: urinalysis.php");
				}
			}else{
				echo "<script>alert('Account Does Not Exist!')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
						
		
		}
		$conn->close();
	