<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1ict.dtd">
<html>
<head>
 <?php include($_SERVER['DOCUMENT_ROOT']."/cec/includes/database.php"); ?>
<title>Core Elite Coaching</title>
<link rel="stylesheet" type="text/css" href="http://www.coreelitecoaching.com/cec/styles/main.css" media="screen" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://www.coreelitecoaching.com/cec/scripts/main.js"></script>
<script type="text/javascript" src="http://www.coreelitecoaching.com/cec/scripts/forms.js"></script>
</head>
<body>
<div id="wrap">
 <?php include($_SERVER['DOCUMENT_ROOT']."/cec/includes/header.php"); ?>
	<div id="content">
	<h1>Client Portal</h1>
		<h2>Forgot Password</h2>
		<?php
$postUserName=$_POST['userName'];
if (isset($postUserName)){
$sql="Select * from rtUser where userName='$postUserName'";
//echo('<br>sql: '.$sql);
$result=mysql_query($sql);
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
$userID=mysql_result($result,$i,"userID");
$userName=mysql_result($result,$i,"userName");
$securityAnswer=mysql_result($result,$i,"securityAnswer");
$securityID=mysql_result($result,$i,"securityID");

//	echo('<br>userID: '.$userID);
//	echo('<br>userName: '.$userName);
//	echo('<br>securityAnswer: '.$securityAnswer);
//	echo('<br>securityID: '.$securityID);
//	echo('<br>num: '.$num);

++$i;
}
if (mysql_num_rows($result)){
	$message="";
	}
	else {
	$message="<p>The user name <span class='bold'>".$userName."</span> was not found. Please try again or <a href='register.php'>register a new account</a>.</p>";
} 
}
?>
<form class="" name="form1" action="forgot.php" method="POST">
<ul class="formRow">	
	<li class="column40 textRight">Enter your username:</li>
	<li class="column30 textLeft"><input type="text" class="input" size="15" name="userName" value="<?php echo $userName; ?>"></li>
	<li class="column30 textLeft">
		<a href="#" onclick="document.form1.submit();return false" class="next" id="submit">
		
		search</a>
	</li>
</ul>
</form>
<div class="spacer">&nbsp;</div>
<?php echo $message; ?>
<?php
if (mysql_num_rows($result)){
	$sqlSID="Select securityQuestion from rtSecurityQuestion where securityID=$securityID";
//	echo('<br>sqlSID: '.$sqlSID);
	$resultSID=mysql_query($sqlSID);
	$numSID=mysql_num_rows($resultSID);
	$s=0;
	while ($s < $numSID) {
	$securityQuestion=mysql_result($resultSID,$s,"securityQuestion");
	++$s;
	}
	if (mysql_num_rows($resultSID)){
			?>
			<form name="form2" action="forgot.php" method="POST">
			<ul class="formRow">	
			<li class="column40 textRight"><?php echo $securityQuestion; ?></li>
			<li class="column30 textLeft"><input type="text" class="input" size="15" name="securityAnswer" value="<?php echo $_POST['securityAnswer']; ?>"></li>
			<li class="column30 textLeft">				
				<INPUT TYPE="hidden" NAME="userName" VALUE="<?php echo $postUserName; ?>">
				<INPUT TYPE="hidden" NAME="userID" VALUE="<?php echo $userID; ?>">
				<a href="#" onclick="document.form2.submit();return false" class="next" id="submit">submit</a>
			</li>
		</ul>
		</form>
	<?php
	}}
	$postSecurityAnswer=$_POST['securityAnswer'];
//echo('<br>postSecurityAnswer: '.$postSecurityAnswer);
//echo('<br>securityAnswer: '.$securityAnswer);
if (isset($postSecurityAnswer)){
if ($postSecurityAnswer == $securityAnswer) {	
			?>
			<form name="form3" id="form3" action="updatePass.php" method="post">
			<ul class="formRow">	
			<li class="column40 textRight">enter new password:</li>
			<li class="column30 textLeft"><input type="password" class="input" size="15" name="password" id="password"></li>
			<li class="column30 textLeft">&nbsp;</li></ul>
			<ul class="formRow">	
			<li class="column40 textRight">confirm new password:</li>
			<li class="column30 textLeft"><input type="password" class="input" size="15" name="confirmPassword" id="confirmPassword" onkeyup="checkPass(); return false;"><div id="form3_confirmPassword_errorloc" class="error"></div></li>
			<li class="column30 textLeft">
				<INPUT TYPE="hidden" NAME="userID" VALUE="<?php echo $userID; ?>">
				<a href="javascript: submitform()" class="next">update password</a>
				<script type="text/javascript">
				function submitform(){    
					if(document.form3.onsubmit())
					{document.form3.submit();}
				}
				</script>
			</li>
		</ul>
		</form>
<script type="text/javascript">
	var frmvalidator  = new Validator("form3");
	frmvalidator.addValidation("confirmPassword","eqelmnt=password","passwords do not match");
	frmvalidator.EnableMsgsTogether();
	frmvalidator.EnableOnPageErrorDisplay();
</script>
		<?php

	} else {

	echo "<div class='spacer'>&nbsp;</div><p>The answer provided did not match our records. Please try again or <a href='register.php'>register a new account</a>.</p>";
}}
?>
<div class="spacer">&nbsp;</div>
<div class="spacer">&nbsp;</div>


		<div style="clear: both;"></div>
	</div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT']."/cec/includes/footer.php"); ?>
</body>
</html>