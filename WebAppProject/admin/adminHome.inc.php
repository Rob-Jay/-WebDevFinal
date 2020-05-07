<?php
session_start();
include 'dbh.inc.php';

// Delete User
if (isset($_POST['deleteUser'])) {
    $deleteUser = $_POST['deleteUser'];
    $sql = "Delete FROM security WHERE user_id = '{$deleteUser}'";
    $result = mysqli_query($conn, $sql);
    $sql = "Delete FROM profile WHERE UserID = '{$deleteUser}'";
    $result = mysqli_query($conn, $sql);

    //Use toast messages
    if ($result) {
        header("Location: ../admin/adminHome.php?SuccessfulDelete");
    } else {
        header("Location: ../admin/adminHome.php?FailDelete");
    }
}


//ban user  not working 
if (isset($_POST['banuser'])) {
    $banId = $_POST['banuser'];
    echo"input recived";
    $sql = "INSERT INTO bannedUsers (bannedEmail, bannedId, bannedUsername)
    SELECT email, user_id, username FROM security WHERE user_id = '{$banId}'";
    $result = mysqli_query($conn, $sql);
    //toast message
    if ($result) {
        header("Location: ../admin/adminHome.php?SuccessfulBan");
    }
    else{
        header("Location: ../admin/adminHome.php?FailBan");
    }
}

//unban user
if (isset($_POST['unbanuser'])) {
    $unbanUser = $_POST['unbanuser'];
    $sql = "Delete FROM bannedUsers WHERE bannedId = '{$unbanUser}'";
    $result = mysqli_query($conn, $sql);
    //Use toast messages
    if ($result) {
    
        header("Location: ../admin/adminHome.php?SuccessfulUnBan");

    } else {
        header("Location: ../admin/adminHome.php?FailUnBan");
    }
}






//Create Admin
if (isset($_POST['newAdminUsername']) && isset($_POST['newAdminPassword'])) {
    $adminUsername =$_POST['newAdminUsername'];
    $adminPassword= md5($_POST['newAdminPassword']);
    $sql = "INSERT INTO admin (adminusername, adminpassword) VALUES ('{$adminUsername}', '{$adminPassword}')";
    $result = mysqli_query($conn, $sql);
    //toast message
    if ($result) {
        echo "Admin Created";
        header("Location: ../admin/adminHome.php?AdminHasBeenCreated");
    }

}
