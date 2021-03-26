<?php 
include('../includes/database.php');

$EbookID =$_POST['EbookID'];


$sql="DELETE from freeebook where EbookID=$EbookID";

mysql_query($sql);
?>