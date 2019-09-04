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
		<img src = "images/logo.png" height = "55px" style = "float:left;"><label class = "navbar-brand">Health Center Patient Record Management System - Victorias City</label>
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
				<center><label>XRAY</label></center>
			</div>
		</div>
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<label>XRAY RESULT FORM</label>	
				<a style = "float:right; margin-top:-4px;" href = "xray_record.php?itr_no=<?php echo $_GET['itr_no']?>&rad_id=<?php echo $_GET['rad_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
				<a style = "margin-right:5px; float:right; margin-top:-4px;" href = "xray_print.php?itr_no=<?php echo $_GET['itr_no']?>&rad_id=<?php echo $_GET['rad_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print"></span> PRINT</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data" action = "add_query.php">
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `radiological` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' &&`rad_id` = '$_GET[rad_id]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
			<div class = "panel-body">
				<br style = "clear:both;"/>
				<div class = "alert alert-info">Basic Information</div>		
				<div style = "float:left; width:30%;">	
					<label style = "font-size:15px;">Name of Patient:</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['firstname']." ".$f['middlename']." ".$f['lastname']?></label>		
				</div>
				<div style = "float:left; width:10%;">	
					<label style = "font-size:15px;">Age:</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['age']?></label>		
				</div>
				<div style = "float:left; width:15%;">	
					<label style = "font-size:15px;">Civil Status:</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['civil_status']?></label>		
				</div>
				<div style = "float:left; width:40%;">
					<label style = "font-size:15px;">Address:</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['address']?></label>		
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" />
				<div style = "float:left;">
					<label for = "case_no">Case No:</label>
					<br />
					<label class = "text-muted"><?php echo $f['case_no']?></label>
				</div>	
				<br />				
				<br />				
				<br style = "clear:both;"/>
				<div class = "form-inline" style = "width:50%; float:left;">
					<label for = "referred_by">Referred by:ICHC</label>
					<br />
					<label class = "text-muted"><?php echo $f['referred_by']?></label>
					<br />
					<br />
					<label for = "room_bed_no">Room & Bed No:</label>
					<br />
					<label class = "text-muted"><?php echo $f['room_bed_no']?></label>
				</div>
				<div class = "form-inline" style = "float:left; width:50%;">
					<label for = "clinical_impression">Clinical Impression:</label>
					<br />
					<label class = "text-muted"><?php echo $f['clinical_impression']?></label>
					<br />
					<br />
					<label for = "type_of_examination">Type of Examination:</label>
					<br />
					<label class = "text-muted"><?php echo $f['type_of_examination']?></label>
				<br />
				<br />
			</div>
			</form>
		</div>
		 
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Health Center Patient Record Management System 2015</label>
	</div>
	</body>
		<?php require "script.php" ?>
</html>