<?php

$dbServername="hive.csis.ul.ie";
$dbUsername = "group03";
$dbPassword = "Wy=!)U5J6BS(hd/T";
$dbName = "dbgroup03";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
if(!$conn){
	die("Connection failed:".mysqli_connecterror());
}
