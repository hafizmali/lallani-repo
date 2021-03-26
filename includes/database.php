<?php
//echo("the database is included<br>");
/*
mysql_connect("lalanii.db.9886153.hostedresource.com", "lalanii", "L@l@n11DB") or die(mysql_error());
mysql_select_db("lalanii") or die(mysql_error());
mysql_select_db("lalanii", $con);
*/
/*$hostname="107.180.10.147";
$username="dbmaster";
$password="L@l@n11DB";*/
$hostname="localhost";
$username="root";
$password="";
$dbname="lalanii";
//$dbname="lalanii_new";

mysql_connect($hostname,$username, $password) or die ("<html><script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)</script></html>");
mysql_select_db($dbname);

// $connection = mysqli_connect($hostname,$username,$password);

// if (!$connection) {
//     error_log("Failed to connect to MySQL: " . mysqli_error($connection));
//     die('Internal server errorss');
// }

// // 2. Select a database to use 
// $db_select = mysqli_select_db($connection, $dbname);
// if (!$db_select) {
//     error_log("Database selection failed: " . mysqli_error($connection));
//     die('Internal server error');
// }
?>
