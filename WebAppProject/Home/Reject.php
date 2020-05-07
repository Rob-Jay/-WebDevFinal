<?php
include "dbh.inc.php";
include "Home.php";
session_start();
$sql = "SELECT userID2 FROM connections WHERE userID1 = ".$_SESSION['uid'].";";
$result = mysqli_query($conn, $sql);
$Array = mysqli_fetch_array($result);
$OtherId=$Array[$int2];
$sql = "UPDATE connections SET ConnectionType='r' WHERE userID2 = ".$_SESSION['uid].";";
$result = mysqli_query($conn,$sql);
echo "success";
?>