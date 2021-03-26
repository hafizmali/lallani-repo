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
$includeStyles.='h2 {font-family: Special Elite;}';
$includeStyles.='tr#banner {margin: 20px 0px;float: left;border: 1px solid #ccc;position: relative;}';
$includeStyles.='#emailbody{display:block;width:100%;margin:0;padding:0;}';
$includeStyles.='#main{width:784px;border:0;padding:0;border-collapse:collapse; margin:0 auto;}';
$includeStyles.='#subject h1{font-family: "Special Elite",cursive !important;color: #FFF;margin: 0;padding: 20px 20px 10px 20px;font-weight: bold;text-align: center;position: absolute;background: rgba(73, 73, 73, 0.5);bottom: 25px;font-size: 21px;   text-transform: capitalize;}';
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

$sqlSB=mysql_query("Select  * from llsettings");
//echo "<br>sql: ".$sqlSB;
$resultSB=mysql_fetch_array($sqlSB);
$countSB=0;
$recoIds = $resultSB['email_posts'];


/*$sqlU="select userEmail,emailCategory,emailSubcategory,emailTopic from llUser where (emailCategory like '%".$categoryID."%' or emailSubcategory like '%".$subcategoryID."%'".$looperresult.")";
echo "<br>sql users: ".$sqlU;
$resultU=mysql_query($sqlU);
$countU=0;
if (mysql_num_rows($resultU) > 0) {
while ($numU=mysql_fetch_array($resultU)) {*/
	
	
	//$to = mysql_result($resultU,$countU,"userEmail");
	$to = 'haseeb@pearl-soft.com';
	$subject="Weekly Email";

	$headers = "From:lalanii@lalanii.com\r\n";
	$headers .= "Reply-To:lalanii@lalanii.com\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	
	
				
	$messagebuilder = '<head>'.$includeStyles.'</head>';
	$messagebuilder .= '<html xmlns:v="urn:schemas-microsoft-com:vml"><body id="emailbody">';
	$messagebuilder .= '<table id="main">';
	$messagebuilder .= '<tr><td style="text-align: center;"><a href="http://lalanii.com/index.php"><img id="logo" src="http://lalanii.com/images/general/logo.png" width="281px" height="149px"></a></td></tr>';
	
	$recoQueryIn = mysql_query("Select * from llBlog where blogID in (".$recoIds.")");
	while($recoResIn = @mysql_fetch_array($recoQueryIn))
	{	
		$blogPage=strtolower($recoResIn["blogPage"]);
		$blogTitle=strtolower($recoResIn["blogTitle"]);
		$blogID=strtolower($recoResIn["blogID"]);
		$finalex_link = "http://lalanii.com/".$blogPage."/".$blogID."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle));
	
		
		$messagebuilder .= '<tr id="banner" style="margin: 20px 0px;float: left;border: 1px solid #ccc;"><td style="position:relative;">';
		$messagebuilder .= '<a href="'.$finalex_link.'"><img src="'.$recoResIn['blogBanner'].'" style="border: 0;min-width:98%;width:780px;display:block;padding:0;margin:0;float:left;" />';
		$messagebuilder .= '<span id="subject"><h1 style="color: #FFF;margin: 0;padding: 20px 0px;font-weight: bold;text-align: center;background: rgba(73, 73, 73, 0.5);bottom: 25px;font-size: 21px;text-transform: capitalize;float: left;width: 100%;">'.$blogTitle.'</h1></span>';
		$messagebuilder .= '</td></tr>';
		

	}
	
	
	
	
	
	
		
	$messagebuilder .= '<tr><td><table id="follow"><tr id="lalaniis">';
	$messagebuilder .= '<td id="fake_facebook_button"><a href="https://www.facebook.com/pages/Author-Lalanii-R-Grant/106764956090989?ref=hl" id="followFB"><img 			src="http://lalanii.com/images/general/follow_facebook.png"></a></td>';
	$messagebuilder .= '<td id="fake_twitter_button"><a href="https://twitter.com/lalanii" id="followTw"><img src="http://lalanii.com/images/general/follow_twitter.png"></a></td>';
	$messagebuilder .= '<td id="fake_email_button"><a href="mailto:lalanii@lalanii.com"><img src="http://lalanii.com/images/general/follow_email.png"></a></td>';
	$messagebuilder .= '<td id="fake_tumblr_button"><a href="http://fashionpoetrylalanii.com/" id="followTu"><img src="http://lalanii.com/images/general/follow_tumblr.png"></a></td>';
	$messagebuilder .= '<td id="fake_google_button"><a href="https://plus.google.com/u/0/+LalaniiRGrant/posts" id="followGP"><img src="http://lalanii.com/images/general/follow_google.png"></a></td>';
	$messagebuilder .= '<td id="fake_pinterest_button"><a href="https://www.pinterest.com/lalanii/" id="followP"><img src="http://lalanii.com/images/general/follow_pinterest.png"></a></td>';
	$messagebuilder .= '</tr></table></td></tr>';
	$messagebuilder .= '<tr id="footer"><td><table><tr>';	
	$messagebuilder .= '</tr></table></td></tr>';
	$messagebuilder .= '</table>';
	$messagebuilder .= '</body></html>';

	$message = wordwrap($messagebuilder, 70);
	

	$mail=mail($to,$subject,$message,$headers);
	
	
	$viewmail=$to.$subject.$message.$headers;
	echo "<br>mail query: ".$viewmail;
	

	++$countU;
//}
//}


//$sqlB="Update llBlog set blogEmailed=NOW() where blogID=".$blogID;
//echo "<br>$sqlB: ".$sqlB;	
//mysql_query($sqlB);
	
++$countSB;

?>

