<div id="copy" <?php if($viewingadmin=='yes'){echo "style='display:none;'";}?>>Copyright 2007-2019 @Lalanii.com. All Rights Reserved. <a href="http://lalanii.com/termsconditions.php" target="_blank">Terms & Conditions</a>. <span <?php if ($file=='disclaimer'){echo "style='display:none;'";} ?>><a href="http://lalanii.com/disclaimer.php" target="_blank">Typo Hoe Disclaimer</a>.</span></div>
<div id="footer"><a href="#" class="scrollToTop">up up and away!</a></div>

<?php
if ($loggedin !== "yes") {
$n_popup_home = mysql_query("Select * from llsettings");
$n_popup_h_res = mysql_fetch_array($n_popup_home);
?>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript">
/*$(function() {
   popup();
})*/



$(document).ready(function(){
	
	
	//setTimeout(newpop(), 15000);	
	//setTimeout(function() { newpop() },150000); 
 
	setTimeout(function() { newpop() },<?php echo $n_popup_h_res['home_popup']; ?>);


	//setTimeout(popuper, 55000);
	setTimeout(function() { popuper() },55000); 
	$("#ppclose").on("click", function() {
		//alert('testing');
		setTimeout(popuper, 1000, 800000);
	});

});




function newpop() {
	$('#overlay-back').fadeIn(500,function(){
            $('#firstpop').show();
         });
 
         $("#closepdfPopup").on('click', function() {
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

<?php
	$end_popup= @mysql_query("SELECT pstatus FROM ebookpopup WHERE id = 362");
	$end_popup_r = @mysql_fetch_array($end_popup);
	$pstatus = $end_popup_r['pstatus'];
if($pstatus == 1){
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
<?php } ?>
<style>
div#placement-bottom {
    display: none !important;
}
</style>
<!-- Quantcast Tag -->
<script type="text/javascript">
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
<div id="calfuturenotice" class="calfuturenoter" style="display:none;">Err... Oops! That blog is not available yet! Check back later!<br><br><a class="delete">close message</a></div>

<?php @include 'firstpopup.php';?>



<!--<script type="text/javascript">
  var vglnk = { key: '4e78a3d285fc38eff009ace2fae04012' };

  (function(d, t) {
    var s = d.createElement(t); s.type = 'text/javascript'; s.async = true;
    s.src = '//cdn.viglink.com/api/vglnk.js';
    var r = d.getElementsByTagName(t)[0]; r.parentNode.insertBefore(s, r);
  }(document, 'script'));
</script>--> 