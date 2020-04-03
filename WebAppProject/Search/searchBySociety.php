<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>searchResults</title>
    <link rel="stylesheet"  href="mysyle.css">
</head>


<?php
include '/WebAppProject/database/DBController.php';
$db_handle = new DBController();
$nameResult = $db_handle->runQuery("SELECT Name FROM availablegroups WHERE Type = 'society'");
?>
<html>
<head>

    <?php include "websiteheader.php"; ?>
    <title>Refine Search</title>
</head>
<body>


<div id = "leftbox">

    <h2>Refine Search</h2>
    <form method="POST" name="search" action="searchBySociety.php">
        <div>
            <div>
                <select id="Place" name="Name" multiple="multiple">
                    <option value="0" selected="selected">Select Society</option>
                    <?php
                    if (! empty($nameResult)) {
                        foreach ($nameResult as $key => $value) {
                            echo '<option value="' . $nameResult[$key]['Name'] . '">' . $selectedSociety =$nameResult[$key]['Name'] . '</option>';

                        }
                    }
                    ?>
                </select><br> <br>
                <input type="submit" name="submit" value="Select Society" />
                <?php if(isset($_POST['submit'])){
                    $selected_Society = $_POST['Name']; echo $selected_Society;} ?> <br>

            </div>
    </form>
</div>
<div id = "middlebox">
    <?php
    if (! empty($_POST['Name'])) {
    ?>
    <?php
    $con=mysqli_connect("hive.csis.ul.ie", "group03", "Wy=!)U5J6BS(hd/T", "dbgroup03");

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $sql = "SELECT UserID from collegegroup
        WHERE groupID IN (Select groupID FROM availablegroups WHERE name = '$selected_Society')";
    $result = mysqli_query($con,$sql);

    while($row = $result->fetch_array(MYSQLI_NUM)) {
        $rows[] = $row;
    }
    ?>


    <!--        $row = $result->fetch_array(MYSQLI_NUM);-->

</div>
<div id = "rightbox">
    <div style="float: right">

        <div class="shadow2" >
            <div>
                <div>
                    <div>
                        <div>
                            <div > <?php echo (int) $rows[0][0];?> </div>
                            <img  src="<?php echo (int) $rows[0][0];?>.png" class="centerImage">
                            <div ></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="shadow2" >
            <div>
                <div>
                    <div>
                        <div>
                            <div> <?php echo (int) $rows[1][0];?> </div>
                            <img  src="<?php echo (int) $rows[1][0];?>.png" class="centerImage">
                            <div></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>

        <?php
        }
        ?>


    </div>
</div>
</div>


</body>
</html>
