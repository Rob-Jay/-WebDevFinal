<?php
session_start(); //Start session
// InsertProfile.php

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




// SQL Query to insert into the database

$profilesql = "INSERT INTO `profile`(`UserID`, `handle`, `Age`, `Smoker`, `Drinker`, `Gender`, `Seeking`, `Description`, `Banned`, `Photo`, `location`, `club`, `society`, `interest`)
VALUES ('$UIDResult', '" . $_SESSION['sUsername'] . "','$age', '$smoker', '$drinker', '$gender', '$seeking', '$description', '', '$photo', '', '$club', '$society','$interest');";

//$insertinterestsql = "INSERT INTO `interests`(`UserID`, `InterestID`) VALUES ('$UIDResult',(SELECT InterestID FROM availableinterests WHERE InterestName = '$interest'))";

if(!mysqli_query($conn, $profilesql))
{
    echo ("Error description: " . mysqli_error($conn));
}

else
{ // will need to create a loop that will pull each value from the array for interests

    $insertinterests = "INSERT INTO `interests`(`UserID`, `InterestID`) VALUES ('$UIDResult',(SELECT InterestID FROM availableinterests WHERE InterestName = '$interest'))";
    $resultinsertinterests = mysqli_query($conn, $insertinterests);
    //echo $insertinterests;
    //echo 'inserted';

    if(!$resultinsertinterests) {
        echo ("Error description: " . mysqli_error($conn));
    }
    else {
                echo 'interest updated';
        // Will need a way to insert each value from Clubs and Socities -- Disabled for now
/*
        $sql   = 'INSERT INTO collegegroup (`groupID`, `UserID`, `entryNum`) VALUES ';
        $count = count($club); //Count the number of values in the array and use in the For loop -- might need to create two, one for clubs and one for socities
        for ($i = 0; $i < $count; $i++)
            {
              $sql .= "($club[i],'$UIDResult','0')" . (($i + 1) == $count ? '' : ',');
            }

            $results= mysqli_multi_query($conn, $sql);
*/
         $insertgroups = "INSERT INTO `collegegroup`(`groupID`, `UserID`, `entryNum`) VALUES ((SELECT groupId FROM availablegroups WHERE Name = '$club'),'$UIDResult','0')" ;     // Used to insert for now

       $results= mysqli_multi_query($conn, $insertgroups);

        if(!$results){
            echo ("Error description: " . mysqli_error($conn));
        }
        else {
            echo 'avail Group updated';
        }
    }
}


header ("refresh:5; url=CreateLocation.php"); // redirect to insert Location page
