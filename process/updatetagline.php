<?php
include('../includes/database.php');
$tagID=$_POST['tagID'];
$tagline=strip_tags($_POST['tagline']);
$tagColor=$_POST['tagColor'];
$tagFont=$_POST['tagFont'];
$tagSize=$_POST['tagSize'];
$tagLink=$_POST['tagLink'];
$tagDate=strtotime(str_replace('-', '/', $_POST['tagDate']));
$sqltagDate=date('Y-m-d H:i:s', $tagDate);
$tagExpires=strtotime(str_replace('-', '/', $_POST['tagExpires']));
$sqltagExpires=date('Y-m-d H:i:s', $tagExpires);

$sql="UPDATE llTagline SET tagline='$tagline',tagColor='$tagColor',tagFont='$tagFont',tagSize=$tagSize,tagDate='$sqltagDate',tagExpires='$sqltagExpires',tagLink='$tagLink' where tagID=$tagID";
mysql_query($sql);
//echo "<br />".$sql;
//echo "Record Updated";
mysql_close();
Header('Location:../admin.php?portalValue=taglines');
?>
