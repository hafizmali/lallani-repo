<?php include 'includes/startsession.php';?>
<html>
<head>
<title>Lalanii Rochelle | Brand Ambassador</title>
<meta name="title" content="Lalanii Rochelle | Learn More" />
<meta name="description" content="Lalanii Rochelle | Learn More" />

<?php include 'includes/tags.php';?>
<!--<script async type="text/javascript" src="http://lalanii.com/scripts/jquery-1.2.6.min.js"></script>-->



<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js">
<script async type="text/javascript" src="http://lalanii.com/hireme/wowslider/webproducer/engine1/jquery.js"></script>


<script async type="text/javascript">
/*
$( document ).ready(function() {
  //update stuff
  var sss = $( window ).width();
  
  if(sss <= 720){
	  //alert(sss);
  $("#brand_brands").show();
  $("#ambassador_brand").hide();
}
});
*/
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

    // uncomment below to pull the divs randomly
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});

</script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script async type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script async type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script async type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script async type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script> 


<style  type="text/css">

/*** set the width and height to match your images **/

div#header #social, #header #loggedin, #header #logo, #header .ticker {
  display: none;
}
#main {
  width: 88%;
}

.imagecol {
    width: 250px;
    height: auto;
    background-color: #fff;
    margin: 10px 16px;
    display: inline-block;
}

.imagecol img {
    width: 250px;
}

#slideshow {
    position:relative;
    height:550px;
	background-color:#fff;
	text-align:center;
	margin:0 auto;
	
}

#slideshow DIV {
    position:absolute;
    background-color:#fff;
    z-index:8;
    opacity:0.0;
    height: 550px;
    width:100%;
	text-align:center;
	margin:0 auto;
}

#slideshow DIV.active {
    z-index:9;
    opacity:1.0;
}

#slideshow DIV.last-active {
    z-index:0;
}

#slideshow DIV IMG {
    height: 546px;
    display: block;
    border:2px solid gray;
    text-align:center;
	margin:0 auto;
	max-width:100%;
	
}
#brand_brands {display:none;}

@media all and (max-width:720px)
{
	#ambassador_brand , #brand_brand {display:none;}
	#brand_brands {display:block;}
}

</style>
</head>
<body id="brands">
<div id="main">
	<?php include 'includes/includes.php';?>
	<div id="content">

<div id="first_brandsec">
    <div class="ttsections" id="heading_left">
        <h1 id="fashion_brand">Fashion</h1>
        <h1 id="beauty_brand">Beauty</h1>
        <h1 id="blogger_brand">Blogger</h1>
        <h1 id="brand_brands">Brands</h1>
        <h1 id="brand_brand">Brand</h1>
        <h1 id="ambassador_brand">Ambassador</h1>        
        <h2 id="email_brand">For booking email: editors@lalanii.com</h2>
    </div>
    <div class="ttsections" id="slider_right">
        
        <div id="slideshow">
        
                <?php
                $sliderloop = 0;
                $sqlMainIMG="Select * from llbrandAdminimage where image != '' order by orderno desc";
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
        <a href="javascript:void(window.open('http://lalanii.com/includes/brandslidermanager.php','adminimgeditor','width=650,height=480,top=100,left=100'))" class="next">edit slider images</a>
        <?php } ?>
        
        
    </div>
</div>	

<div id="gallery_sec" style="margin-bottom:70px;">
	
	
			<?php
			$sliderloop = 0;
			$sqlMainIMG="Select * from llGalleryAdminimage where image != '' order by orderno desc";
					$resultMainIMG=mysql_query($sqlMainIMG);
					$numMainIMG=mysql_num_rows($resultMainIMG);
					$IMGM=0;
					while ($IMGM < $numMainIMG) {
					$mainimageID=mysql_result($resultMainIMG,$IMGM,"imageID");
					$mainimage=mysql_result($resultMainIMG,$IMGM,"image");
					$mainimagelink=mysql_result($resultMainIMG,$IMGM,"imagelink");
					$sliderloop = $sliderloop + 1;
					?>
                    <div class="imagecol">
					<a title="<?php echo $mainimagelink; ?>" class="fancybox-button" rel="fancybox-button" href="http://lalanii.com/images/admin/<? echo $mainimage; ?>">
						<img alt="" width="300" src="http://lalanii.com/images/admin/<? echo $mainimage; ?>">
					</a>
                    </div>
					<?php
					++$IMGM;
					}?>					
	
</div>
 <?php if($isadmin=="yes"){?>
        <a href="javascript:void(window.open('http://lalanii.com/includes/galleryslidermanager.php','adminimgeditor','width=650,height=480,top=100,left=100'))" class="next">edit Gallery images</a>
        <?php } ?> 

  
   
<script>

$(document).ready(function() {
	$(".fancybox-button").fancybox({
		prevEffect		: 'none',
		nextEffect		: 'none',
		closeBtn		: true,
		helpers		: {
			title	: { type : 'inside' },
			buttons	: {}
		}
	});
});
</script>
		
		

	</div>
<?php include 'includes/footer.php';?>
</div>
</body>
</html>
<?php  //include 'includes/scripts.php';?>

<script async type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<!-- Add fancyBox -->
<link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script async type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script async type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script async type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script async type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script> 