<?php
	if(ISSET($_POST['save_complaints'])){
		$date = date('m/d/Y', strtotime('+8 HOURS'));
		$complaints = $_POST['complaints'];
		$remarks = $_POST['remarks'];
		$itr_no = $_GET['id'];
		$section = $_POST['section'];
		$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
		$f = $q->fetch_array();
		$q1 = $conn->query("SELECT * FROM `complaints` WHERE `itr_no` = '$_GET[id]'") or die(mysqli_error());
		$f1 = $q->fetch_array();
		if(($section == "Prenatal" || $section == "Maternity") && ($f['gender'] == "Male")){
				echo "<script>alert('Wrong section!')</script>";
			}else{
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$conn->query("INSERT INTO `complaints` VALUES('', '$date', '$complaints', '$remarks', '$itr_no', '$section', 'Pending')") or die(mysqli_error());
			header("location: patient.php");
			$conn->close();
			}
	}	