<!DOCTYPE html>
<html>
<head>
	<style>
		@media print{
			@page{
				size:8.5in 6.3in;
			}
		}
		#print{
			border:2px solid #000;
			width:850px;
			height:550px;
			max-width:850px;
			max-height:550px;
			margin:auto;
			overflow:hidden;
		}
	</style>
</head> 
<body> 
	<?php
			$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
			$q = $conn->query("SELECT * FROM `urinalysis` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' && `urinalysis_id` = '$_GET[urinalysis_id]'") or die(mysqli_error());
			$f = $q->fetch_array();
	?>		
<button onclick="printContent('print')">Print Content</button>
<button><a style = "text-decoration:none; color:#000;" href = "urinalysis_form.php?itr_no=<?php echo $f['itr_no']?>&urinalysis_id=<?php echo $_GET['urinalysis_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print">Back</a></button>
<br />
<br />
	<div id="print">
		<div style = "margin:10px;">	
			<br />
			<img src = "images/logo.png" style = "float:left; margin-top:-20px; margin-left:50px;" height = "100px" width = "100px">
			<div style = "float:left; margin-left:50px;">	
				<label><center>VICTORIAS CITY DIAGNOSTIC LABORATORY</center></label>
				<label style = "font-size:14px;"><center>City Health Office - Victorias City</center></label>
				<label style = "font-size:18px;" ><center><b>URINALYSIS</b></center></label>
			</div>
			<br />
			<br />
			<br />
			<br />
			<br />
			<label style = "font-size:14px; position:relative; float:left; left:10%;"><center>
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
						</u>";
					}else
					echo "<u>".$f['lastname'].", ".$f['firstname']."</u>";
				?></center>
			<label style = "position:relative; top:0px;"><center>Name</center></label></label>
			<label style = "font-size:14px; position:relative; float:left; left:13%;"><center>
				<?php 
					if($f['age'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{	
						echo "<u>".$f['age']."</u>";
					}	
				?></center>
			<label style = "position:relative; top:0px;"><center>Age</center></label></label>
			<label style = "font-size:14px; position:relative; float:left; left:14%;"><center>
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
					?></center>
			<label style = "position:relative; top:0px;"><center>Sex</center></label></label>
			<label style = "font-size:14px; position:relative; float:left; left:18%;"><center>
				<?php 
					if($f['date_of_request'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['date_of_request']."</u>";
					}
				?></center>
			<label style = "position:relative; top:0px;"><center>Date of Request</center></label></label>
			<br />
			<br />
			<label style = "float:left; position:relative; left:10%;">Address: 
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
						</u>";
					}else{
						echo "<u>".$f['address']."</u>";
					}	
				?></label>
			<br />
			<br />
			<div style = "width:40%; float:left; margin-left:70px;">
				<label style = "font-size:16px; font-weight:bold; text-decoration:underline;">PHYSICAL PROPERTIES</label>
				<br />
				<label style = " position:relative; left:10%;">Color: 
					<?php 
						if($f['color'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['color']."</u>";
						}	
					?></label>
				<br />
				<label style = " position:relative; left:10%;">Transparency: 
					<?php 
						if($f['transparency'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['transparency']."</u>";
						}	
					?></label>
				<br />
				<label style = " position:relative; left:10%;">Specific Gravity: 
					<?php 
						if($f['specific_gravity'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['specific_gravity']."</u>";
						}	
					?></label>
				<br />
				<label style = "font-size:16px; font-weight:bold; text-decoration:underline;">CHEMICAL ANALYSIS</label>
				<br />
				<label style = " position:relative; left:10%;">Ph: 
				<?php 
					if($f['ph'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['ph']."</u>";
					}	
				?></label>
				<br />
				<label style = " position:relative; left:10%;">Sugar: 
				<?php 
					if($f['sugar'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['sugar']."</u>";
					}	
				?></label>
				<br />
				<label style = " position:relative; left:10%;">Protein: 
				<?php 
					if($f['protein'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['protein']."</u>";
					}	
				?></label>
				<br />
				<label style = "font-size:16px; font-weight:bold; text-decoration:underline; break-word:word-wrap;">PREGNANCY TEST: 
				<?php 
					if($f['pregnancy_test'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['pregnancy_test']."</u>";
					}	
				?></label>
			</div>
			<div style = "width:45%; float:left; position:relative; left:3%;">
				<label style = "font-size:16px; font-weight:bold; text-decoration:underline;">MICROSCOPIC EXAMINATION</label>
				<br />
				<label style = " position:relative; left:10%;">Pus cells: 
				<?php 
					if($f['pus_cells'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['pus_cells']."</u>";
					}	
				?></label>
				<br />
				<label style = " position:relative; left:10%;">RBC: 
				<?php 
					if($f['rbc'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['rbc']."</u>";
					}	
				?></label>
				<br />
				<label style = " position:relative; left:10%;">Cast: 
				<?php 
					if($f['cast'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['cast']."</u>";
					}	
				?></label>
				<br />
				<label style = "font-size:16px; font-weight:bold;">CRYSTAL</label>
				<br />
				<label style = " position:relative; left:10%;">Urates: 
				<?php 
					if($f['urates'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['urates']."</u>";
					}	
				?></label>
				<br />
				<label style = " position:relative; left:10%;">Uric Acid: 
				<?php 
					if($f['uric_acid'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['uric_acid']."</u>";
					}	
				?></label>
				<br />
				<label style = " position:relative; left:10%;">Cal Ox: 
				<?php 
					if($f['cal_ox'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['cal_ox']."</u>";
					}	
				?></label>
				<br />
				<label style = "font-size:16px; font-weight:bold;">OTHERS:</label>
				<br />
				<label style = " position:relative; left:10%;">Epith Cells: 
					<?php 
						if($f['epith_cells'] == ""){
							echo "<u>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</u>";
						}else{
							echo "<u>".$f['epith_cells']."</u>";
						}	
					?></label>
				<br />
				<label style = " position:relative; left:10%;">Mucus Threads: 
				<?php 
					if($f['mucus_threads'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['mucus_threads']."</u>";
					}	
				?></label>
				<br />
				<label style = " position:relative; left:10%;">Others: 
				<?php 
					if($f['others'] == ""){
						echo "<u>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['others']."</u>";
					}	
				?></label>
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
			<br style = "clear:both;"/>
			<label style = " float:left; margin-left:70px; border-top:1px solid #000; font-size:14px;"><b><center><?php echo $f['pathologist']?></center></b>
			<br><label style = "position:relative; top:-15px;"><center>Pathologist</center></label>
			</label>
			<label style = " float:left; margin-left:300px; font-size:14px;"><b><center>
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
			?>,RMT</center></b>
			<br /><center><label style = "position:relative; top:-15px;">MEDICAL TECHNOLOGIST</label></center>
			</label>
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