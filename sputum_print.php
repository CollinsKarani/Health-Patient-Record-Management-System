<!DOCTYPE html>
<html>
<head>
	<style>
		@media print{
			@page{
				size:letter;
			}
		}
		
		#print{
			width:850px;
			height:1100px;
			margin:auto;
			border:2px solid #000;
		}
	</style>
</head> 
<body> 
	<?php
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$q = $conn->query("SELECT * FROM `sputum` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' && `sputum_id` = '$_GET[sputum_id]'") or die(mysqli_error());
			$f = $q->fetch_array();
	?>		
<button onclick="printContent('print')">Print Content</button>
<button><a style = "text-decoration:none; color:#000;" href = "sputum_form.php?itr_no=<?php echo $f['itr_no']?>&sputum_id=<?php echo $_GET['sputum_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print">Back</a></button>
<br />
<br />
	<div id="print">
		<div style = "margin:10px;">	
			<label><center><b>CITY HEALTH OFFICE</b></center></label>
			<br />
			<label><center><b><u>NTP LABORATORY REQUEST FORM</u></b></center></label>
			<br />
			<label>Name of collection Unit: 
				<?php 
					if($f['name_of_collection_unit'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";	
					}else{
						echo "<u>".$f['name_of_collection_unit']."</u>";
					}
				?></label>
			&nbsp;&nbsp;&nbsp;
			<label>Date of Submission: 
			<?php 
				if($f['date_of_submission'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";	
				}else{
					echo "<u>".date("m/d/Y", strtotime($f['date_of_submission']))."</u>";
				}
			?></label>
			<br />
			<label>Name Of Patient: 
			<?php 
				if($f['firstname'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";	
				}else{
					echo "<u>".$f['firstname']." ".substr($f['middlename'], 0,1)." ".$f['lastname']."</u>";
				}
			?></label>
			<label>Age: 
			<?php 
				if($f['age'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";	
				}else{
					echo "<u>".$f['age']."</u>";
				}
			?></label>
			<label>Sex: 
			<?php 
				if($f['gender'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";	
				}else{
					echo "<u>".$f['gender']."</u>";
				}
			?></label>
			<br />
			<label>Address: (in full) 
			<?php 
				if($f['address'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";	
				}else{
					echo "<u>".$f['address']."</u>";
				}
			?></label>
			<br />
			<br />
			<label>Disease Classification: 
			<?php 
				if($f['disease_classification'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";	
				}else{
					echo "<u>".$f['disease_classification']."</u>";
				}
			?></label>
			<br />
			<label style = "float:right; margin-right:300px;">Site: 
			<?php 
				if($f['site'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";	
				}else{
					echo "<u>".$f['site']."</u>";
				}
			?></label>
			<br />
			<label>Reason for Examination: 
			<?php 
				if($f['reason_for_examination'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";	
				}else{
					echo "<u>".$f['reason_for_examination']."</u>";
				}
			?></label>
			<br />
			<label style = " float:right; margin-right:250px;">T.B. Case No. 
			<?php 
				if($f['case_no'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['case_no']."</u>";
				}
			?></label>
			<br />
			<div style = "width:40%; float:left;">
			<center><b>SPECIMEN</b></center>
			<label>1.	
				<?php 
					if($f['specimen1'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['specimen1']."</u>";
					}
				?></label>
			<br />
			<label>2. 
			<?php 
				if($f['specimen2'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['specimen1']."</u>";
				}
			?></label>
			<br />
			<label>3. 
			<?php 
				if($f['specimen3'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['specimen1']."</u>";
				}
			?></label>
			</div>
			<div style = "width:40%; margin-left:3%; float:left;">
			<center><b>DATE OF COLLECTION UNIT</b></center>
			<label>1. 
			<?php 
				if($f['date_of_collection1'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".date("m/d/Y", strtotime($f['date_of_collection1']))."</u>";
				}
			?></label>
			<br />
			<label>2. 
			<?php 
				if($f['date_of_collection2'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".date("m/d/Y", strtotime($f['date_of_collection2']))."</u>";
				}
			?></label>
			<br />
			<label>3. 
			<?php 
				if($f['date_of_collection3'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".date("m/d/Y", strtotime($f['date_of_collection3']))."</u>";
				}
			?></label>
			</div>
			<br />
			<br />
			<br />
			<br />
			<label>Signature of Specimen Collector: 
			<?php 
				if($f['specimen_collector'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['specimen_collector']."</u>";
				}
			?></label>
			<label style = "float:right; margin-right:25%;">Remarks: 
			<?php 
				if($f['remarks'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['remarks']."</u>";
				}
			?></label>
			<br />
			<br />
			<label><b>He sure enter the patients TB case No. for follow-up of patients of chemotheraphy</b></label>
			<br />
			<br />
			<label><center><b>SPUTUM MICROSCOPY RESULTS</b></center></label>
			<br />
			<label style = "float:left;">Laboratory Serial No. </label>
			<div style = "width:150px; margin-left:10px; float:left;"><label>
			<?php 
				if($f['lab_serial_no1'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['lab_serial_no1']."</u>";
				}
			?></label><label style = "float:right;">1</label></div>
			<div style = "width:150px; margin-left:10px; float:left;"><label>
			<?php 
				if($f['lab_serial_no2'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['lab_serial_no2']."</u>";
				}
			?></label><label style = "float:right;">2</label></div>
			<div style = "width:150px; margin-left:10px; float:left;"><label>
			<?php 
				if($f['lab_serial_no3'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['lab_serial_no3']."</u>";
				}
			?></label><label style = "float:right;">3</label></div>
			<br />
			<label style = "float:left;">Specimen:</label>
			<div style = "width:150px; margin-left:83px; float:left;"><label>
			<?php 
				if($f['specimen_1'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['specimen_1']."</u>";
				}
			?></label><label style = "float:right;">1</label></div>
			<div style = "width:150px; margin-left:10px; float:left;"><label>
			<?php 
				if($f['specimen_2'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['specimen_2']."</u>";
				}
			?></label><label style = "float:right;">2</label></div>
			<div style = "width:150px; margin-left:10px; float:left;"><label>
			<?php 
				if($f['specimen_3'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['specimen_3']."</u>";
				}
			?></label><label style = "float:right;">3</label></div>
			<br />
			<label style = "float:left;">Visual Appeareance:</label>
			<div style = "width:150px; margin-left:17px; float:left;"><label>
			<?php 
				if($f['visual_appearance1'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['visual_appearance1']."</u>";
				}
			?></label><label style = "float:right;">1</label></div>
			<div style = "width:150px; margin-left:10px; float:left;"><label>
			<?php 
				if($f['visual_appearance2'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['visual_appearance2']."</u>";
				}
			?></label><label style = "float:right;">2</label></div>
			<div style = "width:150px; margin-left:10px; float:left;"><label>
			<?php 
				if($f['visual_appearance3'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['visual_appearance3']."</u>";
				}
			?></label><label style = "float:right;">3</label></div>
			<br />
			<label style = "float:left;">Reading: 
			<?php 
				if($f['reading'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['reading']."</u>";
				}
			?></label>
			<br />
			<br />
			<label><b>Lab Diagnostic</b></label>
			<br />
			<label style = "margin-left:15%;">* Specimen # 2 & 3 - not applicable if sputum follow-up</label>
			<br />
			<label style = "margin-left:15%;">**  Mace - purulent, blood stained saliva etc.</label>
			<br />
			<br />
			<label>Date of Examination: 
			<?php 
				if($f['date_of_examination'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".date("m/d/Y", strtotime($f['date_of_examination']))."</u>";
				}
			?></label>
			<label style = "margin-left:2%;">Examined by (signature) 
			<?php 
				if($f['examined_by'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['examined_by']."</u>";
				}
			?></label>
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