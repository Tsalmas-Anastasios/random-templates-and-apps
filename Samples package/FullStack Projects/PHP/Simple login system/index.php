<?php session_start(); ?>
<html>
<body>
	<?php
        if(isset($_SESSION["USER"])){
			?>Hello <?php echo $_SESSION["USER"]; ?>. Do you want to <a href="logout.php">logout</a>?<?php
        } else {
			?>Hello unknown user. Do you want to <a href="login.php">login</a> or
			<a href="register.php">register</a>?<?php
        } 
	?>
</body>
</html>