<?php
include "dbh.inc.php";
include "Home.php";
$sql = "SELECT userID2 FROM connections WHERE userID1 = ".$_SESSION['uid'].";";
$result = mysqli_query($conn, sql);
$Array = mysqli_fetch_array($result);
$sql = "UPDATE connections SET ConnectionType='a' WHERE userID1 = ".$$_SESSION['uid'].";";
$result = mysqli_query($conn,$sql);
echo "success";
?>