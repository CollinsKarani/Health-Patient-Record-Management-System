<!DOCTYPE html>
<html>
<head>
	<style>
		@media print{
			@page{
				size: 8.5in 7in;
			}
		}
		#print{
			border:2px solid #000;
			overflow:hidden;
			width:850px;
			height:550px;
			margin:auto;
		}
	</style>
</head> 
<body> 
	<?php
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$q = $conn->query("SELECT * FROM `fecalisys` NATURAL JOIN `itr` WHERE `fecalisys_id` = '$_GET[fecalysis_id]' && `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
			$f = $q->fetch_array();
		?>		
<button onclick="printContent('print')">Print Content</button>
<button><a style = "text-decoration:none; color:#000;" href = "fecalysis_form.php?itr_no=<?php echo $f['itr_no']?>&fecalysis_id=<?php echo $_GET['fecalysis_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print">Back</a></button>
<br />
<br />
	<div id="print">
		<div style = "margin:10px;">
			<center><label>VICTORIAS CITY CLINICAL LABORATORY</label></center>
			<center><label style = "font-size:12px;">Montinola Street, Victorias City</label></center>
			<br />
			<br />
			<div style = "margin-left:50px;" >
				<label>Name:
				<?php 
					if(($f['firstname'] == "") || ($f['lastname'] == "")){
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
						echo "<u>".$f['firstname']." ".$f['lastname']."</u>";
					}
				?>
				</label>
				<label style = "margin-left:20px;" >Date of Request:
				<?php 
					if($f['date_of_request'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['date_of_request']."</u>";
					}
				?>
				</label>
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
								</u>";
							}else{
								echo "<u>".$f['address']."</u>";
							}	
						?>
				</label>
				<label style = "margin-left:20px;" >Age:
						<?php 
							if($f['age'] == ""){
								echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";	
							}else{
								echo "<u>".$f['age']."</u>";
							}	
						?>
				</label>
				<label style = "margin-left:20px;" >Sex:
						<?php 
							if($f['gender'] == ""){
								echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
							}else{
								echo "<u>".$f['gender']."</u>";
							}	
						?>
				</label>
				<br />
				<br />
				<label>Requested By:
						<?php 
							if($f['requested_by'] == ""){
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
								echo "<u>".$f['requested_by']."</u>";
							}	
						?>
				</label>
				<br />
			</div>
				<center><h2>FECALYSIS</h2></center>
			<div style = "float:left; width:40%; margin-left:40px;">
				<label style = "font-size:16px;"><b><u>PHYSICAL PROPERTIES</u></b></label>
				<br />
				<label style = "margin-left:50px;">Color:
						<?php 
							if($f['color'] == ""){
								echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
							}else{
								echo "<u>".$f['color']."</u>";
							}
						?>
				</label>
				<br />
				<label style = "margin-left:50px;">Consistency:
						<?php 
							if($f['consistency'] == ""){
								echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
							}else{
								echo "<u>".$f['consistency']."</u>";
							}
						?>
				</label>
				<br />
				<label style = "font-size:16px;"><b><u>CHEMICAL PROPERTIES</u></b></label>
				<br />
				<label style = "margin-left:50px;">Occul Blood:
						<?php 
							if($f['occult_blood'] == ""){
								echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
							}else{
								echo "<u>".$f['occult_blood']."</u>";
							}
						?>
				</label>
				<br />
				<label style = "margin-left:50px;">Others:
						<?php 
							if($f['others_chem'] == ""){
								echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
							}else{
								echo "<u>".$f['others_chem']."</u>";
							}	
						?>
				</label>
				<br />
				<label style = "font-size:16px;"><b><u>REMARKS:</u></b></label>
				<br />
				<label style = "word-wrap:break-word;">	
						<?php 
							if($f['remarks'] == ""){
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
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
							}else{
								echo "<u>".$f['remarks']."</u>";
							}
						?>
				</label>
			</div>
			<div style = "float:left; margin-left:90px; width:40%;">
				<label style = "font-size:16px;"><b><u>MICROSCOPIC FINDINGS</u></b></label>
				<br />
				<label style = "margin-left:50px;">Pus cells:
						<?php 
							if($f['pus_cells'] == ""){
								echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
							}else{
								echo "<u>".$f['pus_cells']."</u>";
							}	
						?>
					/HPF
				</label>
				<br />
				<label style = "margin-left:50px;">RBC:
						<?php
							if($f['RBC'] == ""){
								echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
							}else{
								echo "<u>".$f['RBC']."</u>";
							}
						?>
					/HPF
				</label>
				<br />
				<label>Fat Globules:
						<?php
							if($f['fat_globules'] == ""){
								echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
							}else{
								echo "<u>".$f['fat_globules']."</u>";
							}
						?>
					/HPF
				</label>
				<br />
				<label style = "font-weight:bold; text-decoration:underline; margin-left:30px;">HELMINTHS
				</label>
				<br />
				<label style = "margin-left:30px;">Ova:
						<?php
							if($f['ova'] == ""){
								echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
							}else{
								echo "<u>".$f['ova']."</u>";
							}
						?>
				</label>
				<br />
				<label style = "margin-left:30px;">larva:
						<?php
							if($f['larva'] == ""){
								echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
							}else{
								echo "<u>".$f['larva']."</u>";
							}
						?>
				</label>
				<br />
				<label style = "margin-left:30px;">Adult Forms:
						<?php
							if($f['adult_forms'] == ""){
								echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
							}else{
								echo "<u>".$f['adult_forms']."</u>";
							}
						?>
				</label>
				<br />
				<label style = "font-weight:bold; text-decoration:underline; margin-left:30px;">PROTOZOA</label>
				<br />
				<label style = "margin-left:30px;">Cyst:
						<?php
							if($f['cyst'] == ""){
								echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
							}else{
								echo "<u>".$f['cyst']."</u>";
							}
						?>
				</label>
				<br />
				<label style = "margin-left:30px;">Trophozoites:
						<?php
							if($f['trophozoites'] == ""){
								echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
							}else{
								echo "<u>".$f['trophozoites']."</u>";
							}
						?>
				</label>
				<br />
				<label style = "margin-left:30px;">OTHERS:
						<?php
							if($f['others_pro'] == ""){
								echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
							}else{
								echo "<u>".$f['others_pro']."</u>";
							}
						?>
				</label>
				<br />
				<label><b>Date Reported:</b>
						<?php
							if($f['date_reported'] == ""){
								echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
							}else{
								echo "<u>".$f['date_reported']."</u>";
							}
						?>
				</label>
			</div>
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
			<label style = "border-top:1px solid #000; margin-left:40px; float:left;"><center><?php echo $f['pathologist']?></center>
			<label><center><b>Pathologist</b></center></label></label>
			<label style = "float:right; margin-top:-15px; margin-right:70px;"><center>
				<?php 
					if($f['medical_technologist'] == ""){
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
						echo "<u>".$f['medical_technologist']."</u>";
					}
				?>,RMT</center>
			<label><center><b>MEDICAL TECHNOLOGIST</b></center></label></label>
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