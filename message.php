<?php include 'includes/startsession.php';?>
<html>
<head>
<title>Lalanii Rochelle | Sign Up</title>
<meta name="title" content="Lalanii Rochelle | Sign Up" />
<meta name="description" content="Sign Up" />
<?php include 'includes/tagscwa.php'; ?>
<style>
@font-face{font-family:'impactlabel';src:url(fonts/Impact_Label_Reversed.ttf)}
</style>
</head>
<body id="signup">
<div id="margin"></div>
	<div id="main">	
	<?php 
	include 'includes/includes.php';
	if($_GET['valsub'] != '')
	{
		$valSubscription = $_GET['valsub'];	
	}
	//echo "userid: ".$_SESSION['userID']."<br>";
	//echo "loggedin: ".$_SESSION['loggedin']."<br>";
	?>
	
		<div id="content">
			<?php
			$displaymessage="";
			$messagecolor="";
			
			if (($valSubscription!=='monthly') AND ($valSubscription!=='yearly') AND ($valSubscription!=='lifetime') AND ($valSubscription!=='paidebook') AND ($valSubscription!=='boths')){
				$displaymessage="Bummer. Looks like something is up with your payment information.<br />Can you please sign-up with your new credit card to get full access?";
				
				$messagecolor="red";
				}
			if (($_SESSION['subscription']=='user') AND ($valSubscription!=='none') AND ($valSubscription!=='paidebook')){
				$displaymessage="Thanks for signing up for a ".$subscription." subscription!<br />You now have exclusive access to all NON-SECRET blogs.<br /><br />Make yourself at home. <br /><br />";
				$displaymessage.="<a class='lastlinks pinker shake-constant shake' href='https://creativewritingagency.com/lalanii/subscribe.php?u=".$_SESSION['userID']."'>UPGRADE TO PREMIUM SECRETS</a>";
				//$displaymessage.="<br /><br />APPROVED THROUGH ".date('m-d-Y')."!";
				$messagecolor="blue";
				}
			if (($valSubscription=='monthly') OR ($valSubscription=='yearly') OR ($valSubscription=='lifetime')){
				$displaymessage="Thanks for signing up for a ".$valSubscription." subscription!<br />You now have exclusive access to all blogs<br />and Lalanii's creative community <br />Make yourself at home. ";
				
				if($valSubscription=='yearly'){
					$displaymessage.="<br /><br />APPROVED THROUGH ".date('m-d-Y', strtotime('+1 years'))."!";
				}else { $displaymessage.="<br /><br />APPROVED THROUGH ".date('m-d-Y')."!"; }
			
				$messagecolor="blue";
				}
			if ($valSubscription=='boths'){
				$displaymessage="Welcome to the to the lalanii.com SECRETS blog section and congratulations your e-book has been sent to you!";
				$displaymessage.="<br /><br />APPROVED THROUGH ".date('m-d-Y')."!";
				$messagecolor="blue";
				}
			if ($valSubscription=='paidebook'){
				$displaymessage="Thank you for supporting Lalanii.com!!!<br /> Congratulations your e-book has been sent to you";
				//$displaymessage.="<br /><br />APPROVED THROUGH ".date('m-d-Y')."!";
				$messagecolor="blue";
				}
				
			?>
		
			<h1 style="text-align: center;width: 100%;" class="center <?php echo $messagecolor; ?> impactLabel"><?php echo $displaymessage; ?></h1>
			<?php
				//echo "Authorization code: ".$_SESSION['response'];
				//echo "<br>".$_SESSION['responsereason'];
			?>
			
		<div class="spacer"></div>
		<?php include 'includes/bubbles.php';?>
		<div class="spacer"></div>
		<?php include 'includes/social.php';?>
		</div>
	</div>
</body>
</html>
<?php include 'includes/scripts.php';?>