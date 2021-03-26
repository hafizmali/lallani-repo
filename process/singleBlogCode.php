<?php	
	//echo "<br>SQL:".$sqlBLOG;
	$resultBLOG=mysql_query($sqlBLOG);
	$numBLOG=mysql_num_rows($resultBLOG);
	if ($numBLOG>0){
	//echo "<br>NumRows:".$numBLOG;
		
		$blogID=mysql_result($resultBLOG,$BLOG,"blogID");
		$blogPage=strtolower(mysql_result($resultBLOG,$BLOG,"blogPage"));
		$blogTitle=mysql_result($resultBLOG,$BLOG,"blogTitle");		
		$blogDetail=mysql_result($resultBLOG,$BLOG,"blogDetail");
		$subcategory=mysql_result($resultBLOG,$BLOG,"subcategoryID");
		$authorID=mysql_result($resultBLOG,$BLOG,"authorID");
		$stickyBlog=mysql_result($resultBLOG,$BLOG,"stickyBlog");
		$secretBlog=mysql_result($resultBLOG,$BLOG,"secretBlog");
		$blogBanner=mysql_result($resultBLOG,$BLOG,"blogBanner");
		$blogThumb=mysql_result($resultBLOG,$BLOG,"blogThumb");
		$blogDate=date("F n, Y",strtotime(mysql_result($resultBLOG,$BLOG,"blogDate")));
		$blogAdded=date("m/d/Y",strtotime(mysql_result($resultBLOG,$BLOG,"blogAdded")));
		$blogDetailPart=substr(strip_tags($blogDetail),0,88)."...";
		
		$sqlBLOGA="Select * from llUser where userID=".$authorID;
		$resultBLOGA=mysql_query($sqlBLOGA);
		$authorFirstName=mysql_result($resultBLOGA,0,"userFirstName");
		$authorLastName=mysql_result($resultBLOGA,0,"userLastName");
		
		$sqlBLOGC="Select count(*) as commentCount from llComment where approved=1 and blogID=".$blogID;
		$resultBLOGC=mysql_query($sqlBLOGC);
		$commentCount=mysql_result($resultBLOGC,0,"commentCount");
		
		?>		
		
		<ul class="singleBlog">
		<li class="blogtitle"><h3 class="convert-emoji"><?php echo $blogTitle; ?></h3></li>
		<li class="blogtopics">			
			<?php 	
					$sqlBLOGTopFirst="Select * from llBlogTopic bt join llTopic t on bt.topicID=t.topicID where bt.blogID=".$blogID;
					//echo "<br>num categories: ".$sqlBLOGTopFirst;
					$resultBLOGTopFirst=mysql_query($sqlBLOGTopFirst);
					if ($resultBLOGTopFirst){
					$numBLOGTopFirst=mysql_num_rows($resultBLOGTopFirst);
					//echo "<br>num topics: ".$numBLOGTopFirst;
					$BLOGTopFirst=0;	
					while ($BLOGTopFirst < $numBLOGTopFirst) {
					$firstTopicID=mysql_result($resultBLOGTopFirst,$BLOGTopFirst,"topicID");
					$firstTopic=mysql_result($resultBLOGTopFirst,$BLOGTopFirst,"topic");
					echo "<a href='http://lalanii.com/blogs.php?tid=".$firstTopicID."'>";
					echo $firstTopic;
					echo "</a>";
					++$BLOGTopFirst;
					if ($BLOGTopFirst==$numBLOGTopFirst){echo "";}else{echo ",&nbsp;";}
					}}
					
				?>			
		</li>		
		<li class="blogimage"><img class="blogBanner" src="<?php echo $blogBanner; ?>" width="790px" height="425px" /></li>
		<li class="blogauthor">Posted by: <?php echo $authorFirstName; ?>, <?php echo $blogDate; ?></li>
		<li class="blogdetail">
			<?php 
				$blogDetail= nl2br($blogDetail);			
				$blogDetail.'<br /><a href="https://plus.google.com/u/1/b/101293006253647208992/101293006253647208992/about" id="abc" rel="author" style="clear:both;float:left;width:100%;" target="_blank">Lalanii on Google +</a>'; 
				if ($isadmin=="yes"){?>
				<a style="float:right;" href="javascript:window.open('http://lalanii.com/includes/blogmanager.php?blogID=<?php echo $blogID; ?>','blogmanager<?php echo $blogID; ?>','width=1044,height=700,top=100,left=100')">edit</a>
				<?php } ?>
		</li>
		<form name="formComments" method="POST" action="process/addcomment.php">
			<li>&nbsp;</li>
			<li><span>Comments:</span> <?php echo $commentCount; ?>
					<textarea name="comment" class="clearText" cols="100" rows="3" id="addcomment">add comment</textarea>
						<?php if ($loggedin=="yes"){?>
						<a href="" onclick="document.formComments.submit();return false;" class="next">add</a>
						<?php }else{ ?>
						<a href="" class="loginClick next">add</a>
						<?php } ?>
					</li>
					<input type="hidden" value="<?php echo $file; ?>" name="file" />
					<input type="hidden" value="<?php echo $blogID; ?>" name="blogID" />
				</form>
				<script type="text/javascript">
				function submitformComments(){
					document.formComments.submit();
					return false;
					}
				</script>
		<li class="blogcomments">

			<ul>
				<?php
				$sqlCOMM="select * from llComment c join llUser u on c.userID=u.userID where c.approved=1 and c.blogID='".$blogID."' order by c.commentDate desc";
				//echo $sqlCOMM;
				$resultCOMM=mysql_query($sqlCOMM);
				$numCOMM=mysql_num_rows($resultCOMM);
				$COMM=0;
				while($COMM<$numCOMM){					
				echo "<li>".mysql_result($resultCOMM,$COMM,"comment")."";
				echo "&nbsp;--comment by ".mysql_result($resultCOMM,$COMM,"userFirstName")." on ".date('n/j/Y g:i A',strtotime(mysql_result($resultCOMM,$COMM,"commentDate")))."</li>";
				++$COMM;
				}
				?>
				
				
			</ul>
		</li>
	<li class="blogshare"><?php include "share.php";?></li>
	</ul>
<?php
}else{
	echo '<script>window.location="http://dev.lalanii.com/error.php";</script>';
}
?>
		