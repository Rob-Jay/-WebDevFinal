<?php
session_start(); //Start session

include 'dbh.inc.php';




//header('Location: INSERT HEADER LOCATION');
$id = $_GET['id'];
echo "This should be an id ";
echo $id;
$_SESSION['editId'] = $id;

$pullProfileDetails = "SELECT * FROM `profile` WHERE UserID = '$id ';";
$pullProfileResults = mysqli_query($conn, $pullProfileDetails);
$pullProfileRow = mysqli_fetch_array($pullProfileResults);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>edituser</title>
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
    <h1>This page belongs to user  <?php echo $id; ?></h1>
    <p>Please make changes below, or click 'Next' below.</p>

</div>

<div class = UpdateProfile>
    <form action = "adminUpdateProfile.php" method = "post">

        <b>Age:</b> <input type= "number" name="Age" value = <?php echo $pullProfileRow['Age'] ?>>
        <br><br>
        <b>Smoker:</b>

        <input name='Smoker' type='radio' value=1 <?php echo ($pullProfileRow['Smoker'] == '1') ? 'checked' : '' ?>>Yes

        <input name='Smoker' type='radio' value=0 <?php echo ($pullProfileRow['Smoker'] == '0') ? 'checked' : '' ?> >No
        <br><br>
        <b>Drinker:</b> <select name = "Drinker">
            <option value="null">Please Select from Below</option>
            <option value="Constantly" <?php if ($pullProfileRow['Drinker'] == 'Constantly') {
    echo ' selected="selected"';
}?> >

Constantly</option>
            <option value="Most days" <?php if ($pullProfileRow['Drinker'] == 'Most days') {
    echo ' selected="selected"';
    }?> >

Most days</option>
            <option value="Social Drinker" <?php if ($pullProfileRow['Drinker'] == 'Social Drinker') {
    echo ' selected="selected"';
    }?> >

Social Drinker</option>
            <option value="No" <?php if ($pullProfileRow['Drinker'] == 'No') {
    echo ' selected="selected"';
    }?> >

No

</option>
        </select>
        </select>
        <br><br>


        
        value="Female" <?php echo ($pullProfileRow['Gender'] == 'Female') ? 'checked' : '' ?>>Female
        <input type="radio" name="Gender"
         <?php if (isset($gender) && $gender == "male") {
        echo "checked";
    }?>


        value="Male" <?php echo ($pullProfileRow['Gender'] == 'Male') ? 'checked' : '' ?>>Male
        <input type="radio" name="Gender"
        <?php if (isset($gender) && $gender == "other") {
            echo "checked";
    }?>
        
        
         value="Other" <?php echo ($pullProfileRow['Gender'] == 'Other') ? 'checked' : '' ?>>Other
        <br><br>
        <b>I am Intered in:</b>    <input type="radio" name="Seeking"
        <?php if (isset($gender) && $gender == "female") {
         echo "checked";
        }?>


        value="Female" <?php echo ($pullProfileRow['Seeking'] == 'Female') ? 'checked' : '' ?> >Female
        <input type="radio" name="Seeking"
        <?php if (isset($gender) && $gender == "male") {
        echo "checked";
        }?>



        value="Male" <?php echo ($pullProfileRow['Seeking'] == 'Male') ? 'checked' : '' ?> >Male
        <input type="radio" name="Seeking"
        <?php if (isset($gender) && $gender == "other") {
        echo "checked";
    }?>
         
        
        
        value="Other" <?php echo ($pullProfileRow['Seeking'] == 'Other') ? 'checked' : '' ?> >Other
        <br><br>
        <b>Description:</b> <input type="text" name="Description" value = <?php echo ($pullProfileRow['Description']) ?>>
        <br><br>
        <b>Select image to upload:</b> <input type= "file" name="Photo" id = "image" >
        <br><br>
        <b>Club:</b> (Please select a Club to help find matches)
        <br>
        <select name = "Club"


        <?php $result = mysqli_query($conn, "SELECT Name FROM availablegroups WHERE type = 'club';");
    if (!$result) {
    printf("Error: %s\n", mysqli_error($conn)); // Displays the error that mysql will generate if syntax is not correct.
    exit();
    }

    while ($row = mysqli_fetch_array($result)) {
    $name = $row['Name'];
    echo "<option value = '$name' >$name</option>\n";

}
?>></select>
        <br><br>
        <b>Society:</b>  (Please select a Society to help find matches)
        <br>
        <select name = "Society"


        <?php $result = mysqli_query($conn, "SELECT Name FROM availablegroups WHERE type = 'society';");
    if (!$result) {
    printf("Error: %s\n", mysqli_error($conn)); // Displays the error that mysql will generate if syntax is not correct.
    exit();
    }

    while ($row = mysqli_fetch_array($result)) {
    $name = $row['Name'];
    echo "<option value = '$name' >$name</option>\n";

    }?>  
    ></select>


        <br><br>
        <b>Interest:   </b>  (Please select an interest to help find matches)
        <br> <select name = "Interests"



            <?php $result = mysqli_query($conn, "SELECT InterestName FROM availableinterests;");
    if (!$result) {
    printf("Error: %s\n", mysqli_error($conn)); // Displays the error that mysql will generate if syntax is not correct.
    exit();
    }

    while ($row = mysqli_fetch_array($result)) {
    $name = $row['InterestName'];
    echo "<option value = '$name' >$name</option>\n";

    }
        ?>></select
        <br><br>
        <br>
        <input type = "submit" value="Next">


    </form>
    </div>

</body>
</html>
