<?php

//include "config.php"; //config file in the same folder

$host = "hive.csis.ul.ie";
$user = "group03";
$password = "Wy=!)U5J6BS(hd/T";
$dbname = "dbgroup03";

// Create connection
$conn= mysqli_connect($host,$user,$password,$dbname);

// Check connection
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

// End of Config

session_start(); //Start session
//echo $_SESSION["sUsername"];

$userIDQuery = "SELECT user_id FROM security WHERE username = '" . $_SESSION['sUsername'] . "'";
$UIDResults = mysqli_query($conn, $userIDQuery);
$UIDrow = mysqli_fetch_array($UIDResults);

$UIDResult = $UIDrow['user_id'];

//echo $UIDResult;

if(!mysqli_query($conn, $userIDQuery))
{
    echo 'No Username';
}
// Using Start session to pull over Username.
// Which is used to find the UserID for Profile table.
// Format of the variable should be " $_SESSION["sUsername"]


//header('Location: INSERT HEADER LOCATION');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UserProfilePage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 40%;
            border-radius: 50%; /* Rounded Imgae for Profile */
            alignment: center;
        }

        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        .center {
            text-align: center;

        }

        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;

        }
        .edit {
            background-color: white;
            color: black;
            border: 2px solid #4CAF50;
            position: absolute;
            top: 100px;
            right: 32px;

        }

        .edit:hover {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Blah</a></li>
                <li><a href="#">Meh!!</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphiconnglyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div id="profileImage">

    <div class="item active">
        <?php

        $userimage = "SELECT Photo FROM profile WHERE UserID = $UIDResult;";
        $results = mysqli_query($conn, $userimage);
        while ($imgrow = mysqli_fetch_assoc($results)) {

            echo '<img src="data:image/jpeg;base64,'.base64_encode( $imgrow['Photo'] ).'"/>';

            //echo '<img src="data:image/jpg;base64,'.base64_encode( $imgrow['Photo'] ).'" height="200" width="50" class="img-thumnail"/>';
        }

        //echo '<img src="data:image/jpeg;base64,'.base64_encode( $imgrow['Photo'] ).'"/>';
        ?>

        <div class="profileImage caption- center">
            <h3> Hello

            <?php

            $Firstname = "SELECT Firstname FROM user where UserID = $UIDResult;"; //Should be able to use session/login to pull the correct userID here
            $results = mysqli_query($conn, $Firstname);
            while ($row = mysqli_fetch_assoc($results)) {
                print "{$row["Firstname"]}\n";
            }

            ?>
            </h3>



             <!-- Pull name from Database -->
        </div>
    </div>

</div>

<div class="container text-center">
    <div>
        <h3>Profile</h3>
    </div>
    <div>

        <a href="edituser.php"><button class="button edit" >Edit</button> </a>

    </div>
    <div class="row">
        <div class="col-sm-4">
            <h5><b>About me</b></h5><br>
            <?php
            $description = "SELECT description FROM profile WHERE userid = $UIDResult;"; //Should be able to use session/login to pull the correct userID here
            $results = mysqli_query($conn, $description);
            while ($row = mysqli_fetch_assoc($results)) {
                print "{$row["description"]}\n";
            }
            ?>
            <!-- Php to pull $description from Database Placeholder showing available groups -->
        </div>
        <div class="col-sm-4">
            <h5><b>Hobbies</b></h5><br>
            <?php
            $hobbies = "SELECT club, society, interest From profile where userid = $UIDResult;"; //Should be able to use session/login to pull the correct userID here
            $results = mysqli_query($conn, $hobbies);

            $resultcheck = mysqli_num_rows($results);

            if($resultcheck > 0 ){
                while ($row = mysqli_fetch_assoc($results)) {

                    print "{$row["club"]}<br>";
                    print "{$row["society"]}<br>";
                    print "{$row["interest"]}<br>";
                }

            }else echo "No hobbies";

            ?>
            <!-- PHP to get list of clubs socities etc
            Collegegroup table contains groupID (Pull name from AvailableGroups Subquery)
            Interests table contains IntertestID (Pull name from availableinterests subquery)
            -->
        </div>
        <div class="col-sm-4">
            <div class = "age">
                <?php
                $age = "SELECT age From profile where userid = $UIDResult;"; //Should be able to use session/login to pull the correct userID here
                $results = mysqli_query($conn, $age);
                while ($row = mysqli_fetch_assoc($results)) {
                    print "Age: {$row["age"]}\n";

                }


                ?>
            </div>
            <div class = "gender">
                <?php
                $gender = "SELECT gender From profile where userid = $UIDResult;"; //Should be able to use session/login to pull the correct userID here
                $results = mysqli_query($conn, $gender);
                while ($row = mysqli_fetch_assoc($results)) {
                    print "Sex: {$row["gender"]}\n";
                }

                ?>

            </div>
            <div class = "Location">
                <?php
                $location = "SELECT name From location a, thirdlevelinstitute b where a.LocationID = b.LocationID AND userid = $UIDResult;"; //Should be able to use session/login to pull the correct userID here
                $results = mysqli_query($conn, $location);
                while ($row = mysqli_fetch_assoc($results)) {
                    print "Location: {$row["name"]}\n";
                }

                ?>
                <!-- Pulled from location with subquery on thirdlevelinstitute)  -->
            </div>

            </div>

        </div>

    </div>
</div>
</div>
</body>
</html>