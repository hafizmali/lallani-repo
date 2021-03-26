<div id="taglineadmin">
<h1>Tagline Manager</h1>
		<form name="formTAG" method="post" action="process/addtagline.php">
			<ul class="formRow 0 underline">
				<li class="100"><input class="clearText" type="text" name="tagline" size="82" placeholder="tagline" />&nbsp;</li>
				
				<li class=""><input class="clearText" type="text" name="tagColor" size="10" placeholder="color hex value" />&nbsp;</li>	
				<li class=""><input class="clearText" type="text" name="tagFont" size="27" placeholder="google font name" />&nbsp;</li>	
				<li class=""><input class="clearText" type="text" name="tagSize" size="3" placeholder="size" />&nbsp;</li>					
				<li class=""><input class="clearText" type="text" name="tagDate" class="beatpicker-input beatpicker-inputnode" size="11" value="<?php echo date("m/d/Y"); ?>" data-beatpicker="true" data-beatpicker-module="footer,icon,clear" data-beatpicker-format="['MM','DD','YYYY'],separator:'/'" />&nbsp;</li>
				<li class=""><input class="clearText" type="text" name="tagExpires" class="beatpicker-input beatpicker-inputnode" size="11" value="12/31/2099" data-beatpicker="true" data-beatpicker-module="footer,icon,clear" data-beatpicker-format="['MM','DD','YYYY'],separator:'/'" />&nbsp;</li>				
				<li class=""><input class="clearText" type="text" name="tagLink" size="82" value="#" />&nbsp;</li>					
				<li class="" style="float:right;"><a href="javascript:submitformTAG()" class="next">add</a>&nbsp;</li>
				<script type="text/javascript">
				function submitformTAG(){document.formTAG.submit();}
				</script>
			</ul>
		</form>
		resources:
		<a target="_blank" href="http://www.w3schools.com/tags/ref_colorpicker.asp">color picker</a>&nbsp;
		<a target="_blank" href="https://www.google.com/fonts">Google Fonts</a>
		<?php
		$sqlTAG="Select * from llTagline order by tagDate desc";
		$resultTAG=mysql_query($sqlTAG);
		$numTAG=mysql_num_rows($resultTAG);
		$TAG=0;
		while ($TAG < $numTAG) {
		$tagID=mysql_result($resultTAG,$TAG,"tagID");
		$tagline=mysql_result($resultTAG,$TAG,"tagline");
		$tagColor=mysql_result($resultTAG,$TAG,"tagColor");
		$tagFont=mysql_result($resultTAG,$TAG,"tagFont");
		$tagSize=mysql_result($resultTAG,$TAG,"tagSize");		
		$tagLink=mysql_result($resultTAG,$TAG,"tagLink");		
		$tagDate=date("m/d/Y",strtotime(mysql_result($resultTAG,$TAG,"tagDate")));
		$tagExpires=date("m/d/Y",strtotime(mysql_result($resultTAG,$TAG,"tagExpires")));
		?>
		<form name="<?php echo 'formTAG'.$TAG; ?>" method="post" action="process/updatetagline.php">
			<ul class="">	
				<li class=""><input type="text" name="tagline" size="82" value="<? echo $tagline; ?>" />&nbsp;</li>					
				<li class=""><input type="text" name="tagColor" size="10" style="color:#<? echo $tagColor; ?>;" value="<? echo $tagColor; ?>" />&nbsp;</li>	
				<li class=""><input type="text" name="tagFont" size="27" style="font-family:'<? echo $tagFont; ?>';" value="<? echo $tagFont; ?>" />&nbsp;</li>	
				<li class=""><input type="text" name="tagSize" size="3" value="<? echo $tagSize; ?>" />&nbsp;</li>	
				<li class=""><input type="text" name="tagDate" class="beatpicker-input beatpicker-inputnode" size="11" value="<? echo $tagDate; ?>" data-beatpicker="true" data-beatpicker-module="footer,icon,clear" data-beatpicker-format="['MM','DD','YYYY'],separator:'/'" />&nbsp;</li>
				<li class=""><input type="text" name="tagExpires" class="beatpicker-input beatpicker-inputnode" size="11" value="<? echo $tagExpires; ?>" data-beatpicker="true" data-beatpicker-module="footer,icon,clear" data-beatpicker-format="['MM','DD','YYYY'],separator:'/'" />&nbsp;</li>
				<li class=""><input type="text" name="tagLink" size="82" value="<? echo $tagLink; ?>" />&nbsp;</li>
				
				<li class="" style="float:right;"><a href="process/deletetagline.php?tagID=<?php echo $tagID; ?>" class="delete">delete</a></li>
				<li class="" style="float:right;"><a href="javascript:updateformTAG<?php echo $TAG; ?>()" class="next">update</a></li>
			</ul>
			<input type="hidden" name="tagID" value="<?php echo $tagID; ?>" />
		</form>
		<script type="text/javascript">
		function updateformTAG<?php echo $TAG; ?>(){document.formTAG<?php echo $TAG; ?>.submit();}
		</script>
		<?php
		++$TAG;
		}
		?>

		
</div>