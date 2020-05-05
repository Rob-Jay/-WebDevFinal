<?php
session_start();
include 'dbh.inc.php';

// check if login button is pressed
if (isset($_POST['email']) && isset($_POST['password'])) {

    $uid = $_POST['email'];
    $password = md5($_POST['password']);

    //login as admin
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


       //Login as a regular user  
    $sql = "SELECT * FROM security WHERE email = '{$uid}' OR username = '{$uid}' AND password_user = '{$password}'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            //Log in the user here 
            //Andrew this is where the session variables are 
            $_SESSION['mail'] = $row['email'];          //email
            $_SESSION['pwd'] = $row['password_user'];   //password
            $_SESSION['uid'] = $row['username'];        //username
            //enter homepage here
            header("Location: ../Home/Home.php?login=success");
            exit();
        }
        //Insert toast messages
      else {
        header("Location: ./index.php?error=UserDoesNotExsist");
        exit();
            

        }
    }
}
}

