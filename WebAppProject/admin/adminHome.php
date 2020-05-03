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
include "allUsers.php"
?>









  </div>
</div>

</div>

</div>

</body>
</html>
