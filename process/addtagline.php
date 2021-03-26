<?php 
include('../includes/database.php');

$tagline= strip_tags( mysql_real_escape_string($_POST['tagline']));
$tagColor=$_POST['tagColor'];
$tagFont=$_POST['tagFont'];
$tagSize=$_POST['tagSize'];
$tagLink=$_POST['tagLink'];
$tagDate=strtotime($_POST['tagDate']);
$sqltagDate=date('Y-m-d H:i:s', $tagDate);
$tagExpires=strtotime($_POST['tagExpires']);
$sqltagExpires=date('Y-m-d H:i:s', $tagExpires);
/*
echo "<br>tagline: ".$tagline;
echo "<br>tagColor: ".$tagColor;
echo "<br>tagDate: ".$tagDate;
echo "<br>password: ".$tagExpires;
echo "<br>isAdmin: ".$isAdmin;
echo "<br>securityID: ".$securityID;
echo "<br>securityAnswer: ".$securityAnswer;

*/

$sql="INSERT INTO llTagline (tagline,tagColor,tagFont,tagSize,tagDate,tagExpires,tagLink) VALUES ('$tagline','$tagColor','$tagFont',$tagSize,'$sqltagDate','$sqltagExpires','$tagLink')";
	
mysql_query($sql);
//echo "<br>sql: ".$sql;
//echo "Record Updated";
mysql_close();
Header('Location:../admin.php?portalValue=taglines');
?>
