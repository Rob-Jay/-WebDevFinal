<!DOCTYPE html>
<html>
<head>
    <?php include "websiteHeader.php"; ?>
    <link rel="stylesheet"  href="mysyle.css">
    <?php
    include 'DBController.php';
    $db_handle = new DBController();
    $nameResult = $db_handle->runQuery("SELECT Name FROM thirdlevelinstitute");
    ?>

</head>
<body>
<div id="container">
    <div id="left">Left Side Menu</div>
    <div id="middle"><h2>Refine Search</h2>
        <form method="POST" name="search" action="searchByCollege.php">
            <div>
                <div>
                    <select id="Place" name="Name" multiple="multiple">
                        <option value="0" selected="selected">Select College</option>
                        <?php
                        if (! empty($nameResult)) {
                            foreach ($nameResult as $key => $value) {
                                echo '<option value="' . $nameResult[$key]['Name'] . '">' . $selectedCollege =$nameResult[$key]['Name'] . '</option>';

                            }
                        }
                        ?>
                    </select><br> <br>
                    <input type="submit" name="submit" value="Get Selected Values" />
                    <?php if(isset($_POST['submit'])){
                        $selected_College = $_POST['Name']; echo $selected_College;} ?>

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

        $sql = "SELECT UserID from location
        WHERE LocationID IN (Select LocationID FROM thirdlevelinstitute WHERE Name = '$selected_College')";
        $result = mysqli_query($con,$sql);

        while($row = $result->fetch_array(MYSQLI_NUM)) {
            $rows[] = $row;
        }
        ?>

        //            var_dump ($rows);
        //die();
        //            ?>
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
            <?php
            }
            ?>


        </div>
    </div>
</div>


    <div id="right">Right Side Menu</div>
</div>
</body>
</html>
</body>
</html>