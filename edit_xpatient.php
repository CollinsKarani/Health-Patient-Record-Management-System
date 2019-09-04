<!DOCTYPE html>
<?php
	require_once'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<html lang = "en">
	<head>	
		<title>Patient Health Center Management System</title>
		<meta charset = "UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
	</head>
	<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "images/logo.png" height = "55px" style = "float:left;"><label class = "navbar-brand">Health Center Patient Management System - Victorias City</label>
		<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php echo $fetch['name'] ?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php">Logout</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<br />
	<br />
	<br />
	<div class = "well">
		<div class = "panel panel-warning">
			<div class = "panel-heading">
				<center><label>XRAY</label></center>
			</div>
		</div>
		<div id = "p_fdental" class = "panel panel-success">	
			<div class = "panel-heading">
				<label>PATIENT INFORMATION</label>
				<a style = "float:right; margin-top:-4px;" href = "xray.php" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<?php
				$_GET['id'];
				$_GET['lastname'];
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$query = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
				$fetch = $query->fetch_array();
			?>
			<div class = "panel-body">
				<form id = "form_dental" action = "edit_patient.php?id=<?php echo $fetch['itr_no']?>&lastname=<?php echo $fetch['lastname']?>" method = "POST" enctype = "multipart/form-data">
					<div style = "float:right;" class = "form-inline">
						<label for family_no>Family no:</label>
						<input class = "form-control" size = "3" value = "<?php echo $fetch['family_no']?>" type = "text" name = "family_no">
					</div>
					<br />
					<br />
					<br />
					<div class = "form-inline">
						<label for = "firstname">Firstname:</label>
						<input class = "form-control" name = "firstname" value = "<?php echo $fetch['firstname']?>" type = "text" required = "required">
						<label for = "middlename">Middle Name:</label>
						<input class = "form-control" value = "<?php echo $fetch['middlename']?>"  name = "middlename" type = "text" required = "required">
						<label for = "lastname">Lastname:</label>
						<input class = "form-control" value = "<?php echo $fetch['lastname']?>"  name = "lastname" type = "text" required = "required">
						<label for = "birthdate">Birthdate:</label>
						<input class = "form-control" value = "<?php echo $fetch['birthdate']?>"  name = "birthdate" type = "text">
						<input style = "float:right;" value = "<?php echo $fetch['phil_health_no']?>" name = "phil_health_no" class = "form-control" type = "text">
						<label style = "float:right; margin-top:5px;" for = "phil_health_no">Phil Health no:</label>
					</div>
					<br />
					<div class = "form-inline">
						<label for = "address">Address:</label>
						<input class = "form-control" value = "<?php echo $fetch['address']?>"  name = "address" size = "60" type = "text" required = "required">
						<label for = "age">Age:</label>
						<input class = "form-control" value = "<?php echo $fetch['age']?>" size = "3" name = "age" type = "text">
						<label for = "civil_status">Civil Status:</label>
						<input class = "form-control" value = "<?php echo $fetch['civil_status']?>"  name = "civil_status" type = "text" required = "required">
						<label for = "gender">Gender:</label>
						<select class = "form-control" name = "gender" required = "required">
							<option value = "">(Select)</option>
							<option value = "Male">Male</option>
							<option value = "Female">Female</option>
						</select>
					</div>
					<br />
					<div class = "form-inline">
						<label for = "bp">BP:</label>
						<input class = "form-control" name = "bp" value = "<?php echo $fetch['BP']?>"  type = "text"  required = "required" />
						<label for = "temp">TEMP:</label>
						<input class = "form-control" name = "temp" value = "<?php echo $fetch['TEMP']?>" type = "text"  required = "required" />
						<label for = "pr">PR:</label>
						<input class = "form-control" name = "pr" type = "text" value = "<?php echo $fetch['PR']?>"  />
						<label for = "rr">RR:</label>
						<input class = "form-control" name = "rr" type = "text" value = "<?php echo $fetch['RR']?>" />
						<label for = "wt">WT :</label>
						<input class = "form-control" name = "wt" type = "text" value = "<?php echo $fetch['WT']?>"  />
						<label for = "ht">HT :</label>
						<input class = "form-control" name = "ht" type = "text" value = "<?php echo $fetch['HT']?>" />
					</div>
					<br />
					<div class = "form-inline">
						<button style = "float:right;" class = "btn btn-warning" name = "edit_xpatient"><span class = "glyphicon glyphicon-pencil"></span> EDIT</button>
					</div>
				</form>
			</div>	
		</div>	
		 
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Patient Health Center Management System 2015</label>
	</div>
	</body>
		<?php require "script.php" ?>
</html>