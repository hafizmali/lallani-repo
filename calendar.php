<?php include 'includes/startsession.php';?>
<html>
<head>
<title>Lalanii Rochelle | Calendar</title>
<meta name="title" content="Lalanii Rochelle | Calendar" />
<meta name="description" content="Lalanii Rochelle | Calendar" />
<?php include 'includes/tags.php';?>
</head>
<body id="index">
<div id="main">
	<?php include 'includes/includes.php';?>
	<div id="content">
	
		<?php
		$monthNames = Array("January", "February", "March", "April", "May", "June", "July", 
		"August", "September", "October", "November", "December");
		
		if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
		if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");
		
		$cMonth = $_REQUEST["month"];
		$cYear = $_REQUEST["year"];
		 
		$prev_year = $cYear;
		$next_year = $cYear;
		$prev_month = $cMonth-1;
		$next_month = $cMonth+1;
		 
		if ($prev_month == 0 ) {
		    $prev_month = 12;
		    $prev_year = $cYear - 1;
		}
		if ($next_month == 13 ) {
		    $next_month = 1;
		    $next_year = $cYear + 1;
		}
		?>	
		<table width="100%" border="0" cellpadding="2" cellspacing="2" id="monthcalendar">
			<tr>
				<td align="left"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>" class="previous">previous</a></td>
				<td align="center" colspan="5"><img id="monthtext" src="images/general/Month<?php  echo $monthNames[$cMonth-1]; ?>.png" /></td>
				<td align="right"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>" class="next">next</a></td>
			</tr>
			<tr>
				
				<th class="monday"><span></span></td>
				<th class="tuesday"><span></span></td>
				<th class="wednesday"><span></span></td>
				<th class="thursday"><span></span></td>
				<th class="friday"><span></span></td>
				<th class="saturday"><span></span></td>
				<th class="sunday"><span></span></td>					
			</tr>
			<?php 
				$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
				$maxday = date("t",$timestamp);
				$thismonth = getdate ($timestamp);
				$startday = $thismonth['wday']-1;
				if($startday < 0 ) $startday = 6;
				for ($i=0; $i<($maxday+$startday); $i++) {
					$thisday=($i - $startday + 1);
		
					$calendarDate=date("Y-m-d",strtotime($cYear."-".$cMonth."-".$thisday));
					$todaysDate=date("Y-m-d");
					//echo "<br>todaysdate: ".$todaysDate;
					//echo "<br>calendardate: ".$calendarDate;
					
					$sqlCAL="select * from llBlog where blogDate like '".$calendarDate."%'";
					$resultCAL=mysql_query($sqlCAL);
					$numCAL=mysql_num_rows($resultCAL);
					//echo '<br>$sql: '.$sqlCAL;
					//echo '<br>$result: '.$resultCAL;
					//echo '<br>'.$calendarDate.' num: '.$numCAL;
					if($numCAL>0){$hasevent=" hasevent";} else {$hasevent="";}
					$CAL=0;
		
					if(($i % 7) == 0 ) echo "<tr>";
					if($i < $startday) {
							echo "<td class='noday'></td>";
						}else{
							$styleclass=" ".strtolower(date('l', strtotime($calendarDate)));
							if($todaysDate==$calendarDate){$daysClass='todaysDate'.$styleclass;}else{$daysClass='hasday'.$styleclass;}
							if(($todaysDate==$calendarDate) OR ($todaysDate>$calendarDate)){
								echo "<td class='".$daysClass."'><div class='thisday calavailableblog'>".$thisday."</div>";
								}else{
								echo "<td class='".$daysClass."'><div class='thisday calfutureblog'>".$thisday."</div>";
								}
							while ($CAL < $numCAL) {
							$blogID=mysql_result($resultCAL,$CAL,"blogID");							
							$blogTitle=mysql_result($resultCAL,$CAL,"blogTitle");
							$blogPage=strtolower(mysql_result($resultCAL,$CAL,"blogPage"));
							//$subcategoryID=mysql_result($resultCAL,$CAL,"subcategoryID");	
							$subcategoryID=mysql_result($resultCAL,$CAL,"blogPage");	
							/*$sqlBSCat2=mysql_query("SELECT * from llSubcategory where subcategoryID='$subcategoryID'");
							$resultBSCat2=mysql_fetch_array($sqlBSCat2);
							print_r($resultBSCat2);*/
							 $blogdatetime =  mysql_result($resultCAL,$CAL,"blogDate");
							 $currentdate = date('Y-m-d H:i:s');
							
							$datetime1 = new DateTime($blogdatetime);
							$datetime2 = new DateTime($currentdate);
							
							

							//if(($todaysDate==$calendarDate) OR ($todaysDate>$calendarDate) OR ($isadmin=="yes") OR ($isreviewer=="yes")){						
							//if($a==0){echo "<br />";}else{echo "<hr />";}
							//echo "TDay ".$todaysDate.'<br />';
							//echo "CDay ".$calendarDate.'<br />';
							if(($datetime1 <= $datetime2) OR ($isadmin=="yes") OR ($isreviewer=="yes")){
							echo "<a class='calavailableblog css".$subcategoryID."' href='http://lalanii.com/".$blogPage."/".$blogID."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle))."'>".$blogTitle."</a>";
							}else{
							echo "<a class='calfutureblog' href=''>".$blogTitle."</a>";
							}
							++$CAL;
							}
						}
					echo "</td>";
					if(($i % 7) == 6 ) echo "</tr>";
				}
			?>
		</table>
		<div id="calfuturenotice" style="display:none;">Err... Oops! That blog is not available yet! Check back later!<br><br><a class="delete">close message</a></div>
	</div>
	<?php include 'includes/bubbles.php';?>
	<?php include 'includes/social.php';?>
	<?php include 'includes/footer.php';?>
</div>
</body>
</html>
<?php include 'includes/scripts.php';?>