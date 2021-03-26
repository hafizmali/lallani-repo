<?php
include('../includes/database.php');
$date=$_GET['date'];
$hour=$_GET['hour'];

//echo "<br>date: ".$date;
//echo "<br>hour: ".$hour;

$sql="insert into llAppointment (startTime, endTime, apptTitle) values ('".$date." ".$hour.":00:00','".$date." ".$hour.":00:00','blocked')";
mysql_query($sql);

if ($hour==7){
	//echo "hour: ".$hour;
	$sql8="insert into llAppointment (startTime, endTime, apptTitle) values ('".$date." 08:00:00','".$date." 08:00:00','subblocked')";
	mysql_query($sql8);	
	$sql9="insert into llAppointment (startTime, endTime, apptTitle) values ('".$date." 09:00:00','".$date." 09:00:00','subblocked')";
	mysql_query($sql9);
	$sql10="insert into llAppointment (startTime, endTime, apptTitle) values ('".$date." 10:00:00','".$date." 10:00:00','subblocked')";
	mysql_query($sql10);
	}

if ($hour==12){
	$sql13="insert into llAppointment (startTime, endTime, apptTitle) values ('".$date." 13:00:00','".$date." 13:00:00','subblocked')";
	mysql_query($sql13);	
	$sql14="insert into llAppointment (startTime, endTime, apptTitle) values ('".$date." 14:00:00','".$date." 14:00:00','subblocked')";
	mysql_query($sql14);
	}

if ($hour==19){
	$sql20="insert into llAppointment (startTime, endTime, apptTitle) values ('".$date." 20:00:00','".$date." 20:00:00','subblocked')";
	mysql_query($sql20);	
	$sql21="insert into llAppointment (startTime, endTime, apptTitle) values ('".$date." 21:00:00','".$date." 21:00:00','subblocked')";
	mysql_query($sql21);
	$sql22="insert into llAppointment (startTime, endTime, apptTitle) values ('".$date." 22:00:00','".$date." 22:00:00','subblocked')";
	mysql_query($sql22);
	$sql23="insert into llAppointment (startTime, endTime, apptTitle) values ('".$date." 23:00:00','".$date." 23:00:00','subblocked')";
	mysql_query($sql23);
	}	
	
//echo "<br />".$sql;
//echo "<br />".$sql8;
//echo "<br />".$sql9;
//echo "<br />".$sql10;
echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/hireme/appointment.php';</script>";
?>