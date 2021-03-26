<!--div id="loading"><div id="progressbar"></div></div-->
<?php
$domain = $_SERVER['HTTP_HOST'];
$url = "http://" . $domain . $_SERVER['REQUEST_URI'];
$dirs = explode('/', $_SERVER['REQUEST_URI']);
$lastdir=$dirs[sizeof($dirs)-2];

if ($lastdir=='hireme'){
	$rootpath="../includes/";
	}else{
	$rootpath="includes/";
	}
	
include $rootpath.'database.php';
include $rootpath.'validation.php';
include $rootpath.'header.php';
if ($file!=="signup"){include $rootpath.'loginform.php';}
?>