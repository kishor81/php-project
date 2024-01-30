<?php
include('../../datalayer/bookserver.php');
$doctorID = $_SESSION['DoctorID'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctor</title>
	<link rel="stylesheet" href="style3.css">
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
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
	<h1 class="my1">My<span class="mys">Appointments</span></h1>
	<table class="table2">
		<tr>
			<th>Appointment ID</th>
			<th>DATE</th>
			<th>TIME</th>
			<th>PatientID</th>
			<th>PatientName</th>
			<th>PatientAddress</th>
			<th>PatientEmail</th>
			<th>PatientContactNumber</th>
			<th>BloodGroup</th>
		</tr>
		<?php
		$sqldoc = "SELECT * FROM bookapp JOIN patients ON bookapp.patientID = patients.UserID WHERE docID = '$doctorID'";
		$resultdoc = $mysqli->query($sqldoc);

		if ($resultdoc && $resultdoc->num_rows > 0) {
			while ($rowdoc = $resultdoc->fetch_assoc()) {
				echo "<tr><td>" . $rowdoc["AppoID"] . "</td><td>" . $rowdoc["Date"] . "</td><td>" . $rowdoc["Time"] . "</td><td>" . $rowdoc["UserID"] . "</td><td>" . $rowdoc['Name'] . "</td><td>" . $rowdoc['Address'] . "</td><td>" . $rowdoc['Email'] . "</td><td>" . $rowdoc["ContactNumber"] . "</td><td>" . $rowdoc["Bloodtype"] . "</td></tr>";
			}
		} else {
			echo "<tr><td colspan='9'>No appointments found</td></tr>";
		}
		?>
	</table>
</body>
</html>