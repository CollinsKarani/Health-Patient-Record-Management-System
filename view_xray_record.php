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
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
	</head>
	<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "images/logo.png" height = "55px" style = "float:left;"><label class = "navbar-brand">Health Center Patient Record Management System - Victorias City</label>
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
				<center><label>XRAY</label></center>
			</div>
		</div>
		<a style = "float:right; margin-top:-4px;" href = "xray.php" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a> 
		<br />
		<br />
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<h4>XRAY RECORD LIST</h4>
			</div>
		</div>
		<br />
		<table id = "table" cellspacing = "0" class = "display">
			<thead>
				<tr>
					<th>ITR No</th>
					<th>Name</th>
					<th>Age</th>
					<th>Civil Status</th>
					<th>Address</th>
					<th><center>Action</center></th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `radiological` NATURAL JOIN `itr` GROUP BY `itr_no` ORDER BY `rad_id` DESC") or die(mysqli_error());
				while($f = $q->fetch_array()){
			?>
				<tr>
					<td><?php echo $f['itr_no']?></td>
					<td><?php echo $f['firstname']." ".$f['lastname']?></td>
					<td><?php echo $f['age']?></td>
					<td><?php echo $f['civil_status']?></td>
					<td><?php echo $f['address']?></td>
					<td><center>
							<a href = "xray_record.php?itr_no=<?php echo $f['itr_no']?>&rad_id=<?php echo $f['rad_id']?>"class = "btn btn-info"><span class = "glyphicon glyphicon-book"></span> All Records</a> 
						</center></td>
				</tr>
			<?php
				}
			?>	
			</tbody>
		</table>
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Health Center Patient Record Management System 2015</label>
	</div>
	</body>
		<?php require "script3.php" ?>
		<script type = "text/javascript">
			$(document).ready(function(){
				$("#table").DataTable({
					"paging": false,
					"info": false
				});
			});
		</script>
</html>