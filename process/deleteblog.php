<?php 
include('../includes/database.php');
$blogID=$_GET['blogID'];
$sql="DELETE FROM llBlog where blogID=$blogID";
mysql_query($sql);
//echo "<br />".$sql;
//echo "Record Updated";
mysql_close();
echo "<script>window.opener.location.reload();</script>";
echo "<script type='text/javascript'>window.close();</script>";
?>
