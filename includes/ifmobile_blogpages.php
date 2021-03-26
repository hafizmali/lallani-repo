<?php
//CHECK IF MOBILE:

$useragent=$_SERVER['HTTP_USER_AGENT'];
	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))

{echo 'MOBILE';
?>



<!------------------------------------------------------------ MOBILE BLOG ------------------------------------------------------------->
<ul class="mobileblog">
		<li class="blogimage"><img class="blogThumb" src="<?php echo $blogThumb; ?>" /></li>
		<li class="blogtitle"><div class="opaque"></div><h3><?php echo $blogTitle; ?><h3></li>
		<li class="blogtopics"><div id="verticalalign">
		<?php 
				$sqlBLOGTop="Select * from llBlogTopic bt join llTopic t on bt.topicID=t.topicID where bt.blogID=".$blogID;
				//echo "<br>num categories: ".$sqlBLOGTop;
				$resultBLOGTop=mysql_query($sqlBLOGTop);
				$numBLOGTop=mysql_num_rows($resultBLOGTop);
				//echo "<br>num categories: ".$numBLOGTop;
				$BLOGTop=0;	
				while ($BLOGTop < $numBLOGTop) {
				echo "<a href='http://lalanii.com/blogs.php?tid=".mysql_result($resultBLOGTop,$BLOGTop,"topicID")."'>";
				echo mysql_result($resultBLOGTop,$BLOGTop,"topic");
				echo "</a>";
				++$BLOGTop;
				if ($BLOGTop==$numBLOGTop){echo "";}else{echo ",&nbsp;";}
				}
			?>
		</div></li>
		<li class="blogauthor">Posted by: <?php echo $authorFirstName; ?></li><li><?php echo $blogDate; ?></li>
		<li class="blogdetailpart"<?php echo $singleBlogHide; ?>><?php echo $blogDetailPart; ?></li>
		<li class="readmore"><?php 
		if (!isset($_GET['blogID'])){
			echo "<br /><a class='";
			if ($blogPage=='secrets'){echo ' restricted';}
			echo "' href='".$blogPage.".php?blogID=".$blogID."'>read more</a>";
			}
		?>
		<?php if ($isadmin=="yes"){?>
			<a href="javascript:window.open('http://lalanii.com/includes/blogmanager.php?blogID=<?php echo $blogID; ?>','blogmanager<?php echo $blogID; ?>','width=1044,height=700,top=100,left=100')">edit</a>
			<?php } ?>
		</li>
		
		
		<li class="blogcomments"><span>Comments:</span> <?php echo $commentCount; ?></li>
		<li class="blogshare" <?php echo $singleBlogHide; ?> <?php echo $multiBlogHide; ?>>
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
		</li>
	</ul>
		
		







<?php

}else{

//NOT MOBILE

}
?>