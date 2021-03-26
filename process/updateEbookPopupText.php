<?php
include('../includes/database.php');
 if(isset($_POST))
 {


     $sql_select = "SELECT EbookID FROM freeebook WHERE eBookSelect = 1";
     $result=mysql_query($sql_select);
		if(mysql_num_rows($result) > 0)
		{
			while($row = mysql_fetch_array($result))
			{
				$eBookID = $row['EbookID'];
				$sql ="UPDATE freeebook SET eBookSelect = 0 WHERE EbookID = $eBookID";
				mysql_query($sql);
			}
		}

			//getting details for inserting a new row in database
			$eBookID = $_POST["EbookID"];
			$sql ="UPDATE freeebook SET eBookSelect = 1 WHERE EbookID = $eBookID";
			$tm = mysql_query($sql);
			var_dump($tm);
		    mysql_close();
 }		
		
?>