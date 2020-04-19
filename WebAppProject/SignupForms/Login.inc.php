<?php
session_start();
include 'dbh.inc.php';

// check if login button is pressed
if (isset($_POST['email']) && isset($_POST['password'])) {

    $uid = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM admin WHERE adminusername = '{$uid}' AND adminpassword = '{$password}'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            //Log in the user here
            $_SESSION['uid'] = $row['adminusername'];
            $_SESSION['pwd'] = $row['adminpassword'];

            //enter admin homepage here
            header("Location: ../admin/adminHome.php?login=success");
            exit();

        } 

    $sql = "SELECT * FROM security WHERE email = '{$uid}' OR username = '{$uid}' AND password_user = '{$password}'";

    //True or false if it can find a user
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            //Log in the user here
            $_SESSION['mail'] = $row['email'];
            $_SESSION['pwd'] = $row['password_user'];
            $_SESSION['uid'] = $row['username'];
            //enter homepage here
            header("Location: ../Home/Home.php?login=success");
            exit();
        }

      else {
            die("Query error");
        }
    }
}
}



//header("Location: ./index.php?login=error");
//exit();
