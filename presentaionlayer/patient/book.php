<?php
include '../../datalayer/bookserver.php';
if (isset($_POST['Search'])) {
    $category = mysqli_real_escape_string($mysqli, $_POST['category']);
    $query2 = "SELECT * FROM doctor WHERE category = ('$category')";
    $result2 = mysqli_query($mysqli, $query2);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Patient</title>
    <link rel="stylesheet" href="style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>
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
<body>
    <div class="header">
        <h2>Book Appointment</h2>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php include '../../datalayer/errors.php'; ?>
        <div class="input-group">
            <label>Category</label>
            <select name="category" class="xd">
                <option value="Bone">Bone</option>
                <option value="Heart">Heart</option>
                <option value="Dentistry">Dentistry</option>
                <option value="MentalHealth">Mental Health</option>
                <option value="Surgery">Surgery</option>
                <option value="Dermatology" >Dermatology</option>
	   		    <option value="Opthalmology">Opthalmology</option>
	   		    <option value="Gynecology">Gynecology</option>
	   		    <option value="Oncology">Oncology</option>
	   		    <option value="Neurology">Neurology</option>
            </select>
        </div>
        <div class="input-group">
            <button type="submit" name="Search" class="btn">Search</button>
        </div>
        <?php if (isset($_POST['Search'])) : ?>
            <div class="input-group">
                <label>Doctor ID</label>
                <select class="input-group2" name="docID">
                    <?php while ($row2 = mysqli_fetch_assoc($result2)) : ?>
                        <option><?php echo $row2['DoctorID']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="input-group">
                <label>Appointment ID</label>
                <input type="text" name="AppoID">
            </div>
            <div class="input-group">
                <label>Date</label>
                <input type="date" name="Date">
            </div>
            <div class="input-group">
                <label>Time</label>
                <input type="time" name="Time">
            </div>
            <div class="input-group">
                <button type="submit" name="Book" class="btn">BOOK</button>
            </div>
        <?php endif; ?>
    </form>
</body>
</html>