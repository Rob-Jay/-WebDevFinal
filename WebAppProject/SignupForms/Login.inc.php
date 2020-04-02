<?php
session_start();
include 'dbh.inc.php';

// check if login button is pressed
if (isset($_POST['email']) && isset($_POST['password'])) {

    $uid = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM security WHERE email = '{$uid}' AND password_user = '{$password}'";
    echo $sql;
    //True or false if it can find a user
    $result = mysqli_query($conn, $sql);
    if($result){
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            //Log in the user here
            $_SESSION['mail'] = $row['email'];
            $_SESSION['pwd'] = $row['password_user'];
            $_SESSION['uid'] = $row['username'];
            //enter homepage here
            header("Location: ../Home/Home.php?login=success");
            exit();
        } else {
            //header("Location: ./index.php?login=nouserfound");
            //exit();
        }
    } else {
        die("Query error");
    }
}

//header("Location: ./index.php?login=error");
//exit();

?>