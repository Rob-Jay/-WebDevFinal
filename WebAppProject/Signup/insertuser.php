<?php
session_start(); //Start session
// insertUser.php

$host = "hive.csis.ul.ie";
$user = "group03";
$password = "Wy=!)U5J6BS(hd/T";
$dbname = "dbgroup03";

// Create connection
$conn = mysqli_connect($host,$user,$password,$dbname);

// Check connection
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

$userIDQuery = "SELECT user_id FROM security WHERE username = '" . $_SESSION['sUsername'] . "';";
$UIDResults = mysqli_query($conn, $userIDQuery);
$UIDrow = mysqli_fetch_array($UIDResults);

$UIDResult = $UIDrow['user_id'];
//echo $UIDResult;

if(!mysqli_query($conn, $userIDQuery))
{
    echo 'No Username';
}



$fname = $_POST['Firstname'];
$surname = $_POST['Surname'];

// SQL Query to insert into the database

$sql = "INSERT INTO `user`(`UserID`, `Handle`, `Firstname`, `Surname`) VALUES ('$UIDResult','" . $_SESSION['sUsername'] . "','$fname','$surname');";

    //"UPDATE `user` SET `Firstname`='$fname',`Surname`='$surname' WHERE UserID = '$UIDResult';";

if(!mysqli_query($conn, $sql))
{
    echo 'Not inserted';
}

header ("refresh:5; url=CreateProfile.php"); // redirect to CreateProfile page (should be redirected to home page where matches are)

?>