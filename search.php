<?php include 'includes/startsession.php';?>
<html>
<head>
<title>Lalanii Rochelle</title>
<meta name="title" content="Lalanii Rochelle" />
<meta name="description" content="Mean as a cupcake." />
<!--<script type="text/javascript" src="http://lalanii.com/scripts/jquery-1.2.6.min.js"></script>-->

<?php include 'includes/tags.php';?>
<script async type="text/javascript">
/*
//alert(sessionStorage.getItem('starOnce'));
jQuery(document).ready(function() {
	if (sessionStorage.getItem('starOnce') == 'true') {	
    	jQuery( "div" ).removeClass( "startloader" )
	}
});
jQuery(window).load(function() {
	jQuery(".startloader").fadeOut("slow");
	sessionStorage.setItem('starOnce','true');
});

*/


</script>


<script async="" type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

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
</script>

<style type="text/css">

/*** set the width and height to match your images **/

/*
.html5gallery-car-0 { display:none !important; }
.html5gallery { height:354px !important; }
*/
.html5gallery-elem-0 {
    border: 0 !important;
    box-shadow: none !important;
}
.html5gallery-toolbox-0 { display:block !important; }


</style>

<!--<script async="" type="text/javascript" src="http://lalanii.com/scripts/jquery-1.2.6.min.js"></script>-->
<script type="text/javascript" src="http://lalanii.com/html5gallery/jquery.js"></script>



<script type="text/javascript" src="http://lalanii.com/html5gallery/html5gallery.js"></script>
<script language="JavaScript">


function timecheckers()
{
	//html5GalleryObjects.objects[0].isPaused = false;
	//alert(html5GalleryObjects.objects[0].paused);

	var chkstatus = jQuery(".html5gallery video").get(0).paused;
	//alert(chkstatus);
	if(chkstatus == true)
	{
		//alert('hi');
		html5GalleryObjects.objects[0].isPaused = false;
		html5GalleryObjects.objects[0].slideRun(1, true, true);
	}
}

   function onVideoEnd(data) {
//alert("abc");
var id = data[0];
html5GalleryObjects.objects[0].isPaused = false;
html5GalleryObjects.objects[0].slideRun(id, true, true);
}
</script>
</head>
<body>
<!--<div class="startloader"></div>-->
<div id="main">	
	<?php include 'includes/includes.php';?>


<div style="text-align:center;min-height:454px;">

    <!-- Define the Div for Gallery data-onvideoend="onVideoEnd" -->
    <!-- 1. Add class html5gallery to the Div -->
    <!-- 2. Define parameters with HTML5 data tags http://speed.lalanii.com/html5_gallery_free/html5gallery/html5gallery.js  data-onvideoend="onVideoEnd()"  -->
	<div style="display:none;margin:0 auto;" class="html5gallery" data-onvideoend="onVideoEnd" data-autoslide="true" data-autoplayvideo="true" data-onchange="onSlideChange" data-onthumbclick="onThumbClick"  data-skin="gallery" data-responsive="true" data-resizemode="fill" data-html5player="true"   data-width="800" data-height="332" data-effect="fadeout" data-shownumbering="true" >

<!--<a href="http://lalanii.com/images/admin/Mainlanding120.jpg"><img src="http://lalanii.com/images/admin/Mainlanding120.jpg"></a>-->
<?php
$getvideo = mysql_query("Select * from llvideos where video_path != '' and video_status = 'true' ");
while($thisvideo = mysql_fetch_array($getvideo))
{
?>
<a id="nthvideos" autoplayvideo="true" data-onvideoend="onVideoEnd" href="<?php echo $thisvideo['video_path']; ?>" ><img src="http://lalanii.com/images/admin/Mainlanding120.jpg" alt="<?php echo $thisvideo['video_title']; ?>"></a>
			
        	<?php
}
			$sliderloop = 0;
			$sqlMainIMG="Select * from llAdminimage where image like '%mainlanding%' order by orderno desc";
					$resultMainIMG=mysql_query($sqlMainIMG);
					$numMainIMG=mysql_num_rows($resultMainIMG);
					$IMGM=0;
					while ($IMGM < $numMainIMG) {
					$mainimageID=mysql_result($resultMainIMG,$IMGM,"imageID");
					$mainimage=mysql_result($resultMainIMG,$IMGM,"image");
					$mainimagelink=mysql_result($resultMainIMG,$IMGM,"imagelink");
					$mainimagetitle=mysql_result($resultMainIMG,$IMGM,"imagetitle");
					$sliderloop = $sliderloop + 1;
//if($mainimage != ''){
					?>
                     
					<a href="http://lalanii.com/images/admin/<? echo $mainimage; ?>"  data-link="<?php echo $mainimagelink; ?>">
						<img alt="<?php echo $mainimagetitle; ?>" src="http://lalanii.com/images/admin/<? echo $mainimage; ?>">
					</a>
                    
					<?php
//}
					++$IMGM;
					}?>			
        
	    
		
	
	</div>

</div>






	<?php if($isadmin=="yes"){?>
	<a href="javascript:void(window.open('http://lalanii.com/includes/adminimagemanager.php','adminimgeditor','width=650,height=480,top=100,left=100'))" class="next">edit administrative images</a>
	<?php } ?>

	<?php include 'includes/bubbles.php'; ?>



	<?php
	$product_query = mysql_query("Select * from llproducts where home_prod_id = '1'");
	$prod_res = mysql_fetch_array($product_query);
	if($prod_res['calenderd'] == 1){
	?>

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
				<a class="twitter-timeline" width="250px"	height="310"
				href="https://twitter.com/lalanii"
				data-widget-id="386217375818711040">Tweets by @lalanii</a>
				<script async>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
		</div>
	</div>
	<?php } else { ?>
<div id="upcoming">
		<div id="prod_sections" style="    background-color: <?php echo $prod_res['prod_color']; ?>;">
		<a href="<?php if($prod_res['prod_click'] == 0){ echo $prod_res['prod_click_url']; }else { echo "http://lalanii.com/subscribe2.php?get_product=true"; } ?>">
			<div id="prod_main_title"><?php echo $prod_res['prod_title']; ?></div>
			<?php if($prod_res['prod_name'] != ''){ ?><div id="prod_name"><?php echo $prod_res['prod_name']; ?></div><?php } ?>
			<img src="http://lalanii.com/images/adds/<?php echo $prod_res['prod_img']; ?>">
		</a>
		
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


		</div></div>
	<?php } ?>
	<div id="homebottom">
		<div id="blogfeed"><?php include 'includes/bloghomesearch.php'; ?></div>
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

<?php
  	$adds_query = mysql_query("Select * from footer_adds");
	$adds_res = mysql_fetch_array($adds_query);
  ?>

<div class="side_add_sec" onclick="return adds_detail('home_sidebar_1','custom_add');"><?php if($adds_res['sidebar_add_one'] != ''){ echo trim($adds_res['sidebar_add_one']); }else if($adds_res['sidebar_add_one_link'] != '') { ?><a href="<?php echo trim($adds_res['sidebar_add_one_link']); ?>"><img src="<?php echo "http://lalanii.com/images/adds/".trim($adds_res['sidebar_add_one_img']); ?>"></a><?php } ?></div>
<div class="side_add_sec" onclick="return adds_detail('home_sidebar_2','custom_add');"><?php if($adds_res['sidebar_add_two'] != ''){ echo trim($adds_res['sidebar_add_two']); }else if($adds_res['sidebar_add_two_link'] != '') { ?><a href="<?php echo trim($adds_res['sidebar_add_two_link']); ?>"><img src="<?php echo "http://lalanii.com/images/adds/".trim($adds_res['sidebar_add_two_img']); ?>"></a><?php } ?></div>
<div class="side_add_sec" onclick="return adds_detail('home_sidebar_3','custom_add');"><?php if($adds_res['sidebar_add_three'] != ''){ echo trim($adds_res['sidebar_add_three']); }else if($adds_res['sidebar_add_three_link'] != '') { ?><a href="<?php echo trim($adds_res['sidebar_add_three_link']); ?>"><img src="<?php echo "http://lalanii.com/images/adds/".trim($adds_res['sidebar_add_three_img']); ?>"></a><?php } ?></div>
<div class="side_add_sec" onclick="return adds_detail('home_sidebar_4','custom_add');"><?php if($adds_res['sidebar_add_four'] != ''){ echo trim($adds_res['sidebar_add_four']); }else if($adds_res['sidebar_add_four_link'] != '') { ?><a href="<?php echo trim($adds_res['sidebar_add_four_link']); ?>"><img src="<?php echo "http://lalanii.com/images/adds/".trim($adds_res['sidebar_add_four_img']); ?>"></a><?php } ?></div>
<div class="side_add_sec" onclick="return adds_detail('home_sidebar_5','custom_add');"><?php if($adds_res['sidebar_add_five'] != ''){ echo trim($adds_res['sidebar_add_five']); }else if($adds_res['sidebar_add_five_link'] != '') { ?><a href="<?php echo trim($adds_res['sidebar_add_five_link']); ?>"><img src="<?php echo "http://lalanii.com/images/adds/".trim($adds_res['sidebar_add_five_img']); ?>"></a><?php } ?></div>




			</div>
            
		</div>
		
	</div>
	<div id="subscribepen"><a href="signup.php" class=""><img src="http://lalanii.com/image.php?width=380&height=33&image=http://lalanii.com/images/general/subscribe.jpg" width="380px" height="33px" /></a></div>

<div class="bottom_ncols">
<?php
  	$adds_query = mysql_query("Select * from footer_adds");
	$adds_res = mysql_fetch_array($adds_query);
  ?>
	<div class="botnth" onclick="return adds_detail('home_footer_left','custom_add');"><?php if($adds_res['home_add_one'] != ''){ echo trim($adds_res['home_add_one']); }else { ?><a href="<?php echo trim($adds_res['home_add_one_link']); ?>"><img src="<?php echo "http://lalanii.com/images/adds/".trim($adds_res['home_add_one_img']); ?>"></a><?php } ?></div>
	<div class="botnth midss" onclick="return adds_detail('home_footer_center','custom_add');"><?php if($adds_res['home_add_two'] != ''){ echo trim($adds_res['home_add_two']); }else { ?><a href="<?php echo trim($adds_res['home_add_two_link']); ?>"><img src="<?php echo "http://lalanii.com/images/adds/".trim($adds_res['home_add_two_img']); ?>"></a><?php } ?></div>
	<div class="botnth" onclick="return adds_detail('home_footer_right','custom_add');"><?php if($adds_res['home_add_three'] != ''){ echo trim($adds_res['home_add_three']); }else { ?><a href="<?php echo trim($adds_res['home_add_three_link']); ?>"><img src="<?php echo "http://lalanii.com/images/adds/".trim($adds_res['home_add_three_img']); ?>"></a><?php } ?></div>
</div>  


	<?php include 'includes/footer.php';?>
    <!--<script async type="text/javascript" src="http://lalanii.com/scripts/jquery-1.2.6.min.js"></script>-->
	<?php include 'includes/scripts.php';?>





<script src="http://lalanii.com/scripts/jquery.iframetracker.js"></script>
<script>


jQuery(document).ready(function($){
    $('.side_add_sec iframe').iframeTracker({
        blurCallback: function(){
           		
			adds_detail('home_sidebar','google_add');

        }
    });
});
</script>



</body>
</html>