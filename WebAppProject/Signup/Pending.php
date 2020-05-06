<?php
include "dbh.inc.php";
session_start();
$sql = "INSERT INTO connections VALUES(4,".$_SESSION['uid'].", ".$_SESSION['OtherID'].", '2020-05-31','p' );";
$result = mysqli_query($conn,$sql);
echo "success";
?>