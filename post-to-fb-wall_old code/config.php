<?php
include_once("inc/facebook.php"); //include facebook SDK
 
######### edit details ##########
$appId = '770122909771094'; //Facebook App ID
$appSecret = 'c0f001d1b3f6727af58abb941523d990'; // Facebook App Secret
$return_url = 'http://lalanii.com/post-to-fb-wall/process.php';  //return url (url to script)
$homeurl = 'http://lalanii.com/post-to-fb-wall/index.php';  //return to home
$fbPermissions = 'publish_stream,manage_pages';  //Required facebook permissions
##################################

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret
));

$fbuser = $facebook->getUser();
?>