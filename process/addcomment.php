<?php 
include('../includes/startsession.php');
include('../includes/database.php');
$file=$_POST['file'];
$blogID=$_POST['blogID'];
$userID=$_SESSION['userID'];
$pID=$_POST['pID'];
$commentDate=date('Y-m-d h:i:s',time());
$comment=$_POST['comment'];
$sqlAddComment="INSERT INTO llComment (comment,userID,commentDate,blogID,pID) VALUES ('$comment',$userID,'$commentDate',$blogID,$pID)";
//echo $sqlAddComment;
mysql_query($sqlAddComment);
				
//echo "<br>sql: ".$sql;
//echo "Record Updated";
mysql_close();
?>
<script>
location.href="<?php echo 'http://lalanii.com/'.$file.'.php?blogID='.$blogID; ?>";
</script>
<?php
//Header('Location:http://lalanii.com/'.$file.'.php?blogID='.$blogID);
//die("Location:http://lalanii.com/'.$file.'.php?blogID='.$blogID."&error=notloggedin");
?>
