<div id="overlay" style="display:none;"></div>
<div id="login" style="display:none;">
	<div id="existing">
		<div id="cup" class="loginimage"></div>
		<form name="formExist" action="http://lalanii.com/process/login.php" method="POST">
		<h2 class="impactLabel pinkbg">EXISTING USER</h2>
		<ul>			
			<!--<a href="#" class="loginOptions">create account</a>
			<a href="#" class="loginOptions">forgot password</a>-->
			<li><input type="text" class="clearText" name="userName" placeholder="USERNAME" id="existingUserName"></input></li>
			<li><input type="password" placeholder="PASSWORD" class="clearText" name="userPass" id="existingPassword"></input>
				<input type="hidden" value="<?php echo $_SERVER["PHP_SELF"]; ?>" name="fromloc">
			</li>
		</ul>
		<a href="javascript:submitformExist()" id="existingLogin" class="impactLabel bluegreenbg">log in</a><br />	
		<a href="http://lalanii.com/signup.php" id="existingLogin" class="impactLabel bluebg">new user? subscribe</a><br />
		<a href="http://lalanii.com/learnmore.php" id="learnmore" class="impactLabel redbg">learn more</a>
        <a href="http://lalanii.com/forgotpass.php" id="forgetpas" class="impactLabel grybg">Forgot Password?</a>
		<script type="text/javascript">
		function submitformExist(){document.formExist.submit();}
		</script>
		</form>
	</div>
<a href="" class="close">x</a>
</div>
<div id="login2" style="display:none;">
	<div id="existing">
		<div id="cup" class="loginimage"></div>
		
        
<?php
if($_SESSION['userType'] == 'user')
{
?>
        <a href="https://creativewritingagency.com/lalanii/subscribe.php?u=<?php echo $_SESSION[userID]; ?>" id="existingLogin" class="impactLabel bluegreenbg">UPGRADE TO PREMIUM</a>
        				
		<a href="https://creativewritingagency.com/lalanii/subscribe2.php?u=<?php echo $_SESSION[userID]; ?>" id="existingLogin" class="impactLabel bluebg">BUY E-BOOK</a>
<?php }else { ?>
		<a href="http://lalanii.com/secrets.php" id="existingLogin" class="impactLabel bluegreenbg">READ SECRETS NOW</a>
<?php } ?>
        <a href="http://lalanii.com/forgotpass.php" id="forgetpas" class="impactLabel grybg">FORGOT PASSWORD</a>
		
	</div>
<a href="" class="close">x</a>
</div>
<?php 
//echo $_SESSION[flag];
if(($_SESSION[flag] != '1') && ($_SESSION[userID] != '')){ ?>
<div id="login3" style="display:none;">
	<div id="existing">
		<div id="cup" class="loginimage"></div>
		
        <div style="width: 340px;text-align: center;">
        <div id="loginsttext" style="color: #018cb3;font-family: 'impactLabel';font-size: 48px;">YOU'RE<br>IN</div>
		
		<?php
if($_SESSION['userType'] == 'user')
{
?>

        <a href="https://creativewritingagency.com/lalanii/subscribe.php?u=<?php echo $_SESSION[userID]; ?>" id="existingLogin" class="impactLabel bluegreenbg">UPGRADE TO PREMIUM</a>				
		<a href="https://creativewritingagency.com/lalanii/subscribe2.php?u=<?php echo $_SESSION[userID]; ?>" id="existingLogin" class="impactLabel bluebg">GET THE E-BOOK</a>
<?php }else  { ?>
		<a href="http://lalanii.com/secrets.php" id="existingLogin" class="impactLabel bluegreenbg">READ SECRETS NOW</a>
<?php } ?>
		<a href="http://lalanii.com/forgotpass.php" id="forgetpas" class="impactLabel grybg">FORGOT PASSWORD</a>
		</div>
        
		
	</div>
<a href="" class="close">x</a>
</div>

<?php
$_SESSION[flag] = 1;
}
?>
<div id="upgrade" style="display:none;">
<a href="" id="imbeingcheap"></a>
<a href="subscribe.php" id="letsdothis"></a>
<a href="" class="close">x</a>
</div>