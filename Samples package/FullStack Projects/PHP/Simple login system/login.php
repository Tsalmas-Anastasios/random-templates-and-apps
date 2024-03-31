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

			$sql = "SELECT * FROM `users` WHERE `user` LIKE '". mysql_real_escape_string($_POST["user"])
			."' AND ".
				"`pass` LIKE MD5('". mysql_real_escape_string($_POST["pass"])
			."') AND ".
				"`active` = 'DONE'";

			$result = mysql_query($sql);
			
			$found = 0;
			while ($row = mysql_fetch_array($result)) {
				if ($row[1]==$_POST["user"]) {
					$found = 1;
				}
			}
			
			if ($found) {
			$_SESSION["USER"] = $_POST["user"];
			?>Thank you for logging in<?
			}
			else {
			?>User/Pass is wrong!<?
			}

			mysql_close($con);
		}
		else {
		?>
		
			Please log-in:<br/>
			<form action="login.php" method="POST">
				User: <input type="text" name="user"><br />
				Pass: <input type="password" name="pass"><br />
				<input type="submit" />
			</form>
			
		<?php
		}
		?>
</body>
</html>