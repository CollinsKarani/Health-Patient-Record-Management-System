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
		<link rel="stylesheet" href="css/jquery-ui.css" />
		<script src="js/jquery.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script>
		$(function() {
			$( "#datepicker" ).datepicker();
		});
		</script>
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
				<center><label>PRENATAL</label></center>
			</div>
		</div>
		<div class = "panel panel-default">
			<div class = "panel-heading">
				<label>PRENATAL FORM</label>	<a style = "float:right; margin-top:-4px;" href = "prenatal_pending.php?itr_no=<?php echo $_GET['itr_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
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
					<input class = "form-control" name = "date" size = "60" required = "required" type = "text" id = "datepicker" style = "width:15%;" />
				</div>
				<br />
				<br />
				<div class = "form-group">
					<label for = "chief_complain">Chief Complain</label>
					<input class = "form-control" type = "text" name = "chief_complain" required = "required" />
					<br />
					<label for = "attending_physician">Attending Physician</label>
					<input class = "form-control" type = "text" name = "attending_physician" required = "required" style= "width:20%;" />
					<br />
					<h4><b>Evaluation/Interpratation:</b></h4>
					<h3><center><b>OBSTETRIC ULTRASOUND</b></center></h3>
				</div>
				<br />
				<div class = "form-inline">
					<label for = "lmp">LMP:</label>
					<input type = "text" name = "lmp" class = "form-control"  />
					<label style = "margin-left:20%;" for = "fhr">FHR:</label>
					<input type = "text" name = "fhr" class = "form-control"  />
					<br />
					<br />
					<label for = "ga_by_lmp">GA by LMP:</label>
					<input type = "text" name = "ga_by_lmp" class = "form-control"  />
					<label style = "margin-left:16.2%;" for = "ga_by_sonar">GA by SONAR:</label>
					<input type = "text" name = "ga_by_sonar" class = "form-control"  />	
					<br />
					<br />
					<label for = "edc_by_lmp">EDC by LMP:</label>
					<input type = "text" name = "edc_by_lmp" class = "form-control"  />
					<label style = "margin-left:15.5%;" for = "edc_by_utz">EDZ by UTZ:</label>
					<input type = "text" name = "edc_by_utz" class = "form-control"  />	
					<br />
					<br />
					<label for = "pregnancy_age">Pregnancy Age:</label>
					<input type = "text" class = "form-control" name = "pregnancy_age" />
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
					<center><input type = "text" name = "biparietal_diameter" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "head_circumference" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "abdominal_circumference" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "femoral_length" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "crown_rump_length" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "mean_gest_sac_diameter" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "average_fetal_weight" class = "form-control"  /></center>
				</div>
				<div style = "width:27%; margin-left:8%; float:left;" class = "form-inline">
					<center><label>Equivalent Age</label></center>
					<center><input type = "text" name = "biparietal_diameter_eq" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "head_circumference_eq" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "abdominal_circumference_eq" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "femoral_length_eq" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "crown_rump_length_eq" class = "form-control"  /></center>
					<br />
					<center><input type = "text" name = "mean_gest_sac_diameter_eq" class = "form-control"  /></center>
				</div>
				<br style = "clear:both;" />
				<br/>
				<label style = "font-size:20px;">OB Description Report:</label>
				<br />
				<div style = "font-size:16px;" class = "form-inline">
					<label for = "gestation">Gestation</label>
					<input style = "margin-left:105px;"  type = "checkbox" class = "gestation form-control" name = "gestation" value = "Single" />
					<label>Single<label>
					<input style = "margin-left:40px;" type = "checkbox" class = "gestation form-control" name = "gestation" value = "Multiple" />
					<label>Multiple</label>
				</div>
				<div style = "font-size:16px;" class = "form-inline">
					<label for = "presentation_lie">Presentation/Lie</label>
					<input style = "margin-left:54px;" class = "form-control presentation_lie" type = "checkbox" name = "presentation_lie" value = "Cephalic" />
					<label>Cephalic<label>
					<input style = "margin-left:40px;" class = "form-control presentation_lie" type = "checkbox" name = "presentation_lie" value = "Breech" />
					<label>Breech</label>
					<input style = "margin-left:40px;" class = "form-control presentation_lie" type = "checkbox" name = "presentation_lie" value = "Transverse" />
					<label>Transverse</label>
					<input style = "margin-left:40px;" class = "form-control presentation_lie" type = "checkbox" name = "presentation_lie" value = "Oblique" />
					<label>Oblique</label>
					<input style = "margin-left:40px;" class = "form-control presentation_lie" type = "checkbox" name = "presentation_lie" value = "Variable" />
					<label>Variable</label>
				</div>
				<div style = "font-size:16px;" class = "form-inline">
					<label for = "amniotic_fluid">Amniotic FLuid</label>
					<input style = "margin-left:62px;" class = "form-control amniotic_fluid" type = "checkbox" name = "amniotic_fluid" value = "Normal" />
					<label>Normal<label>
					<input style = "margin-left:40px;" class = "form-control amniotic_fluid" type = "checkbox" name = "amniotic_fluid" value = "Decreased" />
					<label>Decreased</label>
					<input style = "margin-left:40px;" class = "form-control amniotic_fluid" type = "checkbox" name = "amniotic_fluid" value = "Increased" />
					<label>Increased</label>
				</div>
				<label style = " margin-left:146px; font-size:16px;">AF index:</label>
				<div style = "font-size:16px;" class = "form-inline">
					<label for = "placenta_location">Placenta Location</label>
					<input style = "margin-left:41px;" class = "form-control placenta_location" type = "checkbox" name = "placenta_location" value = "Fundus" />
					<label>Fundus<label>
					<input style = "margin-left:40px;" class = "form-control placenta_location" type = "checkbox" name = "placenta_location" value = "Anterior" />
					<label>Anterior</label>
					<input style = "margin-left:40px;" class = "form-control placenta_location" type = "checkbox" name = "placenta_location" value = "Posterior" />
					<label>Posterior</label>
					<input style = "margin-left:40px;" class = "form-control placenta_location" type = "checkbox" name = "placenta_location" value = "R Lateral" />
					<label>R Lateral</label>
					<input style = "margin-left:40px;" class = "form-control placenta_location" type = "checkbox" name = "placenta_location" value = "L Lateral" />
					<label>L Lateral</label>
				</div>
				<div style = "font-size:16px;" class = "form-inline">
					<label for = "previa">Previa</label>
					<input style = "margin-left:129px;" class = "form-control previa" type = "checkbox" name = "previa" value = "Low Lying" />
					<label>Low Lying<label>
					<input style = "margin-left:40px;" class = "form-control previa" type = "checkbox" name = "previa" value = "Marginal" />
					<label>Marginal</label>
					<input style = "margin-left:40px;" class = "form-control previa" type = "checkbox" name = "previa" value = "Complete" />
					<label>Complete</label>
					<input style = "margin-left:40px;" class = "form-control previa" type = "checkbox" name = "previa" value = "Partial" />
					<label>Partial</label>
				</div>
				<div style = "font-size:16px;" class = "form-inline">
					<label for = "placenta_grade">Placenta Grade</label>
					<input style = "margin-left:60px;" class = "form-control placenta_grade" type = "checkbox" name = "placenta_grade" value = "0" />
					<label>0<label>
					<input style = "margin-left:40px;" class = "form-control placenta_grade" type = "checkbox" name = "placenta_grade" value = "1" />
					<label>1</label>
					<input style = "margin-left:40px;" class = "form-control placenta_grade" type = "checkbox" name = "placenta_grade" value = "2" />
					<label>2</label>
					<input style = "margin-left:40px;" class = "form-control placenta_grade" type = "checkbox" name = "placenta_grade" value = "3" />
					<label>3</label>
				</div>
				<div style = "font-size:16px;" class = "form-inline">
					<label for = "fetal_activity">Fetal Activity</label>
					<input style = "margin-left:77px;" class = "form-control fetal_activity" type = "checkbox" name = "fetal_activity" value = "limb" />
					<label>Limb<label>
					<input style = "margin-left:40px;" class = "form-control fetal_activity" type = "checkbox" name = "fetal_activity" value = "heart" />
					<label>Heart</label>
					<input style = "margin-left:40px;" class = "form-control fetal_activity" type = "checkbox" name = "fetal_activity" value = "Breathing" />
					<label>Breathing</label>
				</div>
				<br />
				<div class = "form-group">
					<label for = "comments">COMMENTS</label>
					<textarea class = "form-control" name = "comments" style = "resize:none;"></textarea>
					<input type = "hidden" value = "<?php echo $f['itr_no']?>" name = "itr_no" />
					<input type = "hidden" value = "<?php echo $fetch['user_id']?>" name = "user_id" />
				</div>
				<div class = "form-inline">
					<label for = "radiologist">Radiologist</label>
					<input type = "text" class = "form-control" name = "radiologist" required = "required" />
				</div>
				<br />
				<div class = "form-inline">
					<button class = "btn btn-primary" name = "save_p" ><span class = "glyphicon glyphicon-save"></span> SAVE</button>
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
				$(".gestation").on("change", function(){
					if($(".gestation:checked").length == 1){
							$(".gestation").attr("disabled", "disabled");
							$(".gestation:checked").removeAttr("disabled");
						}else{
							$(".gestation").removeAttr("disabled");
						}
				});
				$(".presentation_lie").on("change", function(){
					if($(".presentation_lie:checked").length == 1){
							$(".presentation_lie").attr("disabled", "disabled");
							$(".presentation_lie:checked").removeAttr("disabled");
						}else{
							$(".presentation_lie").removeAttr("disabled");
						}
				});
				$(".amniotic_fluid").on("change", function(){
					if($(".amniotic_fluid:checked").length == 1){
							$(".amniotic_fluid").attr("disabled", "disabled");
							$(".amniotic_fluid:checked").removeAttr("disabled");
						}else{
							$(".amniotic_fluid").removeAttr("disabled");
						}
				});
				$(".placenta_location").on("change", function(){
					if($(".placenta_location:checked").length == 1){
							$(".placenta_location").attr("disabled", "disabled");
							$(".placenta_location:checked").removeAttr("disabled");
						}else{
							$(".placenta_location").removeAttr("disabled");
						}
				});
				$(".previa").on("change", function(){
					if($(".previa:checked").length == 1){
							$(".previa").attr("disabled", "disabled");
							$(".previa:checked").removeAttr("disabled");
						}else{
							$(".previa").removeAttr("disabled");
						}
				});
				$(".placenta_grade").on("change", function(){
					if($(".placenta_grade:checked").length == 1){
							$(".placenta_grade").attr("disabled", "disabled");
							$(".placenta_grade:checked").removeAttr("disabled");
						}else{
							$(".placenta_grade").removeAttr("disabled");
						}
				});
				$(".fetal_activity").on("change", function(){
					if($(".fetal_activity:checked").length == 1){
							$(".fetal_activity").attr("disabled", "disabled");
							$(".fetal_activity:checked").removeAttr("disabled");
						}else{
							$(".fetal_activity").removeAttr("disabled");
						}
				});
			});
		</script>
		<script>
			$(function() {
				$( "#datepicker" ).datepicker();
			});
		</script>
		
</html>