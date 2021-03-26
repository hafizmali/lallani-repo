<?php
	include('../includes/database.php');
	
	
	$sql_select="SELECT * FROM paidbook";
	
	$result=mysql_query($sql_select);
		if(mysql_num_rows($result) > 0)
		{
			while($row = mysql_fetch_array($result))
			{
				$data[]= array("PEbookID"=>$row['PEbookID'],"headingColor"=>$row['pheadingColor'],"ppdfamount"=>$row['ppdfamount'],"heading"=>$row['pheading'],"headingSize"=>$row['pheadingSize'],"headingFont"=>$row['pheadingFont'],"pdfName"=>$row['ppdfName'],"fileCounter"=>$row['pfileCounter'] ,"eBookSelect"=>$row['peBookSelect'],"paidEBookMailTitle"=>$row['pmailTitle'] ,"paidEBookMailText"=>$row['pMailText'],"paidEBookThankYouMessage"=>$row['pThankYouMessage']);
			}
		}
		echo json_encode($data);
?>