<!DOCTYPE html>
<html>
<head>
	<style>
	@media print {  
		@page {
			size:letter;
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
			$q = $conn->query("SELECT * FROM `rehabilitation` NATURAL JOIN `itr` WHERE `itr_no` = '$_GET[itr_no]' && `rehab_id` = '$_GET[rehab_id]'") or die(mysqli_error());
			$f = $q->fetch_array();
	?>		
<button onclick="printContent('print')">Print Content</button>
<button><a style = "text-decoration:none; color:#000;" href = "rehabilitation_form.php?itr_no=<?php echo $f['itr_no']?>&rehab_id=<?php echo $_GET['rehab_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print">Back</a></button>
<br />
<br />
	<div id="print">
		<div style = "margin:10px;">
			<img src = "images/logo.png" height = "100px" width = "100px" style = "float:left; position:relative; left:15%;" />
			<div style = "float:right; position:relative; right:35%;">
				<label><center>Republic of the Philippines</center></label>
				<label><center>Province of Negros Occidental</center></label>
				<label><center>City of Victorias</center></label>
				<label><center>City Health Office</center></label>
			</div>
			<br style = "clear:both;" />
			<br />
			<label><center><b>PHYSICAL MEDICINE AND REHABILITATION CENTER</b></center></label>
			<label style = "font-size:14px;"><center>Center Based and Community Based Rehabilitation Program</center></label>
			<br />
			<label>NAME: <?php echo $f['firstname']." ".$f['lastname']?>
			<label style = "margin-right:48%; float:right;">DIAGNOSIS: <?php echo $f['diagnosis']?></label></label>
			<br />
			<label>AGE: <?php echo $f['age']?>
			<label style = "margin-right:40%; float:right;">TYPE OF DISABILITY: <?php echo $f['diagnosis']?></label></label>
			<br />
			<label>GENDER: <?php echo $f['gender']?></label>
			<br/>
			<label>Address: <?php echo $f['address']?></label>
			<br />
			<label>DATE OF BIRTH: <?php echo $f['birthdate']?></label>
			<br />
			<br />
			<label>Temp: <u><?php 
			$t = substr($f['TEMP'], 0, 2);
			echo $t; ?></u>&deg;C</label>
			<label>Pulse: <u>&nbsp;<?php echo $f['PR']?>&nbsp;</u></label>
			<label>RR: <u>&nbsp;<?php echo $f['RR']?>&nbsp;</u></label>
			<br />
			<label>BP: <u>&nbsp;<?php echo $f['BP']?>&nbsp;</u></label>
			<br />
			<br />
			<label><center><u><b>PT NOTES</b></u></center></label>
			<br />
			<br />
			<label><b>Initial Evaluation</b></label>
			<br />
			<br />
			<label><b>Subject:</b></label>
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['subjective']?></label>
			<br />
			<br />
			<label><b>Objective:</b></label>
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['objective']?></label>
			<br />
			<br />
			<label><b>Assessment:</b></label>
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['assessment']?></label>
			<br />
			<br />
			<label><b>Plan:</b></label>
			<br />
			<label style = "word-wrap:break-word;"><?php echo $f['plan']?></label>
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