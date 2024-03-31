<?php session_start(); ?>
<html>
<body>
	<?php
		if(isset($_POST["user"])){
			$con = mysql_connect("localhost","myuser","vHNGQRaHheNAXVTw");
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }

			mysql_select_db("myapp", $con);
			
			$random = rand();
			
			$sql = "INSERT INTO `myapp`.`users` (`id`, `user`, `pass`, `active`) ".
			" VALUES (NULL, '". mysql_real_escape_string($_POST["user"])
			."', MD5('".mysql_real_escape_string($_POST["pass"])
			."'), '".mysql_real_escape_string($random)
			."');";
			
			mysql_query($sql);

			mysql_close($con);
			
			$message = "Please put this url http://localhost/app/activate.php?active=" . $random . " in your browser to activate your account.";
			@mail($_POST["email"], 'Thank you for registering', $message);
			
			?>Thank you <?php echo $_POST["user"]; ?> we send you a confirmation e-mail in <?php echo $_POST["email"]; ?><?php
			
			echo $message;
		}
		else {
			?>
			Please register:<br/>
			<form action="register.php" method="POST">
				User: <input type="text" name="user"><br />
				Pass: <input type="password" name="pass"><br />
				email: <input type="text" name="email"><br />
				<input type="submit" />
			</form>
			
			<?php
		}
	?>
</body>
</html>