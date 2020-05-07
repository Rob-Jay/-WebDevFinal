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

$id = $_GET['id'];
$_SESSION['OtherID']=$id;



//$userIDQuery = "SELECT user_id FROM security WHERE username = '" . $_SESSION['sUsername'] . "'";
//$UIDResults = mysqli_query($conn, $userIDQuery);
//$UIDrow = mysqli_fetch_array($UIDResults);
//
//$UIDResult = $UIDrow['user_id'];
//
////echo $UIDResult;

//if(!mysqli_query($conn, $userIDQuery))
//{
//    echo 'No Username';
//}
// Using Start session to pull over Username.
// Which is used to find the UserID for Profile table.
// Format of the variable should be " $_SESSION["sUsername"]


//header('Location: INSERT HEADER LOCATION');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>UserProfilePage</title>
    <!--    <meta charset="utf-8">-->
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <!--    <style>-->
    <!---->
    <!--        img {-->
    <!--            display: block;-->
    <!--            margin-left: auto;-->
    <!--            margin-right: auto;-->
    <!--            width: 40%;-->
    <!--            border-radius: 50%; /* Rounded Imgae for Profile */-->
    <!--            alignment: center;-->
    <!--        }-->
    <!---->
    <!--        /* Remove the navbar's default margin-bottom and rounded borders */-->
    <!--        .navbar {-->
    <!--            margin-bottom: 0;-->
    <!--            border-radius: 0;-->
    <!--        }-->
    <!---->
    <!--        .center {-->
    <!--            text-align: center;-->
    <!---->
    <!--        }-->
    <!---->
    <!--        .button {-->
    <!--            background-color: #4CAF50; /* Green */-->
    <!--            border: none;-->
    <!--            color: white;-->
    <!--            padding: 8px 16px;-->
    <!--            text-align: center;-->
    <!--            text-decoration: none;-->
    <!--            display: inline-block;-->
    <!--            font-size: 12px;-->
    <!--            margin: 4px 2px;-->
    <!--            transition-duration: 0.4s;-->
    <!--            cursor: pointer;-->
    <!---->
    <!--        }-->
    <!--        .edit {-->
    <!--            background-color: white;-->
    <!--            color: black;-->
    <!--            border: 2px solid #4CAF50;-->
    <!--            position: absolute;-->
    <!--            top: 100px;-->
    <!--            right: 32px;-->
    <!---->
    <!--        }-->
    <!---->
    <!--        .edit:hover {-->
    <!--            background-color: #4CAF50;-->
    <!--            color: white;-->
    <!--        }-->
    <!--    </style>-->
    <link rel="stylesheet" type="text/css" href="../Search/bootstrap.css"></head>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	function OnPending(){
		$.ajax({url:"Pending.php",success:function(result)
			{
				alert(result);
			}
		})
	}
</head>
<body>
<?php include "../header/header.html" ?>
<!--<nav class="navbar navbar-inverse">-->
<!--    <div class="container-fluid">-->
<!--        <div class="navbar-header">-->
<!--            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--                <span class="icon-bar"></span>-->
<!--            </button>-->
<!--            <a class="navbar-brand" href="#">Logo</a>-->
<!--        </div>-->
<!--        <div class="collapse navbar-collapse" id="myNavbar">-->
<!--            <ul class="nav navbar-nav">-->
<!--                <li class="active"><a href="#">Home</a></li>-->
<!--                <li><a href="#">Blah</a></li>-->
<!--                <li><a href="#">Meh!!</a></li>-->
<!--            </ul>-->
<!--            <ul class="nav navbar-nav navbar-right">-->
<!--                <li><a href="#"><span class="glyphiconnglyphicon-log-in"></span> Logout</a></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->

<div id="profileImage">

    <div class="item active">
        <?php

        $userimage = "SELECT Photo FROM profile WHERE UserID = $id;";
        $results = mysqli_query($conn, $userimage);
        while ($imgrow = mysqli_fetch_assoc($results)) {
echo '<button onclick="OnPending()">Connect !</button> ';
            echo '<div style="text-align: center;"><img src="data:image/jpeg;base64,' .base64_encode( $imgrow['Photo'] ).'"style="max-width:300px;width:100%
