<?php

require 'dbh.inc.php';
session_start();

//If they clicked on signup button
if (isset($_POST['uid']) && isset($_POST['mail']) && isset($_POST['pwd']) && isset($_POST['pwd-repeat'])) {
    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    //Username Format checker and email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ./signup.php?error=invalidmail&uid="  .$username);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ./signup.php?error=invalidmail&uid=" . $username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ./signup.php?error=invaliduid&mail=" . $email);
        exit();
    }
    //Check if password re the same
    else if ($password !== $passwordRepeat) {
        header("Location: ./signup.php?error=passwordcheck&uid=" . $username . "&mail=" . $email);
    }
    //connect to database check error... Check for more than 1 username and email
    else {
        $sql = "SELECT * FROM security WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
                header ("Location: ./signup.php?error=usertaken");
                exit();
            } 
        $sql = "SELECT * FROM security WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            header ("Location: ./signup.php?error=emailtaken");
            exit();
        } 
        else {
            // User ID not taken{
            $hashedPwd = md5($password);
            $sql = "INSERT INTO security (username, email, password_user) VALUES ('{$username}', '{$email}', '{$hashedPwd}')";
            
            $res = mysqli_query($conn, $sql);
            if($res){
                if(mysqli_affected_rows($conn) > 0) {
                    // Data inserted
                    $_SESSION['sUsername'] = $username;
                    header("Location: ../Signup/createuser.php?signup=success");
                    exit();
                } else {
                    // Data not inserted
                    header("Location: ./signup.php?error=sqlerror");
                    exit();
                }
            }
        }
    }
    mysqli_close($conn);
}
//if they didnt click signup button on signup form
else {

    header("Location ./signup.php");
    exit();

}
?>