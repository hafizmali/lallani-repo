<?php 
include '../includes/startsession.php';
if (!isset($_SESSION['limit'])){$currentLimit=7;}else{$currentLimit=$_SESSION['limit'];}
$newLimit=$currentLimit+6;
$_SESSION['limit']=$newLimit;
$fromloc=$_GET['fromloc'];


/* echo "<br>currentLimit: ".$currentLimit;
echo "<br>newLimit: ".$newLimit;
echo "<br>fromloc: ".$fromloc; */

echo "<script type='text/javascript'>window.location.href = '".$_SERVER['HTTP_REFERER']."#loadmore';</script>";
//echo "<br>window.location.href = '".$_SERVER['HTTP_REFERER']."'";
?>
