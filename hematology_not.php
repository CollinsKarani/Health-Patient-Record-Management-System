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
				<center><label>HEMATOLOGY</label></center>
			</div>
		</div>
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<label>HEMATOLOGY FORM</label>	<a style = "float:right; margin-top:-4px;" href = "hematology_pending.php?itr_no=<?php echo $_GET['itr_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data">
			<?php
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$q1 = $conn->query("SELECT * FROM `complaints` WHERE `com_id` = '$_GET[comp_id]' && `itr_no` = '$_GET[itr_no]' && `section` = 'Hematology'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
				$f = $q->fetch_array();
			?>
			<div class = "panel-body">
			<div class = "alert alert-info">Basic Information</div>	
				<div style = "width:30%; float:left;">
						<label style = "font-size:18px;">Name</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".substr($f['middlename'], 0,1).". ".$f['lastname']?></label>
					</div>
					<div style = "width:20%; float:left;">
						<label style = "font-size:18px;">Age</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['age']?></label>
					</div>
					<div style = "width:20%; float:left;">
						<label style = "font-size:18px;">Gender</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['gender']?></label>
					</div>
					<div style = "width:20%; float:left;">
						<label style = "font-size:18px;">BP</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['BP']?></label>
					</div>
					<br />
					<br />
					<br />
					<br style = "clear:both;"/>
					<div>
						<label style = "font-size:18px;">Address</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>				
					</div>
				<hr style = "border:1px dotted #d3d3d3;" />
				<div class = "form-inline">
					<label for = "date_requested">Date Requested:</label>
					<input class = "form-control" name = "date_requested" size = "10" readonly = "readonly" value = "<?php echo $f1['date']?>" required = "required" size = "50" type = "text" />
					<label style = "margin-left:10px;" for = "requested_by">Requested By:</label>
					<input class = "form-control" name = "requested_by" size = "60" required = "required" />
				</div>
				<br />
				<div class = "form-inline">
					<h4 style = "color:#3C763D;"><b>NORMAL VALUES</b></h4>
					<br />
					<label for = "hemoglobin">Hemoglobin:</label>
					<input class = "form-control" size = "4" name = "hemoglobin" type = "text" required = "required" />
					<label style = "color:#f00;">g(m 130-180,f 120-160)</label>
					&nbsp;&nbsp;&nbsp;
					<label for = "hematocrit">Hematocrit:<label>
					<input class = "form-control" size = "3" type = "text" name = "hematocrit" required = "required" />
					<label style = "color:#f00;">1/1(m.40-.54,f .37-47)</label>
				</div>
				<br />
				<div class = "form-inline">
					<label for = "rbc_count">RBC Count:</label>
					<input class = "form-control" size = "4" type = "text" name = "rbc_count" required = "required" />
					<label style = "color:#f00;">x10 12/1(m 4.5-6.2,f 4.3-6.5)</label>
					&nbsp;&nbsp;&nbsp;
					<label for = "wbc_count">WBC Count:</label>
					<input class = "form-control" size = "4" type = "text" name = "wbc_count" required = "required" />
					<label style = "color:#f00;">x10 12/1(4.5-11.0)</label>
				</div>
				<br />
				<div class = "form-inline">
					<h4 style = "color:#3C763D;"><b>DIFFERENT VALUES</b></h4>
					<br />
					<label for = "neutrophil">Neutrophil:</label>
					<input class = "form-control" type = "text" size = "4" name = "neutrophil" required = "required" />
					<label style = "color:#f00;">(55-65)</label>
					&nbsp;&nbsp;&nbsp;
					<label for = "segmenters">Segmenters:</label>
					<input class = "form-control" type = "text" size = "4" name = "segmenters" required = "required"/>
					&nbsp;&nbsp;&nbsp;
					<label for = "stabs">Stabs:</label>
					<input class = "form-control" type = "text" size = "4" name = "stabs" required = "required"/>
					&nbsp;&nbsp;&nbsp;
					<label for = "lymphocytes">Lymphocytes:</label>
					<input class = "form-control" type = "text" size = "4" name = "lymphocytes" required = "required"/>
					<label style = "color:#f00;">(25-35)</label>
				</div>
				<br />
				<div class = "form-inline">
					<label for = "monocyte">Monocyte:</label>
					<input class = "form-control" type = "text" size = "4" name = "monocyte" required = "required"/>
					<label style = "color:#f00;">(4-8)</label>
					&nbsp;&nbsp;&nbsp;
					<label for = "eosinophil">Eosinophil:</label>
					<input class = "form-control" type = "text" size = "4" name = "eosinophil" required = "required"/>
					<label style = "color:#f00;">(1-3)</label>
					&nbsp;&nbsp;&nbsp;
					<label for = "basophil">Basophil:</label>
					<input class = "form-control" type = "text" size = "4" name = "basophil" required = "required"/>
					<label style = "color:#f00;">(0-1)</label>
					&nbsp;&nbsp;&nbsp;
					<label for = "total">Total:</label>
					<input class = "form-control" type = "text" size = "4" name = "total" required = "required"/>
				</div>
				<br />
				<div class = "form-inline">
					<h4 style = "color:#3C763D;"><b>COAGULATION PROFILE</b></h4>
					<br />
					<label for = "platelet">Platelet:</label>
					<input class = "form-control" type = "text" size = "4" name = "platelet" required = "required" />
					<label style = "color:#f00;">x10g/1(160-450)</label>
					&nbsp;&nbsp;&nbsp;
					<label for = "bleeding_time">Bleeding Time:</label>
					<input class = "form-control" type = "text" size = "4" name = "bleeding_time" required = "required" />
					<label style = "color:#f00;">(1-5)mins</label>
					&nbsp;&nbsp;&nbsp;
					<label for = "clotting_time">Clotting Time:</label>
					<input class = "form-control" type = "text" size = "4" name = "clotting_time" required = "required" />
					<label style = "color:#f00;">(3-5)mins</label>
				</div>
				<br />
				<div class = "form-inline">
					<h4 style = "color:#3C763D;"><b>BLOOD TYPE</b></h4>
					<br />
					<label for = "abo_group">ABO Group:</label>
					<input class = "form-control" type = "text" size = "4" name = "abo_group" required = "required" />
					&nbsp;&nbsp;&nbsp;
					<label for = "rh_group">Rh Group:</label>
					<input class = "form-control" type = "text" size = "4" name = "rh_group" required = "required" />
				</div>
				<br />
				<div class = "form-group">
					<h5><b>Remarks:</b></h5>
					<textarea style = "resize:none;" class = "form-control" name = "remarks" required = "required"></textarea>
				</div>
				<br />
				<div class = "form-inline">
					<label for = "pathologist">Pathologist:</label>
					<input class = "form-control" type = "text" name = "pathologist" required = "required" />
					&nbsp;&nbsp;&nbsp;
					<label for = "medical_technologist">Medical Technologist</label>
					<input class = "form-inline" type = "text" name = "medical_technologist" required = "required" />
					<input type = "hidden" name = "itr_no" value = "<?php echo $f['itr_no']?>" />
					<input type = "hidden" name = "user_id" value = "<?php echo $_SESSION['user_id']?>" />
				</div>
				<br />
				<br />
				<div class = "form-inline">
					<button class = "btn btn-primary" name = "save_h" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
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