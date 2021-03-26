<?php
include('../includes/database.php');
 if(isset($_POST))
 {


     $sql_select = "SELECT PEbookID FROM paidbook WHERE peBookSelect = 1";
     $result=mysql_query($sql_select);
		if(mysql_num_rows($result) > 0)
		{
			while($row = mysql_fetch_array($result))
			{
				$eBookID = $row['PEbookID'];
				$sql ="UPDATE paidbook SET peBookSelect = 0 WHERE PEbookID = $eBookID";
				mysql_query($sql);
			}
		}

			//getting details for inserting a new row in database
			$eBookID = $_POST["PEbookID"];
			$sql ="UPDATE paidbook SET peBookSelect = 1 WHERE PEbookID = $eBookID";
			$tm = mysql_query($sql);
			var_dump($tm);
		    mysql_close();
 }		
		
?>