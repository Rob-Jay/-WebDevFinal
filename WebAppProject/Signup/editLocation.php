<?php
session_start(); //Start session
//include "config.php"; //config file in the same folder


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


// End of Config


$userIDQuery = "SELECT user_id FROM security WHERE username = '" . $_SESSION['sUsername'] . "';";
$UIDResults = mysqli_query($conn, $userIDQuery);
$UIDrow = mysqli_fetch_array($UIDResults);

$UIDResult = $UIDrow['user_id'];

//echo $UIDResult;

if(!mysqli_query($conn, $userIDQuery))
{
    echo 'No Username';
}

//header('Location: INSERT HEADER LOCATION');

$pullLocation = "SELECT 'LocationID' FROM `location` WHERE UserID = '$UIDResult';";
$pulllocationResults = mysqli_query($conn, $pullLocation);
$pulllocationRow = mysqli_fetch_assoc($pulllocationResults);
$work = $pulllocationRow['LocationID'];


$locationID = "SELECT Name from thirdlevelinstitute where LocationID = '$work';";
$resultLocationID = mysqli_query($conn, $locationID);
$LocationIDRow = mysqli_fetch_assoc($resultLocationID);
//$test = $LocationIDRow['Name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EditLocation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        div {
            width: 75%;
            border: 15px solid green;
            padding: 50px;
            margin: 20px;
        }
        .FullForm {
            width: 90%;
            border: 15px solid deeppink;
            padding: 10px;
            margin: 10px;
        }

        .welcomeMessage {
            width: 75%;
            border: 15px blue;
            padding: 10px;
            margin: 10px;
        }

    </style>
</head>

<body>
<div class = welcomeMessage>
    <h1>Hi <?php echo $_SESSION['sUsername']; ?></h1>
    <p>Please make your changes below, or click 'Next' below.</p>
    <p><?php echo $work ?></p>
</div>


<div class = InsertLocation>
    <form action = "UpdateLocation.php" method = "post">


        <br>
        Location:   <select name = "Location">
            <?php
            $result = mysqli_query($conn,"SELECT Name FROM `thirdlevelinstitute`;");




            while($row = mysqli_fetch_assoc($result))
            {
                $loc_name = $row['Name'];
                echo "<option value = '$loc_name' if ($loc_name == $LocationIDRow) echo selected=selected: '' >$loc_name</option>";
            }
            ?>
        </select>


        <br>
        <input type = "submit" value="Update">

    </form>
</div>

</body>
</html>
