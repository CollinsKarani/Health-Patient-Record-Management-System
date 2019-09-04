<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	$year = date("Y", strtotime("+8 HOURS"));
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$qjan = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `month` = 'Jan' && `year` = '$year'") or die(mysqli_error());
	$fjan = $qjan->fetch_array();
	$qfeb = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `month` = 'Feb' && `year` = '$year'") or die(mysqli_error());
	$ffeb = $qfeb->fetch_array();
	$qmar = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `month` = 'Mar' && `year` = '$year'") or die(mysqli_error());
	$fmar = $qmar->fetch_array();
	$qapr = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `month` = 'Apr' && `year` = '$year'") or die(mysqli_error());
	$fapr = $qapr->fetch_array();
	$qmay = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `month` = 'May' && `year` = '$year'") or die(mysqli_error());
	$fmay = $qmay->fetch_array();
	$qjun = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `month` = 'Jun' && `year` = '$year'") or die(mysqli_error());
	$fjun = $qjun->fetch_array();
	$qjul = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `month` = 'Jul' && `year` = '$year'") or die(mysqli_error());
	$fjul = $qjul->fetch_array();
	$qaug = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `month` = 'Aug' && `year` = '$year'") or die(mysqli_error());
	$faug = $qaug->fetch_array();
	$qsep = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `month` = 'Sept' && `year` = '$year'") or die(mysqli_error());
	$fsep = $qsep->fetch_array();
	$qoct = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `month` = 'Oct' && `year` = '$year'") or die(mysqli_error());
	$foct = $qoct->fetch_array();
	$qnov = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `month` = 'Nov' && `year` = '$year'") or die(mysqli_error());
	$fnov = $qnov->fetch_array();
	$qdec = $conn->query("SELECT COUNT(*) as total FROM `dental` WHERE `month` = 'Dec' && `year` = '$year'") or die(mysqli_error());
	$fdec = $qdec->fetch_array();
	$year = date("Y");
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
			$q = $conn->query("SELECT * FROM `dental` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' && `dental_no` = '$_GET[dental_no]'") or die(mysqli_error());
			$f = $q->fetch_array();
		?>
		<div class = "alert alert-info">Basic Information<a class = "btn btn-success" style = "float:right; margin-top:-7px;" href = "dental_record.php?itr_no=<?php echo $f['itr_no']?>"><span class = "glyphicon glyphicon-hand-right"></span> Back</a></div>
					<div style = "width:30%; float:left;">
						<label style = "font-size:18px;">Name</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".$f['middlename']." ".$f['lastname']?></label>
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
					<div style = "float:left; width:50%;">
						<label style = "font-size:18px;">Address</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>				
					</div>
					<div style = "float:left; width:20%;">
						<label style = "font-size:18px;">Teeth/Tooth</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['tooth']?></label>
					</div>	
					<div style = "float:left; width:25%;">
						<label style = "font-size:18px;">Dentist</label>
						<br />
						<label style = "font-size:18px;" class = "text-muted"><?php echo $f['dentist']?></label>
					</div>
					
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Health Center Patient Record Management System 2015</label>
	</div>
	<?php require'script3.php'?>
</body> 
</html>