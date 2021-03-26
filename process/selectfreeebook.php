<?php
	include('../includes/database.php');
	
	
	$sql_select="SELECT * FROM freeebook";
	
	$result=mysql_query($sql_select);
		if(mysql_num_rows($result) > 0)
		{
			while($row = mysql_fetch_array($result))
			{
				$data[]= array("EbookID"=>$row['EbookID'],"headingColor"=>$row['headingColor'],"heading"=>$row['heading'],"headingSize"=>$row['headingSize'],"headingFont"=>$row['headingFont'],"popupText"=>$row['popupText'],"popupTextColor"=>$row['popupTextColor'],"popupTextSize"=>$row['popupTextSize'],"popupTextFont"=>$row['popupTextFont'],"pdfName"=>$row['pdfName'],"popupImage"=>$row['popupImage'],"fileCounter"=>$row['fileCounter'] ,"eBookSelect"=>$row['eBookSelect'],"freeEBookMailTitle"=>$row['mailTitle'] ,"freeEBookMailText"=>$row['MailText'],"freeEBookThankYouMessage"=>$row['ThankYouMessage'],"freeEBookOpacity"=>$row['opacity']);
			}
		}
		echo json_encode($data);
?>