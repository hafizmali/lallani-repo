<?php

$sql_select="SELECT status FROM ebookpopup WHERE id = 362";
	 
	$resultEbook = mysql_query($sql_select);

	if(mysql_num_rows($resultEbook) > 0)
	{
		
		$status = mysql_result($resultEbook, 0, 'status');
	}
	
	if(($status == 1) && ($_GET['eBook'] == '') )
	{
	?>    
<div id="overlay-back"></div>
<div id="firstpop">
<?php
$sql_select="SELECT * FROM freeebook WHERE eBookSelect = 1";
	 
		$resultEbook = mysql_query($sql_select);

		if(mysql_num_rows($resultEbook) > 0)
		{
			
			$eBookID = mysql_result($resultEbook, 0, 'EbookID');
			$eBookHeadingColor = mysql_result($resultEbook, 0, 'headingColor');
			$eBookHeadingSize = mysql_result($resultEbook, 0, 'headingSize');
			$eBookHeadingFont = mysql_result($resultEbook, 0, 'headingFont');
			$eBookHeading = mysql_result($resultEbook, 0, 'heading');
			$eBookPopupText = mysql_result($resultEbook, 0, 'popupText');
			$eBookPopupTextColor = mysql_result($resultEbook, 0, 'popupTextColor');
			$eBookPopupTextSize = mysql_result($resultEbook, 0, 'popupTextSize');
			$eBookPopupTextFont = mysql_result($resultEbook, 0, 'popupTextFont');
			$eBookPopupImage = mysql_result($resultEbook, 0, 'popupImage');
			$opacity = mysql_result($resultEbook, 0, 'opacity');
			
		}
?>

	<div style="opacity:<?php echo $opacity; ?>; background: url(http://lalanii.com/images/popup/<?php echo $eBookPopupImage;  ?>);"  id="firstpopBase">
	        <a id="closepdfPopup" href="#" class="close">x</a>
	  </div> 
	  <div style="margin-top: 200px;z-index: 999999;position: absolute;background: rgba(255,255,255,0.7);padding: 20px 0px;">
				<div style="color:<?php echo $eBookHeadingColor; ?>;font-size:<?php echo $eBookHeadingSize; ?> !important;font-family:<?php echo $eBookHeadingFont; ?> !important;" id="FreeEBookPopupHeading"><?php echo $eBookHeading; ?></div>
		    <div style="color:<?php echo $eBookPopupTextColor; ?>;font-size:<?php echo $eBookPopupTextSize; ?> !important;font-family:<?php echo $eBookPopupTextFont; ?> !important;" id="FreeEBookPopupText"><?php echo $eBookPopupText; ?></div>
		   <!--  <a id="fplink" href="http://creativewritingagency.com/lalanii/subscribe.php">click here</a> -->
		    <form style="margin-top:13px;" method="post" action = '/process/sendpdf.php'>
		        <input type="hidden" name = "freeEbookID" value=" <?php echo $eBookID; ?>" />
		        <input type="hidden" name = "currentPageUrl" value=" <?php echo $_SERVER['REQUEST_URI'] ?>" />
		        <input type="text" name="subcriberName" id="subcriberName" value="" placeholder ="FIRST NAME" />
		        <input required = "required" type="email" name="subcriberEmail" id="subcriberEmail" value=""  placeholder ="EMAIL"/>
		        <input type="submit"  value="CLICK HERE" />
	   		</form>
			</div>
</div>  

<?php } ?>  


<!--home page popup-->
  <?php
		if(($_GET['eBook'] != '') && ($_SESSION[userID] != ''))
		{
			$eBookID = $_GET['eBook'];
				$sql = "SELECT ThankYouMessage FROM freeebook WHERE EbookID = $eBookID";
				$result = mysql_query( $sql);
				$row = mysql_fetch_assoc($result);
				$message = $row['ThankYouMessage'];
		?>
		 <div class="dialogbox" id="dialog" title="Message">
		  
		  <div style="width: auto;font-family: impactlabel;background: #FFF;font-size: 26px;text-align: center;padding: 10px;" id="textpopup">	<img src="http://lalanii.com/images/general/logo.png"><br />
	<?php echo $message;?></div>
		</div>
	<?php 
		}
	?>

	
</div>