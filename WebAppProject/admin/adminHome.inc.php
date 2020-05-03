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
        echo "User Deleted";
    } else {
        echo "User not deleted";
    }
}
//Create Admin
if (isset($_POST['newAdminUsername']) && isset($_POST['newAdminPassword'])) {
    $adminUsername = 'newAdminUsername';
    $adminPassword = $hashedPwd = md5('newAdminPassword');
    $sql = "INSERT INTO admin (adminusername, adminpassword) VALUES ('{$adminUsername}', '{$adminPassword}')";
    $result = mysqli_query($conn, $sql);
    //toast message
    if ($result) {
        echo "Admin Created";
    }

}
