<?php
// Used to update the Profile of an already existing user


session_start(); //Start session


$host = "hive.csis.ul.ie";
$user = "group03";
$password = "Wy=!)U5J6BS(hd/T";
$dbname = "dbgroup03";

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Getting the UserID from the security table after initial creation
$userIDQuery = "SELECT user_id FROM security WHERE username = '" . $_SESSION['sUsername'] . "';";
$UIDResults = mysqli_query($conn, $userIDQuery);
$UIDrow = mysqli_fetch_array($UIDResults);

$UIDResult = $UIDrow['user_id'];

//echo $UIDResult;

if (!mysqli_query($conn, $userIDQuery)) {
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
$interest = $_POST['Interests'];


// SQL Query to Get data from the database


$UpdateProfile = "UPDATE `profile` SET `UserID`='$UIDResult',`handle`='" . $_SESSION['sUsername'] . "',`Age`='$age',`Smoker`='$smoker',`Drinker`='$drinker',`Gender`='$gender',`Seeking`='$seeking',
`Description`='$description', `Banned`='',`Photo`='$photo',`location`='',`club`='$club',`society`='$society',`interest`='$interest' WHERE UserID = '$UIDResult';";



if (!mysqli_query($conn, $UpdateProfile)) {
    echo("Error description 1: " . mysqli_error($conn));
} else { // will need to create a loop that will pull each value from the array for interests

    //

    $updateinterests = "UPDATE `interests` SET `UserID`='$UIDResult',`InterestID`=(SELECT InterestID FROM availableinterests WHERE InterestName = '$interest') WHERE UserID = '$UIDResult';";
    $resultupdateinterests = mysqli_query($conn, $updateinterests);

    //echo 'inserted';

    if (!$resultupdateinterests) {
        echo("Error description 2: " . mysqli_error($conn));
    } else {
        //echo 'interest updated';

        $updategroups = "UPDATE `collegegroup` SET `groupID`=(SELECT groupId FROM availablegroups WHERE Name = '$club'),`UserID`='$UIDResult',`entryNum`='0' WHERE UserID = '$UIDResult';";

        // Used to update for now

        $results = mysqli_multi_query($conn, $updategroups);

        if (!$results) {
            echo("Error description 3: " . mysqli_error($conn));
        } else {
            {

                $updatesoc = "UPDATE `collegegroup` SET `groupID`=(SELECT groupId FROM availablegroups WHERE Name = '$society'),`UserID`='$UIDResult',`entryNum`='0' WHERE UserID = '$UIDResult';" ;
                // Used to insert

                $results= mysqli_multi_query($conn, $updatesoc);
            }
            if(!$results){
                echo ("Society Group Error description: " . mysqli_error($conn));
            }
        }
    }
}


header("refresh:1; url=editLocation.php"); // redirect to insert Location page
