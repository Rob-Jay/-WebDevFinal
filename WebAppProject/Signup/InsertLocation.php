<?php
// insertLocation.php
session_start(); //Start session


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

// Getting the UserID from the security table after initial creation
$userIDQuery = "SELECT user_id FROM security WHERE username = '" . $_SESSION['sUsername'] . "';";
$UIDResults = mysqli_query($conn, $userIDQuery);
$UIDrow = mysqli_fetch_array($UIDResults);

$UIDResult = $UIDrow['user_id'];

//echo $UIDResult;

if(!mysqli_query($conn, $userIDQuery))
{
    echo 'No Username';
}
// Getting the UserID from the security table after initial creation


$location = $_POST['Location'];



// SQL Query to Convert Name from location to LocationID

$locationID = "SELECT LocationID from thirdlevelinstitute where name = '$location';";
$resultLocationID = mysqli_query($conn, $locationID);
$LocationIDRow = mysqli_fetch_array($resultLocationID);

$LocationRow = $LocationIDRow['LocationID'];

// SQL Query to insert into the database

$locationsql = "INSERT INTO `location`(`LocationID`, `UserID`) VALUES ('$LocationRow','$UIDResult');";


// *insert location ID query




if(!mysqli_query($conn, $locationsql))
{
    echo 'Not inserted';
    echo '<br>';
    echo $locationsql;


} else
{
    $insertlocationProfile = "UPDATE `profile` SET `location`='$LocationRow' WHERE `UserID`='$UIDResult'";
    $resinsertlocationProfile = mysqli_query($conn, $insertlocationProfile);

    //echo 'inserted';
}

header ("refresh:5; url=Home/Home.php"); // redirect to index page (should be redirected to home page where matches are)
