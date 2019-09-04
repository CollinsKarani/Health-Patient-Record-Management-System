<!DOCTYPE html>
<?php
	require_once 'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
?>
<html lang = "eng">
	<head>
		<title>Health Center Patient Record Management System</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "../images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/customize.css" />
	</head>
<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "../images/logo.png" style = "float:left;" height = "55px" /><label class = "navbar-brand">Health Center Patient Record Management System - Victorias City</label>
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$_SESSION[admin_id]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
			<ul class = "nav navbar-right">	
				<li class = "dropdown">
					<a class = "user dropdown-toggle" data-toggle = "dropdown" href = "#">
						<span class = "glyphicon glyphicon-user"></span>
						<?php
							echo $f['firstname']." ".$f['lastname'];
							$conn->close();
						?>
						<b class = "caret"></b>
					</a>
				<ul class = "dropdown-menu">
					<li>
						<a class = "me" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a>
					</li>
				</ul>
				</li>
			</ul>
	</div>
	<div id = "sidebar">
			<ul id = "menu" class = "nav menu">
				<li><a href = "home.php"><i class = "glyphicon glyphicon-home"></i> Dashboard</a></li>
				<li><a href = ""><i class = "glyphicon glyphicon-cog"></i> Accounts</a>
					<ul>
						<li><a href = "admin.php"><i class = "glyphicon glyphicon-cog"></i> Administrator</a></li>
						<li><a href = "user.php"><i class = "glyphicon glyphicon-cog"></i> User</a></li>
					</ul>
				</li>
				<li><li><a href = "patient.php"><i class = "glyphicon glyphicon-user"></i> Patient</a></li></li>
				<li><a href = ""><i class = "glyphicon glyphicon-folder-close"></i> Sections</a>
					<ul>
						<li><a href = "fecalysis.php"><i class = "glyphicon glyphicon-folder-open"></i> Fecalysis</a></li>
						<li><a href = "maternity.php"><i class = "glyphicon glyphicon-folder-open"></i> Maternity</a></li>
						<li><a href = "hematology.php"><i class = "glyphicon glyphicon-folder-open"></i> Hematology</a></li>
						<li><a href = "dental.php"><i class = "glyphicon glyphicon-folder-open"></i> Dental</a></li>
						<li><a href = "xray.php"><i class = "glyphicon glyphicon-folder-open"></i> Xray</a></li>
						<li><a href = "rehabilitation.php"><i class = "glyphicon glyphicon-folder-open"></i> Rehabilitation</a></li>
						<li><a href = "sputum.php"><i class = "glyphicon glyphicon-folder-open"></i> Sputum</a></li>
						<li><a href = "urinalysis.php"><i class = "glyphicon glyphicon-folder-open"></i> Urinalysis</a></li>
					</ul>
				</li>
			</ul>
	</div>
	<div id = "content">
		<br />
		<br />
		<br />
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q2 = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$f2 = $q2->fetch_array();
				$q = $conn->query("SELECT * FROM `birthing` WHERE `birth_id` = '1' && `itr_no` = '$f2[itr_no]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
			<div class = "alert alert-info">Maternity Record<a class = "btn btn-success" style = "float:right; margin-top:-7px;" href = "maternity_record.php?itr_no=<?php echo $f2['itr_no']?>"><span class = "glyphicon glyphicon-hand-right"></span> Back</a></div>
			<div style = "float:left; width:30%;">
					<label>NAME:</label>
					<br />
					<label class = "text-muted"><?php echo $f2['firstname']." ".substr($f2['middlename'], 0,1).". ".$f2['lastname']?></label>
				</div>	
				<div style = "width:10%; float:left;">	
					<label>AGE:</label>
					<br />
					<label class = "text-muted"><?php echo $f2['age']?></label>
				</div>
				<div style = "float:left; width:40%;">
					<label>ADDRESS:</label>
					<br />
					<label class = "text-muted"><?php echo $f2['address']?></label>
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px dotted #d3d3d3;" />
				<div class = "form-inline">
					<label>DATE:</label>
					<input type = "text" class = "form-control" disabled = "disabled" value = "<?php echo date("m/d/Y")?>" />
					<label style = "margin-left:10px;">TIME:</label>
					<input type = "text" class = "form-control" disabled = "disabled" size = "10" value = "<?php echo date('h:i:s a', strtotime('+8HOURS'))?>">
					<label>a.m / p.m.</label>
				</div>
				<br />
				<div class = "group">
					<label>CHIEF COMPLAINT:</label>
					<textarea name = "chief_complaint" disabled = "disabled" class = "form-control" style = "resize:none;"><?php echo $f['chief_complaint']?></textarea>
				</div>
				<br />
				<div class = "form-group">
					<label>HISTORY:</label>
					<textarea name = "history" disabled = "disabled" class = "form-control" style = "resize:none;"><?php echo $f['history']?></textarea>
				</div>
				<br />
				<center><label>OB GYNE HISTORY</label></center>
				<hr style = "border:1px solid #000;" />
				<div class = "form-inline" style = " border-right:1px solid #000; height:10%; width:30%; float:left;">
					<label>LMP:</label>
					<input type = "text" disabled = "disabled" value = "<?php echo $f['lmp']?>" name = "lmp" class = "form-control" />
					<br />
					<label>EDC:</label>
					<input style = "margin-left:2px;" disabled = "disabled" value = "<?php echo $f['edc']?>"  type = "text" name = "edc" class = "form-control" />
					<br />
					<label>AOG:</label>
					<input type = "text" name = "aog" disabled = "disabled" value = "<?php echo $f['aog']?>"  class = "form-control" />
				</div>
				<div class = "form-inline" style = "width:60%; margin-left:10px; margin-top:30px; float:left;">
					<label>OB SCORE:</label>
					<label>G:</label>
					<input type = "text" name = "g" disabled = "disabled" value = "<?php echo $f['G']?>"  size = "2" class = "form-control" />
					<label>P</label>
					<input type = "text" name = "p" disabled = "disabled" value = "<?php echo $f['P']?>"  size = "2" class = "form-control" />
					<label>(</label>
					<input type = "text" name = "1" disabled = "disabled" value = "<?php echo $f['1']?>"  size = "2" class = "form-control" />
					<input type = "text" name = "2" disabled = "disabled" value = "<?php echo $f['2']?>"  size = "2" class = "form-control" />
					<input type = "text" name = "3" disabled = "disabled" value = "<?php echo $f['3']?>"  size = "2" class = "form-control" />
					<input type = "text" name = "4" disabled = "disabled" value = "<?php echo $f['4']?>"  size = "2" class = "form-control" />
					<label>)</label>
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px solid #000;" />
				<center><label>PHYSICAL EXAMINATION</label></center>
				<br />
				<div class = "form-inline">
					<label>BP:</label>
					<input type = "text" name = "bp1" disabled = "disabled" value = "<?php echo $f['bp1']?>"  size = "2" class = "form-control" />
					<label>/</label>
					<input type = "text" name = "bp2" size = "2" disabled = "disabled" value = "<?php echo $f['bp2']?>"  class = "form-control" />
					<label>mmhg PR:</label>
					<input type = "text" name = "pr" disabled = "disabled" value = "<?php echo $f['pr']?>"  size = "5" class = "form-control" />
					<label>bpm RR:</label>
					<input type = "text" name = "rr" disabled = "disabled" value = "<?php echo $f['rr']?>"  size = "5" class = "form-control" />
					<label>cpm T:</label>
					<input type = "text" name = "t" disabled = "disabled" value = "<?php echo $f['T']?>"  size = "4" class = "form-control" />
					<label>⁰C</label>
				</div>
				<br />
				<div class = "form-inline" style = "width:25%; float:left;">
					<label>HEAD & NECK</label>
					<br />
					<input type = "text" name = "head_neck" disabled = "disabled" value = "<?php echo $f['head_neck']?>"  class = "form-control" />
				</div>
				<div class = "form-inline" style = "width:25%; float:left;">
					<label>CHEST</label>
					<br />
					<input type = "text" name = "chest" disabled = "disabled" value = "<?php echo $f['chest']?>"  class = "form-control" />
				</div>
				<div class = "form-inline" style = "width:25%; float:left;">
					<label>HEART</label>
					<br />
					<input type = "text" name = "heart" disabled = "disabled" value = "<?php echo $f['heart']?>"  class = "form-control" />
				</div>
				<br />
				<br />
				<br />
				<br style = "clear:both;"/>
				<div class = "form-inline" style = "width:25%; float:left;">
					<label>ABDOMEN: UTERINE SIZE:</label>
					<input type = "text" name = "abdomen" disabled = "disabled" value = "<?php echo $f['abdomen']?>"  class = "form-control" />
					<label>cm FHB:</label>
					<input type = "text" name = "fhb" disabled = "disabled" value = "<?php echo $f['fhb']?>"  class = "form-control" />
					<label>bpm LOC:</label>
					<input type = "text" name = "loc" disabled = "disabled" value = "<?php echo $f['loc']?>"  class = "form-control" />
				</div>
				<div class = "form-inline" style = "width:25%; float:left;">
					<label>EXTREMITIES:</label>
					<br />
					<input type = "text" name = "extremities" disabled = "disabled" value = "<?php echo $f['extremities']?>"  class = "form-control" />
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px solid #000;" />
				<center><label>INTERNAL EXAMINATION (IE)</label></center>
				<br />
				<div class = "form-inline" style = "width:25%; float:left;">
					<label>VULVA:</label>
					<br />
					<input type = "text" name = "vulva" disabled = "disabled" value = "<?php echo $f['vulva']?>"  class = "form-control" />
				</div>
				<div class = "form-inline" style = "width:25%; float:left;">
					<label>VAGINA:</label>
					<br />
					<input type = "text" name = "vagina" disabled = "disabled" value = "<?php echo $f['vagina']?>"  class = "form-control" />
				</div>
				<div class = "form-inline" style = "width:25%; float:left;">
					<label>CERVIX:</label>
					<br />
					<input type = "text" name = "cervix" disabled = "disabled" value = "<?php echo $f['cervix']?>"  class = "form-control" />
				</div>
				<div class = "form-inline" style = "width:25%; float:left;">
					<label>UTERUS:</label>
					<br />
					<input type = "text" name = "uterus" disabled = "disabled" value = "<?php echo $f['uterus']?>"  class = "form-control" />
				</div>
				<br />
				<br />
				<br />
				<br style = "clear:both;"/>
				<div class = "form-inline" style = "width:25%; float:left;">
					<label>BOW:</label>
					<br />
					<input type = "text" name = "bow" disabled = "disabled" value = "<?php echo $f['bow']?>"  class = "form-control" />
				</div>
				<div class = "form-inline" style = "width:25%; float:left;">
					<label>PRESENTATION:</label>
					<br />
					<input type = "text" name = "presentation" disabled = "disabled" value = "<?php echo $f['presentation']?>"  class = "form-control" />
				</div>
				<div class = "form-inline" style = "width:25%; float:left;">
					<label>VAGINAL DISCHARGE:</label>
					<input type = "text" name = "vaginal_discharge" disabled = "disabled" value = "<?php echo $f['vaginal_discharge']?>"  class = "form-control" />
				</div>
				<br style = "clear:both;"/>
				<hr style = "border:1px solid #000;" />
				<div class = "form-inline">
					<label>STAFF ON DUTY:</label>
					<input type = "text" name = "staff" disabled = "disabled" value = "<?php echo $f['staff']?>"  class = "form-control" />
				</div>
				<br />
	</div>	
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Health Center Patient Record Management System 2015</label>
	</div>
	<?php 
		require'script3.php';	
	?>
	<script type = "text/javascript">
			$(document).ready(function(){
				$("#table").DataTable({
					"paging": false,
					"info": false
				});
			});
	</script>
</body> 
</html>