<?php
session_start();
include 'dbh.inc.php';

// Delete User
if (isset($_POST['deleteUser'])) {
    $deleteUser = $_POST['deleteUser'];
    $sql = "Delete FROM security WHERE username = '{$deleteUser}' ";
    $result = mysqli_query($conn, $sql);
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
    if ($result) {
        echo "Admin Created";
    }

}
