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

echo $UIDResult;

if(!mysqli_query($conn, $userIDQuery))
{
    echo 'No Username';
}

//header('Location: INSERT HEADER LOCATION');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>createuser</title>
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
    <h1>Welcome <?php echo $_SESSION['sUsername']; ?></h1>
    <p>Please fill in the details below. These details are used to successfully find you matches.</p>
</div>


    <div class = InsertLocation>
        <form action = "InsertLocation.php" method = "post">


            <br>
            Location:   <select name = "Location">
                <?php
                $result = mysqli_query($conn,"SELECT Name FROM `thirdlevelinstitute`;");


                while($row = mysqli_fetch_assoc($result))
                {
                    $loc_name = $row['Name'];
                    echo "<option value = '$loc_name' >$loc_name</option>";
                }
                ?>
            </select>


            <br>
            <input type = "submit" value="Insert">

        </form>
    </div>

</body>
</html>
