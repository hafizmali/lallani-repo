<?php include 'includes/startsession.php';?>
<html>
<head>
<title>Lalanii Rochelle | Sign Up</title>
<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<meta name="title" content="Lalanii Rochelle | Sign Up" />
<meta name="description" content="Sign Up" />
<?php include 'includes/tags.php';?>
</head>
<body id="signup">
<div id="margin"></div>
	<div id="main">	
	<?php include 'includes/includes.php';
	//echo "came from: ".$camefrom;
if (strpos(strtoupper($camefrom),'SECRET') !== false) {
    echo '<div id="overlay"></div>';
    echo '<div id="inaccessiblemessage">Uh oh.<br>You tried to view a secret blog!<br>Login or sign up to unlock premium secret blogs and private content!<br><br><a href="#" class="impactLabel bluebg" id="okclick">Ok!</a><br><a href="http://lalanii.com" class="impactLabel redbg">Nah, Take me to the Home Page</a></div>';
}
	?>
	
		<div id="bgbox"></div>	
		<div id="content">
        
        <style>
#social { display:none; }
#header #social { display:block; }
#signup #content #loginpg {
   /* background-image: url(http://lalanii.com/images/Signupn-bg.png);*/
background-image:none;
background-color:#FFF;
    background-size: 908px 1034px;
    width: 904px;
    /*height: 1034px;*/
height: 600px;
    margin: 0 auto;
    border-radius: 0px;
    float: left;
}
.freechk {
    float: left;
    margin-left: 26px;
}
#signup #content #loginpg #loginpgsec {
    background-image: url(http://lalanii.com/images/right_bg.png);
    background-repeat: no-repeat;
    background-position: right top;
}
div#twocol_new {
    max-width: 100%;
    width: 844px;
    /*margin: 204px 30px 0px;*/
margin:0px 30px 0px;
    display: inline-block;
}
#loginpg div#new {
    float: left;
	margin-top: 20px;
}
#loginpg div#existing {
    background-image: url('http://lalanii.com/images/heart_bg.png');
    float: right;
    margin-top: 35px;
    width: 357px;
    height: 360px;
    margin-left: 0px;
	text-align: center;
}
#loginpg #leftpsub_txt {
    background-image: url('http://lalanii.com/images/pinkrectangle_bg.png');
    width: 340px;
    height: 126px;
    background-repeat: no-repeat;
    float: left;
    position: relative;
    font-family: 'Special Elite';
    color: #60aea9;
    font-size: 28px;
}
div#innerleft_sp {
    margin: 30px 32px;
    text-align: center;
    line-height: 36px;
}
#innerleft_sp span#freegreen {
    color: #60aea9;
    font-size: 17px;
    font-weight: bold;
}
#innerleft_sp span#secretred {
    color: #da4040;
}
div#orsec {
    float: left;
    color: #c5c2c2;
    font-size: 26px;
    font-family: 'Special Elite';
    margin: 50px 38px;
}
#loginpg #rightsub_txt {
    background-image: url('http://lalanii.com/images/bluerectangle_bg.png');
    width: 389px;
    height: 90px;
    background-repeat: no-repeat;
    float: right;
    margin: 10px 0px;
}
div#innerright_sp {
    color: #60aea9;
    font-size: 35px;
    margin: 30px 36px 0px;
    font-family: 'Special Elite';
}

h2.logintitles {
    color: #c32a27 !important;
    text-align: center;
    margin: 66px 0px 10px;
	font-size: 23px;
}
#loginpg #existing form ul, #loginpg #existing form ul li {
    border: none;
    margin: 0 auto;
    text-align: center;
    width: 357px;
}
#loginpg #existing form input[type=text], #loginpg #existing form input[type=password] {
    background: #FFF !important;
    text-align: center;
    color: gray;
    margin-bottom: 0px;
    font-size: 21px;
    padding: 0!important;
    margin-left: 0px;
    width: 202px;
    height: 46px;
    background-color: #FFF !important;
    border-bottom: 2px solid #eaa4a7;
    border-right: 2px solid #eaa4a7;
    border-left: 2px solid #eaa4a7;
}
#loginpg #existing form a#existingLogin {
    margin-left: 0px;
    margin: 24px auto 0px;
    text-align: center;
    width: 136px;
    height: 37px;
    line-height: 38px;
}
#ffuname input#existingUserName {
    border-top: 2px solid #eaa4a7;
}

div#paid_listings {
    margin-left: 50px;
	    float: left;
}
#paid_listings ul.loginadditional.newtask.nostyle.signupoptions {
    width: 100% !important;
}
#paid_listings ul li {
    font-size: 18px;
    font-family: 'Special Elite';
    width: 100% !important;
    margin: 4px 0px 4px 0px !important;
}
#paid_listings ul li span {
    color: #e33a37 !important;
    letter-spacing: 0.6px;
    margin-left: 5px !important;
    font-weight: normal !important;
}

div#mainent_form {
    float: left;
    margin: 30px 20px 10px;
}
#mainent_form h1 {
    color: #e9a1a4;
    font-size: 32px;
    font-family: 'Special Elite';
    font-weight: normal;
    margin: 20px 0px 10px;
}
div#existing form ul, div#new form ul {
    width: 382px;
    border-radius: 0px;
    border: 3px solid #e6e4e4;
    float: left;
	margin: 0px !important;
}
#mainent_form li.nostyle {
    border-bottom: 0px !important;
    border-top: 0px !important;
    margin: 0px !important;
    width: 100%;
}
#mainent_form ul.nnclss {
    border-top: 0px !important;
}
#mainent_form .nnclss input {
    width: 84% !important;
    margin: 0px !important;
    height: 40px !important;
    color: #b7b3b3 !important;
}
div#existing form ul li, div#new form ul li {
    border-top: 0px;
    width: 100%;
    margin: 0px !important;
}
li.needborder {
    border-bottom: 3px solid #e6e4e4;
}
#mainent_form a#selectfreetoggle {
    width: 96%;
    margin: 0px;
    padding: 0px 8px;
}
#mainent_form a#selectfreetoggle h2 {
    color: #b7b3b3;
    font-family: 'Special Elite';
    font-size: 21px;
    font-weight: normal;
    text-transform: inherit;
}
#new #mainent_form .fineprint {
    color: #b7b3b3 !important;
    float: left;
    width: 100%;
    margin: 8px 0px 5px 0px;
    padding: 0px;
    text-align: center;
    font-size: 14px;
}
h1.center.lightblue.impactLabel {
    text-transform: initial;
    margin-left: 20px !important;
}
#formRegister_errorloc {
    bottom: 196px;
    left: 450px;
    color: #000 !important;
}
div#formRegister_errorloc ul li, .loginError ul li, .error {
    clear: both;
    color: #000;
    font-family: "Special Elite",cursive;
    text-align: right;
    font-size: 14px;
    width: 100%;
}
#leftpsub_txt a {
    text-decoration: none;
    color: #60aea9;
}
#rightsub_txt a {
    text-decoration: none;
    color: #60aea9;
}
div#coming_soon {
    text-align: center;
    font-size: 18px;
    font-family: 'impactLabel';
    color: #fdafa9;
    margin-top: 15px;
}
div#coming_soons {
    text-align: center;
    font-size: 18px;
    font-family: 'impactLabel';
    color: #5cb0c9;
    margin-top: 15px;
    margin-right: 117px;
}
#loginsttext {
    color: #018cb3;
    font-family: 'impactLabel';
    font-size: 48px;
} 
div#loginstatus {
    margin: 60px 0px 0px;
}
div#unlock_txt {
    color: #da4040;
    font-size: 40px;
    top: 95px;
    text-align: center;
    font-family: 'impactlabel';
    position: absolute;
    -webkit-transform: rotate(-26deg);
	-moz-transform: rotate(-26deg);
	-ms-transform: rotate(-26deg);
	-o-transform: rotate(-26deg);
    left: -41px;
}
		</style>
        
        
        <?php
$addss_query = mysql_query("Select * from llsettings where settings_id = '1'");
	$addss_res = mysql_fetch_array($addss_query);
?>
        <div id="loginpg" style="position:relative;">
<!--
			<img src="http://lalanii.com/images/adds/<?php echo $addss_res['left_img']; ?>" style="opacity:0.6;float:left;top:0px;position:absolute;left:0px;">
			<img src="http://lalanii.com/images/adds/<?php echo $addss_res['right_img']; ?>" style="opacity:0.6;float:right;top:0px;position:absolute;right:0px;">
            	<div id="loginpgsec" style="background-image: none;position:relative;">
-->
            <div id="twocol_new">
<?php
$unlock_query = mysql_query("Select * from llsettings");
	$unlock_res = @mysql_fetch_array($unlock_query);
	if($unlock_res['temp_unlock'] == 1)
	{
?>
				<!-- <div id="unlock_txt">TEMPORARILY UNLOCKED</div> -->
<?php } ?>
<!--
            	<div id="leftpsub_txt"><a href="http://lalanii.com/subscribe.php?u=<?php echo $_SESSION[userID]; ?>"><div id="innerleft_sp">PAID SUBSCRIPTION<br />TO <span id="secretred">SECRET BLOGS</span></div></a></div>
                <div id="orsec">OR</div> -->
<!--
                <div id="rightsub_txt"><a href="http://lalanii.com/subscribe2.php?u=<?php echo $_SESSION[userID]; ?>"><div id="innerright_sp">BUY E - BOOK NOW!</div></a><?php 
			  	$sql_select=mysql_query("SELECT * FROM ebookpopup WHERE id = '366'");
	 
				$resultEbook = mysql_fetch_array($sql_select);

				if($resultEbook['status'] == 0 )
				{
?><br /><div  id="coming_soon">COMING SOON!</div>
<?php } ?>
</div>-->
           
            <div style="clear:both;"></div>
            
				<div id="new">
                	
                
				
					<!--a href="" id="questionmark" class="loginimage">learn more</a-->
					<form id="formRegister" name="formRegister" action="process/adduser.php" method="POST">
                    
                    <div id="paid_listings">
							<!--<a href="" class="loginimage" id="selectsubscribe" style="display:none;"><h2>SUBSCRIBE TO LALANII.COM</h2></a>
							<a href="" class="loginimagetoggles" id="selectsubscribetoggle"><h2>PAID SUBSCRIPTION TO <span style="color:darkred;">SECRETS</span></h2></a>-->
							<!--<div class="fineprint">UNLIMITED SECRET <span style="color:#82ceaf;">S</span><span style="color:#E2AE62;">H</span><span style="color:#e9a1a4;">*</span><span style="color:#5A7D9D;">T</span> $4.99 MONTHLY</div>-->
							<input name="selectsubscribe" type="hidden" id="subscribecheckbox" value="checked"  />
							
							<a href="" class="loginimage selectcategory" id="selectsecrets" style="display:none;">SECRET</a>
							<!--<a href="" class="loginimagetoggle selectcategory" id="selectsecretstoggle">SECRET</a>-->
						<!--	<input name="selectsecrets" type="hidden" id="secretscheckbox" value="checked"  />-->
<input name="selectsecrets" type="hidden" id="secretscheckbox" value="notchecked"  />
<!--
								<ul class="loginadditional newtask nostyle signupoptions">
								<?php
								$sqlSCLogin="select * from llSubcategory where secretSubcategory=1";
								$resultSCLogin=mysql_query($sqlSCLogin);
								$numSCLogin=mysql_num_rows($resultSCLogin);
								//echo $numSCLogin;
								$SCLogin=0;
								while($SCLogin<$numSCLogin){
									$subcategory=mysql_result($resultSCLogin,$SCLogin,"subcategory");
									$subcategoryID=mysql_result($resultSCLogin,$SCLogin,"subcategoryID");					
								?>				
								<li><input class="secretsubs" name="selectsubcategory[<?php echo $subcategoryID; ?>]" value="<?php echo $subcategoryID; ?>" type="checkbox" id="select<?php echo $subcategory; ?>checkbox" checked><span style="color:red;font-weight:bold;" class="topictext"><?php echo $subcategory; ?></span></li>
								<?php 
								++$SCLogin;
								}
								?>
								</ul> -->
						</div>

<?php 
			  	$sql_select=mysql_query("SELECT status FROM ebookpopup WHERE id = 366");
	 
				$resultEbook = mysql_fetch_array($sql_select);

				if($resultEbook['status'] == 0 )
				{
?>
                    <br /><div style="display:none;" id="coming_soons">COMING SOON!</div>
<?php } ?>
                    <div id="mainent_form">
                    <h1>Sign up for free blogs</h1>
                    <ul id="newoptions" style="display:none;">
						<li class="nostyle">
							<a href="" class="loginimage" id="selectfree" style="display:none;"><h2>Free lalanii.com access (limited)</h2></a>
							<!--href="javascript:void(0);"-->
							<a href="" class="loginimagetoggles" id="selectfreetoggle"><h2>Free lalanii.com access (limited)</h2></a>
							<input name="selectfree" type="hidden" id="freecheckbox" value="checked"  />
							<div class="fineprint">select to receive email notification</div>
							<input style="margin-left:29px;" name="selectfashion" checked type="checkbox" id="fashioncheckbox" class="freechk"  value="checked"  />
							<a href="" class="loginimage selectcategory" id="selectfashion" style="display:none;">FASHION</a>
							<a href="" class="loginimagetoggle selectcategory" id="selectfashiontoggle">FASHION</a>
							
							<input name="selectbeauty" type="checkbox" class="freechk" checked  id="beautycheckbox" value="checked"  />
							<a href="" class="loginimage selectcategory" id="selectbeauty" style="display:none;">BEAUTY</a>
							<a href="" class="loginimagetoggle selectcategory" id="selectbeautytoggle">BEAUTY</a>
							
							<input name="selectcreatives" type="checkbox" class="freechk" checked id="creativescheckbox" value="checked"  />
							<a href="" class="loginimage selectcategory" id="selectcreatives" style="display:none;">CREATIVES</a>
							<a href="" class="loginimagetoggle selectcategory" id="selectcreativestoggle">CREATIVES</a>
							
						</li>
						
						<!--<li id='topicsinterest'>
							<a href="" class="loginimage" id="selectadditional" style="display:none;"><h2>ADDITIONAL EMAIL UPDATES</h2></a>
							<a href="" class="loginimagetoggles" id="selectadditionaltoggle"><h2>ADDITIONAL EMAIL UPDATES</h2></a>
							<input name="selectadditional" type="hidden" id="additionalcheckbox" value="checked"  />
								<ul class="loginadditional nostyle signupoptions">
								<?php 
									$sqlLITop="Select * from llTopic order by topic";
									//echo "<br>num categories: ".$sqlLITop;
									$resultLITop=mysql_query($sqlLITop);
									$numLITop=mysql_num_rows($resultLITop);
									//echo "<br>num categories: ".$numLITop;
									$LITop=0;	
									while ($LITop < $numLITop) {
									$selecttopic=mysql_result($resultLITop,$LITop,"topic");
									$selecttopicID=mysql_result($resultLITop,$LITop,"topicID");
									?>
									<li><input type="checkbox" name="selecttopic[<?php echo $selecttopicID; ?>]" value="<?php echo $selecttopicID; ?>" checked /><span <?php if($selecttopic == 'Raunch'){ ?> style="color:red;" <?php } ?> class="topictext"><?php echo $selecttopic." "; ?></span></li>
									<?php
									++$LITop;
									//if ($LITop==$numLITop){echo "";}else{echo ",&nbsp;";}
									}
									?>
								</ul>
						
						</li>-->
               
					</ul>
                    
					<ul class="nnclss" style="border-top: 3px solid #e6e4e4 !important;">
						<li class="needborder">
							<input type="text" class="clearText" name="newUserFirst" placeholder="NAME" id="newUserFirst" tabindex="1">
							<!--<input type="text" class="clearText" name="newUserLast" placeholder="LAST NAME" id="newUserLast" tabindex="3">-->
						</li>
						<li><input type="text" class="clearText" name="newUserEmail" placeholder="EMAIL" id="newUserEmail" tabindex="4"></li>
					</ul>
					
					<ul  class="nnclss">
						<li  class="needborder"><input type="text" class="clearText" name="userName" placeholder="USER NAME" id="newUserName" tabindex="6"></li>
							<?php
							$loginmsg=$_GET['loginmsg'];
							if ($loginmsg=="12"){
							?>
							<li><div class="error">the user name entered has already been used</div>
							<?php
							}
							?>
						<li  class="needborder"><input required type="password" class="clearText" name="newUserPass" placeholder="PASSWORD" id="newUserPass" size="25" tabindex="7"></li>
						<li><input required type="password" class="clearText" name="newUserPassConfirm" placeholder="CONFIRM PASSWORD" id="newUserPassConfirm" size="25" tabindex="8" onKeyUp="checkPass(); return false;"></li>
					</ul>
                    <ul id="newagreement">				
						<li class="nostyle" style="margin: 10px 0px !important;">
							<a href="" class="loginimage" id="selectagree" style="display:none;"></a>
							<a href="" class="loginimagetoggle" id="selectagreetoggle"></a>
							<input type="hidden" tabindex="11" id="agreecheckbox" name="agreecheckbox" value="checked"  />
						<!--span>I understand and agree that registration on or use of this site constitutes agreement to our <a href="javascript:window.open('termsconditions.php','termsconditions','width=1044,height=700,top=100,left=100')">User Agreement and Privacy Policy</a></span-->
						<span style="color:#b7b3b3;">I understand and agree that registration on or use of this site constitutes agreement to our <a href="http://creativewritingagency.com/lalanii/termsconditions.php" target="_blank">User Agreement and Privacy Policy</a></span>
						</li>
							<script type="text/javascript">
							function submitform(){    
								if(document.formRegister.onsubmit())
								{document.formRegister.submit();}
							}
							</script>
						<input type="hidden" value="<?php echo $_SERVER["PHP_SELF"]; ?>" name="fromloc">
						<input type="hidden" tabindex="11" name="termDate" id="termDate">
					</ul>
                    
                    </div>
                    
					<h1 class="center lightblue impactLabel" style="color: #00ced1 !important;">Get the latest updates from Lalanii Rochelle right to your inbox.</h1>
                    <a style="margin-left: 20px;" href="http://lalanii.com/learnmore.php" id="learnmore" class="impactLabel redbg" target="_blank">learn more</a>
					<a href="javascript: submitform()" id="newUserSubmit" class="impactLabel bluegreenbg">register</a>
					<input type="hidden" vlaue= id="firstnameNE" name="firstnameNE" placeholder="FIRST NAME">
					<input type="hidden" vlaue= id="lastnameNE" name="lastnameNE" placeholder="LAST NAME">	
					<input type="hidden" vlaue= id="userEmailNE" name="userEmailNE" placeholder="EMAIL">	
					
					</form>
						
					<?php $loginmsg=$_GET['loginmsg'];	?>	
					<p id="loginmsgs"><?php
					$loginmsg=$_GET['loginmsg'];
					if ($loginmsg == 'error'){echo '<div class="loginError"><ul><li>Invalid login</li></ul></div>';} else {
					if ($loginmsg == 'userexists'){echo '<div class="loginError"><ul><li>That username already exists.</li></ul></div>';} else {
					if ($loginmsg == 'registersuccess'){echo '<div class ="loginSuccess"><ul><li><h2>Congrats!<br />You have successfully registered for Lalanii.com.<br />Please Log in!.</h2></li></ul></div>';} else {
					if ($loginmsg == 'invalidlogin'){echo '<div class="loginError"><ul><li>The username or password was incorrect.</li></ul></div>';} else {
					if ($loginmsg == 'successfullogout'){echo '<div class="loginError"><ul><li>You have been successfully logged out.</li></ul></div>';} else {
					if ($loginmsg == 'usernameemailexists'){echo '<div class="loginError"><ul><li>Your account already exists. Please login.</li></ul></div>';} else {
					if ($loginmsg == 'emailexists'){echo '<div class="loginError"><ul><li>That email address is tied to an existing account.</li></ul></div>';} else {
					if ($loginmsg == 'notloggedin'){echo '<div class="loginError"><ul><li>Please log in to continue.</li></ul></div>';} else {
					
					echo '';
					}}}}}}}}
					?></p>
						<DIV id="formRegister_errorloc" name="formRegister_errorloc"></div>
				</div>
                
                
                <div id="existing">
<?php if($_SESSION[userID] == ''){ ?>
					<form name="formExist" id="formExist" action="http://lalanii.com/process/login.php" method="POST">
					<h2 class="logintitles">EXISTING USERS LOGIN</h2>
					<ul>
						<li id="ffuname"><input autocomplete="off" type="text" name="userName" placeholder="USERNAME" id="existingUserName"></li>
						<li>
							<input autocomplete="off" type="password" name="userPass" placeholder="PASSWORD" id="existingPassword">
							<input type="hidden" value="<?php echo $_SERVER["PHP_SELF"]; ?>" name="fromloc">
						</li>
					</ul>
<input style="cursor:pointer;padding: 10px 30px!important;    margin-top: 10px;" value="log in" type="submit"  id="existingLogin" class="impactLabel bluegreenbg">
					
					<script type="text/javascript">
					function submitformExist(){document.formExist.submit();}
					</script>
					</form>
<?php }else { ?>

<div id="loginstatus">
<div id="loginsttext">YOU'RE<br />IN</div>
<a style="font-size: 26px;margin-top: 20px;" class="impactLabel bluebg" href="https://creativewritingagency.com/lalanii/subscribe2.php?u=<?php echo $_SESSION[userID]; ?>">GET THE E-BOOK</a><br />
<a style="font-size: 26px;margin-top: 10px;background-color:#f2a5c0 !important;" class="impactLabel shake-constant shake hover-stop bluebg" href="https://creativewritingagency.com/lalanii/subscribe.php?u=<?php echo $_SESSION[userID]; ?>">UPGRADE</a>
</div>

<?php } ?>
				</div>
                
				
				
			
			 </div>
				</div>
			</div>
		<div class="spacer"></div>
		<?php //include 'includes/bubbles.php';?>
		<div class="spacer"></div>
		<?php include 'includes/social.php';?>
		</div>
	</div>
</body>
</html>
<?php include 'includes/scripts.php';?>
<script type="text/javascript">
if (navigator.userAgent.toLowerCase().indexOf("chrome") >= 0) {
	$(window).load(function(){
		$(':-webkit-autofill').each(function(){
			$(this).after(this.outerHTML).remove();
		});
	});
}
</script>
<script type="text/javascript">
						var frmvalidator  = new Validator("formRegister");
							frmvalidator.addValidation("newUserFirst","req","Please enter your name.");
							frmvalidator.addValidation("newUserFirst","neelmnt=firstnameNE","Please enter your name.");
							frmvalidator.addValidation("newUserEmail","req","Please enter your email.");
							frmvalidator.addValidation("newUserEmail","neelmnt=userEmailNE","Please enter your email.");
							frmvalidator.addValidation("newUserEmail","userEmail","invalid email address");
							frmvalidator.addValidation("newUserPass","req","Please enter your Password.");
							frmvalidator.addValidation("newUserPass","neelmnt=userName","Your password should not be the same as your username.");
							frmvalidator.addValidation("newUserPassConfirm","eqelmnt=newUserPass","The passwords do not match.");
							frmvalidator.addValidation("agreecheckbox","req","You must agree to the terms.");
							frmvalidator.EnableMsgsTogether();
							frmvalidator.EnableOnPageErrorDisplaySingleBox();
						</script>
                        <style>
						.grybg {display:block !important;}
						</style>