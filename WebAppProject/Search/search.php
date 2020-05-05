
<!DOCTYPE html>
<html>



<style>
    h1,h2,h3,h4,h5,h6 {font-family: "Oswald"}
    body {font-family: "Open Sans"}


    .select-boxes{width: 280px;text-align: center;}
    select {
        background-color: #F5F5F5;
        border: 1px double #15a6c7;
        color: #1d93d1;
        font-family: Georgia;
        font-weight: bold;
        font-size: 14px;
        height: 39px;
        padding: 7px 8px;
        width: 250px;
        outline: none;
        margin: 10px 0 10px 0;
    }
    select option{
        font-family: Georgia;
        font-size: 14px;
    }

</style>

<body class="w3-light-grey">




<!-- w3-content defines a container for fixed size centered content,
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:1600px">

    <!-- Header -->
    <header class="w3-container w3-center w3-padding-48 w3-white">


    </header>

    <!-- Image header -->


    <!-- Grid -->
    <div class="w3-row w3-padding w3-border">

        <!-- Blog entries -->
        <div class="w3-col l12 s12">

            <!-- Blog entry -->
            <div class="w3-container w3-white w3-margin w3-padding-large">


                <br>
                <div class="select-boxes">
                    <form method="POST" name="search" action="search.php">
                    <?php
//Include database configuration file
include 'dbConfig.php';

//selecting college
$query = $db->query("SELECT Name FROM thirdlevelinstitute");

//Count total number of rows
$rowCount = $query->num_rows;
?>
                    <select name="college" id="college" >
                        <option value="">Select College</option>
                        <?php
if ($rowCount > 0) {
    while ($row = $query->fetch_assoc()) {
        echo '<option value="' . $row['Name'] . '">' . $row['Name'] . '</option>';
    }
} else {
    echo '<option value="">College not available</option>';
}
?>
                    </select>
<!--                        <input type="submit" name="submit1" value="Select College" />-->
<!--                        --><?php //if(isset($_POST['submit1'])){
//                            $selected_College = $_POST['college'];} ?>
<!--                    </form>-->


<!--                    <form method="POST" name="search" action="index.php">-->
                  <?php $query = $db->query("SELECT Name FROM availablegroups WHERE Type = 'club'");

//Count total number of rows
$rowCount = $query->num_rows;?>
                    <select name="club" id="club" >
                        <option value="">Select Club</option>
                        <?php
if ($rowCount > 0) {
    while ($row = $query->fetch_assoc()) {
        echo '<option value="' . $row['Name'] . '">' . $row['Name'] . '</option>';
    }
} else {
    echo '<option value="">Club not available</option>';
}
?>
                    </select>
<!--                        <input type="submit" name="submit" value="Select Club" />-->
<!--                        --><?php //if(isset($_POST['submit'])){
//                            $selected_Club = $_POST['club'];} ?>
<!--                    </form>-->
<!--                    <form method="POST" name="search" action="index.php">-->
                    <?php $selected_Society = "";
$query = $db->query("SELECT Name FROM availablegroups WHERE Type = 'society'");

//Count total number of rows
$rowCount = $query->num_rows;?>
                    <select name="society" id="society" ?> " >
                        <option value="">Select Society</option>
                        <?php
if ($rowCount > 0) {
    while ($row = $query->fetch_assoc()) {
        echo '<option value="' . $row['Name'] . '">' . $row['Name'] . '</option>';

    }
} else {
    echo '<option value="">Society not available</option>';
}

?>

                    </select>
                          <input type="submit" name="submit" value="Find me someone!" />
                    <?php if (isset($_POST['submit'])) {
    $selected_Society = $_POST['society'];
}?>


                </div>
                </form>


            </div>

            <?php

;
$sql = "SELECT Photo, UserID FROM profile WHERE society = '$selected_Society'";
$conn = new mysqli('hive.csis.ul.ie', 'group03', 'Wy=!)U5J6BS(hd/T', 'dbgroup03');
$output = '';

if ((isset($_POST['submit'])) or (isset($_POST['submit1'])) or (isset($_POST['submit2']))) {
//                $search = $_POST['search'];
    //echo $_POST["society"];
    //               echo $_POST["club"];
    //                echo $_POST["college"];

    $query = mysqli_query($conn, "SELECT Photo, handle FROM profile WHERE location = '" . $_POST["college"] . "' OR society = '" . $_POST["society"] . "' OR club = '" . $_POST["club"] . "'") or die("Could not search");
    $count = mysqli_num_rows($query);

    if ($count == 0) {
        $output = "There was no search results!";

    } else {
        $i = 0;
        while ($row = mysqli_fetch_array($query)) {

            $Name = $row['Photo'];
            $ID = $row['handle'];

            if (($i % 2) == 0) {
                echo ' <br> ';
            }

            $output .= '<div> ' . $Name . '</div>';
            print("$ID");
            echo '
                          <tr>
                               <td>
                                    <img src="data:image/jpeg;charset=utf-8;base64, ' . base64_encode($row['Photo']) . '" height="200" width="200"  />
                               </td>
                          </tr>
                     ';
            $i = $i + 1;
        }

    }
}

?>



        </div>
    </div>

    </div>

</div>

</body>
</html>
