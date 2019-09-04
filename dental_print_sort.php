<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	</script>
	<style>
		@media print{
			@page{
				size: 8.5in 11in;
			}
		}
		
		#print{
			border:2px solid #000;
			width:700px;
			height:850px;
			max-widt:550px;
			max-height:800px;
			margin:auto;
			font-size:12px;
		}
		table {
			border-collapse: collapse;
			}

		table, td, th {
			border: 1px solid black;
		}
	</style>
</head> 
<body> 
<button onclick="printContent('print')">Print Content</button>
<button><a style = "text-decoration:none; color:#000;" href = "view_dental_record.php">Back</a></button>
	<?php
		if(!ISSET($_POST['date'])){
			$_SESSION['date'];
		}else{
			$_SESSION['date'] = date("Y-m-d", strtotime($_POST['date']));
		}
		$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
		$q = $conn->query("SELECT * FROM `dental` WHERE `date` = '$_SESSION[date]'") or die(mysqli_error());
		$f = $q->fetch_array();	
	?>	
<form style = "float:right;" action = "dental_print_sort.php" method = "POST">
<input type = "text" name = "date" id = "datepicker" required = "required"><button>SORT BY DATE</button>
</form>
<br />
<br />
	<div id="print">
		<div style = "margin:10px;">	<br />	
			<center>Republic of the Philippines</center>
			<center>Province of Negros Occidental</center>
			<center>City Of Victorias</center>
			<center>CITY HEALTH OFFICE</center>
			<br />
			<br />
			<label>Date:
				<?php 
					if($f['date'] == ""){
						echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".date("m/d/Y", strtotime($f['date']))."</u>";
					}
				?></label>
			<br />
			<label>Dentist:
				<?php 
					if($f['dentist'] == ""){
						echo "<u>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</u>";
					}else{
						echo "<u>".$f['dentist']."</u>";
					}	
				?></label>
			<br />
			<br />
			<center>
				<table>
						<tr>
							<th style = "padding-right:80px;padding-left:80px;"><center>Name</center></th>
							<th style = "padding-right:15px;padding-left:15px;"><center>Teeth/Tooth</center></th>
							<th style = "padding-right:10px;padding-left:10px;"><center>Age</center></th>
							<th><center>Gender</center></th>
							<th style = "padding-right:60px;padding-left:60px;"><center>Address</center></th>
							<th style = "padding-left:15px; padding-right:15px;"><center>BP</center></th>
						</tr>
				<?php
					$query = $conn->query("SELECT * FROM `dental` NATURAL JOIN `itr` WHERE `date` = '$_SESSION[date]' LIMIT 30") or die(mysqli_error());
					for($a = 1; $a <= 30; $a++){
					$fetch = $query->fetch_array()
				?>
					<tr>
						<td><?php echo $a.". ".$fetch['firstname']." ".$fetch['lastname']?></td>
						<td><center><?php echo $fetch['tooth']?></center></td>
						<td><center><?php echo $fetch['age']?></center></td>
						<td><center><?php echo $fetch['gender']?></center></td>
						<td><center><?php echo $fetch['address']?></center></td>
						<td><center><?php echo $fetch['BP']?></center></td>
					</tr>
				<?php
					}
					$conn->close();
				?>
				</table>
			</center>
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