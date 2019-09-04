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
				<center><label>URINALYSIS</label></center>
			</div>
		</div>
		
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<label>URINALYSIS RESULT FORM</label>	
				<a style = "float:right; margin-top:-4px;" href = "urinalysis_record.php?itr_no=<?php echo $_GET['itr_no']?>&urinalysis_id=<?php echo $_GET['urinalysis_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
				<a style = "margin-right:5px; float:right; margin-top:-4px;" href = "urinalysis_print.php?itr_no=<?php echo $_GET['itr_no']?>&urinalysis_id=<?php echo $_GET['urinalysis_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print"></span> PRINT</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data" action = "add_query.php">
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `urinalysis` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' &&`urinalysis_id` = '$_GET[urinalysis_id]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
			<div class = "panel-body">
				<div class = "form-inline">
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
					<div style = "width:40%; float:left;">
						<label style = "font-size:18px;">Address</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>				
					</div>
					<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" />
				<div class = "form-inline">
					<label style = "font-size:18px;">Date of Request:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['date_of_request']?></label>
				</div>
				<br />
				<h4 style = "color:#3C763D;"><b>PHYSICAL PROPERTIES</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Color:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['color']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Transparency:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['transparency']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Specific Gravity:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['specific_gravity']?></label>
				</div>
				<br />
				<br style = "clear:both;" />
				<h4 style = "color:#3C763D;"><b>CHEMICAL ANALYSIS</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Ph:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['ph']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Sugar:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['sugar']?></label>
				</div>	
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Protein:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['protein']?></label>
				</div>	
				<br />
				<br style = "clear:both;" />
				<div>
					<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Pregnancy Test:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pregnancy_test']?></label>
				</div>
				<br />
				<br style = "clear:both;" />
				<h4 style = "color:#3C763D;"><b>MICROSCOPE EXAMINATION</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Pus Cells:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pus_cells']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">RBC:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['rbc']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Cast:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['cast']?></label>
				</div>
				<br />
				<br style = "clear:both;"/>
				<h4 style = "color:#3C763D;"><b>CRYSTAL</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Urates:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['urates']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Uric Acid:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['uric_acid']?></label>
				</div>
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Cal Ox:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['cal_ox']?></label>
				</div>
				<br />
				<br style = "clear:both;"/>
				<h4 style = "color:#3C763D;"><b>OTHERS</b></h4>
				<br />
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Epith Cells:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['epith_cells']?></label>
				</div>	
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Mucus Threads:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['mucus_threads']?></label>
				</div>	
				<div style = "float:left; width:20%;">	
					<label style = "font-size:18px;">Others:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['others']?></label>
				</div>
				<br />
				<br style = "clear:both;"/>
				<br style = "clear:both;"/>
				<div style = "float:left; width:30%;">	
					<label style = "font-size:18px;">Pathologist:</label>
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['pathologist']?></label>
				</div>
				<div style = "float:left; width:30%;">	
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