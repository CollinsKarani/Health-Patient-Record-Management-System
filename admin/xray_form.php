<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
?>
<html lang = "eng">
	<head>
		<title>Health Center Patient Record Management System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
	</head>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "../images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">Health Center Patient Record Management System - Victorias City</label>
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$_SESSION[admin_id]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php
							echo $f['firstname']." ".$f['lastname'];
							$conn->close();
						?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<div id = "sidebar">
			<ul id = "menu" class = "nav menu">
				<li><a href = "home.php"><i class = "glyphicon glyphicon-home"></i> Dashboard</a></li>
				<li><a href = ""><i class = "glyphicon glyphicon-cog"></i> Accounts</a>
					<ul>
						<li><a href = "admin.php"><i class = "glyphicon glyphicon-cog"></i> Administrator</a></li>
						<li><a href = "user.php"><i class = "glyphicon glyphicon-cog"></i> User</a></li>
					</ul>
				</li>
				<li><li><a href = "patient.php"><i class = "glyphicon glyphicon-user"></i> Patient</a></li></li>
				<li><a href = ""><i class = "glyphicon glyphicon-folder-close"></i> Sections</a>
					<ul>
						<li><a href = "fecalysis.php"><i class = "glyphicon glyphicon-folder-open"></i> Fecalysis</a></li>
						<li><a href = "maternity.php"><i class = "glyphicon glyphicon-folder-open"></i> Maternity</a></li>
						<li><a href = "hematology.php"><i class = "glyphicon glyphicon-folder-open"></i> Hematology</a></li>
						<li><a href = "dental.php"><i class = "glyphicon glyphicon-folder-open"></i> Dental</a></li>
						<li><a href = "xray.php"><i class = "glyphicon glyphicon-folder-open"></i> Xray</a></li>
						<li><a href = "rehabilitation.php"><i class = "glyphicon glyphicon-folder-open"></i> Rehabilitation</a></li>
						<li><a href = "sputum.php"><i class = "glyphicon glyphicon-folder-open"></i> Sputum</a></li>
						<li><a href = "urinalysis.php"><i class = "glyphicon glyphicon-folder-open"></i> Urinalysis</a></li>
					</ul>
				</li>
			</ul>
	</div>
	<div id = "content">
		<br />
		<br />
		<br />
		
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `radiological` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' &&`rad_id` = '$_GET[rad_id]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
			<br />
			<a class = "btn btn-success" style = "float:right; margin-top:-7px;" href = "xray_record.php?itr_no=<?php echo $f['itr_no']?>"><span class = "glyphicon glyphicon-hand-right"></span> Back</a>
			<br />
			<br />
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
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Health Center Patient Record Management System 2015</label>
	</div>
	<?php require'script3.php'?>
	<script type = "text/javascript">
			$(document).ready(function(){
				$("#table").DataTable({
					"paging": false,
					"info": false
				});
			});
	</script>
</body> 
</html>