<?php
include('../includes/database.php');
$imageID=$_GET['imageID'];
$sqlIMG="select image from llGalleryAdminimage where imageID=$imageID";
//	echo "<br />sqlIMG: ".$sqlIMG;
$resultIMG=mysql_query($sqlIMG);
//	echo "<br />resultIMG: ".$resultIMG;

$image=mysql_result($resultIMG,0,"image");
//	echo "<br />resultIMG: ".$image;

$sql="DELETE from llGalleryAdminimage where imageID=$imageID";
//	echo "<br />sqlDEL: ".$sql;
mysql_query($sql);
//	echo "<br>Record Updated";
  
  $folder="../images/admin/";
//	echo "<br>folder: ".$folder;
  
  $file=$image;
//	echo "<br>file: ".$file;
//	echo "<br>file folder: ".$folder.$file;
    unlink($folder.$file);
mysql_close();
echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/includes/galleryslidermanager.php';</script>";
?>