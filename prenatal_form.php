<!DOCTYPE html>
<?php
	require_once'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<html lang = "en">
	<head>	
		<title>Patient Health Center Management System</title>
		<meta charset = "UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
	</head>
	<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "images/logo.png" height = "55px" style = "float:left;"><label class = "navbar-brand">Health Center Patient Management System - Victorias City</label>
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
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `prenatal` NATURAL JOIN `itr` WHERE `prenatal_no` = '$_GET[prenatal_no]' && `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
				<label>PRENATAL RESULT FORM</label>	
				<a style = "float:right; margin-top:-4px;" href = "prenatal_record.php?itr_no=<?php echo $f['itr_no']?>&prental_no=<?php echo $f['prenatal_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
				<a style = "margin-right:5px; float:right; margin-top:-4px;" href = "prenatal_print.php?itr_no=<?php echo $f['itr_no']?>&prenatal_no=<?php echo $f['prenatal_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print"></span> PRINT</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data">
			<div class = "panel-body">
				<div class = "alert alert-info">Basic Information</div>
				<div style = "float:left; width:30%;">
					<label style = "font-size:18px;">Name:</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['firstname']." ".substr($f['middlename'], 0,1)." ".$f['lastname']?></label>
				</div>
				<div style = "float:left; width:10%;">
					<label style = "font-size:18px;">Age:</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['age']?></label>
				</div>
				<div style = "float:left; width:10%;">
					<label style = "font-size:18px;">Gender:</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['gender']?></label>
				</div>
				<div style = "float:left; width:12%;">
					<label style = "font-size:18px;">Civil Status:</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['civil_status']?></label>
				</div>
				<div style = "float:left; width:35%;">
					<label style = "font-size:18px;">Address:</label>
					<br />
					<label style = "font-size:18px;" class = "text-muted"><?php echo $f['address']?></label>
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;"/>
				<div class = "form-group">
					<label for = "date">Date:</label>
					<input class = "form-control" name = "date" size = "60" required = "required" value = "<?php echo $f['date']?>" disabled = "disabled" type = "text" style = "width:15%;" />
				</div>
				<br />
				<div class = "form-group">
					<label for = "chief_complain">Chief Complain</label>
					<input class = "form-control" type = "text" name = "chief_complain" value = "<?php echo $f['chief_complaint'] ?>" disabled = "disabled" required = "required" />
					<br />
					<label for = "attending_physician">Attending Physician</label>
					<input class = "form-control" type = "text" name = "attending_physician" value = "<?php echo $f['attending_physician'] ?>" disabled = "disabled" required = "required" style= "width:20%;" />
					<br />
					<h4><b>Evaluation/Interpratation:</b></h4>
					<h3><center><b>OBSTETRIC ULTRASOUND</b></center></h3>
				</div>
				<br />
				<div class = "form-inline">
					<label for = "lmp">LMP:</label>
					<input type = "text" name = "lmp" value = "<?php echo $f['lmp'] ?>" disabled = "disabled" class = "form-control"  />
					<label style = "margin-left:20%;" for = "fhr">FHR:</label>
					<input type = "text" name = "fhr" value = "<?php echo $f['fhr'] ?>" disabled = "disabled" class = "form-control"  />
					<br />
					<br />
					<label for = "ga_by_lmp">GA by LMP:</label>
					<input type = "text" name = "ga_by_lmp" value = "<?php echo $f['ga_by_lmp'] ?>" disabled = "disabled" class = "form-control"  />
					<label style = "margin-left:16.2%;" for = "ga_by_sonar">GA by SONAR:</label>
					<input type = "text" name = "ga_by_sonar" value = "<?php echo $f['ga_by_sonar'] ?>" disabled = "disabled" class = "form-control"  />	
					<br />
					<br />
					<label for = "edc_by_lmp">EDC by LMP:</label>
					<input type = "text" name = "edc_by_lmp" value = "<?php echo $f['edc_by_lmp'] ?>" disabled = "disabled" class = "form-control"  />
					<label style = "margin-left:15.5%;" for = "edc_by_utz">EDZ by UTZ:</label>
					<input type = "text" name = "edc_by_utz" value = "<?php echo $f['edc_by_utz'] ?>" disabled = "disabled" class = "form-control"  />	
					<br />
					<br />
					<label for = "pregnancy_age">Pregnancy Age:</label>
					<input type = "text" class = "form-control" value = "<?php echo $f['pregnancy_age'] ?>" disabled = "disabled" name = "pregnancy_age" />
				</div>
				<br />
				<div style = "width:25%; font-size:16px; float:left;" class = "form-inline">
					<center><label>Parameters</label></center>
					<label for = "biparietal_diameter" style = "margin-top:5px;">Biparietal Diameter</label>
					<br />
					<label for = "Head_circumference" style = "margin-top:30px;">Head Circumference</label>
					<br />
					<label for = "abdominal_circumference" style = "margin-top:25px;">Abdominal Circumference</label>
					<br />
					<label for = "femoral_length" style = "margin-top:25px;">Femoral Length</label>
					<br />
					<label for = "crown_rump_length" style = "margin-top:28px;">Crown Rump Length</label>
					<br />
					<label for = "mean_gest_sac_diameter" style = "margin-top:25px;">Mean Gest. Sac Diameter</label>
					<br />
					<label for = "average_fetal_weight" style = "margin-top:25px;">Average Fetal Weight</label>
				</div>
				<div style = "width:27%; margin-left:8%; float:left;" class = "form-inline">
					<center><label>Measurement</label></center>
					<center><input type = "text" name = "biparietal_diameter" value = "<?php echo $f['biparietal_diameter'] ?>" disabled = "disabled" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "head_circumference" value = "<?php echo $f['head_circumference'] ?>" disabled = "disabled" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "abdominal_circumference" value = "<?php echo $f['abdominal_circumference'] ?>" disabled = "disabled" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "femoral_length" value = "<?php echo $f['femoral_length'] ?>" disabled = "disabled" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "crown_rump_length" value = "<?php echo $f['crown_rump_length'] ?>" disabled = "disabled" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "mean_gest_sac_diameter" value = "<?php echo $f['mean_gest_sac_diameter'] ?>" disabled = "disabled" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "average_fetal_weight" value = "<?php echo $f['average_fetal_weight'] ?>" disabled = "disabled" class = "form-control"  /></center>
				</div>
				<div style = "width:27%; margin-left:8%; float:left;" class = "form-inline">
					<center><label>Equivalent Age</label></center>
					<center><input type = "text" name = "biparietal_diameter_eq" value = "<?php echo $f['biparietal_eq'] ?>" disabled = "disabled" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "head_circumference_eq" value = "<?php echo $f['head_circumference_eq'] ?>" disabled = "disabled" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "abdominal_circumference_eq" value = "<?php echo $f['abdominal_circumference_eq'] ?>" disabled = "disabled" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "femoral_length_eq" value = "<?php echo $f['femoral_length_eq'] ?>" disabled = "disabled" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "crown_rump_length_eq" value = "<?php echo $f['crown_rump_length_eq'] ?>" disabled = "disabled" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "mean_gest_sac_diameter_eq" value = "<?php echo $f['mean_gest_sac_diameter_eq'] ?>" disabled = "disabled" class = "form-control"  /></center>
				</div>
				<br style = "clear:both;" />
				<br/>
				<label style = "font-size:20px;">OB Description Report:</label>
				<br />
				<div style = "font-size:16px;" class = "form-inline">
					<label for = "gestation">Gestation</label>
					<input style = "margin-left:105px;" class = "form-control" type = "text" name = "gestation" value = "<?php echo $f['gestation'] ?>" disabled = "disabled" />
				</div>
				<div style = "font-size:16px;" class = "form-inline">
					<label for = "presentation_lie">Presentation/Lie</label>
					<input style = "margin-left:54px;" class = "form-control" type = "text" name = "presentation_lie" value = "<?php echo $f['presentation_lie'] ?>" disabled = "disabled" />
				</div>
				<div style = "font-size:16px;" class = "form-inline">
					<label for = "amniotic_fluid">Amniotic FLuid</label>
					<input style = "margin-left:62px;" class = "form-control" type = "text" name = "amniotic_fluid" value = "<?php echo $f['amniotic_fluid'] ?>" disabled = "disabled" />
				</div>
				<label style = " margin-left:146px; font-size:16px;">AF index:</label>
				<div style = "font-size:16px;" class = "form-inline">
					<label for = "placenta_location">Placenta Location</label>
					<input style = "margin-left:41px;" class = "form-control" type = "text" name = "placenta_location" value = "<?php echo $f['placenta_location'] ?>" disabled = "disabled" />
				</div>
				<div style = "font-size:16px;" class = "form-inline">
					<label for = "previa">Previa</label>
					<input style = "margin-left:129px;" class = "form-control" type = "text" name = "previa" value = "<?php echo $f['previa'] ?>" disabled = "disabled" />
				</div>
				<div style = "font-size:16px;" class = "form-inline">
					<label for = "placenta_grade">Placenta Grade</label>
					<input style = "margin-left:60px;" class = "form-control" type = "text" name = "placenta_grade" value = "<?php echo $f['placenta_grade'] ?>" disabled = "disabled" />
				</div>
				<div style = "font-size:16px;" class = "form-inline">
					<label for = "fetal_activity">Fetal Activity</label>
					<input style = "margin-left:77px;" class = "form-control" type = "text" name = "fetal_activity" value = "<?php echo $f['fetal_activity'] ?>" disabled = "disabled" />
				</div>
				<br />
				<div class = "form-group">
					<label for = "comments">COMMENTS</label>
					<textarea class = "form-control" name = "comments" disabled = "disabled" style = "resize:none;"><?php echo $f['comments'] ?></textarea>
				</div>
				<div class = "form-inline">
					<label for = "radiologist">Radiologist</label>
					<input type = "text" class = "form-control" name = "radiologist" value = "<?php echo $f['radiologist']?>" disabled = "disabled" size = "60" required = "required" /> 
				</div>
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