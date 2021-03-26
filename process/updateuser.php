<?php
include('../includes/startsession.php');
include('../includes/database.php');
$userID=$_SESSION['userID'];
$userName=$_SESSION['userName'];
$userEmail=$_POST['updateUserEmail'];
$userFirstName=$_POST['updateUserFirst'];
$userLastName=$_POST['updateUserLast'];
$selectfree=$_POST['selectfree'];
$selectsubscribe=$_POST['selectsubscribe'];
$selectadditional=$_POST['selectadditional'];
$selectfashion=$_POST['selectfashion'];
$selectcreatives=$_POST['selectcreatives'];
$selectbeauty=$_POST['selectbeauty'];
$selectsecrets=$_POST['selectsecrets'];
$selecttopic=$_POST['selecttopic'];
$selectsubcategory=$_POST['selectsubcategory'];

foreach ($selecttopic as $selecttopicID) {$emailTopic=$emailTopic.$selecttopicID.",";}	
				
foreach ($selectsubcategory as $selectsubcategoryID) {$emailSubcategory=$emailSubcategory.$selectsubcategoryID.",";}					

if ($agreecheckbox=="checked"){$agreecheckbox=1;}
if (isset($selectsecrets)){$userType='super';}else{$userType='user';}
if ($selectfashion=="checked"){$emailCategory=$emailCategory."20,";}
if ($selectcreatives=="checked"){$emailCategory=$emailCategory."22,";}
if ($selectbeauty=="checked"){$emailCategory=$emailCategory."21,";}
if ($selectsecrets=="checked"){$emailCategory=$emailCategory."23,";}

/*
echo "<br>userID: ".$userID;
echo "<br>username: ".$userName;
echo "<br>email: ".$userEmail;
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

$sql="UPDATE llUser SET userEmail='$userEmail',userFirstName='$userFirstName',userLastName='$userLastName',emailSubcategory='$emailSubcategory',emailTopic='$emailTopic' where userID=$userID";
mysql_query($sql);
//echo "<br />".$sql;
//echo "Record Updated";
mysql_close();
echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/myaccount.php';</script>";
?>
