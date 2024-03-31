<?php session_start(); ?>
<html>
<body>
			<?php
		if(isset($_GET["active"])){
			$con = mysql_connect("localhost","myuser","vHNGQRaHheNAXVTw");
			if (!$con)
			  {
			  die('Could not connect: ' . mysql_error());
			  }

			mysql_select_db("myapp", $con);

			$sql = "SELECT * FROM `users` WHERE `active` LIKE '". mysql_real_escape_string($_GET["active"])."'";

			$result = mysql_query($sql);
			
			$found = 0;
			while ($row = mysql_fetch_array($result)) {
				$found = 1;
			}
			
			if ($found) {
			
			$sql = "UPDATE `users` SET `active` ='DONE'";

			$result = mysql_query($sql);
			
			?>Thank you for activating<?
			}
			else {
			?>Can't find user!<?
			}

			mysql_close($con);
		}
		else {
		?>Invalid activation<?php
		}
		?>
</body>
</html>