<?php include 'includes/startsession.php';?>
<html>
<head>
<!--<title>Lalanii Rochelle | Fashion</title>
<meta name="title" content="Lalanii Rochelle | Fashion" />
<meta name="description" content="Fashion blogger and creative talent for hire to write fashion reviews, blogs, creative copy, social media posts, articles, magazine/journals. Get the deets on shoes, clothes, events." />
-->
<?php include 'includes/tags.php';?>
</head>
<body id="fashionblog">
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
		<?php
echo $userID = $_SESSION['userID'];
echo $monthly = $_SESSION['monthly'];
echo $yearly = $_SESSION['yearly'];
echo $lifetime = $_SESSION['lifetime'];
echo $subscription = $_SESSION['subscription'];		
		
$item_no            = $_REQUEST['item_number'];
$item_transaction   = $_REQUEST['tx']; // Paypal transaction ID
$item_price         = $_REQUEST['amt']; // Paypal received amount
$product_status     = $_REQUEST['st'];  // Paypal transaction status
		
$subscription="none";
$accessThrough="0000-00-00";
$today=date('Y-m-d H:i:s');
if (($userID !='') AND ((strtoupper($lifetime))=="ON")){$accessThrough="9999-12-31";$subscription="lifetime";}
if (($userID !='') AND ((strtoupper($monthly))=="ON")){$accessThrough=date('Y-m-d H:i:s',strtotime("+1 month",strtotime($today)));$subscription="monthly";}
if (($userID !='') AND ((strtoupper($yearly))=="ON")){$accessThrough=date('Y-m-d H:i:s',strtotime("+1 year", strtotime($today)));$subscription="yearly";}
		
		
        $sql="UPDATE llUser SET userType='super', accessThrough='$accessThrough',authResponse='$authResponse',subscription='$subscription',authText='$item_transaction' where userID=$userID";
mysql_query($sql);
		?>
	</div>

	<?php include 'includes/footer.php';?>
</div>
</body>
</html>
<?php include 'includes/scripts.php';?>
