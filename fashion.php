<?php include 'includes/startsession.php';?>
<html>
<head>
<!--<title>Lalanii Rochelle | Fashion</title>
<meta name="title" content="Lalanii Rochelle | Fashion" />
<meta name="description" content="Fashion blogger and creative talent for hire to write fashion reviews, blogs, creative copy, social media posts, articles, magazine/journals. Get the deets on shoes, clothes, events." />
-->
<?php include 'includes/tags.php';?>
</head>
<body id="fashionblog" class="fashion_detail">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=266260310055900";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="loading"><div id="progressbar"></div></div>
<div id="main">
	<?php include 'includes/includes.php';?>
    
   
    
	<div id="content">
		<?php include 'includes/blogpages.php';?>
	</div>





 <?php //if(($_GET['blogID']=='699') || ($_GET['blogID']=='20') || ($_GET['blogID']=='12') || ($_GET['blogID']=='2') || ($_GET['scid']=='32')){ ?>    
    <!--<div class="fb-comments" data-href="<?php //echo 'http://lalanii.com/'.$_SERVER['REQUEST_URI']; ?>" data-numposts="5"></div>-->
    
    <?php //} ?>
	<?php include 'includes/footer.php';?>

</div>
<?php 
if($_GET['blogID'])
{}else{
  	$adds_query = mysql_query("Select * from llsettings ");
	$adds_res = mysql_fetch_array($adds_query);
 
if($adds_res['fashion_bg_enable'] == '1')
{
?>
<style>
body {
background-image:none !important;
background-color:<?php echo $adds_res['fashion_bg_color']; ?> !important;
}
#lips { background-image:none !important; }
</style>
<?php } } ?>






</body>
</html>
<?php include 'includes/scripts.php';?>


