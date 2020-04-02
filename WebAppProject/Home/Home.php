<?php
	include 'config.php';
?>
<!DOCTYPE html>
<html>

<hr>
<link rel="stylesheet"  href="mysyle.css">
<div id = "boxes">
    <div id = "leftbox">
        <br>
    <button class="btn btn1" onclick="window.location.href = 'MenuPage.html';">Menu</button>
    </div>
    <div id = "middlebox">
    <img style="border-radius: 50% "  src="Logo.png" alt="Logo" class="center">
    </div>
    <div id = "rightbox">
        <br>
    <div style="float: right">
<button class="btn btn2" onclick="window.location.href = 'ProfilePage.html' ;">Profile Page</button>
</div>
    </div>

</div>

</head>
<hr>

<body>
<h3>Find Matches By</h3>
<div ><button onclick="window.location.href = 'searchByCollege.php';">College</button></div>
<div><button onclick="window.location.href = 'searchByClub.php';">Club</button></div>
<div>  <button  onclick="window.location.href = 'searchBySociety.php';">Society</button></div>


<div>
<!--<h2>-->
<!--Notifications:	--><?php
//	$sql = "SELECT * FROM connections;";
//				$result = mysqli_query($conn,$sql);
//				$resultCheck = mysqli_num_rows($result);
//
//				if($resultCheck > 0){
//				while ($row = mysqli_fetch_assoc($result)){
//					if($row['ConnectionType']!='p'|| $row['ConnectionType']!='r' ){
//					echo $row['ConnectionDate'] . "<br>";
//					echo $row['userID1'] . "matched with: <br>";
//					echo $row['userID2'];
//				}
//				}
//				}
//	?>
<br>
Matches:
	<?php
	$sql = "SELECT * FROM connections;";
				$result = mysqli_query($conn,$sql);
				$resultCheck = mysqli_num_rows($result);
				
				if($resultCheck > 0){
				while ($row = mysqli_fetch_assoc($result)){
					echo $row['ConnectionDate'] . "<br>";
					echo $row['userID1'] . "matched with: <br>";
					echo $row['userID2'];
				}
				}
	?>

</h2>
</div>
<h3>Current User</h3>
<div style="float: bottom">
    <div style="float: right:50%">
    AGE:
    <?php
    $sql = "SELECT * FROM profile;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo $row['Age'];
        }
    }
    ?>
    -SEX:
    <?php
    $sql = "SELECT * FROM profile;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo $row['Gender'];
        }
    }
    ?>
    -LOCATION:
    <?php
    $sql = "SELECT * FROM profile;";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result)){
            echo $row['location'];
        }
    }
    ?>
    </div>
</div>
</body>
</html>