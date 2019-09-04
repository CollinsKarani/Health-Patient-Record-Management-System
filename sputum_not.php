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
		<link rel="stylesheet" href="css/jquery-ui.css" />
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
				<center><label>SPUTUM</label></center>
			</div>
		</div>
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<label>SPUTUM FORM</label>	<a style = "float:right; margin-top:-4px;" href = "sputum_pending.php?itr_no=<?php echo $_GET['itr_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data">
			<?php
				$q = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$q1 = $conn->query("SELECT * FROM `complaints` WHERE `com_id` = '$_GET[comp_id]' && `itr_no` = '$_GET[itr_no]' && `section` = 'Sputum'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
				$f = $q->fetch_array();
			?>	
		<div class = "panel-body">
				<div class = "alert alert-info">Basic Information</div>
				<div style = "float:left; width:30%;">
					<label style = "font-size:15px;" for = "name">Name of Patient:</label>
					<br />
					<label style = "font-size:15px;" class = "text-muted"><?php echo $f['firstname']." ".$f['middlename']." ".$f['lastname']?></label>
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
				<hr style = "border:1px dotted #d3d3d3;" />
				<div class = "form-inline">
					<label for = "name_of_collection_unit">Name of collection Unit:</label>
					<input class = "form-control" type = "text" size = "60" name = "name_of_collection_unit" required = "required" />
					<label style = "font-size:15px;" for = "date_of_submission">Date of Submission:</label>
					<label class = "text-muted" style = "font-size:15px;"><?php echo $f1['date']?></label>
				</div>
				<br />
				<div class = "form-inline">
					<label>Disease Classification:</label>
					&nbsp;&nbsp;
					<input type = "checkbox" class = "disease_classification" value = "Pulmonary" name = "disease_classification" />
					<label>PULMONARY</label>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type = "checkbox" class = "disease_classification" value = "Extra Pulmonary" name = "disease_classification" />
					<label>EXTRA-PULMONARY</label>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label>Site:</label>
					<input class = "form-control" type = "text" name = "site" />							
				</div>
				<br />
				<div class = "form-inline">
					<label>Reason for Examination:</label>
					&nbsp;&nbsp;
					<input type = "checkbox" value = "Diagnosis" class = "reason_for_examination" name = "reason_for_examination" />
					<label>DIAGNOSIS</label>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type = "checkbox" value = "Follow-up" class = "reason_for_examination" name = "reason_for_examination" />
					<label>FOLLOW-UP</label>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type = "checkbox" value = "Others" class = "reason_for_examination" name = "reason_for_examination" />
					<label>OTHERS</label>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label>T.B. Case NO.:</label>
					<input class = "form-control" type = "text" name = "case_no" />							
				</div>
				<br />
				<div class = "form-inline">
					<label style = "margin-left:15px;">DATE OF COLLECTION</label>
					<label class = "col-md-4">SPECIMEN</label>
					<br />
					<input class = "form-control" size = "60" type = "text" name = "specimen1" />
					&nbsp;&nbsp;
					<input class = "form-control" size = "60" type = "text"  id = "datepicker1" name = "date_of_collection1" />
					<br />
					<br />
					<input class = "form-control" size = "60" type = "text" name = "specimen2" />
					&nbsp;&nbsp;
					<input class = "form-control" size = "60" type = "text" id = "datepicker2" name = "date_of_collection2" />
					<br />
					<br />
					<input class = "form-control" size = "60" type = "text" name = "specimen3" />
					&nbsp;&nbsp;
					<input class = "form-control" size = "60" type = "text"  id = "datepicker3" name = "date_of_collection3" />
				</div>
				<br />
				<div class = "form-inline">
					<label>Signature of Specimen Collector:</label>
					<input class = "form-control" type = "text" name = "specimen_collector">
					&nbsp;&nbsp;&nbsp;
					<label>REMARKS:</label>
					<input class = "form-control" type = "text" name = "remarks">
					<br />
					<br />
					<label style = "color:#f00 	;">He sure to enter the patient TB case No. for follow-up of patient of chemotheraphy</label>
				</div>
				<br />
				<div class = "form-inline">
					<center><h4><b>SPUTUM MICROSCOPY RESULTS</b></h4></center>
					<br />
					<label>Laboratory Serial No:</label>
					<input type = "text" name = "lab_serial_no1" class = "form-control" /><label> 1</label>
					<input type = "text" name = "lab_serial_no2" class = "form-control" id = "b"/><label> 2</label>
					<input type = "text" name = "lab_serial_no3" class = "form-control" id = "c"  /><label> 3</label>
				</div>
				<br />
				<div class = "form-inline">
				<label>Specimen:</label>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type = "text" name = "specimen_1" class = "form-control" />
					&nbsp;
					<input type = "text" name = "specimen_2" class = "form-control" id = "d" />
					&nbsp;
					<input type = "text" name = "specimen_3" class = "form-control" id = "e" />
				</div>
				<br />
				<div class = "form-inline">
				<label>Visual Appearance:</label>
				&nbsp;&nbsp;
					<input type = "text" name = "visual_appearance1" class = "form-control" />
					&nbsp;
					<input type = "text" name = "visual_appearance2" class = "form-control" id = "f" />
					&nbsp;
					<input type = "text" name = "visual_appearance3" class = "form-control" id = "g"/>
				</div>
				<br />
				<div class = "form-inline">
				<label>Reading:</label>
					<input type = "text" name = "reading" class = "form-control" />
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
					<input class = "form-control" name = "date_of_examination" type = "text" id = "datepicker4" />
					&nbsp;&nbsp;&nbsp;
					<label>Examined by (signature):</label>
					<input class = "form-control" name = "examined_by" type = "text" />
					<input type = "hidden" name = "itr_no" value = "<?php echo $f['itr_no']?>" />
					<input type = "hidden" name = "user_id" value = "<?php echo $_SESSION['user_id']?>" />
				</div>
				<br />
				<br />
				<div class = "form-inline">
					<button class = "btn btn-primary" name = "save_s" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
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
		<script type = "text/javascript">
			$(document).ready(function(){
				$(".disease_classification").on("change", function(){
					if($(".disease_classification:checked").length == 1){
							$(".disease_classification").attr("disabled", "disabled");
							$(".disease_classification:checked").removeAttr("disabled");
						}else{
							$(".disease_classification").removeAttr("disabled");
						}
				});
				$(".reason_for_examination").on("change", function(){
					if($(".reason_for_examination:checked").length == 1){
							$(".reason_for_examination").attr("disabled", "disabled");
							$(".reason_for_examination:checked").removeAttr("disabled");
						if($(".reason_for_examination:checked").val() == "Follow-up"){	
							$("#d").attr("disabled", "disabled");
							$("#e").attr("disabled", "disabled");
						}
					}else{
						$(".reason_for_examination").removeAttr("disabled");
						$("#d").removeAttr("disabled");
						$("#e").removeAttr("disabled");
					}
						
				});
			});
		</script>
		<script src="js/jquery-ui.js"></script>
		<script>
			$(function() {
				$( "#datepicker1" ).datepicker();
				$( "#datepicker2" ).datepicker();
				$( "#datepicker3" ).datepicker();
				$( "#datepicker4" ).datepicker();
			});
		</script>
</html>