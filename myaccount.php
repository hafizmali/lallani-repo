<?php include 'includes/startsession.php';?>
<html>
<head>
<title>Lalanii Rochelle | Manage My Account</title>
<meta name="title" content="Manage My Account" />
<meta name="description" content="Manage My Account" />
<?php include 'includes/tags.php';?>

<style>
.myaccountss li , .loginadditional li {
    float: left;
    font-size: 15px;
    width: 100%;
}
.myaccountss h3 {
    font-size: 18px;
}
</style>

</head>
<body id="myaccount">
<div id="main">
	<?php include 'includes/includes.php';?>
    
    <?php
    if($_GET['action'] == 'del')
	{
		$thisusr = $_GET['uid'];
		mysql_query("Delete from llUser where userID='".$thisusr."'");	
		//unset($_SESSION);
		session_destroy();
		?>
        <script>
			//alert("Your Account is deleted Successfully!");
			location.href="http://lalanii.com";
		</script>
        <?php
		//mysql_query("Delete from llUser  userID='".$thisusr."'");	
	}
	
	if($_GET['action'] == 'down')
	{
		$thisusr = $_GET['uid'];
		
		
	$emailCategory=$emailCategory."20,";
	$getsubcatids = mysql_query("Select * from llSubcategory where categoryID = '20' and secretSubcategory=0");
	while($getsubcatresult = mysql_fetch_array($getsubcatids))
	{
			$emailSubcategory .= $getsubcatresult['subcategoryID'].",";
	}	
	
	$emailCategory=$emailCategory."21,";
	$getsubcatids = mysql_query("Select * from llSubcategory where categoryID = '21' and secretSubcategory=0");
	while($getsubcatresult = mysql_fetch_array($getsubcatids))
	{
			$emailSubcategory .= $getsubcatresult['subcategoryID'].",";
	}
			
	$emailCategory=$emailCategory."22,";
	$getsubcatids = mysql_query("Select * from llSubcategory where categoryID = '22' and secretSubcategory=0");
	while($getsubcatresult = mysql_fetch_array($getsubcatids))
	{
			$emailSubcategory .= $getsubcatresult['subcategoryID'].",";
	}
		
		mysql_query("Update llUser set userType='user',emailCategory='$emailCategory',emailSubcategory='$emailSubcategory' where userID='".$thisusr."'");
		
		
		
	


		
		
		
			
		
		$sub_q = mysql_query("Select * from llUser where userID='".$thisusr."' ");
		$sub_res = @mysql_fetch_array($sub_q);
		$subscriptionId = $sub_res['subscriptionid'];
		
		include 'includes/authnetdata.php';
		
		$content =
	        "<?xml version=\"1.0\" encoding=\"utf-8\"?>".
	        "<ARBCancelSubscriptionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">".
	        "<merchantAuthentication>".
	        "<name>" . $login . "</name>".
	        "<transactionKey>" . $trankey . "</transactionKey>".
	        "</merchantAuthentication>" .
	        "<subscriptionId>" . $subscriptionId . "</subscriptionId>".
	        "</ARBCancelSubscriptionRequest>";
	
		//send the xml via curl
	
		$response = send_request_via_curl($host,$path,$content);

		
		//unset($_SESSION);
		session_destroy();
		?>
        <script>
			//alert("Your Account is deleted Successfully!");
			location.href="http://lalanii.com/myaccount.php?dwgrade=1";
		</script>
        <?php
		//mysql_query("Delete from llUser  userID='".$thisusr."'");	
	}
	if($_GET['dwgrade'] == 1)
	{
		?>
		<script>
			alert("Your Account is upgraded as a Free User!");			
		</script>
        <?php
	}
	?>
    
    
	<div id="content">
		
		<?php
		
		if ($loggedin=="no"){
			echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/index.php?loginmsg=notloggedin';</script>";
			

			}
		
		
		
		$sqlMYA="select * from llUser where userID=".$_SESSION['userID'];
		//echo $sqlMYA;
		$resultsMYA=mysql_query($sqlMYA);
		$numMYA=mysql_num_rows($resultsMYA);	
		//echo "<br>".$numMYA;
	
		$MYAuserName=mysql_result($resultsMYA,0,'userName');
		$MYAuserType=mysql_result($resultsMYA,0,'userType');
		$MYAuserEmail=mysql_result($resultsMYA,0,'userEmail');
		$MYAuserFirstName=mysql_result($resultsMYA,0,'userFirstName');
		$MYAuserLastName=mysql_result($resultsMYA,0,'userLastName');
		
		$MYAsubcat=mysql_result($resultsMYA,0,'emailSubcategory');
		//echo "<br>subcategories".$MYAsubcat;
		$MYAtopic=mysql_result($resultsMYA,0,'emailTopic');
		//echo "<br>topics".$MYAtopic;

		?>
		
		
		<form name="formMA" action="process/updateuser.php" method="POST">
		
		<ul id="updateaccout">
			<li class="myaccthead"><h1 style="font-family: 'Special Elite',cursive;color: #37afda;">Update personal info:</h1></li>
			<li class="pii"><ul><li class="nostyle">first name:</li><li><input type="text" class="clearText" name="updateUserFirst" value="<?php echo $MYAuserFirstName; ?>" id="updateUserFirst" tabindex="1" /></li></ul></li>
			<li class="pii"><ul><li class="nostyle">last name:</li><li><input type="text" class="clearText" name="updateUserLast" value="<?php echo $MYAuserLastName; ?>" id="updateUserLast" tabindex="3" /></li></ul></li>
			<li class="pii"><ul><li class="nostyle">email:</li><li><input type="text" class="clearText" name="updateUserEmail" value="<?php echo $MYAuserEmail; ?>" id="updateUserEmail" tabindex="4" /></li></ul></li>
		
		
			<li class="myaccthead" style="width: 100%;text-align: center;font-family: 'Special Elite',cursive;color: #37afda;
    margin: 32px 0px 0px;"><h1>CHOOSE WHAT TYPE OF BLOGS YOU WANT TO RECEIVE.</h1></li>
			<li id="subcat"	>
				<h2>Categories:</h2>
		
			<ul class="myaccountss">
					<?php
					$sqlMAFash="select * from llCategory c join llSubcategory s on c.categoryID=s.categoryID where c.categoryID=20 and s.secretSubcategory!=1 order by s.subcategory";
					//echo "<br>sql: ".$sqlMAFash;
					$resultMAFash=mysql_query($sqlMAFash);
					$numMAFash=mysql_num_rows($resultMAFash);
					//echo $numMAFash;
					$category=mysql_result($resultMAFash,0,"category");
					echo "<h3 style='color:#FFC0CB;'>".$category."</h3>";
					$MAFash=0;
					while($MAFash<$numMAFash){						
						$subcategory=mysql_result($resultMAFash,$MAFash,"subcategory");
						$subcategoryID=mysql_result($resultMAFash,$MAFash,"subcategoryID");
						$secretSubcategory=mysql_result($resultMAFash,$MAFash,"secretSubcategory");
						if ($secretSubcategory=="1"){$secretsubcatclass='restricted restrictedred';}else{$secretsubcatclass='';}
						if (strpos($MYAsubcat,$subcategoryID.',') !== false){$fashionchecked=' checked';}else{$fashionchecked='';}
						
					?>				
					<li class="<?php echo $secretsubcatclass; ?>">
						<input <?php if($MYAuserType == 'user' && $secretSubcategory=="1"){ ?> disabled <?php } ?> name="selectsubcategory[<?php echo $subcategoryID; ?>]" value="<?php echo $subcategoryID; ?>" type="checkbox" id="select<?php echo $subcategory; ?>checkbox"<?php echo $fashionchecked; ?>>
						<a class="<?php echo $secretsubcatclass; ?>"><?php echo $subcategory; ?></a>
					</li>
					<?php 
					++$MAFash;
					}
					?>
			</ul>
			<ul class="myaccountss">
					<?php
					$sqlMACreate="select * from llCategory c join llSubcategory s on c.categoryID=s.categoryID where c.categoryID=21 and s.secretSubcategory!=1 order by s.subcategory";
					//echo "<br>sql: ".$sqlMACreate;
					$resultMACreate=mysql_query($sqlMACreate);
					$numMACreate=mysql_num_rows($resultMACreate);
					//echo $numMACreate;
					$category=mysql_result($resultMACreate,0,"category");
					echo "<h3 style='color:#FFA500;'>".$category."</h3>";
					$MACreate=0;
					while($MACreate<$numMACreate){						
						$subcategory=mysql_result($resultMACreate,$MACreate,"subcategory");
						$subcategoryID=mysql_result($resultMACreate,$MACreate,"subcategoryID");
						$secretSubcategory=mysql_result($resultMACreate,$MACreate,"secretSubcategory");
						if ($secretSubcategory=="1"){$secretsubcatclass='restricted restrictedred';}else{$secretsubcatclass='';}
						if (strpos($MYAsubcat,$subcategoryID.',') !== false){$creativeschecked=' checked';}else{$creativeschecked='';}
						
					?>				
					<li class="<?php echo $secretsubcatclass; ?>">
						<input <?php if($MYAuserType == 'user' && $secretSubcategory=="1"){ ?> disabled <?php } ?> name="selectsubcategory[<?php echo $subcategoryID; ?>]" value="<?php echo $subcategoryID; ?>" type="checkbox" id="select<?php echo $subcategory; ?>checkbox"<?php echo $creativeschecked; ?>>
						<a class="<?php echo $secretsubcatclass; ?>"><?php echo $subcategory; ?></a>
					</li>
					<?php 
					++$MACreate;
					}
					?>
			</ul>
			<ul class="myaccountss">
					<?php
					$sqlMABeaut="select * from llCategory c join llSubcategory s on c.categoryID=s.categoryID where c.categoryID=22 and s.secretSubcategory!=1 order by s.subcategory";
					//echo "<br>sql: ".$sqlMABeaut;
					$resultMABeaut=mysql_query($sqlMABeaut);
					$numMABeaut=mysql_num_rows($resultMABeaut);
					//echo $numMABeaut;
					$category=mysql_result($resultMABeaut,0,"category");
					echo "<h3 style='color:#008080;'>".$category."</h3>";
					$MABeaut=0;
					while($MABeaut<$numMABeaut){						
						$subcategory=mysql_result($resultMABeaut,$MABeaut,"subcategory");
						$subcategoryID=mysql_result($resultMABeaut,$MABeaut,"subcategoryID");
						$secretSubcategory=mysql_result($resultMABeaut,$MABeaut,"secretSubcategory");
						if ($secretSubcategory=="1"){$secretsubcatclass='restricted restrictedred';}else{$secretsubcatclass='';}
						if (strpos($MYAsubcat,$subcategoryID.',') !== false){$beautychecked=' checked';}else{$beautychecked='';}
						
					?>				
					<li class="<?php echo $secretsubcatclass; ?>">
						<input <?php if($MYAuserType == 'user' && $secretSubcategory=="1"){ ?> disabled <?php } ?> name="selectsubcategory[<?php echo $subcategoryID; ?>]" value="<?php echo $subcategoryID; ?>" type="checkbox" id="select<?php echo $subcategory; ?>checkbox"<?php echo $beautychecked; ?>>
						<a class="<?php echo $secretsubcatclass; ?>"><?php echo $subcategory; ?></a>
					</li>

					<?php 
					++$MABeaut;
					}
					?>
			</ul>
			<ul class="myaccountss">
					<?php
					//$sqlMASex="select * from llCategory c join llSubcategory s on c.categoryID=s.categoryID where c.categoryID=23 order by s.subcategory";
					$sqlMASex="select * from llSubcategory where secretSubcategory=1";
					//echo "<br>sql: ".$sqlMASex;
					$resultMASex=mysql_query($sqlMASex);
					$numMASex=mysql_num_rows($resultMASex);
					//echo $numMASex;
					//$category=mysql_result($resultMASex,0,"category");
					echo "<h3 style='color:#FF0000;'>Secrets</h3>";
					$MASex=0;
					while($MASex<$numMASex){						
						$subcategory=mysql_result($resultMASex,$MASex,"subcategory");
						$subcategoryID=mysql_result($resultMASex,$MASex,"subcategoryID");
						$secretSubcategory=mysql_result($resultMASex,$MASex,"secretSubcategory");
						if ($secretSubcategory=="1"){$secretsubcatclass='restricted restrictedred';}else{$secretsubcatclass='';}
						if (strpos($MYAsubcat,$subcategoryID.',') !== false){$secretchecked=' checked';}else{$secretchecked='';}
					?>				
					<li>
						<input <?php if($MYAuserType == 'user' && $secretSubcategory=="1"){ ?> disabled <?php } ?> name="selectsubcategory[<?php echo $subcategoryID; ?>]" value="<?php echo $subcategoryID; ?>" type="checkbox" id="select<?php echo $subcategory; ?>checkbox"<?php echo $secretchecked; ?>>
						<a <?php if($_SESSION['userType'] == 'user'){ ?> href="http://lalanii.com/subscribe.php?u=<?php echo $_SESSION['userID'] ?>" <?php } ?> class="<?php echo $secretsubcatclass; ?>"><?php echo $subcategory; ?></a>
					</li>

					<?php 
					++$MASex;
					}
					?>
			</ul>
		</li>
		
		
		
		
		
			<li id='topicsinterest'>
				<h2>Topics:</h2>
				<ul class="loginadditional nostyle">
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
						if (strpos($MYAtopic,$selecttopicID.',') !== false){$topicchecked=' checked';}else{$topicchecked='';}

						?>
						<li><input <?php if($MYAuserType == 'user' && $selecttopicID=="39"){ ?> disabled <?php } ?> type="checkbox" name="selecttopic[<?php echo $selecttopicID; ?>]" value="<?php echo $selecttopicID; ?>"<?php echo $topicchecked; ?>/><a <?php if(($_SESSION['userType'] == 'user') && ($selecttopicID == '39')){ ?> href="http://lalanii.com/subscribe.php?u=<?php echo $_SESSION['userID'] ?>" <?php } ?> class="<?php if($selecttopicID == '39'){ ?>restricted restrictedred<?php } ?>"><?php echo $selecttopic." "; ?></a></li>
						<?php
						++$LITop;
						//if ($LITop==$numLITop){echo "";}else{echo ",&nbsp;";}
						}
						?>
					</ul>
			
			</li>
		
		
		
		</ul>
<br>
<a style="background-color:pink !important;" class="lastlinks reder impactLabel " href="javascript:submitformMA()" id="updateUserSubmit">update account</a>		
		<script type="text/javascript">
		function submitformMA(){document.formMA.submit();}
		</script>

</form>	
<div id="myaccount_b">
<?php if($_SESSION['userType'] != 'admin'){?>
<a style="background-color:#800020 !important;" class="lastlinks pinker " href="http://lalanii.com/myaccount.php?action=del&uid=<?php echo $_SESSION['userID']; ?>">DELETE ACCOUNT</a><br />
<?php } ?>
<a style="background-color:gray !important;" class="lastlinks pinker shake-constant shake hover-stop " href="http://lalanii.com/myaccount.php?action=del&uid=<?php echo $_SESSION['userID']; ?>">Buy Ebook</a><br />
<?php
if(($MYAuserType != 'user') && ($MYAuserType != 'admin')){
?>	
<a class="lastlinks bluer " href="http://lalanii.com/myaccount.php?action=down&uid=<?php echo $_SESSION['userID']; ?>" rel="author" target="_blank">DOWNGRADE TO FREE</a>
<?php
}
if($MYAuserType == 'user'){
?>	
<input style="background-color:#37afda !important;font-family: impactlabel !important;border: none;font-size: 24px !important; padding: 10px;" onClick="location.href = 'https://creativewritingagency.com/lalanii/subscribe.php?u=<?php echo $_SESSION['userID']; ?>';"  type="button" value="Upgrade To Premium" name="subscribe" class="orangebtns" >
<?php } ?>		
</div>
	</div>
	<?php include 'includes/footer.php';?>
</div>
</body>
</html>
<?php include 'includes/scripts.php';?>