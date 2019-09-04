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
			$q = $conn->query("SELECT * FROM `sputum` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' &&`sputum_id` = '$_GET[sputum_id]'") or die(mysqli_error());
			$f = $q->fetch_array();
		?>
		<div class = "alert alert-info">Basic Information 	<a class = "btn btn-success" style = "float:right; margin-top:-5px;" href = "sputum_record.php?itr_no=<?php echo $f['itr_no']?>"><span class = "glyphicon glyphicon-hand-right"></span> Back</a></div>
		<div style = "float:left; width:30%;">
					<label style = "font-size:15px;" for = "name">Name of Patient:</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['firstname']." ".substr($f['middlename'], 0,1).". ".$f['lastname']?></label>
				</div>	
				<div style = "float:left; width:10%;">	
					<label style = "font-size:15px;" for = "age">Age:</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['age']?></label>
				</div>	
				<div style = "float:left; width:10%;">	
					<label style = "font-size:15px;" for = "gender">Gender:</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['gender']?></label>	
				</div>
				<div style = "float:left; width:40%;">
					<label style = "font-size:15px;">Address:</label>
					<br />
					<label class = "text-muted" style = "font-size:15px;"><?php echo $f['address']?></label>
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" >
				<div class = "form-inline">
					<label for = "name_of_collection_unit">Name of collection Unit:</label>
					<input class = "form-control" type = "text" size = "60" name = "name_of_collection_unit" value = "<?php echo $f['name_of_collection_unit']?>" disabled = "disabled" required = "required" />
					&nbsp;&nbsp;&nbsp;
					<label for = "date_of_submission">Date of Submission:</label>
					<label class = "text-muted" style = "font-size:15px;"><?php echo date("m/d/Y", strtotime($f['date_of_submission']))?></label>
				</div>
				<br />
				<div class = "form-inline">
					<label>Disease Classification:</label>
					&nbsp;&nbsp;
					<input type = "text" class = "form-control" name = "disease_classification"  disabled = "disabled" value = "<?php echo $f['disease_classification']?>" />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label>Site:</label>
					<input class = "form-control"  disabled = "disabled" value = "<?php echo $f['site']?>" type = "text" name = "site" />							
				</div>
				<br />
				<div class = "form-inline">
					<label>Reason for Examination:</label>
					&nbsp;&nbsp;
					<input type = "text" class = "form-control"  disabled = "disabled" value = "<?php echo $f['reason_for_examination']?>"name = "reason_for_examination" />
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label>T.B. Case NO.:</label>
					<input class = "form-control"  disabled = "disabled" value = "<?php echo $f['case_no']?>" type = "text" name = "case_no" />							
				</div>
				<br />
				<div class = "form-inline">
					<label style = "margin-left:15px;">DATE OF COLLECTION</label>
					<label class = "col-md-4">SPECIMEN</label>
					<br />
					<input class = "form-control"  disabled = "disabled" value = "<?php echo $f['specimen1']?>" size = "60" type = "text" name = "specimen1" />
					&nbsp;&nbsp;
					<input class = "form-control" size = "60"  disabled = "disabled" value = "<?php echo $f['date_of_collection1']?>" type = "text" name = "date_of_collection1" />
					<br />
					<br />
					<input class = "form-control" size = "60"  disabled = "disabled" value = "<?php echo $f['specimen2']?>" type = "text" name = "specimen2" />
					&nbsp;&nbsp;
					<input class = "form-control" size = "60"  disabled = "disabled" value = "<?php echo $f['date_of_collection2']?>" type = "text" name = "date_of_collection2" />
					<br />
					<br />
					<input class = "form-control" size = "60"  disabled = "disabled" value = "<?php echo $f['specimen3']?>" type = "text" name = "specimen3" />
					&nbsp;&nbsp;
					<input class = "form-control" size = "60"  disabled = "disabled" value = "<?php echo $f['date_of_collection3']?>" type = "text" name = "date_of_collection3" />
				</div>
				<br />
				<div class = "form-inline">
					<label>Signature of Specimen Collector:</label>
					<input class = "form-control"  disabled = "disabled" value = "<?php echo $f['specimen_collector']?>" type = "text" name = "specimen_collector">
					&nbsp;&nbsp;&nbsp;
					<label>REMARKS:</label>
					<input class = "form-control"  disabled = "disabled" value = "<?php echo $f['remarks']?>" type = "text" name = "remarks">
					<br />
					<br />
					<label style = "color:#f00 	;">He sure to enter the patient TB case No. for follow-up of patient of chemotheraphy</label>
				</div>
				<br />
				<div class = "form-inline">
					<center><h4><b>SPUTUM MICROSCOPY RESULTS</b></h4></center>
					<br />
					<label>Laboratory Serial No:</label>
					<input type = "text" name = "lab_serial_no1" class = "form-control"  disabled = "disabled" value = "<?php echo $f['lab_serial_no1']?>" /><label> 1</label>
					<input type = "text" name = "lab_serial_no2" class = "form-control"  disabled = "disabled" value = "<?php echo $f['lab_serial_no2']?>" /><label> 2</label>
					<input type = "text" name = "lab_serial_no3" class = "form-control"  disabled = "disabled" value = "<?php echo $f['lab_serial_no3']?>" /><label> 3</label>
				</div>
				<br />
				<div class = "form-inline">
				<label>Specimen:</label>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type = "text" name = "specimen_1"  disabled = "disabled" value = "<?php echo $f['specimen_1']?>" class = "form-control" />
					&nbsp;
					<input type = "text" name = "specimen_2"  disabled = "disabled" value = "<?php echo $f['specimen_2']?>" class = "form-control" />
					&nbsp;
					<input type = "text" name = "specimen_3"  disabled = "disabled" value = "<?php echo $f['specimen_3']?>" class = "form-control" />
				</div>
				<br />
				<div class = "form-inline">
				<label>Visual Appearance:</label>
				&nbsp;&nbsp;
					<input type = "text" name = "visual_appearance1"  disabled = "disabled" value = "<?php echo $f['visual_appearance1']?>" class = "form-control" />
					&nbsp;
					<input type = "text" name = "visual_appearance2"  disabled = "disabled" value = "<?php echo $f['visual_appearance2']?>" class = "form-control" />
					&nbsp;
					<input type = "text" name = "visual_appearance3"  disabled = "disabled" value = "<?php echo $f['visual_appearance3']?>" class = "form-control" />
				</div>
				<br />
				<div class = "form-inline">
				<label>Reading:</label>
					<input type = "text" name = "reading"  disabled = "disabled" value = "<?php echo $f['reading']?>" class = "form-control" />
					<br />
					<br />
					<label>Lab. Diagnosis</label>
				</div>
				<br />
				<div class = "form-group">
					<label style = "color:#f00;">* Specimen #2 & 3 - not applicable if sputum follow-up</label>
					<br />
					<label style = "color:#f00;">** Mace - purulent, blood stained saliva etc.</label>
				</div>
				<div class = "form-inline">
					<label>Date of examination:</label>
					<input class = "form-control" name = "date_of_examination"  disabled = "disabled" value = "<?php echo $f['date_of_examination']?>" type = "text" />
					&nbsp;&nbsp;&nbsp;
					<label>Examined by (signature):</label>
					<input class = "form-control"  disabled = "disabled" value = "<?php echo $f['examined_by']?>" name = "examined_by" type = "text" />
				</div>
				<br />
				<br />
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Health Center Patient Record Management System 2015</label>
	</div>
	<?php require'script3.php'?>
</body> 
</html>