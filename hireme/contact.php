<?php include '../includes/startsession.php';

if($_POST){
	if ($_SESSION['answer'] == $_POST['ContactVerifyPerson'] ) {
		// value entered is correct
		//echo $_SESSION['answer'];
		$chkcaptcha = 0; 
	}
	else {
		// value is incorrect, kindly try again
		$chkcaptcha = 1;
	}
}
else
{
	$chkcaptcha = 1;	
}

//session_start();
$digit1 = mt_rand(1,20);
$digit2 = mt_rand(1,20);
if( mt_rand(0,1) === 1 ) {
    $math = "$digit1 + $digit2";
    $_SESSION['answer'] = $digit1 + $digit2;
} else {
    $math = "$digit1 - $digit2";
    $_SESSION['answer'] = $digit1 - $digit2;
}
?>
<html>
<head>
<title>Lalanii Rochelle | Hire Me!</title>
<meta name="title" content="Lalanii Rochelle | Hire Me!" />
<meta name="description" content="Hire Me!" />
<?php include '../includes/tags.php';?>
</head>
<body id="contact">
<div id="margin"></div>
<div id="main">
	<?php include '../includes/includes.php';?>
	<div id="content"><div id="fixsafari">
	<h1 class="yellowbg">Contact</h1>
	<h3>Interested in working together?</h3>
	<p>Fill out the form below with some info about your project and I'll get 
	back to you as soon as I can. Please allow a couple of days for me to 
	respond.</p>	
	
	<div id="form_container">
	<a href="tel://4242092549" id="calltext">
		<img src="http://lalanii.com/images/general/callortext.png" width="138px" height="268px" />
		<div id="phonenumber" class="">424-209-2549</div>		
	</a>
		<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" name="contactForm" id="contactForm">
<?php
				// display form if user has not clicked submit
				//if (!isset($_POST["submit"]) && ($chkcaptcha == 1)) {
					if ($chkcaptcha == 1) {
				  ?>
	<ul class="ulLeft">
		<li>
		<ul>
			<li id="label1" class="label">*Name</li>
			<li><input type="text" required name="ContactName" size="20"></li>
		</ul>
		</li>
		<li>
		<ul>
			<li id="label2" class="label">Website</li>
			<li><input type="text" name="ContactWebsite" size="20"></li>
		</ul>
		</li>
		<li>&nbsp;<ul>
			<li id="label3" class="label">Timeline</li>
			<li><input type="text" name="ContactTimeline" size="20"></li>
		</ul>
		</li>
	</ul>
	<ul class="ulRight">
		<li>
		<ul>
			<li id="label4" class="label">*Email</li>
			<li><input type="text" required name="ContactEmail" size="20"></li>
		</ul>
		</li>
		<li>&nbsp;<ul>
			<li id="label5" class="label">Budget</li>
			<li><input type="text" name="ContactBudget" size="20"></li>
		</ul>
		</li>
		<li>&nbsp;<ul>
			<li id="label6" class="label"><?php echo $math; ?> = </li>
			<li><input type="text" required name="ContactVerifyPerson" size="20"></li>
		</ul>
		</li>
	</ul>
	<ul class="ulBottom">
		<li>&nbsp;<ul>
			<li id="label7" class="label">Tell me a little about your project</li>
			<li><textarea rows="7" name="ContactAbout" cols="65"></textarea></li>
		</ul>
		</li>
		<li>&nbsp;<ul>
			<li id="label8" class="label">Phone</li>
			<li>
				<input type="text" name="ContactPhone" size="20" />				
			</li>
		</ul>
		</li>
		</ul>

		
		
		<?php 
				} else {    // the user has submitted the form
				  // Check if the "from" input field is filled out
				  if (isset($_POST["ContactName"])) {
					$from = $_POST["ContactName"]; // sender
					$phone = $_POST["ContactPhone"]; 
					$email = $_POST["ContactEmail"];
					$website = $_POST["ContactWebsite"];
					$timeline = $_POST["ContactTimeline"];
					$budget = $_POST["ContactBudget"];
					$about = $_POST["ContactAbout"];
					$fromemail = "noreply@lalanii.com";
					$subject ="message from Lalanii.com";					
					// message lines should not exceed 70 characters (PHP rule), so wrap it
					$message = wordwrap("From: $from\r\nEmail: $email\r\nWebsite: $website\r\nPhone: $phone\r\nBudget: $budget\r\nTimeline: $timeline\r\n\r\nAbout the Project: $about", 70);
					
					$headers = 'From: '.$fromemail."\r\n".
					'Reply-To: '.$email."\r\n".
					'X-Mailer: PHP/' . phpversion();
					
					//echo $message;
					//$mail=mail("lysadies@msn.com",$subject,$message,$headers);
					$mail=mail("Lalanii@creativewritingagency.com",$subject,$message,$headers);
					$mail=mail("Editors@creativewritingagency.com",$subject,$message,$headers);
					if($mail){
						echo "<h2>Thank you for your message!<br>Lalanii will get in touch soon!";
					}else{
						echo "Mail sending failed. Please reset and try again, check back later.<br><br></h2>";
						}
					unset($submit);
					}}		
					?>
		
	
	<ul class="ulBottom">
		<li>&nbsp;<ul>

		
		<li id="submitLabels"><input type="submit" value="Reach Lalanii Now!" name="submit" class="impactLabel" id="label9"><br />
			<input type="submit" value="reset" name="reset" onClick="document.theForm.reset();return false;" class="impactLabel" id="label10">
		</li>
		
		
		
	</ul>
</form>

		
	</div>	
	</div>
	</div>
	<?php include '../includes/footer.php';?>
</div>
</body>
</html>
<?php include '../includes/scripts.php';?>
