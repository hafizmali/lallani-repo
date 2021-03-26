<?php
include('../includes/database.php');
 if(isset($_POST))
 {
			//getting details for inserting a new row in database
			$status = $_POST["status"];
			$sql ="UPDATE ebookpopup SET status = $status WHERE id = 366";
			$tm = mysql_query($sql);
			var_dump($tm);
		    mysql_close();
 }		
		
?>