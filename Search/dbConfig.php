
<?php
//db details
$dbHost = 'hive.csis.ul.ie';
$dbUsername = 'group03';
$dbPassword = 'Wy=!)U5J6BS(hd/T';
$dbName = 'dbgroup03';

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>

