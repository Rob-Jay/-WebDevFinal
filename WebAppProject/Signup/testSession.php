<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["sUsername"] = "Gemma";  //"Gemma" profile that works...; AdminTest2

echo "Session variables are set.";
?>

</body>
</html>