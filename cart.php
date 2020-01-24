	<?php require_once "header.php" ?>
	<?php require_once  "classes.php" ?>

	<?php 
		if(!isset($_SESSION["Username"]->Username)){
			die(header("location:Sign_in_page.php"));
		}else{
			@$_SESSION["Username"]->cartdisplay();
		}
	?>
    
	<?php
		
	?>

<?php require_once "footer.php"; ?>