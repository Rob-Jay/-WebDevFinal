<?php
//include_once 'header.php';
?>

<html>
<head>

</head>

<body>
    <main>
    <link rel="stylesheet" type="text/css" href="style.css">

    <section class="main-wrapper">
		<div class = "submission-form" >
			<h2 class ="heading">Signup</h2>
            <form class="submission-form" action="signup.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Username">
                <input type="text" name="mail" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-repeat" placeholder="Repeat Password">
                <li class = ><a href="index.php"><img src="home.png"/></a></li>
                <button type="submit">Sign up </Button>
            </form>
</section>

        </div>
    </main>
</body>
