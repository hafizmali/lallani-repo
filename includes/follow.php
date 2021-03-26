<div id="fb-root"></div>
<script async="">(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=516738558344528&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="follow">

	<ul id="theirs">
		<li id="facebook_like_button_holder">
			<!--<div class="fb-follow" data-href="https://www.facebook.com/pages/Author-Lalanii-R-Grant/106764956090989?ref=hl" data-layout="button" data-show-faces="false" data-share="false"></div>-->
            <a id="shareitFB" style="  float: left;  width: 30px;  height: 30px;" target="_blank" href="javascript:window.open('http://www.facebook.com/sharer/sharer.php?u=<?php echo $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>','fbshare','width=500,height=400,top=200,left=200')"></a>
		</li>
	
		<li>
			<a href="https://twitter.com/lalanii" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">&nbsp;</a>
			<!--<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>-->
		</li>

		<li id="email_button"><a id="followE" href="mailto:lalanii@lalanii.com?subject='Email from Lalanii.com'&body=''"></a></li>
		<li>
			<!--<iframe class="btn" frameborder="0" border="0" scrolling="no" allowtransparency="true" height="20" width="65" src="https://platform.tumblr.com/v2/follow_button.html?type=follow&amp;tumblelog=http://fashionpoetrylalanii.com/&amp;color=white"></iframe>-->
            <a id="shareitTu" style="  float: left;  width: 30px;  height: 30px;" target="_blank" href="javascript:window.open('http://www.tumblr.com/share?v=3&amp;u=<?php echo $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>&amp;t=Weekend%20Birthday:%20Brunchy%20Luncheon','tushare','width=500,height=400,top=200,left=200')"></a>
		</li>
		<li>
			<!-- Place this tag where you want the widget to render. -->
			<div class="g-follow" data-annotation="none" data-height="24" data-href="https://plus.google.com/103603908846792210627" data-rel="author"></div>

			<!-- Place this tag after the last widget tag. -->
			<script async="async" type="text/javascript">
			  (function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = 'http://lalanii.com/scripts/platform.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>
		</li>
		<li>
			<a data-pin-do="buttonFollow" href="http://www.pinterest.com/lalanii/">Lalanii</a>
			<!-- Please call pinit.js only once per page -->
			<script async="async" type="text/javascript" async defer src="http://lalanii.com/scripts/pinit.js"></script>
		</li>
	</ul>
	<ul id="lalaniis">
		<li id="fake_facebook_button"><a href="" id="followFB"></a></li>
		<li id="fake_twitter_button"><a href="" id="followTw"></a></li>
		<li id="fake_email_button"><a id="followE" style="pointer-events:auto;text-indent:-9999px;" href="mailto:lalanii@lalanii.com?subject='Email from Lalanii.com'&body=''">email</a></li>
		<li id="fake_tumblr_button"><a href="" id="followTu"></a></li>
		<li id="fake_google_button"><a href="" id="followGP"></a></li>
		<li id="fake_pinterest_button"><a href="" id="followP"></a></li>
		
	</ul>
	
	
	
	
</div>

