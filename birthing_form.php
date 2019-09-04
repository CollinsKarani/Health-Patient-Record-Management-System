<!DOCTYPE html>
<?php
	require_once'logincheck.php';
	$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
	$query = $conn->query("SELECT * FROM `user` WHERE `user_id` = '$_SESSION[user_id]'") or die(mysqli_error());
	$fetch = $query->fetch_array();
?>
<html lang = "en">
	<head>	
		<title>Patient Health Center Management System</title>
		<meta charset = "UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "shortcut icon" href = "images/logo.png" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/customize.css" />
	</head>
	<body>
	<div class = "navbar navbar-default navbar-fixed-top">
		<img src = "images/logo.png" height = "55px" style = "float:left;"><label class = "navbar-brand">Health Center Patient Management System - Victorias City</label>
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
		
		<div class = "panel panel-default">
			<div class = "panel-heading">
			<?php
				$conn = new mysqli("localhost", "root", "", "hcpms") or die(mysqli_error());
				$q2 = $conn->query("SELECT * FROM `itr` WHERE `itr_no` = '$_GET[itr_no]'") or die(mysqli_error());
				$f2 = $q2->fetch_array();
				$q = $conn->query("SELECT * FROM `birthing` WHERE `birth_id` = '$_GET[birth_id]' && `itr_no` = '$f2[itr_no]'") or die(mysqli_error());
				$f = $q->fetch_array();
			?>
				<label>BIRTHING ADMISSSION RESULT FORM</label>	
				<a style = "float:right; margin-top:-4px;" href = "birthing_record.php?itr_no=<?php echo $f2['itr_no']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-hand-right"></span> BACK</a>
				<a style = "margin-right:5px; float:right; margin-top:-4px;" href = "birthing_print.php?itr_no=<?php echo $f2['itr_no']?>&birth_id=<?php echo $_GET['birth_id']?>" class = "btn btn-info"><span class = "glyphicon glyphicon-print"></span> PRINT</a>
			</div>
			<form method = "POST" enctype = "multipart/form-data">
			<div class = "panel-body">
				<div class = "alert alert-info">Basic Information</div>
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
				<div class = "form-inline" style = " border-right:1px solid #000; height:100%; width:30%; float:left;">
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
		</div>
		</form>
	</div>
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright Health Center Patient Record Management System 2015</label>
	</div>
	</body>
		<?php require "script.php" ?>
</html>