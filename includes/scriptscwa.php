<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://creativewritingagency.com/lalanii/scripts/tinyeditor.js"></script>
<script type="text/javascript" src="https://creativewritingagency.com/lalanii/scripts/formValidator.js"></script>
<script type="text/javascript" src="https://creativewritingagency.com/lalanii/scripts/jquery.easing.min.js"></script>
<script type="text/javascript" src="https://creativewritingagency.com/lalanii/scripts/jquery.easy-ticker.js"></script>
<script type="text/javascript" src="https://creativewritingagency.com/lalanii/scripts/BeatPicker.min.js"></script>
<script type="text/javascript" src="https://creativewritingagency.com/lalanii/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="https://creativewritingagency.com/lalanii/scripts/main.js"></script>
<!--script type="text/javascript" src="https://creativewritingagency.com/lalanii/scripts/jquery-1.4.4.min.js"></script-->
<script type="text/javascript" src="https://creativewritingagency.com/lalanii/scripts/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://creativewritingagency.com/lalanii/scripts/jquery.validate.creditcardtypes.js"></script>


<script type="text/javascript">
$(document).ready(function(){

	var dd = $('.vticker').easyTicker({
		direction: 'down',		
		speed: '9000',
		interval: 5000,
		height: '50',
		visible: 1,
		mousePause: true,
		padding:10,
		controls: {
			up: '.up',
			down: '.down',
			toggle: '.toggle',
			stopText: 'Stop !!!'
		}
	}).data('easyTicker');
	
	cc = 1;
	$('.aa').click(function(){
		$('.vticker ul').append('<li>' + cc + ' Triangles can be made easily using CSS also without any images. This trick requires only div tag and some</li>');
		cc++;
	});
	
	$('.vis').click(function(){
		dd.options['visible'] = 0;
		
	});
	
	$('.visall').click(function(){
		dd.stop();
		dd.options['visible'] = 0 ;
		dd.start();
	});
	
});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-62807572-1', 'auto');
  ga('send', 'pageview');
</script>