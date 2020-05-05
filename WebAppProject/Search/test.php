<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" type="text/css" href="bootstrap.css"></head>



<body class="w3-light-grey">
                <div class="select-boxes">
                    <form method="POST" name="search" action="test.php">
                        <?php
                        //Include database configuration file
                        include('dbConfig.php');

                        //selecting college
                        $query = $db->query("SELECT Name FROM thirdlevelinstitute");

                        //Count total number of rows
                        $rowCount = $query->num_rows;
                        ?>
                        <select name="college" id="college" >
                            <option value="">Select College</option>
                            <?php
                            if($rowCount > 0){
                                while($row = $query->fetch_assoc()){
                                    echo '<option value="'.$row['Name'].'">'.$row['Name'].'</option>';
                                }
                            }else{
                                echo '<option value="">College not available</option>';
                            }
                            ?>
                        </select>
                        <!--                        <input type="submit" name="submit1" value="Select College" />-->
                        <!--                        --><?php //if(isset($_POST['submit1'])){
                        //                            $selected_College = $_POST['college'];} ?>
                        <!--                    </form>-->


                        <!--                    <form method="POST" name="search" action="index.php">-->
                        <?php  $query = $db->query("SELECT Name FROM availablegroups WHERE Type = 'club'");

                        //Count total number of rows
                        $rowCount = $query->num_rows;?>
                        <select name="club" id="club" >
                            <option value="">Select Club</option>
                            <?php
                            if($rowCount > 0){
                                while($row = $query->fetch_assoc()){
                                    echo '<option value="'.$row['Name'].'">'.$row['Name'].'</option>';
                                }
                            }else{
                                echo '<option value="">Club not available</option>';
                            }
                            ?>
                        </select>

                        <?php $selected_Society = "";  $query = $db->query("SELECT Name FROM availablegroups WHERE Type = 'society'");

                        //Count total number of rows
                        $rowCount = $query->num_rows;?>
                        <select name="society" id="society" ?> " >
                            <option value="">Select Society</option>
                            <?php
                            if($rowCount > 0){
                                while($row = $query->fetch_assoc()){
                                    echo '<option value="'.$row['Name'].'">'.$row['Name'].'</option>';

                                }
                            }else{
                                echo '<option value="">Society not available</option>';
                            }

                            ?>

                        </select>
                        <input type="submit" name="submit" value="Find me someone!" />
                        <?php if(isset($_POST['submit'])){
                            $selected_Society = $_POST['society'];
                        } ?>


                </div>
                </form>


            </div>

            <?php

            ;
            $sql = "SELECT Photo, UserID FROM profile WHERE society = '$selected_Society'";
            $conn = new mysqli('hive.csis.ul.ie', 'group03', 'Wy=!)U5J6BS(hd/T', 'dbgroup03');
            $output = '';

            if((isset($_POST['submit'])) Or (isset($_POST['submit1'])) Or (isset($_POST['submit2']))) {


                $query = mysqli_query($conn, "SELECT Photo, handle FROM profile WHERE location = '".$_POST["college"]."' OR society = '".$_POST["society"]."' OR club = '".$_POST["club"]."'") or die ("Could not search");
                $count = mysqli_num_rows($query);

                if($count == 0){
                    $output = "There was no search results!";

                }else{
                    $i = 0;
                    while ($row = mysqli_fetch_array($query)) {

                        $Name = $row ['Photo'];
                        $ID = $row ['handle'];

                    echo ' <div class="container">
  <div class="row">
    <div class="col-sm">
     
    
  </div>
    <div class="col-sm">
    <div class="card" style="width: 18rem; align-content: center">
  <img class="card-img-top" src="data:image/jpeg;charset=utf-8;base64, '.base64_encode($row['Photo'] ).'"  alt="Card image cap">
  <div class="card-body">
<h5 class="card-title">'.$ID.'</h5>
    <a href="#" class="btn btn-primary">View Profile</a>
  </div>
     </div>
    <div class="col-sm">
    
    </div>
  </div>
 ';




                }

            }
        }



        ?>

        </div>
        <div class="col-sm">
        </div>
        <div class="col-sm">

        </div>
    </div>
</div>
</body>
</html>
