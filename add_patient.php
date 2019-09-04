<?php
	if(ISSET($_POST['save_patient'])){
		$itr_no = $_POST['itr_no'];
		$family_no = $_POST['family_no'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$birthdate = $_POST['month']."/".$_POST['day']."/".$_POST['year'];
		$age = $_POST['age'];
		$phil_health_no = $_POST['phil_health_no'];
		$address = $_POST['address'];
		$civil_status = $_POST['civil_status'];
		$gender = $_POST['gender'];
		$bp = $_POST['bp'];
		$temp = $_POST['temp']."&deg;C";
		$pr = $_POST['pr'];
		$rr = $_POST['rr'];
		$wt= $_POST['wt']."kg";
		$ht = $_POST['ht'];
		$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
		$q1 = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$itr_no'") or die(mysqli_error());
		$c1 = $q1->num_rows;
		if($c1 > 0){
				echo "<script>alert('ITR No. must not be the same!')</script>";
		}else{
			$conn->query("INSERT INTO `itr` VALUES('$itr_no', '$family_no', '$phil_health_no', '$firstname', '$middlename', '$lastname', '$birthdate', '$age', '$address', '$civil_status', '$gender', '$bp', '$temp', '$pr', '$rr', '$wt', '".addslashes($ht)."')") or die(mysqli_error());
			header("location: patient.php");	
		}
	}
	