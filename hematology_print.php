<!DOCTYPE html>
<html>
<head>
	<style>
	@media print{
		@page{
				size:8.5in 6in;
		}
	}
		#print{
			border:2px solid #000;
			width:850px;
			height:550px;
			margin:auto;
		}
	</style>
</head> 
<body> 
	<?php
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$q = $conn->query("SELECT * FROM `hematology` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' && `hem_id` = '$_GET[hem_id]'") or die(mysqli_error());
			$f = $q->fetch_array();
	?>		
<button onclick="printContent('print')">Print Content</button>
<button><a style = "text-decoration:none; color:#000;" href = "hematology_form.php?itr_no=<?php echo $f['itr_no']?>&hem_id=<?php echo $_GET['hem_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print">Back</a></button>
<br />
<br />
	<div id="print">
		<div style = "margin:10px;">	
			<label style = "font-size:18px;"><center>VICTORIAS CITY DIAGNOSTIC LABORATORY</center></label>
			<label><center>City Health Office - Victorias City</center></label>
			<label style = "font-size:20px;"><center>HEMATOLOGY</center><label>
			<label style = "font-size:15px; margin-left:50px;">Name of Patient: 
				<?php 
					if(($f['firstname'] == "") && ($f['lastname'] == "")){
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
				?></label>
			<label style = "font-size:15px; margin-left:15px;">Date Requested: 
				<?php 
					if($f['date_requested'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['date_requested']."</u>";
					}	
				?></label>
			<br />
			<label style = "font-size:15px; margin-left:50px;">Address: 
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
			<label style = "font-size:15px; margin-left:50px;">Age: 
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
			<label style = "font-size:15px;">Sex: 
			<?php 
				if($f['gender'] == ""){
					echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					</u>";
				}else{
					echo "<u>".$f['gender']."</u>";
				}
			?></label>	
			<br />
			<br />
			<div style = "float:left; width:45%; margin-left:50px;">
				<label style = "font-size:14px; margin-left:80px;"><b>Normal Values</b></label>
				<br />
				<label style = "font-size:12px; position:relative; top:-10px;">Hemoglobin: 
				<?php 
					if($f['hemoglobin'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['hemoglobin']."</u>";
					}
				?>g(m 130-180,f 120)</label>
				<br />
				<label style = "font-size:12px; position:relative; top:-20px;">Hermatocrit: 
					<?php 
						if($f['hematocrit'] == ""){
							echo "<u>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</u>";
						}else{
							echo "<u>".$f['hematocrit']."</u>";
						}	
					?>1/1(m .40-54, f 4.3-6.5)</label>
				<br />
				<label style = "font-size:12px; position:relative; top:-30px;">RBC Count: 
					<?php 
						if($f['RBC_count'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['RBC_count']."</u>";
						}
					?>x10 12/1(m 4.5-6.2, f 4.3-6.5)</label>
				<br />
				<label style = "font-size:12px; position:relative; top:-40px;">WBC Count: 
					<?php 
						if($f['WBC_count'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['WBC_count']."</u>";
						}
					?>x10 12/1(4.5-11.0)</label>
				<label style = "font-size:12px; position:relative; right:25%; top:-10px;"><b>Differential Values</b></label>
				<br />
				<label style = "font-size:12px; position:relative; top:-20px;">Neutrophil: 
					<?php 
						if($f['neutrophil'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['neutrophil']."</u>";
						}	
					?>(55-65)</label>
				<br />
				<label style = "font-size:12px; position:relative; top:-30px;">Segmenters: 
					<?php 
						if($f['segmenters'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['segmenters']."</u>";
						}	
					?></label>
				<br />
				<label style = "font-size:12px; position:relative; top:-40px;">Stabs: 
					<?php 
						if($f['stabs'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['stabs']."</u>";
						}	
					?></label>
				<br />
				<label style = "font-size:12px; position:relative; top:-50px;">Lymphocytes: 
					<?php 
						if($f['lymphocytes'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['lymphocytes']."</u>";
						}	
					?>(25-35)</label>
				<br />
				<label style = "font-size:12px; position:relative; top:-60px;">Monocyte: 
					<?php 
						if($f['monocyte'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['monocyte']."</u>";
						}	
					?>(4-8)</label>
				<br />
				<label style = "font-size:12px; position:relative; top:-70px;">Eosinophil: 
					<?php 
						if($f['eosinophil'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['eosinophil']."</u>";
						}	
					?>(1-3)</label>
				<br />
				<label style = "font-size:12px; position:relative; top:-80px;">Basophil: 
					<?php 
						if($f['basophil'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['basophil']."</u>";
						}	
					?>(0-1)</label>
				<br />
				<label style = "font-size:12px; position:relative; top:-90px;">Total: 
					<?php 
						if($f['total'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['total']."</u>";
						}	
					?></label>
			</div>
			<br />
			<div style = "float:left; width:40%; margin-left:10px; position:relative; top:-20px;">
				<label style = "font-size:12px;"><b>Coagulation Profile</b></label>
				<br />
				<label style = "font-size:12px; position:relative; top:-10px; margin-left:20px;">Platelet: 
					<?php 
						if($f['platelet'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['platelet']."</u>";
						}	
					?>x10g/1(160-450)</label>
				<br />
				<label style = "font-size:12px; position:relative; top:-20px; margin-left:20px;">Bleeding Time: 
					<?php 
						if($f['bleeding_time'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['bleeding_time']."</u>";
						}	
					?>(1-5)mins</label>
				<br />
				<label style = "font-size:12px; position:relative; top:-30px; margin-left:20px;">Clotting Time: 
					<?php 
						if($f['clotting_time'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['clotting_time']."</u>";
						}	
					?>(1-5)mins</label>
				<br />
				<label style = "font-size:12px; position:relative; top:-20px;"><b>Blood Type</b></label>
				<br />
				<label style = "font-size:12px; position:relative; top:-30px; margin-left:20px;">ABO Group: 
					<?php 
						if($f['ABO_group'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['ABO_group']."</u>";
						}	
					?></label>
				<br />
				<label style = "font-size:12px; position:relative; top:-40px; margin-left:20px;">Rh Group: 
					<?php 
						if($f['Rh_group'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['total']."</u>";
						}	
					?></label>
				<label style = "font-size:12px; position:relative; right:30%;"><b>Remarks:</b></label>
				<br />
				<label style = "font-size:12px; break-word:word-wrap;">
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
			<br />
			<br />
			<br />
			<br />
			<br />
			<label style = " float:left; position:relative; left:5%; top:-40px; border-top:1px solid #000; clear:both; font-size:14px;"><b><center><?php echo $f['pathologist']?></center></b>
			<br /><label style = "font-size:12px; position:relative; top:-10px;"><center>Pathologist</center></label></label>
			<label style = " float:right; right:20%; position:relative; top:-80px; clear:both; font-size:14px;"><center>
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
					</u>";
				}else{
					echo "<u>".$f['medical_technologist']."</u>";
				}
			?>,RMT</center><label style = "font-size:12px;"><center>MEDICAL TECHNOLOGIST</center></label>
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