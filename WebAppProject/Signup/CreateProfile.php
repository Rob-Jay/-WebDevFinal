<?php
session_start(); //Start session
include "/WebAppProject/Database/DBcontroller.php"; //config file in the same folder


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

<div class = InsertProfile>
        <form action = "insertprofile.php" method = "post">

            <b>Age:</b> <input type= "number" name="Age">
            <br><br>
            <b>Smoker:</b>

            <input name='Smoker' type='radio' value=1>Yes

            <input name='Smoker' type='radio' value=0>No
            <br><br>
            <b>Drinker:</b> <select name = "Drinker">
                <option value="null">Please Select from Below</option>
                <option value="Constantly">Constantly</option>
                <option value="Most days">Most days</option>
                <option value="Social Drinker">Social Drinker</option>
                <option value="No">No</option>
            </select>
            </select>
            <br><br>
            <b>I am (Please select a Gender):</b>     <input type="radio" name="Gender"
                <?php if (isset($gender) && $gender=="female") echo "checked";?>
                                                      value="Female">Female
            <input type="radio" name="Gender"
                <?php if (isset($gender) && $gender=="male") echo "checked";?>
                   value="Male">Male
            <input type="radio" name="Gender"
                <?php if (isset($gender) && $gender=="other") echo "checked";?>
                   value="Other">Other
            <br><br>
            <b>I am Intered in:</b>    <input type="radio" name="Seeking"
                <?php if (isset($gender) && $gender=="female") echo "checked";?>
                                       value="Female">Female
            <input type="radio" name="Seeking"
                <?php if (isset($gender) && $gender=="male") echo "checked";?>
                   value="Male">Male
            <input type="radio" name="Seeking"
                <?php if (isset($gender) && $gender=="other") echo "checked";?>
                   value="Other">Other
            <br><br>

            <b>Description:</b> <input type="text" name="Description">
            <br><br>
            <b>Select image to upload:</b> <input type= "file" name="Photo" id = "uploadphoto">

            <br><br>
            <b>Club:</b> <b><i>(Please note only the first value works (for the moment), checking any others will cause an error)</b></i> <br><input type="checkbox" name="Club"
            <?php $result = mysqli_query($conn,"SELECT Name FROM availablegroups WHERE type = 'club';");
            if (!$result)
            {
                printf("Error: %s\n", mysqli_error($conn)); // Displays the error that mysql will generate if syntax is not correct.
                exit();
            }

            while($row = mysqli_fetch_array($result))
            {
                $name = $row['Name'];
                //$array = array($name);

                echo "<input type='checkbox' name= '$name' value='$name'> $name <br>";
                    //foreach ();

            }
            ?>

            <br><br>
            <b>Society:</b>  <b><i>(Please note only the first value works (for the moment), checking any others will cause an error)</b></i> <br> <input type="checkbox" name="Society"
            <?php $result = mysqli_query($conn,"SELECT Name FROM availablegroups WHERE type = 'society';");
            if (!$result)
            {
                printf("Error: %s\n", mysqli_error($conn)); // Displays the error that mysql will generate if syntax is not correct.
                exit();
            }

            while($row = mysqli_fetch_array($result))
            {
                $name = $row['Name'];

                foreach(explode(',',  $name) as  $name)
                {
                    $name = trim( $name);

                    echo "<input type='checkbox' name='$name' value='$name'> $name <br> ";
                    echo "Please note only the first value works (for the moment), checking any others will cause an error";

                }

            }
            ?>
            <br><br>
            <br>
            <input type = "submit" value="Next">

        </form>
    </div>

</body>
</html>
