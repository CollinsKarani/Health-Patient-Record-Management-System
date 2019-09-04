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
				<center><label>URINALYSIS</label></center>
			</div>
		</div>
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<label>URINALYSIS FORM</label>	<a style = "float:right; margin-top:-4px;" href = "urinalysis_pending.php?itr_no=<?php echo $_GET['itr_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data">
			<?php
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$q1 = $conn->query("SELECT * FROM `complaints` WHERE `com_id` = '$_GET[comp_id]' && `itr_no` = '$_GET[itr_no]' && `section` = 'Urinalysis'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
				$f = $q->fetch_array();
			?>
			<div class = "panel-body">
				<div class = "alert alert-info">Basic Information</div>
				<div style = "width:30%; float:left;">
						<label style = "font-size:18px;">Name</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".substr($f['middlename'], 0,1)." ".$f['lastname']?></label>
					</div>
					<div style = "width:10%; float:left;">
						<label style = "font-size:18px;">Age</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['age']?></label>
					</div>
					<div style = "width:10%; float:left;">
						<label style = "font-size:18px;">Gender</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['gender']?></label>
					</div>
					<div style = "width:40%; float:left;">
						<label style = "font-size:18px;">Address</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>				
					</div>
					<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" />
				<div class = "form-inline">
					<label>Date of Request:</label>
					<input type = "text" value = "<?php echo date("m/d/Y", strtotime("+8 HOURS"))?>" name = "date_of_request" class = "form-control" readonly = "readonly"/>
				</div>
				<br />
				<div class = "form-inline">
					<h4 style = "color:#3C763D;"><b>PHYSICAL PROPERTIES</b></h4>
					<br />
					<label for = "color">Color:</label>
					<input class = "form-control" size = "4" name = "color" type = "text" required = "required" />
					&nbsp;&nbsp;&nbsp;
					<label for = "transparency">Transparency:</label>
					<input class = "form-control" size = "3" type = "text" name = "transparency" required = "required" />
					&nbsp;&nbsp;&nbsp;
					<label for = "specific_gravity">Specific Gravity:</label>
					<input class = "form-control" size = "4" type = "text" name = "specific_gravity" required = "required" />
				</div>
				<br />
				<div class = "form-inline">
					<h4 style = "color:#3C763D;"><b>CHEMICAL ANALYSIS</b></h4>
					<br />
					<label for = "ph">Ph:</label>
					<input class = "form-control" type = "text" size = "4" name = "ph" required = "required" />
					&nbsp;&nbsp;&nbsp;
					<label for = "sugar">Sugar:</label>
					<input class = "form-control" type = "text" size = "4" name = "sugar" required = "required"/>
					&nbsp;&nbsp;&nbsp;
					<label for = "protein">Protein:</label>
					<input class = "form-control" type = "text" size = "4" name = "protein" required = "required"/>
				</div>
				<br />
				<div class = "form-inline">
					<label for = "pregnancy_test">Pregnancy Test:</label>
					<input class = "form-control" type = "text" name = "pregnancy_test" required = "required"/>
				</div>
				<br />
				<div class = "form-inline">
					<h4 style = "color:#3C763D;"><b>MICROSCOPE EXAMINATION</b></h4>
					<br />
					<label for = "pus_cells">Pus Cells:</label>
					<input class = "form-control" type = "text" size = "4" name = "pus_cells" required = "required" />
					&nbsp;&nbsp;&nbsp;
					<label for = "rbc">RBC:</label>
					<input class = "form-control" type = "text" size = "4" name = "rbc" required = "required" />
					&nbsp;&nbsp;&nbsp;
					<label for = "cast">Cast:</label>
					<input class = "form-control" type = "text" size = "4" name = "cast" required = "required" />
				</div>
				<br />
				<div class = "form-inline">
					<h4 style = "color:#3C763D;"><b>CRYSTAL</b></h4>
					<br />
					<label for = "urates">Urates:</label>
					<input class = "form-control" type = "text" size = "4" name = "urates" required = "required" />
					&nbsp;&nbsp;&nbsp;
					<label for = "uric_acid">Uric Acid:</label>
					<input class = "form-control" type = "text" size = "4" name = "uric_acid" required = "required" />
					&nbsp;&nbsp;&nbsp;
					<label for = "cal_ox">Cal Ox.:</label>
					<input class = "form-control" type = "text" size = "4" name = "cal_ox" required = "required" />
				</div>
				<br />
				<div class = "form-inline">
					<h4 style = "color:#3C763D;"><b>OTHERS</b></h4>
					<br />
					<label for = "epith_cells">Epith Cells:</label>
					<input class = "form-control" type = "text" size = "4" name = "epith_cells" required = "required" />
					&nbsp;&nbsp;&nbsp;
					<label for = "mucus_threads">Mucus Threads:</label>
					<input class = "form-control" type = "text" size = "4" name = "mucus_threads" required = "required" />
					&nbsp;&nbsp;&nbsp;
					<label for = "others">Others:</label>
					<input class = "form-control" type = "text" size = "4" name = "others" required = "required" />
				</div>
				<br />
				<div class = "form-inline">
					<label for = "pathologist">Pathologist:</label>
					<input class = "form-control" type = "text" name = "pathologist" required = "required" />
					&nbsp;&nbsp;&nbsp;
					<label for = "medical_technologist">Medical Technologist</label>
					<input class = "form-control" type = "text" name = "medical_technologist" required = "required" />
					<input type = "hidden" name = "itr_no" value = "<?php echo $f['itr_no']?>" />
					<input type = "hidden" name = "user_id" value = "<?php echo $_SESSION['user_id']?>" />
				</div>
				<br />
				<br />
				<div class = "form-inline">
					<button class = "btn btn-primary" name = "save_u" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
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