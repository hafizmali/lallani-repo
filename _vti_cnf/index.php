<?php include 'includes/startsession.php';?>
<html>
<head>
<title>Lalanii Rochelle</title>
<meta name="title" content="Lalanii Rochelle" />
<meta name="description" content="Mean as a cupcake." />
<?php include 'includes/tags.php';?>
</head>
<body>
<div id="main">	
	<?php include 'includes/includes.php';?>
	<div id="mainlandingimg">
	<span class="landingplaceholder"></span>
			<?php
			$sqlMainIMG="Select * from llAdminimage where image like '%mainlanding%' order by image asc";
					$resultMainIMG=mysql_query($sqlMainIMG);
					$numMainIMG=mysql_num_rows($resultMainIMG);
					$IMGM=0;
					while ($IMGM < $numMainIMG) {
					$mainimageID=mysql_result($resultMainIMG,$IMGM,"imageID");
					$mainimage=mysql_result($resultMainIMG,$IMGM,"image");
					$mainimagelink=mysql_result($resultMainIMG,$IMGM,"imagelink");
					?>
					<a href="<?php echo $mainimagelink; ?>"><span class="landingimgs" imgvalue="http://lalanii.com/images/admin/<? echo $mainimage; ?>"></span></a>
					<?php
					++$IMGM;
					}?>					
	</div>
	<?php if($isadmin=="yes"){?>
	<a href="javascript:void(window.open('http://lalanii.com/includes/adminimagemanager.php','adminimgeditor','width=650,height=480,top=100,left=100'))" class="next">edit administrative images</a>
	<?php } ?>
	<?php include 'includes/bubbles.php'; ?>
	<div id="upcominghead">
		<?php
		if (date('m')==01){$mtwidth="320px";}
		if (date('m')==02){$mtwidth="320px";}
		if (date('m')==03){$mtwidth="250px";}
		if (date('m')==04){$mtwidth="220px";}
		if (date('m')==05){$mtwidth="170px";}
		if (date('m')==06){$mtwidth="200px";}
		if (date('m')==07){$mtwidth="190px";}
		if (date('m')==08){$mtwidth="270px";}
		if (date('m')==09){$mtwidth="370px";}
		if (date('m')==10){$mtwidth="280px";}
		if (date('m')==11){$mtwidth="344px";}
		if (date('m')==12){$mtwidth="330px";}
		?>
		<img id="monthtext" src="images/general/Month<?php echo date('F');?>.png" width="<?php echo $mtwidth; ?>" height="120px" /><img id="upcomingtext" src="images/general/upcoming.png" width="433px" height="63px" />
	</div>
	<div id="upcoming">
		<ul id="upcomingweek">
			<?php
			$thissundaysdate=date('m/d/Y', strtotime("next Sunday"));
			$UBD=1;
			while ($UBD<8){
			$upblogDate = date('Y-m-d',strtotime($thissundaysdate . "+".$UBD." days"));
			$upblogSQL="select blogDetail,blogTitle,blogID from llBlog WHERE date(blogDate) = '".$upblogDate."' limit 1";
			$UBresult=mysql_query($upblogSQL);
			$numUB=mysql_num_rows($UBresult);
			if($numUB==1){
			$UBtitle=mysql_result($UBresult,0,"blogTitle");
			$UBID=mysql_result($UBresult,0,"blogID");
			$UBdetail=substr(strip_tags(mysql_result($UBresult,0,"blogDetail")),0,75)."...";
			}else{
			$UBtitle="";
			$UBID="";
			$UBdetail="";				
			}
			if ($UBD<6){$UBclass="regular";}else{$UBclass="shake shake-slow";}
			?>
			<li class="<?php echo $UBclass; ?>"><a href="http://lalanii.com/calendar.php">
				<?php 
				if($UBD==1){echo '<img src="images/general/monday.jpg" width="97px" height="33px" />';}
				if($UBD==2){echo '<img src="images/general/tuesday.jpg" width="113px" height="33px" />';}
				if($UBD==3){echo '<img src="images/general/wednesday.jpg" width="144px" height="33px" />';}
				if($UBD==4){echo '<img src="images/general/thursday.jpg" width="129px" height="33px" />';}
				if($UBD==5){echo '<img src="images/general/friday.jpg" width="97px" height="33px" />';}
				if($UBD==6){echo '<img src="images/general/saturday.jpg" width="128px" height="33px" />';}
				if($UBD==7){echo '<img src="images/general/sunday.jpg" width="96px" height="33px" />';}
				?>
				<h2><?php 
					echo date('n/j/Y',strtotime($upblogDate))." ";
					echo $UBtitle; 
				?></h2>
				<span><?php echo $UBdetail; ?></span>
			</a></li>
			
			<?php
			$UBD++;
			}
			?>
		</ul>
			

		<div id="latesttweets">
			<img src="http://lalanii.com/images/general/LatestTweets.png" width="226px" height="400px" />
			<div id="twitterfeed">
				<a class="twitter-timeline"
				width="250px"
				height="310"
				href="https://twitter.com/lalanii"
				data-widget-id="386217375818711040">Tweets by @lalanii</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
		</div>
	</div>
	<div id="homebottom">
		<div id="blogfeed"><?php include 'includes/bloghome.php'; ?></div>
		<div id="homeright">
			<a href="subscribe.php" class=""><img src="http://lalanii.com/images/general/button-signup.png" width="355px" height="204px" /></a>
			<div id="related">
			<h2><img class="shake shake-slow shake-constant" src="http://lalanii.com/images/general/secret.png" width="94px" height="31px" /> Sneak Peeks</h2>
			</div>
			<div id="blogpeeks"><?php include 'includes/blogpeek.php';?></div>
			<div id="exploretopics">
			<h2>Stalk by Topic</h2>
			<ul>
				<?php
					$sqlTOP="Select * from llTopic order by topic asc";
					$resultTOP=mysql_query($sqlTOP);
					$numTOP=mysql_num_rows($resultTOP);
					$TOP=0;
					while ($TOP < $numTOP) {
					$topicID=mysql_result($resultTOP,$TOP,"topicID");
					$topic=mysql_result($resultTOP,$TOP,"topic");
					$secrettopic=mysql_result($resultTOP,$TOP,"secrettopic");
					if ($secrettopic==1){$litopicclass='stalksecret';$topicclass='redbg';$topicpage="secrets";}else{$topicclass='pinkbg';$topicpage="blogs";}
					?>
					
					<li class="<?php echo $litopicclass; ?>"><a class="<?php echo $topicclass; ?>" href="http://lalanii.com/<?php echo $topicpage; ?>.php?tid=<? echo $topicID; ?>" value="<? echo $topicID; ?>" /><? echo $topic; ?></a></li>
					<?php
					++$TOP;
					}
				?>
			</ul>
			</div>
			<br><br>
			<div class="adsense">
				<!-- <script async src="http://lalanii.com/scripts/adsbygoogle.js"></script> -->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Lalanii9 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:275px;height:250px"
     data-ad-client="ca-pub-1639271168029167"
     data-ad-slot="5640958133"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<!-- Lalanii4 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:275px;height:250px"
     data-ad-client="ca-pub-1639271168029167"
     data-ad-slot="5780558937"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<!-- Lalanii5 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:275px;height:250px"
     data-ad-client="ca-pub-1639271168029167"
     data-ad-slot="7257292131"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<!-- Lalanii7 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:275px;height:250px"
     data-ad-client="ca-pub-1639271168029167"
     data-ad-slot="1210758531"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Lalanii8 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:275px;height:250px"
     data-ad-client="ca-pub-1639271168029167"
     data-ad-slot="4164224936"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
			</div>
		</div>
		
	</div>
	<div id="subscribepen"><a href="signup.php" class=""><img src="http://lalanii.com/images/general/subscribe.jpg" width="380px" height="33px" /></a></div>
	<?php include 'includes/footer.php';?>
	<?php include 'includes/scripts.php';?>
	<script>
// Make sure $ is still short for jQuery
$(function() {
  $("li.blogimage a img").lazyload();
});
</script>
</div>
</body>
</html>