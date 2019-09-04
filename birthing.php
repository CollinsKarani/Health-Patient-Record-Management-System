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
				<label>BIRTHING ADMISSION FORM</label>	<a style = "float:right; margin-top:-4px;" href = "birthing_pending.php?itr_no=<?php echo $_GET['itr_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data">
			<?php
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$q1 = $conn->query("SELECT * FROM `complaints` WHERE `com_id` = '$_GET[comp_id]' && `itr_no` = '$_GET[itr_no]' && `section` = 'Prenatal'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
				$f = $q->fetch_array();
			?>	
			<div class = "panel-body">
				<div class = "alert alert-info">Basic Information</div>
				<div style = "float:left; width:30%;">
					<label>NAME:</label>
					<br />
					<label class = "text-muted"><?php echo $f['firstname']." ".substr($f['middlename'], 0,1).". ".$f['lastname']?></label>
				</div>	
				<div style = "float:left; width:10%;">	
					<label>AGE:</label>
					<br />
					<label class = "text-muted"><?php echo $f['age']?></label>
				</div>
				<div style = "width:40%; float:left;">
					<label>ADDRESS:</label>
					<br />
					<label class = "text-muted"><?php echo $f['address']?></label>
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;"/>
				
				<div class = "form-inline">
					<label>DATE:</label>
					<input type = "date" name = "date" class = "form-control" />
					<label style = "margin-left:50px;">TIME:</label>
					<input type = "time" name = "time" class = "form-control"/>
					<label>a.m / p.m.</label>
				</div>
				<br />
				<div class = "form-inline">
					<label>CHIEF COMPLAINT:</label>
					<input type = "text" name = "chief_complaint" size = "60" class = "form-control" />
				</div>
				<br />
				<div class = "form-group">
					<label>HISTORY:</label>
					<textarea name = "history" class = "form-control" style = "resize:none;"></textarea>
				</div>
				<br />
				<center><label>OB GYNE HISTORY</label></center>
				<hr style = "border:1px solid #000;" />
				<div class = "form-inline" style = " border-right:1px solid #000; height:100%; width:30%; float:left;">
					<label>LMP:</label>
					<input type = "text" name = "lmp" class = "form-control" />
					<br />
					<label>EDC:</label>
					<input style = "margin-left:2px;" type = "text" name = "edc" class = "form-control" />
					<br />
					<label>AOG:</label>
					<input type = "text" name = "aog" class = "form-control" />
				</div>
				<div class = "form-inline" style = "width:60%; margin-left:10px; margin-top:30px; float:left;">
					<label>OB SCORE:</label>
					<label>G:</label>
					<input type = "text" name = "g" size = "2" class = "form-control" />
					<label>P</label>
					<input type = "text" name = "p" size = "2" class = "form-control" />
					<label>(</label>
					<input type = "text" name = "1" size = "2" class = "form-control" />
					<input type = "text" name = "2" size = "2" class = "form-control" />
					<input type = "text" name = "3" size = "2" class = "form-control" />
					<input type = "text" name = "4" size = "2" class = "form-control" />
					<label>)</label>
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px solid #000;" />
				<center><label>PHYSICAL EXAMINATION</label></center>
				<div class = "form-inline">
					<label>BP:</label>
					<input type = "text" name = "bp1" size = "2" class = "form-control" />
					<label>/</label>
					<input type = "text" name = "bp2" size = "2" class = "form-control" />
					<label>mmhg PR:</label>
					<input type = "text" name = "pr" size = "5" class = "form-control" />
					<label>bpm RR:</label>
					<input type = "text" name = "rr" size = "5" class = "form-control" />
					<label>cpm T:</label>
					<input type = "text" name = "t" size = "4" class = "form-control" />
					<label>⁰C</label>
				</div>
				<br />
				<div style = "float:left; width:25%;" class = "form-inline">
					<label>HEAD & NECK</label>
					<br />
					<input type = "text" name = "head_neck" class = "form-control" />
				</div>
				<div class = "form-inline" style = "float:left; width:25%;" >
					<label>CHEST</label>
					<br />
					<input type = "text" name = "chest" class = "form-control" />
				</div>
				<div style = "float:left; width:25%;"  class = "form-inline">
					<label>HEART</label>
					<br />
					<input type = "text" name = "heart" class = "form-control" />
				</div>
				<br />
				<br />
				<br />
				<br style = "clear:both;"/>
				<div style = "float:left; width:25%;"  class = "form-inline">
					<label>ABDOMEN: UTERINE SIZE:</label>
					<input type = "text" name = "abdomen" class = "form-control" />
					<label>cm FHB:</label>
					<input type = "text" name = "fhb" class = "form-control" />
					<label>bpm LOC:</label>
					<input type = "text" name = "loc" class = "form-control" />
				</div>
				<div style = "float:left; width:25%;"  class = "form-inline">
					<label>EXTREMITIES:</label>
					<br />
					<input type = "text" name = "extremities" class = "form-control" />
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px solid #000;" />
				<center><label>INTERNAL EXAMINATION (IE)</label></center>
				<br />
				<div style = "float:left; width:25%;"  class = "form-inline">
					<label>VULVA:</label>
					<br />
					<input type = "text" name = "vulva" class = "form-control" />
				</div>
				<div class = "form-inline" style = "float:left; width:25%;" >
					<label>VAGINA:</label>
					<br />
					<input type = "text" name = "vagina" class = "form-control" />
				</div>
				<div class = "form-inline" style = "float:left; width:25%;" >
					<label>CERVIX:</label>
					<br />
					<input type = "text" name = "cervix" class = "form-control" />
				</div>
				<div class = "form-inline" style = "float:left; width:25%;" >
					<label>UTERUS:</label>
					<br />
					<input type = "text" name = "uterus" class = "form-control" />
				</div>
				<br />
				<br />
				<br />
				<br style = "clear:both;"/>
				<div class = "form-inline" style = "float:left; width:25%;" >
					<label>BOW:</label>
					<br />
					<input type = "text" name = "bow" class = "form-control" />
				</div>
				<div class = "form-inline" style = "float:left; width:25%;" >
					<label>PRESENTATION:</label>
					<br />
					<input type = "text" name = "presentation" class = "form-control" />
				</div>
				<div class = "form-inline" style = "float:left; width:25%;" >
					<label>VAGINAL DISCHARGE:</label>
					<br />
					<input type = "text" name = "vaginal_discharge" class = "form-control" />
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px solid #000;" />
				<div class = "form-inline">
					<label>STAFF ON DUTY:</label>
					<input type = "text" name = "staff" class = "form-control" />
					<input type = "hidden" name = "itr_no" value = "<?php echo $_GET['itr_no']?>" />
					<input type = "hidden" name = "user_id" value = "<?php echo $_SESSION['user_id']?>" />
				</div>
				<br />
				<div class = "form-inline">
					<button class = "btn btn-primary" name = "save_birth"><span class = "glyphicon glyphicon-save"></span> SAVE</button>
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