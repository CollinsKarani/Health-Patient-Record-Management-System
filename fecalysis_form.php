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
		<link rel = "shorcut icon" href = "images/logo.png" />
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
				<center><label>FECALYSIS</label></center>
			</div>
		</div>
			<?php 
					$q = $conn->query("SELECT * FROM `fecalisys` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' && `fecalisys_id` = '$_GET[fecalysis_id]'") or die(mysqli_error());
					$f = $q->fetch_array();
			?>
			
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<label>FECALYSIS RESULT FORM</label>	
				<a style = "float:right; margin-top:-4px;" href = "fecalysis_record.php?itr_no=<?php echo $f['itr_no']?>&fecalysis_id=<?php echo $_GET['fecalysis_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
				<a style = "float:right; margin-top:-4px; margin-right:4px;" href = "fecalysis_print.php?itr_no=<?php echo $f['itr_no']?>&fecalysis_id=<?php echo $_GET['fecalysis_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print"></span> PRINT</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data">
			<div class = "panel-body">
				<div class = "alert alert-info">Basic Information</div>
				<div style = "float:left; width:30%;">
					<label style = "font-size:18px;">Name</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".$f['middlename']." ".$f['lastname']?></label>
				</div>
				<div style = "float:left; width:10%;">
					<label style = "font-size:18px;">Age</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['age']?></label>
				</div>
				<div style = "float:left; width:10%;">
					<label style = "font-size:18px;">Gender</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['gender']?></label>
				</div>
				<div style = "float:left; width:40%;">	
					<label style = "font-size:18px;">Address</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>					
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" />
				<div style = "float:left; width:40%;">
					<label style = "font-size:18px;">Requested By:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['requested_by']?></label>
				</div>	
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Date of request: </label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo date("m/d/Y", strtotime($f['date_of_request']))?></label>
				</div>
				<br />
				<br style = "clear:both;" />
				<h4 style = "color:#3C763D;"><b>PHYSICAL PROPERTIES</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Color:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['color']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Consistency:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['consistency']?></label>
				</div>
				<br />
				<br />
				<h4 style = "color:#3C763D;"><b>CHEMICAL PROPERTIES</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Occult Blood:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['occult_blood']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Others:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['others_chem']?></label>		
				</div>
				<br />
				<br />
				<h4 style = "color:#3C763D;"><b>MICROSCOPIC FINDINGS</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Pus cells:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pus_cells']?></label>
					<label style = "color:#f00;">/HPF</label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">RBC:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['RBC']?></label>
					<label style = "color:#f00;">/HPF</label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Fat GLobules:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['fat_globules']?></label>
					<label style = "color:#f00;">/HPF</label>
				</div>
				<br />
				<br />
				<h4 style = "color:#3C763D;"><b>HELMINTHS</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Ova:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['ova']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Larva:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['larva']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Adult Forms:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['adult_forms']?></label>
				</div>
				<br />
				<br />
				<h4 style = "color:#3C763D;"><b>PROTOZOA</b></h4>
				<br />
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Cyst:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['cyst']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Trophozoites:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['trophozoites']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Others:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['others_pro']?></label>
				</div>
				<br />
				<br />
				<div class = "form-group">
					<h4><b>REMARKS:</b></h4>
					<div style = "word-wrap:break-word;"><?php echo $f['remarks']?></div>
				</div>
				<br />
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Date Reported:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo date("m/d/Y", strtotime($f['date_reported']))?></label>
				</div>
				<div style = "float:left; width:40%;">
					<label style = "font-size:18px;">Pathologist:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pathologist']?></label>
				</div>
				<div style = "float:left; width:40%;">
					<label style = "font-size:18px;">Medical Technologist:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['medical_technologist']?></label>
				</div>
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