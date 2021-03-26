<?php 
include('../includes/database.php');
$tagID=$_GET['tagID'];
$sql="DELETE FROM llTagline where tagID=$tagID";
mysql_query($sql);
//echo "<br />".$sql;
//echo "Record Updated";
mysql_close();
header('location:http://lalanii.com/admin.php?portalValue=taglines');
?>
