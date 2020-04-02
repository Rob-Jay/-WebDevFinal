<?php
//include_once 'header.php';
?>
    <main>
    <link rel="stylesheet" type="text/css" href="style.css">
    <section class="main-container">
		<div class = "main-wrapper" >
			<h1>Signup</h1>
            <form class="submission-form" action="includes/signup.inc.php" method="POST">
            <input type="text" name="uid" placeholder="Username">
            <input type="text" name="mail" placeholder="E-mail">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwd-repeat" placeholder="Repeat Password">
            <button type="submit">Sign up </Button>
            </form>
            <ul>
                <li><a href="index.php">Home</a> </li>
            </ul>
</div>
      
    </main>
