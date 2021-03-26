<?php 
include('../includes/database.php');

$PEbookID =$_POST['PEbookID'];


$sql="DELETE from paidbook where PEbookID=$PEbookID";

mysql_query($sql);
?>