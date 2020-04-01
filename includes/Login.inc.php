<?php
session_start();
include 'dbh.inc.php';

// check if login button is pressed
if (isset($_POST['login'])) {

    $uid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    //Error handlers
    //Check if inputs are empty
    if (empty($uid) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();

    } else {
        $sql = "SELECT * FROM security WHERE emailusers = '$uid' OR uidusers ='$uid'";
        //True or false if it can find a user
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            header("Location: ../index.php?login=nouserfound");
            exit();
        } else {

            if ($row = mysqli_fetch_assoc($result)) {
                //De-hashing the paswrd
                $hashedPwdCheck = password_verify($password, $row['pwdUsers']);
                if ($hashedPwdCheck == false) {
                    header("Location: ../index.php?login=error");
                    exit();

                } else if ($hashedPwdCheck == true) {
                    //Log in the user here
                    $_SESSION['mail'] = $row['emailusers'];
                    $_SESSION['pwd'] = $row['pwdUsers'];
                    $_SESSION['uid'] = $row['uidusers'];
                    //enter homepage here
                    header("Location: ../Home.php?login=success");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../index.php?login=error");
    exit();
}
