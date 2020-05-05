<!DOCTYPE html>
<html lang="en">
<?php
include "dbh.inc.php"
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPAge</title>
    <link rel="stylesheet" type="text/css" href="admin-style.css">
</head>


<body>
    <h3>Delete User</h3>
    <form class="adminform" action="adminHome.inc.php" method="POST">
        <input type="text" name="deleteUser" placeholder="Enter user id to delete">
        <button type="submit" name = "submit-delete">Delete </Button>
    </form>

    <h3>Create Admin</h3>
    <form class="adminform" action="adminHome.inc.php" method="POST">
        <input type="text" name="newAdminUsername" placeholder="Enter Username">
        <input type="password" name="newAdminPassword" placeholder="Enter Password">
        <button type="submit" name = "submit-create">Create </Button>
    </form>

    <h3>Search</h3>
    <form class="adminform" action="adminSearch.inc.php" method="POST">
        <input type="text" name="search" placeholder="Search">
        <button type="submit" name = "submit-search">Search </Button>
    </form>

    <h2>all users</h2>

    <div class ="user-container">
        <?php
        $sql = "SELECT * FROM profile";
        $result = mysqli_query($conn, $sql);
        $queryResults = mysqli_num_rows($result);

        if($queryResults>0) {
            while($row = mysqli_fetch_assoc($result)){
                echo "<div class = user-box> 
                <h3>".$row['handle']."</h3> 
                <h4>".$row['UserID']."</h4> 
                </div>";
                echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['Photo']).'"  border="4" height="200" width="200"/> ';
                echo "<div> 
                <p>".$row['Description']."</p>
                <h5>".$row['Age']."</h5>
                <h5>".$row['Gender']."</h5>
                <hr>
                </div>";

            }
        }











        //include "allUsers.php"
        ?>
    </div>

</body>


            