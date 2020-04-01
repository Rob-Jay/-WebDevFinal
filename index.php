<?php 
	include 'header.php';
 ?>

<body>
	<section class="main-container">
		<div class="main-wrapper">
			<h2>Home</h2>
			<?php  

				if (isset($_SESSION['usernmae'])) {
					echo "You are logged in!";
				}

			?>

		</div>
	</section>
</body>
