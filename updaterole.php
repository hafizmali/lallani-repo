<?php
include 'includes/database.php';
echo $ccdate = date('Y-m-d');
echo '<br>';
//echo "SELECT * FROM llUser WHERE accessThrough < '$ccdate' and accessThrough != '0000-00-00 00:00:00'";
$check_q = mysql_query("SELECT * FROM llUser WHERE accessThrough < '$ccdate' and userType='super' and accessThrough != '0000-00-00 00:00:00'");
while($check_res = mysql_fetch_array($check_q))
{
	$thisuser = $check_res['userID'];
	echo $thisuserem = $check_res['userEmail'];echo '<br>';
	mysql_query("Update llUser set userType='user' where userID='".$thisuser."'");	
}
?>