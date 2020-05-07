<!DOCTYPE html>
<html>
<hr>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	function OnLogout(){
		$.ajax({url:"logout.inc.php",success:function(result)
			{
				alert(result);
			}
		})
	}
<link rel="stylesheet"  href="mysyle.css">
<br>
<div id = "boxes">
    <div id = "leftbox">
        <br>
        <button onclick="OnLogout()">Log Out</button>
        <button class="btn btn1" onclick="window.location.href = 'Home.php';">Home</button>
    </div>
    <div id = "middlebox">
        <img style="border-radius: 50% "  src="Logo.png" alt="Logo" class="center">
    </div>
    <div id = "rightbox">
        <br>
        <div style="float: right">
            <button class="btn btn2" onclick="window.location.href = 'Userprofile.php' ;">Profile Page</button>
        </div>
    </div>
    <hr>
</div>
</html>

