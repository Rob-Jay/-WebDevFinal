<?php
session_start(); //Start session
// InsertProfile.php

$host = "hive.csis.ul.ie";
$user = "group03";
$password = "Wy=!)U5J6BS(hd/T";
$dbname = "dbgroup03";

// Create connection
$con = mysqli_connect($host,$user,$password,$dbname);

// Check connection
if(!$con){
    die("Connection failed: ".mysqli_connect_error());
}

// Getting the UserID from the security table after initial creation
$userIDQuery = "SELECT user_id FROM security WHERE username = '" . $_SESSION['sUsername'] . "';";
$UIDResults = mysqli_query($con, $userIDQuery);
$UIDrow = mysqli_fetch_array($UIDResults);

$UIDResult = $UIDrow['user_id'];

//echo $UIDResult;

if(!mysqli_query($con, $userIDQuery))
{
    echo 'No Username';
}
// Getting the UserID from the security table after initial creation

$age = $_POST['Age'];
$smoker = $_POST['Smoker'];
$drinker = $_POST['Drinker'];
$gender = $_POST['Gender'];
$seeking = $_POST['Seeking'];
$description = $_POST['Description'];
//$banned = $_POST['banned']; //default value not sure if needed.
$photo = $_POST['Photo'];
$club = $_POST['Club'];
$society = $_POST['Society'];




// SQL Query to insert into the database

$profilesql = "INSERT INTO `profile`(`UserID`, `Age`, `Smoker`, `Drinker`, `Gender`, `Seeking`, `Description`, `Banned`, `Photo`, `location`, `club`, `society`)
VALUES ('$UIDResult', '$age', '$smoker', '$drinker', '$gender', '$seeking', '$description', '', '$photo', '', '$club', '$society');";

if(!mysqli_query($con, $profilesql))
{
    echo 'Not inserted' .mysqli_connect_error();
    echo $profilesql;

}

/WebAppProject/Signup/CreateLocation.php
header ("refresh:1; url=/WebAppProject/Signup/CreateLocation.php"); // redirect to insert Location page
