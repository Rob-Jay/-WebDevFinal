<?php
include "dbh.inc.php";
session_start();
$sqlSelect = "SELECT * From connections";
$sqlConn= mysqli_query($conn, $sql);
$ConnID= mysqli_num_rows($sqlConn);
$sql = "INSERT INTO connections VALUES(".$ConnID.",".$_SESSION['uid'].", ".$_SESSION['OtherID'].", CURDATE(),'p' );";
$result = mysqli_query($conn,$sql);
echo "success";
?>
