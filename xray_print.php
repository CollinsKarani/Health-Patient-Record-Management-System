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
			$q = $conn->query("SELECT * FROM `radiological` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' && `rad_id` = '$_GET[rad_id]'") or die(mysqli_error());
			$f = $q->fetch_array();
	?>		
<button onclick="printContent('print')">Print Content</button>
<button><a style = "text-decoration:none; color:#000;" href = "xray_form.php?itr_no=<?php echo $f['itr_no']?>&rad_id=<?php echo $_GET['rad_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print">Back</a></button>
<br />
<br />
	<div id="print">
		<div style = "margin:10px;">
			<img src = "images/logo.png" height = "100px" width = "100px" style = "float:left; margin-left:90px; margin-top:-15px;"/>
			<div style = "margin-right:190px;">
				<label><center>REPUBLIKA ng PILIPINAS</center></label>
				<label><center>Probinsya ng Negros Occidental</center></label>
				<label><center>LUNGSOD NG VICTORIAS</center></label>
				<label><center>CITY HEALTH OFFICE</center></label>
			</div>
			<br />
			<label style = "float:right;">Case No. <?php echo $f['case_no']?></label>
			<br />
			<label>Name: 
				<?php 
					if(($f['lastname'] == "") && ($f['firstname'] == "")){
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
						echo "<u>".$f['lastname'].", ".$f['firstname']."</u>";
					}
				?></label>
			<label style = "margin-left:20px;">Age: 
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
			<label>Civil Status: 
			<?php 
				if($f['civil_status'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['civil_status']."</u>";
				}
			?></label>
			<br />
			<br />
			<label>Address: 
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
					</u>";
				}else{
					echo "<u>".$f['address']."</u>";
				}
			?></label>
			<label style = "margin-left:5%;">Referred by:ICHC 
				<?php 
					if($f['referred_by'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['referred_by']."</u>";
					}
				?></label>
			<br />
			<br />
			<label>Clinical Impression: 
			<?php 
				if($f['clinical_impression'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['clinical_impression']."</u>";
				}
			?></label>
			<label style = "margin-left:3%;">Room & Bed No. 
			<?php 
				if($f['room_bed_no'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['room_bed_no']."</u>";
				}
			?></label>
			<br />
			<br />
			<label>Type of Examination: 
			<?php 
				if($f['type_of_examination'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['type_of_examination']."</u>";
				}
			?></label>
			<label style = "margin-left:5%;">Date Taken: 
			<?php 
				if($f['date_taken'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['date_taken']."</u>";
				}
			?></label>
			<br />
			<br />
			<label style = "font-weight:bold;"><center>RADIOLOGICAL / ULTRASONOLOGICAL REPORT</center></label>
			<hr style = "width:100&; border-top:5px solid #000;" />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<label style = " margin-bottom:0; float:right;">
			<?php 
				if($f['age'] == ""){
					echo "
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
					";
				}else{
					echo "<u>".$f['radiologist']."</u>";
				}
			?>
			<br /><label><center>Radiologist / Sonologist</center></label></label>
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