<?php
	$sharelink="http%3A%2F%2Flalanii.com%2F".$blogPage.".php%3FblogID%3D".$blogID;
	$sharetitle=str_replace(' ', '%20', $blogTitle);
	$sharedesc=str_replace(' ', '%20', $blogDetailPart);			
?>
	<ul>
		<li><a id="shareitFB" target="_blank" href="javascript:window.open('http://www.facebook.com/sharer/sharer.php?u=<?php echo $sharelink; ?>','fbshare','width=500,height=400,top=200,left=200')"></a></li>
		<li><a id="shareitTw" target="_blank" href="http://twitter.com/intent/tweet?status=<?php echo $sharetitle; ?>+<?php echo $sharelink; ?>"></a></li>
		<li><a id="shareitE" href="mailto:?subject=<?php echo $sharetitle; ?>&body=<?php echo $sharedesc; ?>"></a></li>
		<li><a id="shareitTu" target="_blank" href="javascript:window.open('http://www.tumblr.com/share?v=3&u=<?php echo $sharelink; ?>&t=<?php echo $sharetitle; ?>','tushare','width=500,height=400,top=200,left=200')"></a></li>
		<li><a id="shareitGP" target="_blank" href="javascript:window.open('https://plus.google.com/share?url=<?php echo $sharelink; ?>','gpshare','width=500,height=400,top=200,left=200')"></a></li>
		<li><a id="shareitP" target="_blank" href="javascript:window.open('http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $blogThumb; ?>&url=<?php echo $sharelink; ?>&is_video=false&description=<?php echo $sharetitle; ?>','pshare','width=500,height=400,top=200,left=200')"></a></li>
	</ul>