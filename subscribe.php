<html>
<head>
<title>Lalanii Rochelle | Subscribe</title>
<meta name="title" content="Lalanii Rochelle | Subscribe" />
<meta name="description" content="" />
<style>
#sred {
	color: red;
}
#spink {
	color: pink;
}
#subscribe form input[type=text] {
	color: #8dc1bc!important;
	padding: 0px 4px;
	margin: 0px 2px 4px 0px;
	line-height: 24px !important;
}
select#exp_month {
	padding: 4px 0px;
}
</style>
<script>
function paymth(paytype)
{
	var paytype = paytype;
	if(paytype == 'authorizem')
	{
		document.getElementById(paytype).style.display = "block";
		document.getElementById('paypalm').style.display = "none";		
	}
	else if(paytype == 'paypalm')
	{
		document.getElementById(paytype).style.display = "block";
		document.getElementById('authorizem').style.display = "none";		
	}
	//alert(paytype);
	//authorizem
}

function paybtn(paytype)
{
	var paytype = paytype;
	if(paytype == 'authorizem')
	{
		//document.getElementById(paytype).style.display = "block";
		//document.getElementById('paypalm').style.display = "none";
		document.getElementById("checkout_form").action = "process/authorize.php";
		document.getElementById('checkout_form').submit();
	}
	else if(paytype == 'paypalm')
	{
		//document.getElementById(paytype).style.display = "block";
		//document.getElementById('authorizem').style.display = "none";
		document.getElementById("checkout_form").action = "process/paypal.php";
		document.getElementById('checkout_form').submit();
	}
	//alert(paytype);
	//authorizem
}
</script>
<?php include 'includes/tagscwa.php'; ?>
<script>
function caltotal(gcost)
{
		//alert(gcost);

	var tcost = parseFloat($('#tamount').val()); 

	var ebookcost = 0;
	var lasttype = $('#lasttype').val();



	//if(gcost == 'monthly' ){
	
	if(gcost == 'monthly' )
	{
		document.getElementById("lasttype").value = 'monthly';
		tcost = tcost + parseFloat(4.99);
	}
	else if((gcost != 'monthly') && (lasttype == 'monthly') && (gcost != 'ebook'))
	{
		tcost = tcost - parseFloat(4.99);
	}


	if(gcost == 'yearly' )
	{
		document.getElementById("lasttype").value = 'yearly';
		tcost = tcost + parseFloat(40);
	}
	else if((gcost != 'yearly') && (lasttype == 'yearly') && (gcost != 'ebook'))
	{
		tcost = tcost - parseFloat(40);
	}



	if(gcost == 'lifetime' )
	{
		document.getElementById("lasttype").value = 'lifetime';
		tcost = tcost + parseFloat(100);
	}
	else if((gcost != 'lifetime') && (lasttype == 'lifetime') && (gcost != 'ebook'))
	{
		tcost = tcost - parseFloat(100);
	}
				
	

			
	tcost = tcost.toFixed(2)


	
	document.getElementById("tamount").value = tcost;
}
</script>
</head>
<body id="index">
<div id="main">
  <?php 
include 'includes/includes.php'; 
//echo "passed userID: ".$_GET['u'];
$uid=$_GET['u'];
if ((!isset($uid))or($uid==0)){
	?>
    <style>

#signup #content #loginpg {
    background-image: url(http://lalanii.com/images/Signupn-bg.png);
    background-size: 908px 1034px;
    width: 904px;
    height: 1034px;
    margin: 0 auto;
    border-radius: 0px;
    float: left;
}
.freechk {
    float: left;
    margin-left: 10px;
}
#signup #content #loginpg #loginpgsec {
    background-image: url(http://lalanii.com/images/right_bg.png);
    background-repeat: no-repeat;
    background-position: right top;
}
div#twocol_new {
    max-width: 100%;
    width: 844px;
    margin: 204px 30px 0px;
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
    margin: 0px 0px 10px;
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
    bottom: 346px;
    left: 450px;
    color: #000 !important;
}
div#formRegister_errorloc ul li, .loginError ul li, .error {
    clear: both;
    color: #fff;
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
#new form input[type=submit], #new form input[type=text], #new form input[type=password]
{
    color: #737373;
    font-family: 'Special Elite',cursive;
    border: none;
    outline: 0;
    padding: 0 30px!important;
}
div#justreg {
    background: #000;
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0px;
    left: 0px;
    opacity: 0.6;
    z-index: 5;
}
div#new {
    background: #FFF;
    z-index: 99999;
    position: absolute;
    width: 430px;
    border: 4px solid #ccc;
    border-radius: 5px;
    left: 24%;
    top: 80px;
}

#backbtn{
    width: 50px;
    height: 40px;
    position: absolute;
    background: gray;
    border-radius: 24px;
    right: -24px;
    top: -24px;
    color: #FFF;
    border: 2px solid #999;
}

#backbtn a{
    color: #FFF;
    text-align: center;
    width: 100%;
    float: left;
    margin-top: 7px;
    font-size: 16px;
    text-decoration: none;
}
		</style>
	
	
    <div id="justreg"> </div>
    
    <div style="clear:both;"></div>
            
				<div id="new">
                	
                	<div id="backbtn"><a href="http://lalanii.com/signup.php">Back</a></div>
				
					
					<form id="formRegister" name="formRegister" action="process/adduser.php" method="POST">
                    
                    <div id="paid_listings">
							
							<input name="selectsubscribe" type="hidden" id="subscribecheckbox" value="checked"  />
							
							<a href="" class="loginimage selectcategory" id="selectsecrets" style="display:none;">SECRET</a>
						
<input name="selectsecrets" type="hidden" id="secretscheckbox" value="notchecked"  />
								<ul class="loginadditional newtask nostyle signupoptions" style="visibility:hidden;width:0px;height:0px;">
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
								</ul>
						</div>


                    <div id="mainent_form">
                    <h1>Sign up for paid blogs</h1>
                    <ul id="newoptions">
						<li class="nostyle">
							<a href="" class="loginimage" id="selectfree" style="display:none;"><h2>Free lalanii.com access (limited)</h2></a>
							
							<a href="" class="loginimagetoggles" id="selectfreetoggle"><h2 style="text-align:center;">PAID SUBSCRIPTION</h2></a>
							<input name="selectfree" type="hidden" id="freecheckbox" value="checked"  />
							<div class="fineprint">select to receive email notifications</div>
							<input style="margin-left:10px;" name="selectfashion" checked type="checkbox" id="fashioncheckbox" class="freechk"  value="checked"  />
							<a href="" class="loginimage selectcategory" id="selectfashion" style="display:none;">SEX & <br />DATING</a>
							<a href="" style="height:25px;" class="loginimagetoggle selectcategory" id="selectfashiontoggle">SEX & <br />DATING</a>
							
							<input name="selectbeauty" type="checkbox" class="freechk" checked  id="beautycheckbox" value="checked"  />
							<a href="" class="loginimage selectcategory" id="selectbeauty" style="display:none;">EXCLUSIVE<br />FASHION</a>
							<a style="height:25px;" href="" class="loginimagetoggle selectcategory" id="selectbeautytoggle">EXCLUSIVE<br />FASHION</a>
							
							<input name="selectcreatives" type="checkbox" class="freechk" checked id="creativescheckbox" value="checked"  />
							<a href="" class="loginimage selectcategory" id="selectcreatives" style="display:none;">FAT GIRL<br />DIARIES</a>
							<a href="" style="height:25px;" class="loginimagetoggle selectcategory" id="selectcreativestoggle">FAT GIRL<br />DIARIES</a>

							<input name="selectcreatives" type="checkbox" class="freechk" checked id="creativescheckbox" value="checked"  />
							<a href="" class="loginimage selectcategory" id="selectcreatives" style="display:none;">WTF</a>
							<a href="" style="height:25px;" class="loginimagetoggle selectcategory" id="selectcreativestoggle">WTF</a>
							
						</li>
						
					
               
					</ul>
                    
					<ul class="nnclss">
						<li class="needborder">
							<input type="text" class="clearText" name="newUserFirst" placeholder="NAME" id="newUserFirst" tabindex="1">
						
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
						<input type="hidden" tabindex="11" name="usertypers" id="usertypers" value="paidreg">
					</ul>
                    
                    </div>
                    
					<h1 class="center lightblue impactLabel">Get the latest updates from Lalanii Rochelle right to your inbox.</h1>
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
  <?php

}
else
{
$newsql="Select * from llUser where userID=".$uid;
	//echo "<br>".$newsql;
	
	$newresult=mysql_query($newsql);
	$newrows=mysql_num_rows($newresult);
	if($newrows>0){
//	$newrows=mysql_num_rows($newresult);
	$userid=mysql_result($newresult,0,"userID");
	$userFirstName=mysql_result($newresult,0,"userFirstName");
	$userLastName=mysql_result($newresult,0,"userLastName");
	$userEmail=mysql_result($newresult,0,"userEmail");
	}
?>
  <div id="content">
    <div id="subscribe">
      <h1 class="impactLabel bluegreen">PREMIUM MEMBERSHIP!</h1>
      Fill out the form below to register your premium membership and get instant access.
      <form method="post" action="" id="checkout_form">
        <ol>
          <li>Your Account Information:
            <table border="0" cellpadding="0" style="border-collapse: collapse">
              <tr>
                <td>First Name:</td>
                <td>Last Name:</td>
              </tr>
              <tr>
                <td><input type="text" name="firstname" size="20" value="<?php echo $userFirstName; ?>"></td>
                <td><input type="text" name="lastname" size="20" value="<?php echo $userLastName; ?>"></td>
              </tr>
              <tr>
                <td>Email:</td>
                <td><input type="hidden" name="userID" size="20" value="<?php echo $userid; ?>">
                  &nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><input type="text" name="email" size="40" value="<?php echo $userEmail; ?>"></td>
              </tr>
            </table>
            <br />
          </li>
          <li>
            <select onChange="caltotal(this.value);" id="subdrop" name="subscription" style="height: 32px;color: gray;">
              <option valuw="nosub">Chose Your Subscription Level Access</option>
              <option value="monthly">Secret BLOGS $4.99 Monthly Subscription</option>
              <option value="yearly">Secret BLOGS Premium Yearly Subscription Access $40 (4 Free Months!)</option>
              <option value="lifetime">Secret BLOGS Lifetime Unlimited Subscription Access $100 (Best value)</option>
            </select>
            <!--
		<input type="radio" value="monthly" name="subscription" checked><span id="sred">Secret BLOGS</span>  $4.99 
		Monthly Subscription<br>
		<input type="radio" value="yearly" name="subscription">Secret BLOGS Premium Yearly 
		Subscription Access $40 (4 Free Months!)<br>
		<input type="radio" value="lifetime" name="subscription">Secret BLOGS Lifetime 
		Unlimited Subscription Access $100 (Best value)<br>--><br />
            <br />
          </li>
          <li>Payment Method: <br />
            <input onClick="return paymth('paypalm')" type="radio" name="paypalm" checked value="paypalm" >
            Paypal<br />
<!--
            <input onClick="return paymth('authorizem')" type="radio" name="paypalm" value="authorizem" checked >
            Authorize.Net<br />-->
            <br />
          </li>
          <li style="display:none;"  id="authorizem">Payment Information:<br>
            <table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>Name on Card:</td>
                <td>Card Number:</td>
              </tr>
              <tr>
                <td><input type="text" class="text required" required size="15" name="first_name" placeholder="first">
                  <input type="text" class="text required" size="15" name="last_name" placeholder="last"></td>
                <td><input type="text" class="text required creditcard" required size="20" name="card_num" placeholder=""></td>
              </tr>
              <tr>
                <td>Expiration Date:</td>
                <td>CCV:</td>
              </tr>
              <tr>
                <td><select id="exp_month" name="exp_month">
                    <option value="00" enabled='false'>Month</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>
                  -
                  <input type="text" class="text required" size="4" name="exp_year" placeholder="yyyy"></td>
                <td></input>
                  <input type="text" class="text required" size="3" name="card_code" placeholder=""></td>
              </tr>
              <tr>
                <td>Address:</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><input type="text" class="text required" size="26" name="address" placeholder="address"></td>
              </tr>
              <tr>
                <td colspan="2"></input>
                  <input type="text" class="text required" size="15" name="city" placeholder="city" />
                  ,&nbsp;
                  <input type="text" class="text required" size="5" name="state" placeholder="state" />
                  &nbsp;
                  <input type="text" class="text required" size="5" name="zip" placeholder="zip" /></td>
              </tr>
              <tr>
                <td colspan="2" style="font-weight:bold;"> Total Amount:
                  $
                  <input style="border: none;color: red !important;font-weight: bold;" type='text' id="tamount" name='tamount' value="0">
                  <input id="lasttype" type="hidden" value=""></td>
              </tr>
              <tr>
                <td colspan="2"><input type="button" onClick="return paybtn('authorizem')" placeholder="register" class="redbg impactLabel" name="subscribe" value="subscribe"></td>
              </tr>
            </table>
          </li>
          <li id="paypalm">
            <input type="button" onClick="return paybtn('paypalm')" placeholder="register" class="redbg impactLabel" name="subscribe" value="subscribe">
            <br>
          </li>
        </ol>
      </form>
      <!-- (c) 2005, 2015. Authorize.Net is a registered trademark of CyberSource Corporation -->
      <div class="AuthorizeNetSeal"> <script type="text/javascript" language="javascript">var ANS_customer_id="fb840126-a848-422a-8722-131ff99cd8fa";</script> <script type="text/javascript" language="javascript" src="//verify.authorize.net/anetseal/seal.js" ></script> <a href="http://www.authorize.net/" id="AuthorizeNetText" target="_blank">e-Check</a> </div>
      <span id="siteseal"><script type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=1WnLyuqKnG2KLfiOzhryWlUnJUugvChOBkhfEoLZrZvrc5xVAkSAP9BvgCGo"></script></span> </div>
  </div><?php include 'includes/scriptscwa.php';?>
  <?php
  }
  ?>
</div>
</body>
</html>

