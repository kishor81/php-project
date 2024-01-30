<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$errors = array();

$mysqli = new mysqli("localhost", "root", "", "registration");

if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}

if (isset($_POST['Register'])) {
    $UserID = $mysqli->real_escape_string($_POST['UserID']);
    $Username = $mysqli->real_escape_string($_POST['Name']);
    $Address = $mysqli->real_escape_string($_POST['Address']);
    $ContactNumber = $mysqli->real_escape_string($_POST['ContactNumber']);
    $Email = $mysqli->real_escape_string($_POST['Email']);
    $Password = $mysqli->real_escape_string($_POST['password']);
    $bloodtype = $mysqli->real_escape_string($_POST['bloodtype']);

    if (empty($UserID)) {
        array_push($errors, "UserID is required");
    }

    if (empty($Username)) {
        array_push($errors, "UserName is required");
    }

    if (empty($Address)) {
        array_push($errors, "Address is required");
    }

    if (empty($ContactNumber)) {
        array_push($errors, "Contact Number is required");
    }

    if (empty($Email)) {
        array_push($errors, "Email is required");
    }

    if (empty($Password)) {
        array_push($errors, "Password is required");
    }

    if (empty($bloodtype)) {
        array_push($errors, "Bloodtype is required");
    }

    if (count($errors) == 0) {
        $Password = md5($Password);
        $sql = "INSERT INTO patients (UserID, Name, Address, ContactNumber, Email, Password, Bloodtype) VALUES ('$UserID','$Username','$Address','$ContactNumber','$Email','$Password','$bloodtype') ";
        if ($mysqli->query($sql)) {
            $_SESSION['UserID'] = $UserID;
            $_SESSION['success'] = "You are now registered and logged in";
            header('location:../presentaionlayer/patient/index.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }
    }
}

if (isset($_POST['Login'])) {
    $UserID = $mysqli->real_escape_string($_POST['UserID']);
    $Password = $mysqli->real_escape_string($_POST['password']);

    if (empty($UserID)) {
        array_push($errors, "UserID is required");
    }

    if (empty($Password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $Password = md5($Password);
        $query = "SELECT * FROM patients WHERE UserID='$UserID' AND Password='$Password'";
        $result = $mysqli->query($query);
        if ($result->num_rows == 1) {
            $_SESSION['UserID'] = $UserID;
            $_SESSION['success'] = "You are now logged in";
            header('location:../presentaionlayer/patient/index.php');
            exit();
        } else {
            array_push($errors, "The ID/Password is incorrect");
        }
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['UserID']);
    header('location: login.php');
    exit();
}

if (isset($_POST['Login2'])) {
    $DoctorID2 = $mysqli->real_escape_string($_POST['doctorID']);
    $DoctorPassword2 = $mysqli->real_escape_string($_POST['doctorpassword']);
    if (empty($DoctorID2)) {
        array_push($errors, "Doctor ID is required");
    }
    if (empty($DoctorPassword2)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $queryD = "SELECT * FROM doctor WHERE DoctorID='$DoctorID2' AND password='$DoctorPassword2'";
        $resultD = $mysqli->query($queryD);
        if ($resultD->num_rows == 1) {
            $_SESSION['DoctorID'] = $DoctorID2;
            $_SESSION['success'] = "You are now logged in";
            header('location:../presentaionlayer/doctor/index2.php');
            exit();
        } else {
            array_push($errors, "The ID/Password is incorrect");
        }
    }
}

if (isset($_POST['Login3'])) {
    $adminID = $mysqli->real_escape_string($_POST['adminID']);
    $adminpassword = $mysqli->real_escape_string($_POST['adminpassword']);

    if (empty($adminID)) {
        array_push($errors, "Admin ID is required");
    }

    if (empty($adminpassword)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $queryA = "SELECT * FROM admin WHERE AdminID='$adminID' AND adminpassword='$adminpassword'";
        $resultA = $mysqli->query($queryA);
        if ($resultA->num_rows == 1) {
            $_SESSION['AdminID'] = $adminID;
            $_SESSION['success'] = "You are now logged in";
            header('location:../presentaionlayer/admin/index3.php');
            exit();
        } else {
            array_push($errors, "The ID/Password is not correct");
        }
    }
}