<?php
require_once "Pinterest.class.php";


// Create the pinterest object and log in
$p = new Pinterest();
$p->login("konceptionpoet@aim.com", "twiggy123");


include '../includes/database.php';

$recentTime = strtotime('-15 minutes');
$recentdate =date('Y-m-d H:i:s', $recentTime);
//echo date('Y-m-d H:i:s').'<br />';

//and b.blogDate > '".$recentdate."' 
$sqlSB="Select b.secretBlog,b.blogID,b.blogTitle,b.blogDetail,b.blogPage,b.blogDate,b.blogEmailed,b.blogThumb,b.blogBanner,s.categoryID,s.subcategoryID from llBlog b join llSubcategory s on b.subcategoryID=s.subcategoryID where b.post_to_pin ='1' and b.postedpin='0' and b.blogDate < NOW() Limit 0,1 ";

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

// Set up the pin
$p->pin_url = 'http://lalanii.com/'.strtolower($blogPage)."/".$blogID."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle));
$p->pin_description = $blogTitle;
$p->pin_image_preview = $p->generate_image_preview('../'.$nnban);

// Get the boards
$p->get_boards();
print_r($p);
// Pin to the board called "Items"
$p->pin($p->boards['Test']);

mysql_query("Update llBlog set postedpin='1' where blogID='$blogID'");

//$graphNode = $response->getGraphNode();
} }

// And we're done
echo "Hooray!\n";
