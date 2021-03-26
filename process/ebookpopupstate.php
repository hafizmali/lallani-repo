<?php
include('../includes/database.php');
 if(isset($_POST))
 {
			//getting details for inserting a new row in database
			$status = $_POST["status"];
			$pstatus = $_POST["pstatus"];
			echo $sql ="UPDATE ebookpopup SET status = $status , pstatus = $pstatus  WHERE id = 362";
			$tm = mysql_query($sql);
			var_dump($tm);
		    mysql_close();
 }		
		
?>