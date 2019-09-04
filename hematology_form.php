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
		<img src = "images/logo.png" style = "float:left;" height = "55px"><label class = "navbar-brand">Health Center Patient Record Management System - Victorias City</label>
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
				<label>HEMATOLOGY RESULT FORM</label>	<a style = "float:right; margin-top:-4px;" href = "hematology_record.php?itr_no=<?php echo $_GET['itr_no']?>&hem_id=<?php echo $_GET['hem_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
				<a style = "margin-right:5px; float:right; margin-top:-4px;" href = "hematology_print.php?itr_no=<?php echo $_GET['itr_no']?>&hem_id=<?php echo $_GET['hem_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print"></span> PRINT</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data" action = "add_query.php">
			<?php
				$q = $conn->query("SELECT * FROM `hematology` NATURAL JOIN `itr` WHERE `hem_id` = '$_GET[hem_id]' && `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
			<div class = "panel-body">
				<div class = "alert alert-info">Basic Information</div>	
				<div style = "width:30%; float:left;">
						<label style = "font-size:18px;">Name</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".$f['middlename']." ".$f['lastname']?></label>
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
					<div style = "width:10%; float:left;">
						<label style = "font-size:18px;">BP</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['BP']?></label>
					</div>
					<div style = "float:left; width:40%;">
						<label style = "font-size:18px;">Address</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>				
					</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" />
				<br />
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Date Requested:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo date("m/d/Y", strtotime($f['date_requested']))?></label>
				</div>
				<div style = "float:left; width:30%;">
					<label style = "font-size:18px;">Requested By:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['requested_by']?></label>
				</div>
				<br />
				<br />
				<h4 style = "color:#3C763D;"><b>NORMAL VALUES</b></h4>
				<br />
				<div style = "float:left; width:30%;">	
					<label style = "font-size:18px;">Hemoglobin:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['hemoglobin']?></label>
					<label style = "color:#f00;">g(m 130-180,f 120-160)</label>
				</div>	
				<div style = "float:left; width:30%;">	
					<label style = "font-size:18px;">Hematocrit:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['hematocrit']?></label>
					<label style = "color:#f00;">1/1(m.40-.54,f .37-47)</label>
				</div>
				<br />
				<br style = "clear:both;"/>
				<div style = "float:left; width:30%;">	
					<label style = "font-size:18px;">RBC Count:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['RBC_count']?></label>
					<label style = "color:#f00;">g(m 130-180,f 120-160)</label>	
				</div>
				<div style = "float:left; width:30%;">	
					<label style = "font-size:18px;">WBC Count:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['WBC_count']?></label>
					<label style = "color:#f00;">x10 12/1(4.5-11.0)</label>	
				</div>	
				<br/>
				<br style = "clear:both;"/>
				<h4 style = "color:#3C763D;"><b>DIFFERENT VALUES</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Neutrophil:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['neutrophil']?></label>
					<label style = "color:#f00;">(55-65)</label>
				</div>	
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Segmenters:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['segmenters']?></label>
				</div>	
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Stabs:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['stabs']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Lymphocytes:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['lymphocytes']?></label>
					<label style = "color:#f00;">(25-35)</label>
				</div>	
				<br />
				<br style = "clear:both;" />
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Monocyte:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['monocyte']?></label>
					<label style = "color:#f00;">(4-8)</label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Eosinophil:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['eosinophil']?></label>
					<label style = "color:#f00;">(1-3)</label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Basophil:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['basophil']?></label>
					<label style = "color:#f00;">(0-1)</label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Total:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['total']?></label>
				</div>
				<br />
				<br style = "clear:both;" />
				<h4 style = "color:#3C763D;"><b>COAGULATION PROFILE</b></h4>
				<br />
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Platelet:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['platelet']?></label>
					<label style = "color:#f00;">x10g/1(160-450)</label>
				</div>	
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Bleeding Time:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['bleeding_time']?></label>
					<label style = "color:#f00;">(1-5)mins</label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Clotting Time:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['clotting_time']?></label>
					<label style = "color:#f00;">(3-5)mins</label>
				</div>	
				<br />
				<br style = "clear:both;" />
				<h4 style = "color:#3C763D;"><b>BLOOD TYPE</b></h4>
				<br />
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">ABO Group:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['ABO_group']?></label>
				</div>
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Rh Group:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['Rh_group']?></label>
				</div>
				<br />
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;"/>
				<div>
					<h4><b>Remarks:</b></h4>
					<div class = "text-muted" style = "word-wrap:break-word; font-size:18px;">
						<?php echo $f['remarks']?>
					</div>
				</div>
				<br />
				<div style = "float:left; width:20%;">
					<label style = "font-size:18px;">Pathologist:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pathologist']?></label>
				</div>
				<div style = "float:left; width:20%;">	
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