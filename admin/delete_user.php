<?php
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$conn->query("DELETE FROM `user` WHERE `user_id` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
	header("location:user.php");

