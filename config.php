<?php

$host = "hive.csis.ul.ie";
$user = "group03";
$password = "Wy=!)U5J6BS(hd/T";
$dbname = "dbgroup03";

$con = mysqli_connect($host,$user,$password,$dbname);

if(!$con){
    die("Connection failed: ".mysqli_connect_error());
}

// echo "Connection Successful";


