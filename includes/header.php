<div id="header">

	<?php include 'social.php';
	function limit_wordss($string, $word_limit)
{
    $words = explode(" ",$string);
    return implode(" ", array_splice($words, 0, $word_limit));
}
function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]).'...';
      }
      return $text;
    }	
	
	?>
	<div id='loggedin'>welcome 
	<?php
	if (isset($_SESSION['userFirstName'])){
		echo $_SESSION['userFirstName']."! <a href='http://lalanii.com/process/logout.php' id='logoutclick'>log out</a>&nbsp<a href='http://lalanii.com/myaccount.php'>my account</a>";
		//echo $_SESSION['userType'];
		if($_SESSION['userType'] == 'user'){
		echo '<a class="headernbtn" href = "https://creativewritingagency.com/lalanii/subscribe.php?u='.$_SESSION[userID].'" >Upgrade To Premium</a>'; }
		if ($isadmin=="yes"){echo "<br><a href='http://lalanii.com/admin.php'>administer away...</a>";}
		}else{
			if($viewingmobile=="yes"){
			if($file=="signup"){echo "Friend! <a href='#existing'>log in</a>";}else{echo "Friend! <a href='http://lalanii.com/signup.php'>Log In</a>";}
				}else{
			if($file=="signup"){echo "Friend! <a href='#existing'>log in</a>";}else{echo "Friend! <a href='#' class='loginclick'>Log In.</a>";}
				}
	}
	?>
	<p><a href="javascript:void;" style="cursor:default;text-decoration:none;" class="beige">over <img src="http://counter8.allfreecounter.com/private/freecounterstat.php?c=f53d74dc3e97df6bbf3e53d6e9844a2b" border="0" title="hit counter" alt="hit counter"> views!</a> <a style="cursor:default;text-decoration:none;color:#AB2020;text-transform: UPPERCASE;font-size: 38px;margin: 5px 0px;cursor: pointer;" class="shake-constant shake hover-stop" href="http://lalanii.com/signup.php">Sign Up Now</a></p>
    <a href="http://lalanii.com/forgotpass.php" id="forgetpas" style="display:none;text-transform:lowercase;  padding: 0px;
  margin: 0px;" class="impactLabel grybg">Forgot Password?</a>
        
	<!--p><a a href="javascript:void;" style="cursor:default;text-decoration:none;" class="blue">Join <img height="15" src="http://counter8.allfreecounter.com/private/freecounterstat.php?c=be31438ee9f9e26d8b392eb62e74ce73" border="0" title="free web counter" alt="free web counter"> other subscribers.</a></p>
	
	<p><a href="javascript:void;"  style="cursor:default;text-decoration:none;" class="bluegreen">Join <img src="http://counter8.allfreecounter.com/private/freecounterstat.php?c=dd15ecedd89276ba8c59641982dc7241" border="0" title="website counter" alt="website counter"> other subscribers.</a></p-->
				   
		
        
<!--a href="javascript:void;" target="_blank" style="cursor:default;"><img height="20px" src="http://www.reliablecounter.com/count.php?page=lalanii.com&digit=style/plain/1/&reloads=0" alt="" title="" border="0"></a-->
	</div>
	
	<a href="http://lalanii.com/index.php"><img id="logo" src="http://lalanii.com/images/general/logo.png" width="281px" height="149px" /></a>
		<div class="ticker">
				<div class="vticker">
					<ul style="display:none;">
						<li style="margin: 0px; display: block;"></li>
						<?php
						$sqlTL="Select tagID,tagline,tagDate,tagExpires,tagFont,tagSize,tagColor,tagLink from llTagline where tagDate<=CURDATE() and tagExpires>=CURDATE() order by tagDate asc";
						//echo $sqlTL;
						$resultTL=mysql_query($sqlTL);
						$numTL=mysql_num_rows($resultTL);
						$TL=0;
						while ($TL < $numTL) {
							$tagID=mysql_result($resultTL,$TL,"tagID");
							$tagline=mysql_escape_string(mysql_result($resultTL,$TL,"tagline"));
							$tagFont=mysql_result($resultTL,$TL,"tagFont");
							$tagURLFont=preg_replace("/ /","+",$tagFont);
							$tagColor=mysql_result($resultTL,$TL,"tagColor");
							$tagSize=mysql_result($resultTL,$TL,"tagSize");
							$tagLink=mysql_result($resultTL,$TL,"tagLink");
							$tagDate=date("m/d/Y",strtotime(mysql_result($resultTL,$TL,"tagDate")));
							$tagExpires=date("m/d/Y",strtotime(mysql_result($resultTL,$TL,"tagExpires")));
						?>											
							<li style="margin: 0px; display: block;">
								<link href='http://fonts.googleapis.com/css?family=<? echo $tagURLFont; ?>' rel='stylesheet' type='text/css'>
								<span>
								<a class="emojosec" href="<?php echo $tagLink; ?>" style="font-family:'<? echo $tagFont; ?>';color:#<? echo $tagColor; ?>;font-size:<? echo $tagSize; ?>px;text-decoration:none;">
								<? echo $tagline; ?>
								</a>
								</span>
							</li>
						<?php
						++$TL;
						}
						?>
					</ul>
				</div>
			</div>

	
	<ul id="topnav">
		<li id="topnav1">
			<a href="http://lalanii.com/index.php" class="<?php if((($file=='index') OR ($file=='')) AND ($lastdir!=='hireme')){echo 'selected';}?>">
			<img src="http://lalanii.com/image.php?width=65&height=33&image=http://lalanii.com/images/general/button-home.png" width="65px" height="33px" /></a>
		</li>
		<li id="topnav2">
			<a href="http://lalanii.com/fashion.php" class="<?php if(($file=='fashion')){echo 'selected';}?>">
			<img src="http://lalanii.com/image.php?width=97&height=33&image=http://lalanii.com/images/general/button-fashion.png" width="97px" height="33px" /></a>
			<ul class="sub-nav">
	            <?php
				$sqlHFSub="select * from llSubcategory s join llCategory c on s.categoryID=c.categoryID where c.category='fashion' and s.secretSubcategory=0 order by s.subcategoryOrder asc";
				//echo $sqlHFSub;
				$resultHFSub=mysql_query($sqlHFSub);
				$numHFSub=mysql_num_rows($resultHFSub);
				$HFSub=0;
				while($HFSub<$numHFSub){					
				echo "<li><a href='http://lalanii.com/fashion.php?scid=".mysql_result($resultHFSub,$HFSub,"subcategoryID")."'>".mysql_result($resultHFSub,$HFSub,"subcategory")."</a></li>";
				++$HFSub;
				}
				?>
	            <!--li class="hr"></li>
	            <li><a href="#">Fashion Reviews</a></li-->
	            <li class="hr"></li>
	            <li><a href="http://www.fashionpoetrylalanii.com">fashionpoetryLalanii.com</a></li>
	            <li class="hr"></li>
	            <?php
				$sqlHFB="Select * from llBlog where blogPage='fashion' and blogDate<=NOW() order by blogDate desc limit 3";
				$resultHFB=mysql_query($sqlHFB);
				$numHFB=mysql_num_rows($resultHFB);
				$HFB=0;
				while ($HFB < $numHFB) {
				$blogIDHFB=mysql_result($resultHFB,$HFB,"blogID");
				$blogTitleHFB=mysql_result($resultHFB,$HFB,"blogTitle");
				
				?>
				<li><a href="http://lalanii.com/fashion<?php echo "/".$blogIDHFB."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitleHFB)); ?>"><?php echo $blogTitleHFB;?></a></li>	            
				<?php
				++$HFB;
				}
				?>
				<li class="hr"></li>
	            <?php
				$sqlHFBXXX="select * from llSubcategory s join llCategory c on s.categoryID=c.categoryID where c.category='fashion' and s.secretSubcategory=1 order by s.subcategoryOrder asc";
				$resultHFBXXX=mysql_query($sqlHFBXXX);
				$numHFBXXX=mysql_num_rows($resultHFBXXX);
				$HFBXXX=0;
				while ($HFBXXX < $numHFBXXX) {
				$subcategoryIDHFBXXX=mysql_result($resultHFBXXX,$HFBXXX,"subcategoryID");
				$subcategoryHFBXXX=mysql_result($resultHFBXXX,$HFBXXX,"subcategory");
				
				?>
				<li><a href="http://lalanii.com/fashion.php?scid=<?php echo $subcategoryIDHFBXXX; ?>" class="restricted"><?php echo $subcategoryHFBXXX;?></a></li>
				<?php
				++$HFBXXX;
				}
				?>
	        </ul>
		</li>
		<li id="topnav3">
			<a href="http://lalanii.com/beauty.php" class="<?php if(($file=='beauty')){echo 'selected';}?>">
			<img src="http://lalanii.com/image.php?width=97&height=33&image=http://lalanii.com/images/general/button-beauty.png" width="97px" height="33px" />
			</a>
			<ul class="sub-nav">
	            <?php
				$sqlHBSub="select * from llSubcategory s join llCategory c on s.categoryID=c.categoryID where category='beauty' and s.secretSubcategory=0 order by s.subcategoryOrder asc";
				$resultHBSub=mysql_query($sqlHBSub);
				$numHBSub=mysql_num_rows($resultHBSub);
				$HBSub=0;
				while($HBSub<$numHBSub){	
								
				echo "<li><a href='http://lalanii.com/beauty.php?scid=".mysql_result($resultHBSub,$HBSub,"subcategoryID")."'>".mysql_result($resultHBSub,$HBSub,"subcategory")."</a></li>";
				++$HBSub;
				}
				?>
	            <!--li class="hr"></li>
	            <li><a href="#">Product Reviews</a></li>
	            <li><a href="#">Service Reviews</a></li-->
	            <li class="hr"></li>
	            <?php
				//$sqlHBB="Select * from llBlog where blogPage='beauty' and secretBlog=0 order by stickyBlog desc, blogDate desc limit 3";
				$sqlHBB="Select * from llBlog where blogPage='beauty' and blogDate<=NOW() order by blogDate desc  limit 3";
				$resultHBB=mysql_query($sqlHBB); 
				$numHBB=mysql_num_rows($resultHBB);
				$HBB=0;
				while ($HBB < $numHBB) {
				$blogIDHBB=mysql_result($resultHBB,$HBB,"blogID");
				$blogTitleHBB=mysql_result($resultHBB,$HBB,"blogTitle");
				
				?>
				<li><a href="http://lalanii.com/beauty<?php echo "/".$blogIDHBB."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitleHBB)); ?>"><?php 	echo limit_text($blogTitleHBB,7); ?></a></li>	            
				<?php
				++$HBB;
				}
				?>
				<li class="hr"></li>
	            <?php
				$sqlHBBXXX="select * from llSubcategory s join llCategory c on s.categoryID=c.categoryID where category='beauty' and s.secretSubcategory=1 order by s.subcategoryOrder asc";
				$resultHBBXXX=mysql_query($sqlHBBXXX); 
				$numHBBXXX=mysql_num_rows($resultHBBXXX);
				$HBBXXX=0;
				while ($HBBXXX < $numHBBXXX) {
				$subcategoryIDHBBXXX=mysql_result($resultHBBXXX,$HBBXXX,"subcategoryID");
				$subcategoryHBBXXX=mysql_result($resultHBBXXX,$HBBXXX,"subcategory");
				?>
				<li><a href="http://lalanii.com/beauty.php?scid=<?php echo $subcategoryIDHBBXXX; ?>" class="restricted"><?php echo $subcategoryHBBXXX;?></a></li>
				<?php
				++$HBBXXX;
				}
				?>
	        </ul>
		</li>
		<li id="topnav4">
			<?php if ($secrets=='accessible'){	?>
			<a href="http://lalanii.com/secrets.php" class="<?php if(($file=='secrets')){echo 'selected ';}else{}?>">
			<?php }else if (($secrets=="restricted") AND ($loggedin=='yes')){ ?>
			<a href="http://lalanii.com/signup.php" class="<?php if(($file=='secrets')){echo 'selected ';}else{}?>">
			<?php }else{ ?>
			<a href="#" class="loginclick <?php if(($file=='secrets')){echo 'selected ';}else{}?>">			
			<?php } ?>			
			<img src="http://lalanii.com/image.php?width=163&height=33&image=http://lalanii.com/images/general/button-secrets.png" width="163px" height="33px" />
			</a>
			<ul class="sub-nav">
            	<?php if(($secrets=="restricted") AND ($loggedin=='yes')){ ?>
	            <li><a href="http://lalanii.com/signup.php" class="">Sign Up!</a></li>  
                <?php } else if($secrets=='accessible') { ?>
                <li><a href="http://lalanii.com/secrets.php" class="">Secrets</a></li> 
                <?php } else if($loggedin!='yes'){ ?>
                <li><a href="http://lalanii.com/signup.php" class="">Sign Up!</a></li> 
                <?php } ?>
				<?php
				$sqlHSB="Select * from llBlog where (blogPage='secrets' or secretBlog=1) order by stickyBlog desc, blogDate desc limit 6";
				$resultHSB=mysql_query($sqlHSB);
				$numHSB=mysql_num_rows($resultHSB);
				$HSB=0;
				//echo $sqlHSB;
				while ($HSB < $numHSB) {
				$blogIDHSB=mysql_result($resultHSB,$HSB,"blogID");
				$blogTitleHSB=mysql_result($resultHSB,$HSB,"blogTitle");
				$blogdatetimes =  mysql_result($resultHSB,$HSB,"blogDate");
				
				 $currentdates = date('Y-m-d H:i:s');
							
							$datetime1s = new DateTime($blogdatetimes);
							$datetime2s = new DateTime($currentdates);
							if(($datetime1s <= $datetime2s)  OR ($isadmin=="yes") OR ($isreviewer=="yes")){
				?>
				<li><a href="http://lalanii.com/secrets<?php echo "/".$blogIDHSB."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitleHSB)); ?>" class="restricted"><?php 	echo limit_text($blogTitleHSB,7); ?></a></li>	            
				<?php
							}
							else
							{
							?>
                <li><a href="" class="calfutureblog restricted"><?php 	echo limit_text($blogTitleHSB,7); ?></a></li>	                        
                            <?php	
							}
				++$HSB;
				}
				?>
			</ul>
		</li>
		<li id="topnav5">
			<a href="http://lalanii.com/creatives.php" class="<?php if(($file=='creatives')){echo 'selected';}?>">
			<img src="http://lalanii.com/image.php?width=146&height=33&image=http://lalanii.com/images/general/button-creatives.png" width="146px" height="33px" />
			</a>
			<ul class="sub-nav">
	            <li><a href="http://lalanii.com/calendar.php">View Writing Calendar</a></li>
	            <li class="hr"></li>
	            <?php
				$sqlHCSub="select * from llSubcategory s join llCategory c on s.categoryID=c.categoryID where category='creatives' and s.secretSubcategory=0 order by s.subcategoryOrder asc";
				$resultHCSub=mysql_query($sqlHCSub);
				$numHCSub=mysql_num_rows($resultHCSub);
				$HCSub=0;
				while($HCSub<$numHCSub){					
				echo "<li><a href='http://lalanii.com/creatives.php?scid=".mysql_result($resultHCSub,$HCSub,"subcategoryID")."'>".mysql_result($resultHCSub,$HCSub,"subcategory")."</a></li>";
				++$HCSub;
				}
				?>
	            <!--li class="hr"></li>
	            <li><a href="#">Book/Movie Reviews</a></li>
	            <li><a href="#">Product/Service Reviews</a></li-->
	            <li class="hr"></li>
	            <?php
				$sqlHCB="Select * from llBlog where blogPage='creatives' and blogDate<=NOW() order by blogDate desc limit 3";
				$resultHCB=mysql_query($sqlHCB);
				$numHCB=mysql_num_rows($resultHCB);
				$HCB=0;
				while ($HCB < $numHCB) {
				$blogIDHCB=mysql_result($resultHCB,$HCB,"blogID");
				$blogTitleHCB=mysql_result($resultHCB,$HCB,"blogTitle");
				?>
				<li><a href="http://lalanii.com/creatives<?php echo "/".$blogIDHCB."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitleHCB)); ?>"><?php 	echo limit_text($blogTitleHCB,7); ?></a></li>	            
				<?php
				++$HCB;
				}
				?>
				<li class="hr"></li>
	            <?php
				$sqlHCBXXX="select * from llSubcategory s join llCategory c on s.categoryID=c.categoryID where category='creatives' and s.secretSubcategory=1 order by s.subcategoryOrder asc";
				$resultHCBXXX=mysql_query($sqlHCBXXX);
				$numHCBXXX=mysql_num_rows($resultHCBXXX);
				$HCBXXX=0;
				while ($HCBXXX < $numHCBXXX) {
				$subcategoryIDHCBXXX=mysql_result($resultHCBXXX,$HCBXXX,"subcategoryID");
				$subcategoryHCBXXX=mysql_result($resultHCBXXX,$HCBXXX,"subcategory");
				?>
				<li><a href="http://lalanii.com/creatives.php?scid=<?php echo $subcategoryIDHCBXXX; ?>" class="restricted"><?php echo $subcategoryHCBXXX;?></a></li>
				<?php
				++$HCBXXX;
				}
				?>
	        </ul>
		</li>
		<li id="topnav6">
			<a href="http://lalanii.com/hireme/contact.php" class="<?php if(($lastdir=='hireme')){echo 'selected';}?>">
			<img src="http://lalanii.com/image.php?width=109&height=33&image=http://lalanii.com/images/general/button-hireme.png" width="109px" height="33px" />
			</a>
				<?php
			  		$adds_queryner = mysql_query("Select * from llsettings ");
					$adds_resner = mysql_fetch_array($adds_queryner);
			  	?>
			<ul class="sub-nav">
<?php if($adds_resner['hiremep9'] == '1'){ ?><li><a style="color: green;font-size:17px;" target="_blank" href="https://lalaniirochelle.goherbalife.com/">Wellness Coaching</a></li><?php } ?>
<?php if($adds_resner['hiremep10'] == '1'){ ?><li><a style="color: red;font-size:17px;" target="_blank" href="http://lalanii.com/portfolio">Creative Consulting</a></li><?php } ?>
	            <?php if($adds_resner['hiremep1'] == '1'){ ?><li><a href="http://lalanii.com/hireme/contact.php">Call - Text - Email</a></li><?php } ?>
	            <?php if($adds_resner['hiremep2'] == '1'){ ?><li><a href="http://lalanii.com/hireme/appointment.php">Schedule an Appointment</a></li><?php } ?>
	            <li class="hr"></li>
                <?php if($adds_resner['hiremep3'] == '1'){ ?><li><a href="http://lalanii.com/brand_ambassador.php">Brand Ambassador</a></li><?php } ?>
	            <?php if($adds_resner['hiremep4'] == '1'){ ?><li><a href="http://lalanii.com/hireme/philosophy.php">Philosophy</a></li><?php } ?>
	            <?php if($adds_resner['hiremep5'] == '1'){ ?><li><a href="http://lalanii.com/hireme/portfolio.php">Portfolio</a></li><?php } ?>
	            <?php if($adds_resner['hiremep6'] == '1'){ ?><li><a target="_blank" href="http://lalanii.com/hireme/curriculumvitae/">Curriculum Vitae</a></li><?php } ?>
	            <li class="hr"></li>
	            <?php if($adds_resner['hiremep7'] == '1'){ ?><li><a target="_blank" href="http://creativewritingagency.com/">Work with My Agency</a></li><?php } ?>
	            <?php if($adds_resner['hiremep8'] == '1'){ ?><li><a target="_blank" href="http://www.ebay.com/usr/lalaniisboutique">Shop Lalanii's Boutique</a></li><?php } ?>



	            <!--li><a href="http://lalanii.com/hireme/walkthrough.php">Walkthrough</a></li-->
	            <!--li><a href="http://lalanii.com/hireme/testimonials.php">Testimonials</a></li-->
	        </ul>
		</li>
	</ul>
</div>