<!DOCTYPE html>
<html>
<head>
	<style>
	@media print {  
		@page {
			size:8.5in 13in;
			max-width:8.5in;
		}
}
		#print{
			width:850px;
			height:1100px;
			overflow:hidden;
			margin:auto;
			border:2px solid #000;
		}
	</style>
</head> 
<body> 
	<?php
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$q = $conn->query("SELECT * FROM `prenatal` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' && `prenatal_no` = '$_GET[prenatal_no]'") or die(mysqli_error());
			$c = $q->num_rows;
			$f = $q->fetch_array();
	?>		
<button onclick="printContent('print')">Print Content</button>
<button><a style = "text-decoration:none; color:#000;" href = "prenatal_form.php?itr_no=<?php echo $f['itr_no']?>&prenatal_no=<?php echo $_GET['prenatal_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print">Back</a></button>
<br />
<br />
	<div id="print" style = "max-width:850px;">
		<div style = "margin:10px;">	
			<center><label>Republic of the Philippines</label></center>
			<center><label>Province of Negros Occidental</label></center>
			<center><label>CITY OF VICTORIAS</label></center>
			<center><label>City Health Office</label></center>
			<center><label>Tel. No. 495-4985 / 495-5991</label></center>
			<br />
			<center><label><b>RADIOLOGY / ULTRASOUND REPORT</b></label></center>
			<br />
			<label>Ultrasound / X-ray No.</label>
			<div style = "width:100%; margin-left:5px; max-width:800px; margin-right:5px;">
					<div style = "float:left; margin-left:10px; width:35%; border-top:1px solid #000; border-bottom:1px solid #000; padding:10px; height:100%;">
						<label>Name</label>
						<br />
						<label style = "margin-left:15px;">
							<?php 
								if(($f['firstname'] == "") && ($f['lastname'] == "")){
									echo " ";
								}else{
									echo $f['firstname']." ".$f['lastname'];
								}
							?></label>
					</div>
					<div style = "float:left; width:5%; height:100%; border-top:1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000; padding:10px;">
						<label>Age:</label>
						<br />
						<label><?php 
							if($f['age'] == ""){
								echo "<br />";
							}else{
								echo $f['age'];
							}
						?></label>
					</div>
					<div style = "float:left; width:10%; height:100%; border-top:1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000; padding:10px;">
						<label>Sex:</label>
						<br />
						<label>
							<?php 
								if($f['gender'] == ""){
									echo "<br />";
								}else{
									echo $f['gender'];
								}	
							?></label>
					</div>
					<div style = "float:left; width:15%; height:100%; border-top:1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000; padding:10px;">
						<label>Civil Status:</label>
						<br />
						<label>
							<?php 
								if($f['civil_status'] == ""){
									echo "<br />";
								}else{
									echo $f['civil_status'];
								}	
							?></label>
					</div>
					<div style = "float:left; width:17%; height:100%; border-top:1px solid #000; border-bottom:1px solid #000; border-left:1px solid #000; padding:10px;">
						<label>Date:</label>
						<br />
						<label>
							<?php 
								if($f['date'] == ""){
									echo "<br />";
								}else{
									echo $f['date'];
								}
							?></label>
					</div>
					<br style = "clear:both;"/>
					<div style = "border-bottom:1px solid #000; width:95%; max-width:740px; margin-left:10px; padding:10px; ">
						<label>Address:</label>
						<br />
						<label>
							<?php 
								if($f['address'] == ""){
									echo "<br />";
								}else{
									echo $f['address'];
								}
							?></label>
					</div>
					<div style = "border-bottom:1px solid #000; width:95%; max-width:740px; margin-left:10px; padding:10px; ">
						<label>Chief Complaint:</label>
						<br />
						<label>
							<?php 
								if($f['chief_complaint'] == ""){
										echo "<br />";
								}else{
									echo $f['chief_complaint'];
								}
							?></label>
					</div>
					<div style = "border-bottom:1px solid #000; width:95%; max-width:740px; margin-left:10px; padding:10px; ">
						<label>Attending Physician:</label>
						<br />
						<label><?php echo $f['attending_physician']?></label>
					</div>
			</div>
			<label>Evaluation / Interpretation</label>
				<br />
				<center><label>OBSTETRIC ULTRASOUND</label></center>
				<div style = "float:left; width:40%; margin:10px;">
					<label><b>LMP:</b></label> <label><?php echo $f['lmp']?></label>
					<br />
					<label><b>GA by LMP:</b></label> <label><?php echo $f['ga_by_lmp']?></label>
					<br />
					<label><b>EDC by LMP:</b></label> <label><?php echo $f['edc_by_lmp']?></label>
				</div>
				<div style = "float:left; width:40%; margin:10px; ">
					<label><b>FHR:</b></label> <label><?php echo $f['fhr']?></label>
					<br />
					<label><b>GA by SONAR:</b></label> <label><?php echo $f['ga_by_sonar']?></label>
					<br />
					<label><b>EDC by UTZ:</b></label> <label><?php echo $f['edc_by_utz']?></label>
				</div>
				<br style = "clear:both;"/>
				<label><b>Pregnancy Age:</b></label> <label><?php echo $f['pregnancy_age']?></label>
				<br />
				<div style = "width:30%; float:left;">
					<center><label><b>Parameters</b></label></center>
					<label>Biparietal Diameter</label>
					<br />
					<label>Head Circumference</label>
					<br />
					<label>Abdominal Circumference</label>
					<br />
					<label>Femoral Length</label>
					<br />
					<label>Crown Rump Length</label>
					<br />
					<label>Mean Gest. Sac Diameter</label>
					<br />
					<label>Average Fetal Weight</label>
				</div>
				<div style = "width:30%; margin-left:10px; float:left;">
					<center><label><b>Mesurements</b></label></center>
					<center><label>
					<?php 
						if($f['biparietal_diameter'] == ""){
							echo "<br />";
						}else{
							echo $f['biparietal_diameter'];
						}
					?>
					</label></center>
					<center><label>
					<?php 
						if($f['head_circumference'] == ""){
							echo "<br />";
						}else{
							echo $f['head_circumference'];
						}
					?>
					</label></center>
					<center><label>
					<?php 
						if($f['abdominal_circumference'] == ""){
							echo "<br />";
						}else{
							echo $f['abdominal_circumference'];
						}
					?>
					</label></center>
					<center><label>
					<?php 
						if($f['femoral_length'] == ""){
							echo "<br />";
						}else{
							echo $f['femoral_length'];
						}
					?>
					</label></center>
					<center><label>
					<?php 
						if($f['crown_rump_length'] == ""){
							echo "<br />";
						}else{
							echo $f['crown_rump_length'];
						}
					?>
					</label></center>
					<center><label>
					<?php 
						if($f['mean_gest_sac_diameter'] == ""){
							echo "<br />";
						}else{
							echo $f['mean_gest_sac_diameter'];
						}
					?>
					</label></center>
					<center><label>
					<?php 
						if($f['average_fetal_weight'] == ""){
							echo "<br />";
						}else{
							echo $f['average_fetal_weight'];
						}
					?>
					</label></center>
				</div>
				<div style = "width:30%; margin-left:10px; float:left;">
					<center><label><b>Equivalent Age</b></label></center>
					<center><label>
					<?php 
						if($f['biparietal_eq'] == ""){
							echo "<br />";
						}else{
							echo $f['biparietal_eq'];
						}
					?>
					</label></center>
					<center><label>
					<?php 
						if($f['head_circumference_eq'] == ""){
							echo "<br />";
						}else{
							echo $f['head_circumference_eq'];
						}
					?>
					</label></center>
					<center><label>
					<?php 
						if($f['abdominal_circumference_eq'] == ""){
							echo "<br />";
						}else{
							echo $f['abdominal_circumference_eq'];
						}
					?>
					</label></center>
					<center><label>
					<?php 
						if($f['femoral_length_eq'] == ""){
							echo "<br />";
						}else{
							echo $f['femoral_length_eq'];
						}
					?>
					</label></center>
					<center><label>
					<?php 
						if($f['crown_rump_length_eq'] == ""){
							echo "<br />";
						}else{
							echo $f['crown_rump_length_eq'];
						}
					?>
					</label></center>
					<center><label>
					<?php 
						if($f['mean_gest_sac_diameter_eq'] == ""){
							echo "<br />";
						}else{
							echo $f['mean_gest_sac_diameter_eq'];
						}
					?>
					</label></center>
				</div>
				<br style = "clear:both;"/>
				<br />
				<label><b>OB Description Report</b></label>
				<br />
				<br />
				<label><b>Gestation:</b></label> <label><?php echo $f['gestation']?></label>
				<br />
				<label><b>Presentation/Lie:</b></label> <label><?php echo $f['presentation_lie']?></label>
				<br />
				<label><b>Amniotic Fluid:</b></label> <label><?php echo $f['amniotic_fluid']?></label>
				<br />
				<label><b>Placenta Location:</b></label> <label><?php echo $f['placenta_location']?></label>
				<br />
				<label><b>Previa:</b></label> <label><?php echo $f['previa']?></label>
				<br />
				<label><b>Placenta Grade:</b></label> <label><?php echo $f['placenta_grade']?></label>
				<br />
				<label><b>Fetal Activity:</b></label> <label><?php echo $f['fetal_activity']?></label>
				<br />
				<br />
				<label><b>COMMENTS:</b></label>
				<br />
				<label style = "width:5px; margin:10px; word-wrap:break-word;"><?php echo $f['comments']?></label>
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<br />
				<label style = "float:right;"><u style = "font-size:18px;"><center>
					<?php 
						if($f['radiologist'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo $f['radiologist'];
						}
					?></center></u>
				<center><label>RADIOLOGIST / ULTRASONOLOGIST</label></center></label>
		</div>
	</div>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</html>