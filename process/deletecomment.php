<?php 
include('../includes/startsession.php');
include('../includes/database.php');
$commentID=$_GET['commentID'];
$sqlUpdateComment="Delete from  llComment where commentID=".$commentID;
//echo $sqlAddComment;
mysql_query($sqlUpdateComment);
				
//echo "<br>sql: ".$sql;
//echo "Record Updated";
mysql_close();
?>
<script>
location.href="<?php echo 'http://lalanii.com/admin.php?portalValue=comments'; ?>";
</script>
<?php
//Header('Location:http://lalanii.com/admin.php?portalValue=comments');
?>
