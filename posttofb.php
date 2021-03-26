<?php
// require Facebook PHP SDK
// see: https://developers.facebook.com/docs/php/gettingstarted/
require_once("../lalanii/facebook-php-sdk-v4-5.0-dev/src/Facebook/autoload.php");


$fb = new Facebook\Facebook([
  'app_id' => '1640595062841641',
  'app_secret' => '13d44b14d162cce2abef51be70f726fa',
  'default_graph_version' => 'v2.3',
  ]);
 
$fb->setDefaultAccessToken('EAAXUHM3w4SkBAEOOi1hc8t4bO4bZAgtwwsxY8JXNb2dKgpeyEhsZCdn7L8nCaon7uERyDMFCrZBLT0mpzeHsJZAKRZB7QvtIaYx8YHRGHet6Kc1sSOlDH3htdMuBoahHfZAlpQiONTpRXufCxstow4M8EZA0IjZBtcUZD');

include 'includes/database.php';

$recentTime = strtotime('-15 minutes');
$recentdate =date('Y-m-d H:i:s', $recentTime);
//echo date('Y-m-d H:i:s').'<br />';

//and b.blogDate > '".$recentdate."' 
$sqlSB="Select b.secretBlog,b.blogID,b.blogTitle,b.blogDetail,b.blogPage,b.blogDate,b.blogEmailed,b.blogThumb,b.blogBanner,s.categoryID,s.subcategoryID from llBlog b join llSubcategory s on b.subcategoryID=s.subcategoryID where b.post_to_fb ='1' and b.postedfb='0' and b.blogDate < NOW() ";

$resultSB=mysql_query($sqlSB);
$countSB=0;
if ($resultSB) {
//echo "<br>counter: ".$countSB;
//echo "<br>total number: ".$numSB;
while(mysql_fetch_array($resultSB)) {

$blogID = mysql_result($resultSB,$countSB,"blogID");
$blogTitle = mysql_result($resultSB,$countSB,"blogTitle");
$blogPage = mysql_result($resultSB,$countSB,"blogPage");
$blogDetail = mysql_result($resultSB,$countSB,"blogDetail");
$blogDetailPart=substr(strip_tags($blogDetail),0,100)."...";
$categoryID = mysql_result($resultSB,$countSB,"categoryID");
$subcategoryID = mysql_result($resultSB,$countSB,"subcategoryID");
$banner = mysql_result($resultSB,$countSB,"blogBanner");
$thumb = mysql_result($resultSB,$countSB,"blogThumb");
$secretBlog=mysql_result($resultSB,$countSB,"secretBlog");

if($secretBlog == 1)
{
	$nnban = 'http://lalanii.com/images/secret.png';
}
else
{
	//$fbanner = explode('com/',$banner);
	//$nnban = $fbanner[1];
	$nnban = $banner;
}


echo $blogTitle;
echo $nnban;
$blogDetail;
$blogDetail = strip_tags(stripcslashes($blogDetailPart));



//$helper = $fb->getPageTabHelper();
//}

$data = [
	'link' => 'http://lalanii.com/'.strtolower($blogPage)."/".$blogID."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle)),	
	'message' => $blogTitle.'    '.'http://lalanii.com/'.strtolower($blogPage)."/".$blogID."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle)),
	'picture' => $nnban
  	
];

//'source' => $fb->fileToUpload($nnban),


try {
  $response = $fb->post('/me/feed', $data, 'EAAXUHM3w4SkBAEOOi1hc8t4bO4bZAgtwwsxY8JXNb2dKgpeyEhsZCdn7L8nCaon7uERyDMFCrZBLT0mpzeHsJZAKRZB7QvtIaYx8YHRGHet6Kc1sSOlDH3htdMuBoahHfZAlpQiONTpRXufCxstow4M8EZA0IjZBtcUZD');
mysql_query("Update llBlog set postedfb='1' where blogID='$blogID'");
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

//'/me/home'

/*
try {
  $response = $fb->post('/106764956090989/photos', $data, 'CAAXUHM3w4SkBAKa5ZAf52idUkNFPjNTRSpW8zwefSBoxWkOZACGwZAYTeR2zyTzYhO4p7t8NtfBra54NUwyhSUAwm24PpwcsOZAJjwNJqNRuffeQJyLZCbHKNtVdi616epcMHze3t189VfXSbK3KP5VuSSillwzaI5MSvYJRFOWqCDIteRcMduPdfybiZCZBmwZD');

} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
*/
mysql_query("Update llBlog set postedfb='1' where blogID='$blogID'");

$graphNode = $response->getGraphNode();
break;
} }

echo 'Done';
//echo 'Posted with id: ' . $graphNode['id'];
?>