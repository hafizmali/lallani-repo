<?php
include('../includes/database.php');
$date=$_GET['date'];
$hour=$_GET['hour'];

//echo "<br>date: ".$date;
//echo "<br>hour: ".$hour;

$sql="insert into llAppointment (startTime, endTime, apptTitle) values ('".$date." ".$hour.":00:00','".$date." ".$hour.":00:00','taken and booked')";
mysql_query($sql);
echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/hireme/appointment.php';</script>";
?>