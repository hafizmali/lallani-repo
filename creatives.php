<?php include 'includes/startsession.php';?>
<html>
<head>
<title>Lalanii Rochelle | Creatives</title>
<meta name="title" content="Lalanii Rochelle | Creatives" />
<meta name="description" content="<!--PAGE_DESCRIPTION-->" />
<?php include 'includes/tags.php';?>
</head>
<body id="creativesblog" class="creatives_detail">
<div id="loading"><div id="progressbar"></div></div>
<div id="main">
	<?php include 'includes/includes.php';?>
	<div id="content">
		<?php include 'includes/blogpages.php';?>
	</div>


   
	<?php include 'includes/footer.php';?>
</div>
<?php 
if($_GET['blogID'])
{}else{
  	$adds_query = mysql_query("Select * from llsettings ");
	$adds_res = mysql_fetch_array($adds_query);
 
if($adds_res['creative_bg_enable'] == '1')
{
?>
<style>
body , #creativesblog  {
background-image:none !important;
background-color:<?php echo $adds_res['creative_bg_color']; ?> !important;
}
#lips { background-image:none !important; }
</style>
<?php } } ?>
</body>
</html>
<?php include 'includes/scripts.php';?>