<?php include '../includes/startsession.php';?>
<html>
<head>
<title>Lalanii Rochelle | Schedule an Appointment</title>
<meta name="title" content="Lalanii Rochelle | Schedule an Appointment" />
<meta name="description" content="Lalanii Rochelle | Schedule an Appointment" />
<?php include '../includes/tags.php';?>
</head>
<body id="hireme">
<div id="margin"></div>
<div id="main">
	<?php include '../includes/includes.php';?>
	<div id="content"><div id="fixsafari">
	
	<?php
	if (!isset($_GET['day'])){
		$monday=date('m/d/Y', strtotime("this Monday"));
	}else{
		$newdate=$_GET['month']."/".$_GET['day']."/".$_GET['year'];		
		$monday=date('m/d/Y',strtotime($newdate));		
		}
	$tuesday = date('m/d/Y',strtotime($monday . "+1 days"));
	$wednesday = date('m/d/Y',strtotime($monday . "+2 days"));
	$thursday= date('m/d/Y',strtotime($monday . "+3 days"));
	$friday = date('m/d/Y',strtotime($monday . "+4 days"));
	$saturday = date('m/d/Y',strtotime($monday . "+5 days"));
	$sunday = date('m/d/Y',strtotime($monday . "+6 days"));
	$previousDay=date('d',strtotime($monday . "-7 days"));
	$previousMonth=date('m',strtotime($monday . "-7 days"));
	$previousYear=date('Y',strtotime($monday . "-7 days"));
	$nextDay=date('d',strtotime($monday . "+7 days"));
	$nextMonth=date('m',strtotime($monday . "+7 days"));
	$nextYear=date('Y',strtotime($monday . "+7 days"));
	
	$monSQL = date('Y-m-d',strtotime($monday));
	$tuesSQL = date('Y-m-d',strtotime($tuesday));
	$wedSQL = date('Y-m-d',strtotime($wednesday));
	$thursSQL= date('Y-m-d',strtotime($thursday));
	$friSQL = date('Y-m-d',strtotime($friday));
	$satSQL = date('Y-m-d',strtotime($saturday));
	$sunSQL = date('Y-m-d',strtotime($sunday));
	?>
	
	<table id="appointments">
		<tr>
			<th colspan="4"><a class="next left" href="?day=<?php echo $previousDay;?>&month=<?php echo $previousMonth;?>&year=<?php echo $previousYear;?>">previous</a></th>
			<th colspan="4"><a class="next right" href="?day=<?php echo $nextDay;?>&month=<?php echo $nextMonth;?>&year=<?php echo $nextYear;?>">next</a></th>
		</tr>
		<tr>
			<th></th>
			<th class="mon">Mon<br><?php echo $monday; ?></th>
			<th class="tues">Tues<br><?php echo $tuesday; ?></th>
			<th class="wed">Wed<br><?php echo $wednesday; ?></th>
			<th class="thurs">Thurs<br><?php echo $thursday; ?></th>
			<th class="fri">Fri<br><?php echo $friday; ?></th>
			<th class="sat">Sat<br><?php echo $saturday; ?></th>
			<th class="sun">Sun<br><?php echo $sunday; ?></th>
		</tr>
		<?php 
		$hour=7;
		$maxhour=24;
		while($hour<$maxhour){
		if ($hour==11){
		?>
		<tr>
			<td class="time">11:00</td>
			<td colspan="7" class="breakfast orangebg">BREAKFAST</td>
		</tr>
		
		<?php 
		}else{ if ($hour==14){
		?>
		<tr>
			<td class="time">2:00</td>
			<td colspan="7" class="lunch pinkbg">LUNCH</td>
		</tr>
		<?php 
		}else{ if ($hour==18){
		?>
		<tr>
			<td class="time">6:00</td>
			<td colspan="7" class="dinner bluebg">DINNER</td>
		</tr>
		<?php 
		}else{
		?>
		<tr>
			<td class="time">
				<?php
				if ($hour<13){echo $hour;}else{echo $hour-12;}
				echo ":00";
				?>
			</td>
			
			<?php
			
			$weekdayNum=1;
			while($weekdayNum<8){
				//echo "weekdayNum: ".$weekdayNum;
				if ($weekdayNum==1){$weekDaySQL=$monSQL;}
				if ($weekdayNum==2){$weekDaySQL=$tuesSQL;}
				if ($weekdayNum==3){$weekDaySQL=$wedSQL;}
				if ($weekdayNum==4){$weekDaySQL=$thursSQL;}
				if ($weekdayNum==5){$weekDaySQL=$friSQL;}
				if ($weekdayNum==6){$weekDaySQL=$satSQL;}
				if ($weekdayNum==7){$weekDaySQL=$sunSQL;}
				$weekDayGoogle=date("Ymd",strtotime($weekDaySQL));
				$sqlday="Select * from llAppointment where startTime='".$weekDaySQL." ".$hour.":00:00'";					
				//echo $sqlday;
				$resultday=mysql_query($sqlday);
				$numday=mysql_num_rows($resultday);
				if($numday>0){
				$day=mysql_result($resultday,0,"apptTitle");
				//echo $day;
				if ($day=="blocked"){
					$sqlFiller="select * from llApptFillers where startTime='0000-00-00 ".$hour.":00:00' and weekday=".$weekdayNum;
					$resultFiller=mysql_query($sqlFiller);
					$numfiller=mysql_num_rows($resultFiller);
					if($numfiller>0){
					echo "<td class='apptday blocked'>";
					echo mysql_result($resultFiller,0,"apptFiller");
					echo "</td>";
					}
					}else if ($day=="subblocked"){
						echo "<td class='apptday blocked'></td>";
					}else{
						echo "<td class='apptday lightbluebg'>".$day."</td>";
					}
				}else{
					if ($loggedin=="yes"){
						echo "<td class='apptday'><a href='http://lalanii.com/process/apptgoogleadd.php?hour=".$hour."&date=".$weekDaySQL."'>available</a>";
					}else{
						echo "<td class='apptday'><a href='' class='loginclick'>available</a>";
					}
					if(($isadmin=="yes") AND (($hour==7) OR ($hour==12) OR ($hour==19))){echo "<br><a href='http://lalanii.com/process/apptblock.php?hour=".$hour."&date=".$weekDaySQL."'>block</a>";}
					echo "</td>";
					}
				++$weekdayNum;
			}
			?>
		</tr>
		<?php
		}}}
		++$hour;
		}
		?>
	</table>
	</div>
	</div>
	<?php include '../includes/footer.php';?>
</div>
</body>
</html>
<?php include '../includes/scripts.php';?>
