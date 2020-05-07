<<<<<<< HEAD
<?php
// Used to update the Profile of an already existing user
include 'dbh.inc.php';
session_start(); //Start session
// InsertProfile.php

// Getting the UserID from the security table after initial creation

$age = $_POST['Age'];
$smoker = $_POST['Smoker'];
$drinker = $_POST['Drinker'];
$gender = $_POST['Gender'];
$seeking = $_POST['Seeking'];
$description = $_POST['Description'];
$photo = $_POST['Photo'];
$club = $_POST['Club'];
$society = $_POST['Society'];
$interest = $_POST['Interests'];
$id = $_SESSION['editId'];

// SQL Query to Get data from the database

$UpdateProfile = "UPDATE profile SET Age='$age',             Seeking='$seeking',     Description='$description'  ,
                                    Photo='$photo'          ,club='$club',           society='$society',     interest='$interest' WHERE UserID = '$id';";

if (!mysqli_query($conn, $UpdateProfile)) {
    echo ("Error description 1: " . mysqli_error($conn));
    header("Location: ../admin/adminHome.php?EditFail");
} else {
    header("Location: ../admin/adminHome.php?EditSuccessful");
}
=======
<?php
// Used to update the Profile of an already existing user
include 'dbh.inc.php';
session_start(); //Start session
// InsertProfile.php

// Getting the UserID from the security table after initial creation

$age = $_POST['Age'];
$smoker = $_POST['Smoker'];
$drinker = $_POST['Drinker'];
$gender = $_POST['Gender'];
$seeking = $_POST['Seeking'];
$description = $_POST['Description'];
$photo = $_POST['Photo'];
$club = $_POST['Club'];
$society = $_POST['Society'];
$interest = $_POST['Interests'];
$id = $_SESSION['editId'];

// SQL Query to Get data from the database

$UpdateProfile = "UPDATE profile SET Age='$age',             Seeking='$seeking',     Description='$description'  ,
                                    Photo='$photo'          ,club='$club',           society='$society',     interest='$interest' WHERE UserID = '$id';";

if (!mysqli_query($conn, $UpdateProfile)) {
    echo ("Error description 1: " . mysqli_error($conn));
    header("Location: ../admin/adminHome.php?EditFail");
} else {
    header("Location: ../admin/adminHome.php?EditSuccessful");
}
>>>>>>> dd2248f07838b19f171619a588f782e05f3e2af1
