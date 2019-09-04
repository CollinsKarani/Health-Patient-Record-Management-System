<!DOCTYPE html>
<?php
	require_once'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<html lang = "en">
	<head>	
		<title>Health Center Patient Record Management System</title>
		<meta charset = "UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
	</head>
	<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">Health Center Patient Record Management System - Victorias City</label>
		<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php echo $fetch['firstname']." ".$fetch['lastname'] ?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><span class = "glyphicon glyphicon-log-out"></span> Logout</a>
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
				<center><label>MATERNITY</label></center>
			</div>
		</div>
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<label>PATIENT'S DATA FORM</label>	<a style = "float:right; margin-top:-4px;" href = "birthing_pending.php?id=<?php echo $_GET['id']?>&lastname=<?php echo $_GET['lastname']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data">
			<?php
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[id]' && `lastname` = '$_GET[lastname]'") or die(mysqli_error());
				$q1 = $conn->query("SELECT * FROM `complaints` WHERE `com_id` = '$_GET[comp_id]' && `itr_no` = '$_GET[id]' && `section` = 'Prenatal'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
				$f = $q->fetch_array();
			?>	
			<div class = "panel-body">
				<div class = "form-inline">
					<label>CASE#</label>
					<input type = "text" size = "40"class = "form-control" name = "case_no"  required = "required"/>
					<label>NHTS/4P'S</label>
					<input type = "text" class = "form-control" name = "nhts" />
					<label>CONTACT#</label>
					<input type = "text" class = "form-control" name = "contact" />
				</div>
				<br />
				<div class = "form-group">
					<label>PHILHEALTH ID & MEMBERSHIP:</label>
					<input type = "text" value = "<?php echo $f['phil_health_no']?>" name = "philhealth" class = "form-control" />
				</div>
				<div class = "form-inline">
					<label>PATIENT'S NAME:</label>
					<input type = "text" class = "form-control" name = "pat_firstname" value = "<?php echo $f['firstname']?>" placeholder = "Firstname" required = "required" />
					<input type = "text" class = "form-control" name = "pat_middlename" value = "<?php echo $f['middlename']?>" placeholder = "Middlename"  />
					<input type = "text" class = "form-control" name = "pat_lastname" value = "<?php echo $f['lastname']?>" placeholder = "Lastname" required = "required" />
					<label>AGE:</label>
					<input type = "number" class = "form-control" value = "<?php echo $f['age']?>" name = "age" required = "required" />
					<label>RELIGION:</label>
					<input type = "text" class = "form-control" name = "religion" required = "required" />
				</div>
				<br />
				<div class = "form-group">
					<label>HOME ADDRESS:</label>
					<input type = "text" class = "form-control" value = "<?php echo $f['address']?>" name = "address" />
				</div>
				<div class = "form-inline">
					<label>OCCUPATION:</label>
					<input type = "text" class = "form-control" name = "occupation" />
					<label>DATE OF BIRTH:</label>
					<input type = "text" name = "date_of_birth" class = "form-control" value = "<?php echo $f['birthdate']?>" />
				</div>
				<br />
				<div class = "form-inline">
					<label>DATE OF ADMISSION:</label>
						<select name = "admission_month" style = "width:15%;" class = "form-control" required = "required">
							<option value = "">Select a month</option>
							<option value = "01">January</option>
							<option value = "02">February</option>
							<option value = "03">March</option>
							<option value = "04">April</option>
							<option value = "05">May</option>
							<option value = "06">June</option>
							<option value = "07">July</option>
							<option value = "08">August</option>
							<option value = "09">September</option>
							<option value = "10">October</option>
							<option value = "11">November</option>
							<option value = "12">December</option>
						</select>
						<select name = "admission_day" class = "form-control" style = "width:13%;" required = "required">
							<option value = "">Select a day</option>
							<option value = "01">01</option>
							<option value = "02">02</option>
							<option value = "03">03</option>
							<option value = "04">04</option>
							<option value = "05">05</option>
							<option value = "06">06</option>
							<option value = "07">07</option>
							<option value = "08">08</option>
							<option value = "09">09</option>	
							<?php
								$a = 10;
								while($a <= 31){
									echo "<option value = '".$a."'>".$a++."</option>";
								}
							?>
						</select>
						<select name = "admission_year" class = "form-control" style = "width:13%;" required = "required">
							<option value = "">Select a year</option>
							<?php
								$a = date(Y);
								while(1965 <= $a){
									echo "<option value = '".$a."'>".$a--."</option>";
								}
							?>
						</select>
						<label>TIME OF ADMISSION:</label>
						<input type = "time" name = "time_of_admission" class = "form-control" />
				</div>
				<br />
				<div class = "form-inline">
					<label>SPOUSE'S NAME:</label>
					<input type = "text" class = "form-control" name = "spouse_firstname" placeholder = "Firstname" required = "required" />
					<input type = "text" class = "form-control" name = "spouse_middlename" placeholder = "Middlename"  />
					<input type = "text" class = "form-control" name = "spouse_lastname" placeholder = "Lastname" required = "required" />
					<label>AGE:</label>
					<input type = "number" class = "form-control" name = "spouse_age" required = "required" />
					<label>RELIGION:</label>
					<input type = "text" class = "form-control" name = "spouse_religion" required = "required" />
				</div>
				<br />
				<div class = "form-inline">
					<label>OCCUPATION</label>
					<input type = "text" name = "spouse_occupation" class = "form-control" />
				</div>
				<br />
				<div class = "form-inline">
					<label>NO OF PREGNANCY:</label>
					<label>G</label><input type = "text" size = "2" name = "g" class = "form-control" />
					<label>T</label><input type = "text" size = "2" name = "t" class = "form-control" />
					<label>A</label><input type = "text" size = "2" name = "a" class = "form-control" />
					<label>L</label><input type = "text" size = "2" name = "l" class = "form-control" />
					<label>LMP:</label>
					<input type = "text" size = "10" name = "lmp" class = "form-control" />
					<label>EDC/EDD:</label>
					<input type = "text" size = "10" name = "edc" class = "form-control" />
				</div>
				<br />
				<div class = "form-inline">
					<label>AOG:</label>
					<input type = "text" name = "aog" class = "form-control"/>
					<label>FETAL POSITION:</label>
					<input type = "text" name = "fetal_position" class = "form-control"/>
					<label>FH:</label>
					<input type = "text" name = "fh" size = "4" class = "form-control"/>
					<label>cm FHB:</label>
					<input type = "text" name = "fhb" size = "4" class = "form-control"/>
					<label>ppm LOC:</label>
					<input type = "text" name = "loc" size = "4" class = "form-control"/>
				</div>
				<br />
				<div class = "form-group">
					<label>ADMITTING DIAGNOSIS:</label>
					<textarea name = "admitting_diagnosis" style = "resize:none;" class = "form-control"></textarea>
				</div>
				<div class = "form-inline">	
					<label>ADMITTING PHYSICIAN/MIDWIFE:</label>
					<input type = "text"class = "form-control" name = "midwife" size = "50" required = "required"/>
				</div>
				<br />
				<div class = "form-inline">	
					<label>DATE OF DELIVERY:</label>
					<select name = "delivery_month" style = "width:15%;" class = "form-control" required = "required">
							<option value = "">Select a month</option>
							<option value = "01">January</option>
							<option value = "02">February</option>
							<option value = "03">March</option>
							<option value = "04">April</option>
							<option value = "05">May</option>
							<option value = "06">June</option>
							<option value = "07">July</option>
							<option value = "08">August</option>
							<option value = "09">September</option>
							<option value = "10">October</option>
							<option value = "11">November</option>
							<option value = "12">December</option>
						</select>
						<select name = "delivery_day" class = "form-control" style = "width:13%;" required = "required">
							<option value = "">Select a day</option>
							<option value = "01">01</option>
							<option value = "02">02</option>
							<option value = "03">03</option>
							<option value = "04">04</option>
							<option value = "05">05</option>
							<option value = "06">06</option>
							<option value = "07">07</option>
							<option value = "08">08</option>
							<option value = "09">09</option>	
							<?php
								$a = 10;
								while($a <= 31){
									echo "<option value = '".$a."'>".$a++."</option>";
								}
							?>
						</select>
						<select name = "delivery_year" class = "form-control" style = "width:13%;" required = "required">
							<option value = "">Select a year</option>
							<?php
								$a = date(Y);
								while(1965 <= $a){
									echo "<option value = '".$a."'>".$a--."</option>";
								}
							?>
						</select>
					<label>TIME:</label>
					<input type = "time" class = "form-control" name = "time1" style = "width:10%;" required = "required"/>
					<label>SEX:</label>
					<input type = "text" class = "form-control" name = "sex" style = "width:10%;" required = "required"/>
					<label>WT:</label>
					<input type = "text" class = "form-control" name = "wt" size = "4" required = "required"/>
				</div>
				<br />
				<div class = "form-inline">
					<label>NAME OF BABY:</label>
					<input type = "text" class = "form-control" name = "baby_lastname" placeholder = "Lastname" required = "required" />
					<input type = "text" class = "form-control" name = "baby_firstname" placeholder = "Firstname"  />
					<input type = "text" class = "form-control" name = "baby_middlename" placeholder = "Middlename" required = "required" />
				</div>
				<br />
				<div class = "form-inline">
					<label>HEPA:</label>
					<input type = "text" class = "form-control" name = "hepa" size = "8" required = "required" />
					<label>BCG:</label>
					<input type = "text" class = "form-control" name = "bcg" size = "8" required = "required" />
					<label>NBS:</label>
					<input type = "text" class = "form-control" name = "nbs" size = "8" required = "required" />
				</div>
				<br />
				<div class = "form-inline">
					<label>DATE OF DISCHARGE:</label>
					<select name = "date_month" style = "width:15%;" class = "form-control" required = "required">
							<option value = "">Select a month</option>
							<option value = "01">January</option>
							<option value = "02">February</option>
							<option value = "03">March</option>
							<option value = "04">April</option>
							<option value = "05">May</option>
							<option value = "06">June</option>
							<option value = "07">July</option>
							<option value = "08">August</option>
							<option value = "09">September</option>
							<option value = "10">October</option>
							<option value = "11">November</option>
							<option value = "12">December</option>
						</select>
						<select name = "date_day" class = "form-control" style = "width:13%;" required = "required">
							<option value = "">Select a day</option>
							<option value = "01">01</option>
							<option value = "02">02</option>
							<option value = "03">03</option>
							<option value = "04">04</option>
							<option value = "05">05</option>
							<option value = "06">06</option>
							<option value = "07">07</option>
							<option value = "08">08</option>
							<option value = "09">09</option>	
							<?php
								$a = 10;
								while($a <= 31){
									echo "<option value = '".$a."'>".$a++."</option>";
								}
							?>
						</select>
						<select name = "date_year" class = "form-control" style = "width:13%;" required = "required">
							<option value = "">Select a year</option>
							<?php
								$a = date(Y);
								while(1965 <= $a){
									echo "<option value = '".$a."'>".$a--."</option>";
								}
							?>
						</select>
					<label>TIME OF DISCHARGE:</label>
					<input type = "time" class = "form-control" name = "time_of_discharge" style = "width:10%;" required = "required"/>
				</div>
				<br />
				<div class = "form-group">
					<label>FINAL DIAGNOSIS:</label>
					<textarea name = "final_diagnosis" style = "resize:none;" class = "form-control"></textarea>
				</div>
				<div class = "form-inline">	
					<label>DISPOSITION ON DISCHARGE:</label>
					<input type = "text" class = "form-control" name = "disposition_on_discharge" style = "width:10%;" required = "required"/>
					<input type = "hidden" value = "<?php echo $_GET['id']?>" name = "itr_no" />
					<input type = "hidden" value = "<?php echo $_SESSION['user_id']?>" name = "user_id" />
				</div>
				<br />
				<div class = "form-inline">
					<button class = "btn btn-primary" name = "save_patient"  ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
				</div>
			</div>
			<?php require 'add_query.php'?>
			</form>
		</div>
		 
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Health Center Patient Record Management System 2015</label>
	</div>
	</body>
		<?php require "script.php" ?>
</html>