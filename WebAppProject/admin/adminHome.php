<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>
    <h3>Delete User</h3>
    <form class="adminform" action="adminHome.inc.php" method="POST">
        <input type="text" name="deleteUser" placeholder="Enter Username to delete">
        <button type="submit">Delete </Button>
    </form>

    <h3>Create Admin</h3>
    <form class="adminform" action="adminHome.inc.php" method="POST">
        <input type="text" name="newAdminUsername" placeholder="Enter Username">
        <input type="password" name="newAdminPassword" placeholder="Enter Password">
        <button type="submit">Create </Button>
    </form>





</body>

</html>