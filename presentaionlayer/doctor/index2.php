<?php
include('../../datalayer/server.php');
$doctorID = $_SESSION['DoctorID'];
$sql = "SELECT * FROM doctor WHERE DoctorID = $doctorID";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
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
                <li><a href="index2.php">MyInfo</a></li>
                <li><a href="doctorapp.php">My Appointments</a></li>
                <li><a href="searchpatient.php">Search Patient</a></li>
                <li><a href="../../applicationlayer/Doctorpatient.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="header">
        <h2>My Information</h2>
    </div>
    <div class="info">
        <label>ID: <?php echo isset($_SESSION['DoctorID']) ? $_SESSION['DoctorID'] : ''; ?></label>
        <br><br>
        <label>Email: <?php echo isset($row['email']) ? $row['email'] : ''; ?></label>
        <br><br>
        <label>Name: <?php echo isset($row['Doctorname']) ? $row['Doctorname'] : ''; ?></label>
        <br><br>
        <label>Address: <?php echo isset($row['Address']) ? $row['Address'] : ''; ?></label>
        <br><br>
        <label>Contact Number: <?php echo isset($row['ContactNumber']) ? $row['ContactNumber'] : ''; ?></label>
        <br><br>
        <label>Specialized In: <?php echo isset($row['category']) ? $row['category'] : ''; ?></label>
    </div>
</body>
</html>