<?php if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start(); ?>
<?php include 'includes/startsession.php';?>
<html>
<head>
<title>Lalanii Rochelle</title>
<meta name="title" content="Lalanii Rochelle" />
<meta name="description" content="Mean as a cupcake." />
<!--<script type="text/javascript" src="http://lalanii.com/scripts/jquery-1.2.6.min.js"></script>-->
<?php include 'includes/tags.php';?>
<script async type="text/javascript">
function slideSwitch() {
    var $active = $('#slideshow DIV.active');
    if ( $active.length == 0 ) $active = $('#slideshow DIV:last');
    // use this to pull the divs in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow DIV:first');    
    $active.addClass('last-active');
    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}
function slideSwitcher() {
    var $active = $('#slideshower DIV.active');
    if ( $active.length == 0 ) $active = $('#slideshower DIV:last');
    // use this to pull the divs in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshower DIV:first');    
    $active.addClass('last-active');
    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 0.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}
$(function() {
    setInterval( "slideSwitch()", 5000 );
	setInterval( "slideSwitcher()", 5000 );
});
</script>
</head>
<body>
<div id="main">	
	<?php 
	//include 'includes/includes.php';
	?>
	<?php
		$domain = $_SERVER['HTTP_HOST'];
		$url = "http://" . $domain . $_SERVER['REQUEST_URI'];
		$dirs = explode('/', $_SERVER['REQUEST_URI']);
		$lastdir=$dirs[sizeof($dirs)-2];
		if ($lastdir=='hireme'){
			$rootpath="../includes/";
			}else{
			$rootpath="includes/";
			}	
		include $rootpath.'database.php';
		include $rootpath.'validation.php';
		include $rootpath.'header.php';
		if ($file!=="signup"){include $rootpath.'loginform.php';}
	?>
	<div id="slideshow">
			<?php
			$sliderloop = 0;
			$sqlMainIMG="Select * from llAdminimage where image like '%mainlanding%' order by imageID desc";
					$resultMainIMG=mysql_query($sqlMainIMG);
					$numMainIMG=mysql_num_rows($resultMainIMG);
					$IMGM=0;
					while ($IMGM < $numMainIMG) {
					$mainimageID=mysql_result($resultMainIMG,$IMGM,"imageID");
					$mainimage=mysql_result($resultMainIMG,$IMGM,"image");
					$mainimagelink=mysql_result($resultMainIMG,$IMGM,"imagelink");
					$sliderloop = $sliderloop + 1;
					?>
                     <div <?php if($sliderloop == 1){ ?> class="active" <?php } ?> >
					<a href="<?php echo $mainimagelink; ?>">
						<img src="http://lalanii.com/images/admin/<? echo $mainimage; ?>">
					</a>
                    </div>
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
			$thissundaysdate=date('m/d/Y', strtotime("last Sunday"));
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
			<li class="<?php echo $UBclass; ?>"><a href="http://lalanii.com/calendar.php?month=<?php echo date('n',strtotime($upblogDate)); ?>&year=<?php echo date('Y',strtotime($upblogDate)); ?>">
				<?php 
				if($UBD==1){echo '<img src="http://lalanii.com/image.php?width=97&height=33&image=http://lalanii.com/images/general/monday.jpg" width="97px" height="33px" />';}
				if($UBD==2){echo '<img src="http://lalanii.com/image.php?width=113&height=33&image=http://lalanii.com/images/general/tuesday.jpg" width="113px" height="33px" />';}
				if($UBD==3){echo '<img src="http://lalanii.com/image.php?width=144&height=33&image=http://lalanii.com/images/general/wednesday.jpg" width="144px" height="33px" />';}
				if($UBD==4){echo '<img src="http://lalanii.com/image.php?width=129&height=33&image=http://lalanii.com/images/general/thursday.jpg" width="129px" height="33px" />';}
				if($UBD==5){echo '<img src="http://lalanii.com/image.php?width=97&height=33&image=http://lalanii.com/images/general/friday.jpg" width="97px" height="33px" />';}
				if($UBD==6){echo '<img src="http://lalanii.com/image.php?width=128&height=33&image=http://lalanii.com/images/general/saturday.jpg" width="128px" height="33px" />';}
				if($UBD==7){echo '<img src="http://lalanii.com/image.php?width=96&height=33&image=http://lalanii.com/images/general/sunday.jpg" width="96px" height="33px" />';}
				?>
				<h2><?php 
					echo date('n/j/Y',strtotime($upblogDate))." ";
					echo limit_text($UBtitle,6); 
				?></h2>
				<span><?php echo limit_text($UBdetail,8); ?></span>
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
				<script async>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
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
            <div id="rightsec_slider">
            	<div id="slideshower">        
                <?php
                $sliderlooper = 0;
                $sqlMainIMG="Select * from llGalleryAdminimage where image != '' order by orderno asc  ";
                        $resultMainIMG=mysql_query($sqlMainIMG);
                        $numMainIMG=mysql_num_rows($resultMainIMG);
                        $IMGM=0;
                        while ($IMGM < $numMainIMG) {
                        $mainimageID=mysql_result($resultMainIMG,$IMGM,"imageID");
                        $mainimage=mysql_result($resultMainIMG,$IMGM,"image");
                        $mainimagelink=mysql_result($resultMainIMG,$IMGM,"imagelink");
                        $sliderlooper = $sliderlooper + 1;
                        ?>
                         <div <?php if($sliderlooper == 1){ ?> class="active" <?php } ?> >
                        <a href="http://lalanii.com/brand_ambassador.php">
                            <img src="http://lalanii.com/image.php?width=164&height=102&image=http://lalanii.com/images/admin/<? echo $mainimage; ?>">
                        </a>
                        </div>
                        <?php
                        ++$IMGM;
                        }?>					
        		</div>
                <div>
                	<form action="http://lalanii.com/search.php" method="post" id="search_frm">
                    	<input type="text" name="search" placeholder="SEARCH WEBSITE NOW" id="search_btn">
                        <input type="submit">
                    </form>
                </div>
            </div>
			<div class="adsense">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Lalanii9 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:275px;height:250px"
     data-ad-client="ca-pub-1639271168029167"
     data-ad-slot="5640958133"></ins>
<script async="">
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<!-- Lalanii4 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:275px;height:250px"
     data-ad-client="ca-pub-1639271168029167"
     data-ad-slot="5780558937"></ins>
<script async>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<!-- Lalanii5 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:275px;height:250px"
     data-ad-client="ca-pub-1639271168029167"
     data-ad-slot="7257292131"></ins>
<script async>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<!-- Lalanii7 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:275px;height:250px"
     data-ad-client="ca-pub-1639271168029167"
     data-ad-slot="1210758531"></ins>
<script async>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Lalanii8 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:275px;height:250px"
     data-ad-client="ca-pub-1639271168029167"
     data-ad-slot="4164224936"></ins>
<script async>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
			</div>
		</div>
	</div>
	<div id="subscribepen"><a href="signup.php" class=""><img src="http://lalanii.com/image.php?width=380&height=33&image=http://lalanii.com/images/general/subscribe.jpg" width="380px" height="33px" /></a></div>
	
<div id="copy" <?php if($viewingadmin=='yes'){echo "style='display:none;'";}?>>Copyright 2007-2015 @Lalanii.com. All Rights Reserved. <a href="http://lalanii.com/termsconditions.php" target="_blank">Terms & Conditions</a>. <span <?php if ($file=='disclaimer'){echo "style='display:none;'";} ?>><a href="http://lalanii.com/disclaimer.php" target="_blank">Typo Hoe Disclaimer</a>.</span></div>
<div id="footer"><a href="#" class="scrollToTop">up up and away!</a></div>
<?php
if ($loggedin !== "yes") {
?>
<script type="text/javascript">
$(document).ready(function(){
	setTimeout(function() { newpop() },15000); 
	setTimeout(function() { popuper() },55000); 
	$("#ppclose").on("click", function() {
		setTimeout(popuper, 1000, 600000);
	});
});
function newpop() {
	$('#overlay-back').fadeIn(500,function(){
            $('#firstpop').show();
         });
         $(".close-image").on('click', function() {
            $('#firstpop').hide();
            $('#overlay-back').fadeOut(500);
         });
	}
function popuper(timima){
//	$('#popup').delay(7000).fadeIn(400);
//alert(timima);
//clearInterval
if(timima != null)
{	
	var timim = timima; 
	jQuery('#popup').delay( timim ).fadeIn(400);		
}
else { var timim = 120000; jQuery('#popup').delay( timim ).fadeIn(400);	 }

	//var intervalID = window.setInterval(function(timeim){		
			//jQuery('#popup').fadeIn(400);			
	//}, timeim);	 //120000
	
	

	
}



</script>

<?
}
?>

<div id="popup" style="display:none;">
	<div id="popupbackground"></div>
	<div id="popupcontent">
		<ul id="popupboxes">
			<li class="lightblue" id="followbox">
				<h1 class="lightbluebg impactLabel">connect</h1>				
				<h2>Follow Lalanii Rochelle on Social!</h2>
				<?php include "follow.php"; ?>
				<a class="impactLabel lightblue" href="http://lalanii.com/hireme/contact.php">Hire Lalanii Rochelle!</a>
				<h3>Need blogs? Advertisements?</h3><h3>A consultation? Social Media?</h3>
			</li>
			<li class="orange" id="learnmorebox">
				<h1 class="orangebg impactLabel">learn more</h1>
				<h2>Lalanii R. Grant, MFA.</h2>
				<p>Author, journalist, advertising consultant and online personality.
				She's opinionated about self-un-help and all things creative.</p>
			</li>
			<li class="pink" id="subscribebox">
				<h1 class="pinkbg impactLabel">subscribe</h1>
				<p>Sexy fashionable semi-nudes, self-un-help blogs, Dear Layla dating and life, secrets.</p>
				<h2>Subscribe to premium membership:</h2>
				
			</li>
		</ul>
		<ul id="popupbuttons">
			<li><a href="http://lalanii.com/hireme/contact.php" class="lightbluebg impactLabel">Get me a quote!</a></li>
			<li><a href="http://lalanii.com/learnmore.php" class="orangebg impactLabel">Learn more!</a></li>
			<li><a href="http://creativewritingagency.com/lalanii/subscribe.php" class="impactLabel pinkbg">Ok, let's do this!</a></li>
		</ul>
		<!--div id="popupbar">
			<a href="http://lalanii.com/learnmore.php" class="blue pink left">learn more</a>
			<a href="" class="blue loginclick right">ok, lets do this</a>
		</div-->
		<a href="" id="ppclose" class="close">x</a>
	</div>
</div>
<style>
div#placement-bottom {
    display: none !important;
}
</style>
<!-- Quantcast Tag -->
<script async="async" type="text/javascript">
var _qevents = _qevents || [];

(function() {
var elem = document.createElement('script');
elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
elem.async = true;
elem.type = "text/javascript";
var scpt = document.getElementsByTagName('script')[0];
scpt.parentNode.insertBefore(elem, scpt);
})();

_qevents.push({
qacct:"p-3Hzs_37KgHBCU"
});
</script>

<noscript>
<div style="display:none;">
<img src="//pixel.quantserve.com/pixel/p-3Hzs_37KgHBCU.gif" border="0" height="1" width="1" alt="Quantcast"/>
</div>
</noscript>
<!-- End Quantcast tag -->
    <!-- <script async type="text/javascript" src="http://lalanii.com/scripts/jquery-1.2.6.min.js"></script> -->
	<?php 
	include 'includes/scripts.php';
	?>
<div id="overlay-back"></div>
<div id="firstpop">
	<img class="close-image" src="images/xxbtn.png" />
	<div id="fpfirst">Sign Up  For Free Emails</div>
    <div id="fptwo">Monthly Giveaways, Tips, <br />& Premium Membership to all things creative. </div>
    <a id="fplink" href="http://creativewritingagency.com/lalanii/subscribe.php">click here</a>
    <div id="fpthree"><span>FASHION, RELATIONSHIP, & LIFESTYLE BLOGGER.</span></div>
</div>    
</div>
</body>
</html>