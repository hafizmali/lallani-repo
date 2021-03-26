<?php
if($_GET['duserID'] != '')
{
	mysql_query("Delete from llUser where userID='".$_GET['duserID']."'");	
	?>
	<script>
		location.href="http://lalanii.com/admin.php?portalValue=users";
	</script>
    <?php
}
if($_POST['ccuser'])
{
	$ccuid = $_POST['ccuser'];
	$ccusername = $_POST['userName'];
	$ccfname = $_POST['userFirstName'];
	$cclname = $_POST['userLastName'];

//echo "Update llUser set userFirstName='".$ccfname ."', userLastName='".$cclname ."', userName='".$ccusername ."' where userID='".$ccuid."' ";


	mysql_query("Update llUser set userFirstName='".$ccfname ."', userLastName='".$cclname ."', userName='".$ccusername ."' where userID='".$ccuid."' ");
	$nstatus = "UUP";
}
?>
<?php if($nstatus == 'UUP'){?>
<h2 style="width:100%;text-align:center;">Record Updated Successfully!</h2>
<?php } ?>
<div id="useradmin">
	<h1>User Manager</h1>
<ul class="formRow column100 underline">
	<li class="column10 textLeft"><h4>First Name</h4></li>
	<li class="column10 textLeft"><h4>Last Name</h4></li>
	<li class="column10 textLeft"><h4>User Name</h4></li>
	<li class="column10 textLeft"><h4>Initial Password</h4></li>
	<li class="column15 textLeft"><h4>&nbsp;</h4></li>
	<li class="column5 textLeft"><h4>&nbsp;</h4></li>	
	<li class="column5 textLeft"><h4>&nbsp;</h4></li>	
</ul>
<?php
$sqlUSR="Select * from llUser";
$resultUSR=mysql_query($sqlUSR);
$numUSR=mysql_num_rows($resultUSR);
$output .= "User Name,Email\r\n";
$USR=0;
while ($USR < $numUSR) {
$admUserID=mysql_result($resultUSR,$USR,"userID");
$admUserFirstName=mysql_result($resultUSR,$USR,"userFirstName");
$admUserLastName=mysql_result($resultUSR,$USR,"userLastName");
$admUserName=mysql_result($resultUSR,$USR,"userName");
$admUserEmail=mysql_result($resultUSR,$USR,"userEmail");
$admUsersecurityID=mysql_result($resultUSR,$USR,"securityID");
$admUsersecurityAnswer=mysql_result($resultUSR,$USR,"securityAnswer");
?>
<form style="width:700px;margin: 0px 0px 5px;" name="form<?php echo $USR;?>" method="post" action="http://lalanii.com/admin.php?portalValue=users">
<ul class="formRow column100 underline">	
	<li class="column10 textLeft"><input type="text" name="userFirstName" size="10" value="<? echo $admUserFirstName; ?>" />&nbsp;</li>
	<li class="column10 textLeft"><input type="text" name="userLastName" size="10" value="<? echo $admUserLastName; ?>" />&nbsp;</li>	
	<li class="column10 textLeft"><input type="text" name="userName" size="10" value="<? echo $admUserName; ?>" />&nbsp;</li>
	<li class="column10 textLeft">* * * *</li>
	<li class="column10 textLeft"><a href="javascript:submitform<?php echo $USR; ?>()" class="next">Update</a></li>
	<li class="column15 textLeft"><a href="forgot.php?userID=<?php echo $admUserID; ?>" class="next">Reset Pass</a></li>
    <?php
    if($_SESSION['userID'] != $admUserID){
	?>
	<li class="column10 textLeft"><a style="position: relative;top: 0;left: 0;" onclick="window.location='http://lalanii.com/admin.php?portalValue=users&duserID=<?php echo $admUserID; ?>'" href="" class="close">X</a></li>
    <?php } ?>
    <li class="column10 textLeft" style="float:right;width:158px;"><input type="text" readonly="readonly" name="userEmail" size="20" value="<? echo $admUserEmail; ?>" />&nbsp;</li>
</ul>

<script type="text/javascript">
function submitform<?php echo $USR; ?>(){document.form<?php echo $USR; ?>.submit();}
</script>
<input type="hidden" name="ccuser" value="<?php echo $admUserID; ?>" />
</form>
<?php
$output .="\"$admUserName\",\"$admUserEmail\"\r\n";
++$USR;
}
?>
<a target="_blank" style=" float: right;font-size: 20px;margin: 10px -70px 0px 0px;" href="http://lalanii.com/allusers.csv">Export All Users</a>
<?php

	
	$csv_filename = "allusers.csv";
	$fp = fopen($csv_filename,"w");
	fwrite($fp, $output, strlen($output));
	fclose($fp);



?>
</div>
