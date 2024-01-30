<?php include ('../../datalayer/bookserver.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<link rel="stylesheet"  href="style3.css">
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<header>
	<h1>Hello<span>Doc</span></h1>
		<nav>
		<ul> 		
			<li><a href="index2.php">My Info</a></li>
			<li><a href="doctorapp.php">My Appointments</a></li>
			<li><a href="searchpatient.php">Search Patient</a></li>
			<li><a href="../../applicationlayer/Doctorpatient.php">Logout</a></li>
		</ul>
	</nav>
</header>
<form method="post" action="add.php" class="add">
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<div class="input-group">
		<label style="font-weight: bold;">PatientID</label>
	   	<input type="text" name="Patientsearch" class="xd">
	</div>
<div class="input-group">
		<button type="submit" name="SearchPA" class="btn">Search</button>
	</div>
	<?php  
	  if (isset($_POST['SearchPA'])) {
	$Patientsearch = mysqli_real_escape_string($mysqli,$_POST['Patientsearch']);
	$query="SELECT * FROM patients WHERE UserID=('$Patientsearch')";
	$result2=mysqli_query($mysqli,$query);
	while ($row2=mysqli_fetch_assoc($result2)) {
	}
}
	    ?>
</form>
</body>
</html>