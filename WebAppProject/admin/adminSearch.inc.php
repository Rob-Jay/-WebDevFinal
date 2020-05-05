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
<h3>Search</h3>
    <form class="adminform" action="adminSearch.inc.php" method="POST">
        <input type="text" name="search" placeholder="Search">
        <button type="submit" name = "submit-search">Search </Button>
    </form>
<div class ="user-container">
    <?php
    if(isset($_POST['submit-search']))
     {
         $search = mysqli_real_escape_string($conn, $_POST['search']);
         $sql = "SELECT * FROM profile WHERE handle LIKE '%$search%' OR Description LIKE '%$search%' OR location LIKE '%$search%' OR club LIKE '%$search%' OR society LIKE '%$search%' OR interest LIKE '%$search%'";

        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if($queryResult > 0) {
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
                <h5>".$row['location']."</h5>
                <h5>".$row['club']."</h5>
                <h5>".$row['society']."</h5>
                <hr>
                </div>";
            }

        }
        else{
            echo "There are no results matching your search ";
        }

     }
    
    
    ?>

</div>
</body>