<?php
	
	include "dbh.inc.php";
	include "DBcontroller.php";
	session_start();
	
?>
<!DOCTYPE html>
<html>
<head>
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	function OnAccept($){
		$.ajax({url:"Accept.php",success:function(result)
			{
			alert($result);	
			}
		})
	}
	function OnReject(){
		$.ajax({url:"Reject.php",success:function(result)
			{
				alert(result);
			}
		})
	}
	</script>
</head>
<hr>

<body>
<h3>Find Matches By</h3>
<div ><button onclick="window.location.href = 'searchByCollege.php';">College</button></div>
<div><button onclick="window.location.href = 'searchByClub.php';">Club</button></div>
<div>  <button  onclick="window.location.href = 'searchBySociety.php';">Society</button></div>



<div>
<h2>
Notifications:
</h2>
	<?php
	$OtherUid = array();
	$arrayCounter = 0;
	$sql = "SELECT user_id FROM security WHERE username = '".$_SESSION['uid']."';";
	$sqlChange="";			
				$result = mysqli_query($conn,$sql);
				$resultCheck = mysqli_fetch_array($result);
				$UIDResult = $resultCheck['user_id'];
				
	$sql = "SELECT	* FROM connections WHERE userID1 = ".$UIDResult." AND ConnectionType = 'p';";	
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
				if($resultCheck>0){
					$Counter=0;
				while ($row = mysqli_fetch_assoc($result)){
					echo "<br>".$row['ConnectionDate'] . "<br>";
					echo $row['userID1'] . "<br> matched with: <br>";
					echo $row['userID2']."<br>";
					$OtherUid[$arrayCounter] = $row['userID2'];
					$arrayCounter = $arrayCounter +1;
					echo '<button onclick="OnAccept()">Accept</button> ';
					echo '<button onclick="OnReject()">Reject</button>';
					$Counter= $Counter + 1;
				}				
				}
				
				
				
				
	?>
<br>
<h2>
Matches:
</h2>
	<?php
	
	$sql = "SELECT user_id FROM security WHERE  username = '".$_SESSION['uid']."';";
				
				$result = mysqli_query($conn,$sql);
				$resultCheck = mysqli_fetch_array($result);
				$UIDResult = $resultCheck['user_id'];
				
	$sql = "SELECT	* FROM connections WHERE ConnectionType ='a' AND userID1 = ".$UIDResult." OR userID2 = ".$UIDResult.";";	
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
				if($resultCheck > 0){
				while ($row = mysqli_fetch_assoc($result)){
					echo "<br>".$row['ConnectionDate'] . "<br>";
					echo $row['userID1'] . " matched with: <br>";
					echo $row['userID2']."<br>";
				}
				}
	?>

</h2>
</div>
<h3>Current User</h3>
<div style="float: bottom">
    <div style="float: right:50%">
    -AGE:
    <?php
	
		$userIDQuery = "SELECT user_id FROM security WHERE username = '" . $_SESSION['uid'] . "';";
		$UIDResults = mysqli_query($conn, $userIDQuery);
		$UIDrow = mysqli_fetch_array($UIDResults);
		$UIDResult = $UIDrow['user_id'];
		$userIDQuery="SELECT Age FROM profile WHERE UserID = ".$UIDResult.";";
		$UIDResults = mysqli_query($conn, $userIDQuery);
		$UIDrow = mysqli_fetch_array($UIDResults);
		$UIDResult = $UIDrow['Age'];
		echo $UIDResult;
    ?>
    -SEX:
    <?php
	
    		$userIDQuery = "SELECT user_id FROM security WHERE username = '" . $_SESSION['uid'] . "';";
		$UIDResults = mysqli_query($conn, $userIDQuery);
		$UIDrow = mysqli_fetch_array($UIDResults);
		$UIDResult = $UIDrow['user_id'];
		$userIDQuery="SELECT Gender FROM profile WHERE UserID = ".$UIDResult.";";
		$UIDResults = mysqli_query($conn, $userIDQuery);
		$UIDrow = mysqli_fetch_array($UIDResults);
		$UIDResult = $UIDrow['Gender'];
		echo $UIDResult;
    ?>
    -LOCATION:
    <?php
	
		$userIDQuery = "SELECT user_id FROM security WHERE username = '" . $_SESSION['uid'] . "';";
		$UIDResults = mysqli_query($conn, $userIDQuery);
		$UIDrow = mysqli_fetch_array($UIDResults);
		$UIDResult = $UIDrow['user_id'];
		$userIDQuery="SELECT location FROM profile WHERE UserID = ".$UIDResult.";";
		$UIDResults = mysqli_query($conn, $userIDQuery);
		$UIDrow = mysqli_fetch_array($UIDResults);
		$UIDResult = $UIDrow['location'];
		echo $UIDResult;
    ?>
    </div>
</div>
</body>
</html>
</html>
