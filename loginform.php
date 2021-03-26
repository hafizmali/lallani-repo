<div id="overlay" style="display:none;"></div>
<div id="login" style="display:none;">
	<div id="existing">
		<div id="cup" class="loginimage"></div>
		<form name="formExist" action="http://lalanii.com/process/login.php" method="POST">
		<h2 class="impactLabel pinkbg">EXISTING USER</h2>
		<ul>			
			<!--<a href="#" class="loginOptions">create account</a>
			<a href="#" class="loginOptions">forgot password</a>-->
			<li><input type="text" class="clearText" name="userName" value="USERNAME" id="existingUserName"></input></li>
			<li><input type="text" class="clearText" name="userPass" value="PASSWORD" id="existingPassword"></input>
				<input type="hidden" value="<?php echo $_SERVER["PHP_SELF"]; ?>" name="fromloc">
			</li>
		</ul>
		<a href="javascript:submitformExist()" id="existingLogin" class="impactLabel bluegreenbg">log in</a>		
		<a href="http://lalanii.com/signup.php" id="existingLogin" class="impactLabel bluebg">new user? subscribe</a>
		<a href="http://lalanii.com/learnmore.php" id="learnmore" class="impactLabel redbg">learn more</a>
        <a href="http://lalanii.com/forgotpass.php" id="forgetpas" class="impactLabel grybg">Forgot Password?</a>
		<script type="text/javascript">
		function submitformExist(){document.formExist.submit();}
		</script>
		</form>
	</div>
<a href="" class="close">x</a>
</div>
<div id="upgrade" style="display:none;">
<a href="" id="imbeingcheap"></a>
<a href="subscribe.php" id="letsdothis"></a>
<a href="" class="close">x</a>
</div>