<!---- Emiojis Code --------->

 <link rel="stylesheet" href="http://lalanii.com/emojione-master/assets/css/emojione.min.css" type="text/css" media="all" />

  <!-- jQuery: -->
  <!--<script src="http://cdn.jsdelivr.net/jquery/2.1.4/jquery.min.js"></script>-->
  

 
  <!-- Typekit: -->
  <script type="text/javascript" src="http://use.typekit.net/ivu8ilu.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

  <!-- Syntax Highlighting -->
  <script type="text/javascript" src="http://lalanii.com/emojione-master/demos/scripts/shCore.js"></script>
  <script type="text/javascript" src="http://lalanii.com/emojione-master/demos/scripts/shBrushXml.js"></script>
  <script type="text/javascript" src="http://lalanii.com/emojione-master/demos/scripts/shBrushJScript.js"></script>
  <script type="text/javascript" src="http://lalanii.com/emojione-master/demos/scripts/shBrushCss.js"></script>
  <script type="text/javascript" src="http://lalanii.com/emojione-master/demos/scripts/shBrushPhp.js"></script>
  <script type="text/javascript">SyntaxHighlighter.all();</script>
  <link rel="stylesheet" href="http://lalanii.com/emojione-master/demos/styles/shCoreRDark.css"/>

  <!-- Emoji One JS -->

  <script src="http://lalanii.com/emojione-master/lib/js/emojione.js"></script>

  <script type="text/javascript">
    // #################################################
    // # Optional

    // default is PNG but you may also use SVG
    emojione.imageType = 'svg';

    // default is ignore ASCII smileys like :) but you can easily turn them on
    emojione.ascii = true;

    // if you want to host the images somewhere else
    // you can easily change the default paths
    emojione.imagePathPNG = 'http://lalanii.com/emojione-master/assets/png/';
    emojione.imagePathSVG = 'http://lalanii.com/emojione-master/assets/svg/';

    // #################################################
  </script>

<?php  $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
if(($actual_link == 'http://www.lalanii.com/') || ($actual_link == 'http://www.lalanii.com/index.php') || ($actual_link == 'www.lalanii.com/index.php') || ($actual_link == 'www.lalanii.com/') || ($actual_link == 'www.lalanii.com') || ($actual_link == 'http://lalanii.com/search.php') || ($actual_link == 'http://lalanii.com/index.php') || ($actual_link == 'http://lalanii.com/') || ($actual_link == 'http://lalanii.com') || ($_GET['blogstart'] != '') || ($_GET['eBook'] != ''))
{
?>
<script type="text/javascript" src="http://lalanii.com/html5gallery/html5gallery.js"></script>
<?php
}
else
{
?>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js">

<script async type="text/javascript" src="http://lalanii.com/hireme/wowslider/webproducer/engine1/jquery.js"></script>

<?php } ?>



<script type="text/javascript" src="http://lalanii.com/scripts/compressed.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	var dd = $('.vticker').easyTicker({
		direction: 'up',
		easing: 'easeInOutBack',
		speed: 'slow',
		interval: 3000,
		height:50,
		visible: 1,
		mousePause: 1,
		controls: {
			up: '.up',
			down: '.down',
			toggle: '.toggle',
			stopText: 'Stop !!!'
		}
	}).data('easyTicker');	
	
	$(".blogtitle").each(function() {
              var original = $(this).html();
              // use .shortnameToImage if only converting shortnames (for slightly better performance)
              var converted = emojione.toImage(original);
              $(this).html(converted);
            });
			$(".blogdetail").each(function() {
              var original = $(this).html();
              // use .shortnameToImage if only converting shortnames (for slightly better performance)
              var converted = emojione.toImage(original);
              $(this).html(converted);
            });
	$(".emojosec").each(function() {
              var original = $(this).html();
              // use .shortnameToImage if only converting shortnames (for slightly better performance)
              var converted = emojione.toImage(original);
              $(this).html(converted);
            });

	//setTimeout(function() { innewpop() },600000);
	setTimeout(function() { innewpop() },300000);


	setTimeout(function () { loginsuc() }, 0);

});

function loginsuc() {
//alert('123');
	$('#login3').show();
 
         $(".close").on('click', function() {
            $('#login3').hide();
            $('#overlay').fadeOut(500);
         });
	
	}
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-62807572-1', 'auto');
  ga('send', 'pageview');
</script>
