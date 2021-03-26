<?php
    session_start();

    $config['base_url']             =   'http://lalanii.com/Linkedin/auth.php';
    $config['callback_url']         =   'http://lalanii.com/Linkedin/demo.php';
    $config['linkedin_access']      =   '77ao6suf6k3xtc';
    $config['linkedin_secret']      =   'h5ptjtJtCZecW9fd';

    include_once "linkedin.php";
   
    
    # First step is to initialize with your consumer key and secret. We'll use an out-of-band oauth_callback
    $linkedin = new LinkedIn($config['linkedin_access'], $config['linkedin_secret'], $config['callback_url'] );
    //$linkedin->debug = true;

/*
   if (isset($_REQUEST['oauth_verifier'])){
        $_SESSION['oauth_verifier']     = $_REQUEST['oauth_verifier'];

        $linkedin->request_token    =   unserialize($_SESSION['requestToken']);
        $linkedin->oauth_verifier   =   $_SESSION['oauth_verifier'];
        $linkedin->getAccessToken($_REQUEST['oauth_verifier']);

        $_SESSION['oauth_access_token'] = serialize($linkedin->access_token);
        header("Location: " . $config['callback_url']);
        exit;
   }
   else{
        echo $linkedin->request_token    =   unserialize($_SESSION['requestToken']);
echo '<br />';
        echo $linkedin->oauth_verifier   =   $_SESSION['oauth_verifier'];
echo '<br />';
        echo $linkedin->access_token     =   unserialize($_SESSION['oauth_access_token']);
   }

echo $_SESSION['requestToken'];
echo '<br>';
echo $_SESSION['oauth_access_token'];
*/
echo $linkedin->request_token    =   unserialize('O:13:"OAuthConsumer":3:{s:3:"key";s:40:"77--a878f8f4-4631-4987-96c4-bb5149e000e1";s:6:"secret";s:36:"555b0b28-f419-43a1-8779-7ce0794bcab5";s:12:"callback_url";i:1;}');
echo '<br />';
echo $linkedin->oauth_verifier   =   '55067';
echo '<br />';
echo $linkedin->access_token     =   unserialize('O:13:"OAuthConsumer":3:{s:3:"key";s:36:"30265678-c939-4055-a8af-fe7f1677383d";s:6:"secret";s:36:"df4bf9d7-dcc1-473a-86f2-8a7626b59919";s:12:"callback_url";i:1;}');

   # You now have a $linkedin->access_token and can make calls on behalf of the current member
    $xml_response = $linkedin->getProfile("~:(id,first-name,last-name,headline,picture-url)");

    echo '<pre>';
    echo 'My Profile Info';
    echo $xml_response;
    echo '<br />';
    echo '</pre>';


    $search_response = $linkedin->search("?company-name=facebook&count=10");
    //$search_response = $linkedin->search("?title=software&count=10");

    //echo $search_response;
    $xml = simplexml_load_string($search_response);

    echo '<pre>';
    echo 'Look people who worked in facebook';
    print_r($xml);
    echo '</pre>';

include '../includes/database.php';

$recentTime = strtotime('-15 minutes');
$recentdate =date('Y-m-d H:i:s', $recentTime);
//echo date('Y-m-d H:i:s').'<br />';

//and b.blogDate > '".$recentdate."' 
$sqlSB="Select b.secretBlog,b.blogID,b.blogTitle,b.blogDetail,b.blogPage,b.blogDate,b.blogEmailed,b.blogThumb,b.blogBanner,s.categoryID,s.subcategoryID from llBlog b join llSubcategory s on b.subcategoryID=s.subcategoryID where b.post_to_linkin ='1' and b.postedlinked='0' and b.blogDate < NOW() Limit 0,1 ";

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
	$fbanner = explode('com/',$banner);
	$nnban = $banner;
}


echo '<br>'.$blogTitle;
$blogDetail;
$blogDetail = strip_tags(stripcslashes($blogDetailPart));

$comment = $blogTitle;
$title = $blogTitle;
$targetUrl = 'http://lalanii.com/'.strtolower($blogPage)."/".$blogID."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle));
$imgUrl = $nnban;


$apiCallStatus    =   $linkedin->share($comment, $title, $targetUrl, $imgUrl);
$apiXMLResponse   =   simplexml_load_string($apiCallStatus);
if (empty($apiXMLResponse)){
    echo "You successfully shared it in linkedin";
}
else{
    echo "Unknown error! Please try again!";
    echo '<pre>';
    print_r($apiXMLResponse);
    echo '</pre>';
}

mysql_query("Update llBlog set postedlinked='1' where blogID='$blogID'");

//$graphNode = $response->getGraphNode();
} }
?>
