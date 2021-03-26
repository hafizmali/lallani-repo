SENDING BLOGS... PLEASE WAIT...
<?php 
include '../includes/database.php';
function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]).'...';
      }
      return $text;
    }	
$includeStyles='<link href="http://fonts.googleapis.com/css?family=Special+Elite" rel="stylesheet" type="text/css">'; 
$includeStyles.='<style>'; 
$includeStyles.='@import url(http://fonts.googleapis.com/css?family=Special+Elite);';
$includeStyles.='#emailbody{display:block;width:100%;margin:0;padding:0;}';
$includeStyles.='#main{width:600px;border:1px solid #FFF;padding:0;border-collapse:collapse; margin:0 auto;}';
$includeStyles.='#subject h1{font-family:"Special Elite",cursive !important;color:#737373;margin:0;padding:15px 5px 0 5px;font-weight:bold;text-align:center;}';
$includeStyles.='#detail td{padding:5px 5px 15px 5px;}';
$includeStyles.='#follow{margin: 0 auto;}';
$includeStyles.='#follow tr#lalaniis{list-style-type:none;background-color:transparent;position:relative;}';
$includeStyles.='#follow tr#lalaniis td{float:left !important;position:relative;overflow:hidden;width:40px !important;}';
$includeStyles.='#follow tr#lalaniis td a{position:relative;display:block;height:40px;width:40px;margin:0;}';
$includeStyles.='#follow tr#lalaniis td a img {width:40px;left:0;}';
$includeStyles.='tr#footer {background-color: #dddddd !important;border: 1px solid #dddddd;}';
$includeStyles.='tr#footer table {float:right;}';
$includeStyles.='tr#footer table tr td{color: #ffffff;padding:20px 10px 10px 10px;}';
$includeStyles.='tr#footer table tr td a{text-decoration: none;font-family: "Special Elite",cursive;color: #ffffff;}';
$includeStyles.='div.opaqueBubbles {background-color: #fff;display: block;float: left;height: 250px;opacity: 0.8;position: absolute;width: 600px;z-index: 3;}';
$includeStyles.='</style>'; 

//$sqlX="Update llBlog set blogEmailed='0000-00-00' where blogID=37";
//echo "<br>sqlX:".$sqlX;
//mysql_query($sqlX);
//#!/usr/local/bin/php -q

$sqlSB="Select b.secretBlog,b.blogID,b.post_banner_link,b.blogTitle,b.blogDetail,b.blogPage,b.blogDate,b.blogEmailed,b.blogBanner,s.categoryID,s.subcategoryID from llBlog b join llSubcategory s on b.subcategoryID=s.subcategoryID where b.blogemail=0 and b.blogDate < NOW() and date(b.blogEmailed)='0000-00-00'";
//echo "<br>sql: ".$sqlSB;


$resultSB=mysql_query($sqlSB);
$countSB=0;
if ($resultSB) {
$numSB=mysql_num_rows($resultSB);
while ($numSB>$countSB){

//echo "<br>counter: ".$countSB;
//echo "<br>total number: ".$numSB;

$blogID = mysql_result($resultSB,$countSB,"blogID");
$blogTitle = mysql_result($resultSB,$countSB,"blogTitle");
$blogPage = mysql_result($resultSB,$countSB,"blogPage");
$blogDetail = mysql_result($resultSB,$countSB,"blogDetail");
$post_banner_link = mysql_result($resultSB,$countSB,"post_banner_link");
//$blogDetailPart = limit_text($blogDetail,120); 
$blogDetailPart = strip_tags(limit_text($blogDetail,120),'<p><a><div><br /><br><img><span><b><strong><h1><h2><h3>');

$categoryID = mysql_result($resultSB,$countSB,"categoryID");
$subcategoryID = mysql_result($resultSB,$countSB,"subcategoryID");
$banner = mysql_result($resultSB,$countSB,"blogBanner");
$secretBlog=mysql_result($resultSB,$countSB,"secretBlog");

if($secretBlog == 1)
{
	$banner = 'http://lalanii.com/images/secret.png';
}
else
{
	$banner = mysql_result($resultSB,$countSB,"blogBanner");
}

//echo $blogTitle;
//echo $blogDetail;
//echo $blogDetailPart;

$sqlT="select topicID from llBlogTopic where blogID=".$blogID;
//echo "<br>sqlT: ".$sqlT;
$resultT=mysql_query($sqlT);
$numT=mysql_num_rows($resultT);
$countT=0;

$topicID = array();
    while($row = mysql_fetch_assoc($resultT)) {
		$topicID[$row['topicID']]=mysql_result($resultT,$countT,"topicID");
		++$countT;
    }

echo "<br>blogID: ".$blogID;
echo "<br>categoryID: ".$categoryID;
echo "<br>blogPage: ".$blogPage;
echo "<br>subcategoryID: ".$subcategoryID;
echo "<br>topicID: ";
//print_r($topicID);



if($categoryID == '20'){ 
	$bbpage = 'fashion'; 
} else if($categoryID == '21'){ 
	$bbpage = 'beauty'; 
} else if($categoryID == '22'){ 
	$bbpage = 'creatives'; 
} else if($categoryID == '23'){ $bbpage = 'secrets'; }

$looperresult="";
foreach ($topicID as $looper){
	$looperresult=$looperresult." or emailTopic like '%".$looper."%'";
}

if($post_banner_link != ''){
	$finalex_link = 'http://lalanii.com/'.$bbpage."/".$blogID."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle));
}else {
	$finalex_link = 'http://lalanii.com/'.$bbpage."/".$blogID."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle));
}

$sqlU="select userEmail,emailCategory,emailSubcategory,emailTopic from llUser where (emailCategory like '%".$categoryID."%' or emailSubcategory like '%".$subcategoryID."%'".$looperresult.")";
echo "<br>sql users: ".$sqlU;
$resultU=mysql_query($sqlU);
$countU=0;
if (mysql_num_rows($resultU) > 0) {
while ($numU=mysql_fetch_array($resultU)) {
	
	
	$to = mysql_result($resultU,$countU,"userEmail");
	//$to = 'haseeb@pearl-soft.com';
	$subject=$blogTitle;

	$headers = "From:lalanii@lalanii.com\r\n";
	$headers .= "Reply-To:lalanii@lalanii.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	
	
				
	$messagebuilder = '<head>'.$includeStyles.'</head>';
	$messagebuilder .= '<html xmlns:v="urn:schemas-microsoft-com:vml"><body id="emailbody">';
	$messagebuilder .= '<table id="main">';
	$messagebuilder .= '<tr id="banner"><td>';
	$messagebuilder .= '<a href="'.$finalex_link.'"><img src="'.$banner.'" style="border: 4px solid #ccc;min-width:98%;width:600px;display:block;padding:0;margin:0;float:left;" />';
	$messagebuilder .= '</td></tr>';
	$messagebuilder .= '<tr id="subject"><td><h1>'.$subject.'</h1></td></tr>';
	$messagebuilder .= '<tr id="detail"><td>'.$blogDetailPart.'...<br><br><a href="http://lalanii.com/'.$bbpage."/".$blogID."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle)).'">read the full blog on lalanii.com</a></td></tr>';	
	$messagebuilder .= '<tr><td><table id="follow"><tr id="lalaniis">';
	$messagebuilder .= '<td id="fake_facebook_button"><a href="https://www.facebook.com/pages/Author-Lalanii-R-Grant/106764956090989?ref=hl" id="followFB"><img 			src="http://lalanii.com/images/general/follow_facebook.png"></a></td>';
	$messagebuilder .= '<td id="fake_twitter_button"><a href="https://twitter.com/lalanii" id="followTw"><img src="http://lalanii.com/images/general/follow_twitter.png"></a></td>';
	$messagebuilder .= '<td id="fake_email_button"><a href="mailto:lalanii@lalanii.com"><img src="http://lalanii.com/images/general/follow_email.png"></a></td>';
	$messagebuilder .= '<td id="fake_tumblr_button"><a href="http://fashionpoetrylalanii.com/" id="followTu"><img src="http://lalanii.com/images/general/follow_tumblr.png"></a></td>';
	$messagebuilder .= '<td id="fake_google_button"><a href="https://plus.google.com/u/0/+LalaniiRGrant/posts" id="followGP"><img src="http://lalanii.com/images/general/follow_google.png"></a></td>';
	$messagebuilder .= '<td id="fake_pinterest_button"><a href="https://www.pinterest.com/lalanii/" id="followP"><img src="http://lalanii.com/images/general/follow_pinterest.png"></a></td>';
	$messagebuilder .= '</tr></table></td></tr>';
	$messagebuilder .= '<tr id="footer"><td><table><tr>';
	$messagebuilder .= '<td><a href="http://lalanii.com/'.$bbpage."/".$blogID."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle)).'">VIEW ONLINE</a></td>';
	$messagebuilder .= '<td>|</td>';
	$messagebuilder .= '<td><a href="http://lalanii.com/myaccount.php">UNSUBSCRIBE</a></td>';
	$messagebuilder .= '</tr></table></td></tr>';
	$messagebuilder .= '</table>';
	$messagebuilder .= '</body></html>';

	$message = wordwrap($messagebuilder, 70);

	$mail=mail($to,$subject,$message,$headers);
	
	
	$viewmail=$to.$subject.$message.$headers;
	echo "<br>mail query: ".$viewmail;
	

	++$countU;
}
}
$sqlB="Update llBlog set blogEmailed=NOW() where blogID=".$blogID;
//echo "<br>$sqlB: ".$sqlB;	
mysql_query($sqlB);

++$countSB;
}
}
?>
<script>window.close();</script>
