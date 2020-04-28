<!DOCTYPE html>
<html lang="en">
<?php
include "dbh.inc.php"
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminPAge</title>
    <link rel="stylesheet" type="text/css" href="style.css">
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
    <form class="adminform" action="search.inc.php" method="POST">
        <input type="text" name="search" placeholder="Search">
        <button type="submit" name = "submit-search">Search </Button>
    </form>

    <h2>all users</h2>

    <div class ="user-container">
    <?php
    
          $output = "";
          $query = mysqli_query($conn, "SELECT Photo,handle,UserID FROM profile") or die ("Could not search");
          $count = mysqli_num_rows($query);

          if($count == 0){
              $output = "There was no search results!";

          }else{
              $i = 0;
              while ($row = mysqli_fetch_array($query)) {

                  $Name = $row ['Photo'];
                  $handle = $row ['handle'];
                  $id = $row['UserID'];


                  if(($i % 3) == 0){
                      echo ' <br> ';
                  }


                  $output .='<div> '.$Name.'</div>';
                  print ("Name is \t");
                  print ("$handle \n");
                  print("User id is \t ");
                  print ("$id");

                  echo '  
                    <tr>  
                         <td>   
                              <img src="data:image/jpeg;charset=utf-8;base64, '.base64_encode($row['Photo'] ).'" height="200" width="200"  />  
                         </td>  
                    </tr>  
               ';
                  $i = $i + 1;
              }

          }
      



      ?>



  </div>
</div>

</div>

</div>

</body>
</html>
