<?php
include('../includes/startsession.php');
include('../includes/database.php');
$usertypers=$_POST['usertypers'];
$prodid=$_POST['prodid'];
$userName=$_POST['userName'];
$userEmail=$_POST['newUserEmail'];
$returnloc=$_SERVER['HTTP_REFERER'];
$userFirstName=$_POST['newUserFirst'];
$userLastName=$_POST['newUserLast'];
$termsDate=date("Y-m-d h:i:s");
$agreecheckbox=$_POST['agreecheckbox'];
$selectfree=$_POST['selectfree'];
$selectsubscribe=$_POST['selectsubscribe'];
$selectadditional=$_POST['selectadditional'];
$selectfashion=$_POST['selectfashion'];
$selectcreatives=$_POST['selectcreatives'];
$selectbeauty=$_POST['selectbeauty'];
$selectsecrets=$_POST['selectsecrets'];
$selecttopic=$_POST['selecttopic'];
$selectsubcategory=$_POST['selectsubcategory'];

if(isset($selecttopic)){foreach ($selecttopic as $selecttopicID) {$emailTopic=$emailTopic.$selecttopicID.",";}}
/*if(isset($selectsubcategory)){foreach ($selectsubcategory as $selectsubcategoryID) {$emailSubcategory=$emailSubcategory.$selectsubcategoryID.",";}}*/
if ($agreecheckbox=="checked"){$agreecheckbox=1;}

if ($selectfashion=="checked")
{
	$emailCategory=$emailCategory."20,";
	$getsubcatids = mysql_query("Select * from llSubcategory where categoryID = '20' and secretSubcategory=0");
	while($getsubcatresult = mysql_fetch_array($getsubcatids))
	{
			$emailSubcategory .= $getsubcatresult['subcategoryID'].",";
	}	
	
}
if ($selectbeauty=="checked")
{
	$emailCategory=$emailCategory."21,";
	$getsubcatids = mysql_query("Select * from llSubcategory where categoryID = '21' and secretSubcategory=0");
	while($getsubcatresult = mysql_fetch_array($getsubcatids))
	{
			$emailSubcategory .= $getsubcatresult['subcategoryID'].",";
	}		
}
if ($selectcreatives=="checked")
{
	$emailCategory=$emailCategory."22,";
	$getsubcatids = mysql_query("Select * from llSubcategory where categoryID = '22' and secretSubcategory=0");
	while($getsubcatresult = mysql_fetch_array($getsubcatids))
	{
			$emailSubcategory .= $getsubcatresult['subcategoryID'].",";
	}	
}



//if(isset($selectsubcategory)){foreach ($selectsubcategory as $selectsubcategoryID) {$emailSubcategory=$emailSubcategory.$selectsubcategoryID.",";}}


if ($selectsecrets=="checked"){$emailCategory=$emailCategory."23,";$userType='user';$userTypeo='user';}else{$userType='user';$userTypeo='super';}

//echo $emailSubcategory;exit;

$sqlcheck="Select * from llUser where userName='$userName' or userEmail='$userEmail'";
//	echo $sqlcheck;

$resultcheck=mysql_query($sqlcheck);
$numcheck=mysql_num_rows($resultcheck);

/*  
echo "<br>username: ".$userName;
echo "<br>email: ".$userEmail;
echo "<br>returnto: ".$returnloc;
echo "<br>dbname: ".$dbUserName;
echo "<br>dbemail: ".$dbUserEmail;
echo "<br>numresults: ".$numcheck;
echo "<br>userFirstName: ".$userFirstName;
echo "<br>userLastName: ".$userLastName;
echo "<br>termsdate: ".$termsDate;
echo "<br>select free: ".$selectfree;
echo "<br>select subscribe: ".$selectsubscribe;
echo "<br>select additional: ".$selectadditional;
echo "<br>select fashion: ".$selectfashion;
echo "<br>select creatives: ".$selectcreatives;
echo "<br>select beauty: ".$selectbeauty;
echo "<br>select secrets: ".$selectsecrets;
echo "<br>select topic: ".$selecttopic;
//print_r ($selecttopic);
//print_r ($selectsubcategory);
echo "<br>email topic: ".$emailTopic;
echo "<br>email subcategory: ".$emailSubcategory;
echo "<br>email Category: ".$emailCategory;
 */

//echo $sqlcheck;

	if ($numcheck>0){	
		$dbUserName=mysql_result($resultcheck,0,"userName");
		$dbUserEmail=mysql_result($resultcheck,0,"userEmail");
		if (($dbUserName==$userName) AND($dbUserEmail==$userEmail)) {
			echo '<script>window.location="'.$returnloc.'?request=createaccount&loginmsg=usernameemailexists"</script>';
			//echo "both equal";
		} elseif ($dbUserName==$userName){
			echo '<script>window.location="'.$returnloc.'?request=createaccount&loginmsg=emailexists"</script>';
			//echo "username equals";
		}else{
			echo '<script>window.location="'.$returnloc.'?request=createaccount&loginmsg=userexists"</script>';
			//echo "email equal";
		}
	}

if($userEmail != ''){
	$sqlIns="INSERT INTO llUser (userFirstName,userLastName,userEmail,userName,userPass,userType,termDate,terms,emailCategory,emailSubcategory,emailTopic) 
	VALUES 
	('".$userFirstName."','".$userLastName."','".$userEmail."','".$userName."','".$_POST['newUserPass']."','".$userType."','".$termsDate."',".$agreecheckbox.",'".$emailCategory."','".$emailSubcategory."','".$emailTopic."')";
	//echo "<br>"."sqlIns: ".$sqlIns;
	mysql_query($sqlIns);

}
	//$newsql="Select max(userID) as userID from llUser";
	//echo "<br>".$newsql;
	//$newresult=mysql_query($newsql);
	$newuserid=mysql_insert_id();

	
	$_SESSION['userID']=$newuserid;
	$_SESSION['userName']=$userName;
	$_SESSION['userFirstName']=$userFirstName;
	$_SESSION['loggedin'] = "yes";


if($usertypers == 'paidreg')
{
	$unlock_query = mysql_query("Select * from llsettings");
	$unlock_res = @mysql_fetch_array($unlock_query);
	if($unlock_res['temp_unlock'] == 1)
	{
		$subscription="monthly";
		$accessThrough="0000-00-00";
		$today=date('Y-m-d H:i:s');
		$accessThrough=date('Y-m-d H:i:s',strtotime("+1 month",strtotime($today)));

		$sql="UPDATE llUser SET userType='super', accessThrough='$accessThrough',authResponse='Ok',subscriptionid='0000',subscription='$subscription',authText='Unlocked User',authReason='I00001' where userID='$newuserid'";
				mysql_query($sql);

		$_SESSION['subscription'] = "super";
		?>
<script type='text/javascript'>window.location.href='http://lalanii.com/message.php?&valsub=<?php echo $subscription; ?>';</script>
<?php
	}
	else
	{
		$_SESSION['subscription'] = "user";
		?>
<script>
window.location="http://lalanii.com/subscribe.php?u=<?php echo $newuserid; ?>";
</script>
<?php
	}

}	

if($usertypers == 'getproducts')
{
$_SESSION['subscription'] = "user";
?>
<script>
window.location="http://lalanii.com/subscribe2.php?u=<?php echo $newuserid; ?>&get_product=true&prodid=<?php echo $prodid; ?>";
</script>
<?php
}	

if($usertypers == 'downloadebook')
{
$_SESSION['subscription'] = "user";
?>
<script>
window.location="http://lalanii.com/subscribe2.php?u=<?php echo $newuserid; ?>";
</script>
<?php
}
	
if ($userTypeo=='super'){

$_SESSION['subscription'] = "user";
?>
<script>window.location="http://lalanii.com/message.php";</script>
<?php
}else{
//echo 'new basic user: '.$newuserid;
$_SESSION['subscription'] = "user";
echo '<script>window.location="http://lalanii.com/message.php";</script>';
}
mysql_close();
?>
