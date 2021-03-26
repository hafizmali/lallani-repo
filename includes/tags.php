<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if ((preg_match('/blogID/',$actual_link)) AND (!preg_match('/blogmanager/',$actual_link))) {
include 'includes/database.php';

$metablogID=$_GET['blogID'];
$metasqlBLOG=mysql_query("Select * from llBlog where blogID=".$metablogID);
$blog_mtitle = mysql_result($metasqlBLOG,0,'blog_mtitle');
$blog_mdesc = mysql_result($metasqlBLOG,0,'blog_mdesc');
$blog_mkey = mysql_result($metasqlBLOG,0,'blog_mkey');

$sqlshareimage="select * from llBlog where blogID=".$_GET['blogID'];
	$resultshareimage=mysql_query($sqlshareimage);
	$numshareimage=mysql_num_rows($resultshareimage);
	if($numshareimage>0){
	$shareBanner=mysql_result($resultshareimage,0,"blogBanner");
	$shareThumb=mysql_result($resultshareimage,0,"blogThumb");
	$shareTitle=mysql_result($resultshareimage,0,"blogTitle");
	$shareDetail=mysql_result($resultshareimage,0,"blogDetail");
	$shareDesc=substr(strip_tags($shareDetail),0,75)."...";
	}
	}else{
	$shareThumb="http://lalanii.com/images/general/logo.png";
	$shareTitle="Mean as a cupcake...";
	$shareDesc="Lalanii Rochelle | Blogger, Creative Writer, Brand Ambassador";
	}
?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<title><?php echo $blog_mtitle; ?></title>
<meta name="title" content="<?php echo $blog_mtitle; ?>" />
<meta name="description" content="<?php echo $blog_mdesc; ?>" />
<meta name="keywords" content="<?php echo $blog_mkey; ?>" />

<meta name="description" content="<?php echo $shareDesc; ?>" />
<!--meta name="viewport" content="width=device-width; min-width=1008px; initial-scale=1; maximum-scale=1"-->
<!--meta http-equiv="Content-Type" content="text/html; charset=windows-1252"-->
<link rel="icon" href="http://lalanii.com/favicon.ico" type="image/x-icon">
<!-- Twitter Card data -->
<meta name="twitter:card" content="<?php echo $shareThumb; ?>">
<meta name="twitter:site" content="@lalanii">
<meta name="twitter:title" content="<?php echo $shareTitle; ?>">
<meta name="twitter:description" content="<?php echo $shareDesc; ?>">
<meta name="twitter:creator" content="@author_handle">
<!-- Twitter summary card with large image must be at least 280x150px -->
<meta name="twitter:image:src" content="<?php echo $shareThumb; ?>">

<!-- Open Graph data -->
<meta property="og:title" content="Lalanii Rochelle" />
<meta property="og:type" content="blog" />
<meta property="og:url" content="<?php echo $actual_link; ?>" />
<meta property="og:image" content="<?php echo $shareThumb; ?>" />
<meta property="og:description" content="<?php echo $shareTitle; ?>" />
<meta property="og:site_name" content="<?php echo $shareDesc; ?>" />
<meta property="article:published_time" content="2013-09-17T05:59:00+01:00" />
<meta property="article:modified_time" content="2013-09-16T19:08:47+01:00" />
<meta property="article:section" content="Article Section" />
<meta property="article:tag" content="Article Tag" />
<meta property="fb:admins" content="lalanii" />

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="<?php echo $shareTitle; ?>">
<meta itemprop="description" content="<?php echo $shareDesc; ?>">
<meta itemprop="image" content="http://lalanii.com/images/general/logo.png">
<link rel="author" href="https://plus.google.com/GOOGLEID/"/>



<!-- Includes -->
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Anonymous+Pro|Special+Elite|Shadows+Into+Light+Two|Source+Sans+Pro|Amatic+SC|Raleway|Cabin+Sketch|Life+Savers|Inconsolata|Share+Tech+Mono|Cabin|Didact Gothic">
<!--link rel="stylesheet" type="text/css" href="http://lalanii.com/styles/shake.css">
<link rel="stylesheet" type="text/css" href="http://lalanii.com/styles/ticker.css">
<link rel="stylesheet" type="text/css" href="http://lalanii.com/styles/BeatPicker.min.css">
<link rel="stylesheet" type="text/css" href="http://lalanii.com/styles/tinyeditor.css" />
<link rel="stylesheet" type="text/css" href="http://lalanii.com/styles/social.css">
<link rel="stylesheet" type="text/css" href="http://lalanii.com/styles/main.css"-->
<link rel="stylesheet" type="text/css" href="http://lalanii.com/styles/compressed.css">

<script>
function adds_detail(adpage,adtype)
{
	var adpage = adpage;
	var adtype = adtype;
	
	$.ajax({
				type: "POST",
				url: "http://lalanii.com/adds_record.php",
				data: "adpage="+adpage+"&adtype="+adtype,
				success: function(msg){
					   //$("#loading").hide();   
					   //alert(msg); 
						//nthchk = msg;			
						//$("#result_div").html(msg);							
						//$("#").html(msg);
						
				}                      
			}); 

}
/*

jQuery(document).ready(function($){
    $('.iframe_wrap iframe').iframeTracker({
        blurCallback: function(){
            // Do something when the iframe is clicked (like firing an XHR request)
        }
    });
});
*/



</script>
