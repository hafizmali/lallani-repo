<?php include 'includes/startsession.php';?>
<html>
<head>
<meta charset="UTF-8">
<title>Lalanii Rochelle | Beauty</title>
<meta name="title" content="Lalanii Rochelle | Beauty" />
<meta name="description" content="<!--PAGE_DESCRIPTION-->" />
<?php 
//include 'emojisheadjs.php';
include 'includes/tags.php';
?>
</head>
<body id="beautyblog" class="beauty_detail">
<div id="loading"><div id="progressbar"></div></div>
<div id="lips">
<div id="main">
	<?php include 'includes/includes.php';?>
	<div id="content">   
		<?php 
		include 'includes/blogpages.php';
		//include 'emojisfooterjs.php';
		?>
        
	</div>



	<?php include 'includes/footer.php';?>
    
</div></div>

<?php 
if($_GET['blogID'])
{}else{

  	$adds_query = mysql_query("Select * from llsettings ");
	$adds_res = mysql_fetch_array($adds_query);
 
if($adds_res['beauty_bg_enable'] == '1')
{
?>
<style>
body {
background-image:none !important;
background-color:<?php echo $adds_res['beauty_bg_color']; ?> !important;
}
#lips { background-image:none !important; }
</style>
<?php } } ?>


</body>
</html>
<?php include 'includes/scripts.php';?>

