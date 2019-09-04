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
				<center><label>MATERNITY</label></center>
			</div>
		</div>
		<a style = "float:right; margin-top:-4px;" href = "view_birthing_record.php" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a> 
		<br />
		<br />
		<div class = "panel panel-primary">
			<?php
				$a = $_GET['itr_no'];
				$q1 = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$a'") or die(mysqli_error());
				$f1 = $q1->fetch_array();
			?>
			<div class = "panel-heading">
				<h4>Birthing Admission Record / <?php echo $f1['firstname']." ".$f1['lastname']?></h4>
			</div>
			<div class = "panel-body">
		<table id = "table" cellspacing = "0" class = "display">
			<thead>
				<tr>
					<th>Date</th>
					<th>Time</th>
					<th>Staff</th>
					<th><center>ACTION</center></th>
				</tr>
			</thead>
			<tbody>
			<?php
				$q2 = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$f2 = $q2->fetch_array();
				$q = $conn->query("SELECT * FROM `birthing` WHERE `itr_no` = '$f2[itr_no]'") or die(mysqli_error());
				while($f = $q->fetch_array()){
			?>
				<tr>
					<td><?php echo date("m/d/Y", strtotime($f['date']))?></td>
					<td><?php echo date("h:i a", strtotime($f['time']))?></td>
					<td><?php echo $f['staff']?></td>
					<td><center><a class = "btn btn-info" href = "birthing_form.php?itr_no=<?php echo $f['itr_no']?>&birth_id=<?php echo $f['birth_id']?>"><span class = "glyphicon glyphicon-search"></span> View Detail</a><center></td>
				</tr>
			<?php
				}
			?>	
			</tbody>
		</table>
			</div>
		</div>
			
		<br />
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
					"info": false,
					"order": "DESC"
				});
			});
		</script>
</html>