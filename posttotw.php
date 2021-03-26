<?php

// Include twitteroauth
require "twitteroauth/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

// Set keys
$consumerKey = 'y2WiiJyV1puA5qBXz8xSfJfHT';
$consumerSecret = 'gh9hKZqR8GDESMdVFBCaqZLoWmtvznjvUB1hlPwa8Nw5VT1CAN';
$accessToken = '17987523-zOYEwgUnSUrhSAjb0V2VSmZnJjqLdq2J19dEGf1Rn';
$accessTokenSecret = 'upecfRMzcD9TUJLvaRTHteVo6dLL5S0CsDXzxxqHaHvPT';

$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
$content = $connection->get("account/verify_credentials");

$statuses = $connection->get("search/tweets", array("q" => "twitterapi"));
//print_r($statuses);

/*
$statues = $connection->post("statuses/update", array("status" => "hello world"));
if ($connection->getLastHttpCode() == 200) {
    echo 'Tweet posted succesfully';
} else {
    echo 'Handle error case';
}
*/

include 'includes/database.php';

$recentTime = strtotime('-15 minutes');
$recentdate =date('Y-m-d H:i:s', $recentTime);
//echo date('Y-m-d H:i:s').'<br />';

//and b.blogDate > '".$recentdate."' 
$sqlSB="Select b.secretBlog,b.blogID,b.blogTitle,b.blogDetail,b.blogPage,b.blogDate,b.blogEmailed,b.blogThumb,b.blogBanner,s.categoryID,s.subcategoryID from llBlog b join llSubcategory s on b.subcategoryID=s.subcategoryID where b.post_to_tw ='1' and b.postedtw='0' and b.blogDate < NOW() Limit 0,1 ";

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
	$nnban = 'images/secret.png';
}
else
{
	$fbanner = explode('com/',$banner);
	$nnban = $fbanner[1];
}


echo $blogTitle;
$blogDetail;
$blogDetail = strip_tags(stripcslashes($blogDetailPart));



$media1 = $connection->upload('media/upload', array('media' => $nnban));
//print_r($media1);
//$media2 = $connection->upload('media/upload', array('media' => $nnban));
$parameters = array(
    'status' => $blogTitle.'    '.'http://lalanii.com/'.strtolower($blogPage)."/".$blogID."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle)),
    'media_ids' => implode(',', array($media1->media_id_string, $media2->media_id_string)),
);
$result = $connection->post('statuses/update', $parameters);

mysql_query("Update llBlog set postedtw='1' where blogID='$blogID'");

//$graphNode = $response->getGraphNode();
} }

echo 'Done';


/*
// Create object
$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

// Set status message
$tweetMessage = 'This is a tweet to my Twitter account via lalanii.';

// Check for 140 characters
if(strlen($tweetMessage) <= 140)
{
    // Post the status message
    $tweet->post('statuses/update', array('status' => $tweetMessage));
}*/

?>