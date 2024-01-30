<?php
include('../../datalayer/server.php');
if (isset($_SESSION['UserID'])) {
  $userID = $_SESSION['UserID'];
  $query = "SELECT * FROM patients WHERE UserID = '$userID'";
  $result = $mysqli->query($query);

  if ($result->num_rows > 0) {
    $_row = $result->fetch_assoc();
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Patient</title>
    <link rel="stylesheet" href="style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Hello<span>Doc</span></h1>
        <nav>
            <ul> 
                <li><a href="index.php">MyInfo</a></li>
                <li><a href="book.php">Book Appointment</a></li>
                <li><a href="view.php">View Appointment</a></li>
                <li><a href="cancel.php">Cancel Booking</a></li>
                <li><a href="searchdoctor.php">Search Doctor</a></li>
                <li><a href="../../applicationlayer/Doctorpatient.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="headerP" style="width: 15%;margin-top: 60px;color: white;background: #39ca74;text-align: center;border-radius: 10px 10px 5px 5px;border-bottom: none; border :1px solid #39ca74;padding: 10px;margin-left:-4px;">
        <h2>My Information</h2>
    </div>
    <form method="post" action="index.php" class="infoP" style="margin-left:-1px; margin-top:0px ;width: 40%;padding: 20px;border: 3px solid #39ca74;background: white; border-radius: 10px 10px 10px 10px;">
        <div class="contentP" style="font-weight: bold;">
            <label>ID: <?php echo isset($_SESSION['UserID']) ? $_SESSION['UserID'] : ''; ?></label>
            <br><br>
            <label>Email: <?php echo isset($_row['Email']) ? $_row['Email'] : ''; ?></label>
            <br><br>
            <label>Name: <?php echo isset($_row['Name']) ? $_row['Name'] : ''; ?></label>
            <br><br>
            <label>Address: <?php echo isset($_row['Address']) ? $_row['Address'] : ''; ?></label>
            <br><br>
            <label>Contact Number: <?php echo isset($_row['ContactNumber']) ? $_row['ContactNumber'] : ''; ?></label>
            <br><br>
            <label>Blood Type: <?php echo isset($_row['Bloodtype']) ? $_row['Bloodtype'] : ''; ?></label>
            <br><br>
        </div>
    </form>
</body>
</html>