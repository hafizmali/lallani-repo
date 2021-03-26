	<?php	
	//echo "<br>SQL:".$sqlBLOG;
	$resultBLOG=mysql_query($sqlBLOG);
	if ($resultBLOG){
	$numBLOG=mysql_num_rows($resultBLOG);
	//echo "<br>NumRows:".$numBLOG;
	$BLOG=0;	
	while ($BLOG < $numBLOG) {		
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
		$blogDate=date("F j, Y",strtotime(mysql_result($resultBLOG,$BLOG,"blogDate")));
		$blogAdded=date("m/d/Y",strtotime(mysql_result($resultBLOG,$BLOG,"blogAdded")));
		$blogDetailPart=substr(strip_tags($blogDetail),0,88)."...";
		
		$sqlBLOGA="Select * from llUser where userID=".$authorID;
		$resultBLOGA=mysql_query($sqlBLOGA);
		$authorFirstName= @mysql_result($resultBLOGA,0,"userFirstName");
		$authorLastName= @mysql_result($resultBLOGA,0,"userLastName");
		
		$sqlBLOGC="Select count(*) as commentCount from llComment where approved=1 and blogID=".$blogID;
		$resultBLOGC=mysql_query($sqlBLOGC);
		$commentCount=mysql_result($resultBLOGC,0,"commentCount");
		if ($BLOG==0){$blogClass="firstBlog";		
		?>		
<!------------------------------------------------------------ FIRST BLOG ------------------------------------------------------------->
	<ul class="<?php echo $blogClass; ?>">	
		<div class="opaque"></div>
		<li class="blogimage"><a href="<?php echo $blogPage; ?>/<?php echo $blogID; ?>/<?php echo preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle)); ?>">
		<img class="blogBanner" src="http://lalanii.com/image.php?width=790&height=425&image=<?php echo $blogBanner; ?>" alt="<?php echo $blogTitle; ?>" title="<?php echo $blogTitle; ?>" width="790px" height="425px" /></a></li>
		<li class="blogtitle"><h3><?php echo $blogTitle; ?></h3></li>
		<li class="blogdetailpart">
			<?php echo $blogDetailPart; ?>
			<br><a class="" href="<?php echo $blogPage; ?>/<?php echo $blogID; ?>/<?php echo preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle)); ?>">read more</a>
			<?php if ($isadmin=="yes"){ ?>
			<a href="javascript:window.open('http://lalanii.com/includes/blogmanager.php?blogID=<?php echo $blogID; ?>','blogmanager<?php echo $blogID; ?>','width=1044,height=700,top=100,left=100')">edit</a>
			<?php } ?>
		</li>
		<li class="blogtopics">			
			<?php 
					$sqlBLOGTopFirst="Select * from llBlogTopic bt join llTopic t on bt.topicID=t.topicID where bt.blogID=".$blogID;
					//echo "<br>num categories: ".$sqlBLOGTopFirst;
					$resultBLOGTopFirst=mysql_query($sqlBLOGTopFirst);
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
					}
				?>			
		</li>		
	
		<li class="blogauthor">Posted by: <?php echo $authorFirstName; ?>, <?php echo $blogDate; ?></li>
		<!--<li class="blogcomments"><span>Comments:</span> <?php echo $commentCount; ?></li>-->
	</ul>
		<?php
		}else{
		$blogClass="blogs";
		?>
<!------------------------------------------------------------ ADDITIONAL BLOGS ------------------------------------------------------------->		
	<ul class="<?php echo $blogClass; ?>">
		<!--<li class="blogimage"><a href="<?php echo $blogPage; ?>.php?blogID=<?php echo $blogID; ?>"><img class="blogThumb" src="<?php echo $blogThumb; ?>" width="200px" height="175px" /></a></li>-->
        <li class="blogimage"><a href="<?php echo $blogPage; ?>/<?php echo $blogID; ?>/<?php echo preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle)); ?>"><img title="<?php echo $blogTitle; ?>" alt="<?php echo $blogTitle; ?>" class="blogThumb" src="http://lalanii.com/image.php?width=200&height=175&image=<?php echo $blogThumb; ?>" width="200px" height="175px" /></a></li>
		<li class="blogtitle"><div class="opaque"></div><h3><?php echo $blogTitle; ?></h3></li>
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
		<li class="blogdetailpart"><?php echo $blogDetailPart; ?></li>
		<li class="readmore"><?php 
		if (!isset($_GET['blogID'])){
			echo "<br /><a class='";
			if ($blogPage=='secrets'){echo ' restricted';}
			echo "' href='".$blogPage."/".$blogID."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle))."'>read more</a>";
			}
		?>
		<?php if ($isadmin=="yes"){?>
			<a href="javascript:window.open('http://lalanii.com/includes/blogmanager.php?blogID=<?php echo $blogID; ?>','blogmanager<?php echo $blogID; ?>','width=1044,height=700,top=100,left=100')">edit</a>
			<?php } ?>
		</li>
		
		
		<!--<li class="blogcomments"><span>Comments:</span> <?php echo $commentCount; ?></li>-->
		
	</ul>
		
		<?php
		}
		?>
		

	<?php
	++$BLOG;
	}}
	?>
	<div id="loadmore">
		<?php 
		//echo "<br>number rows: ".$numBLOG;
		//echo "<br>number to load: ".$bloglimit;
		if ($numBLOG==$bloglimit){
		?>
		<a href="http://lalanii.com/process/inclimit.php" class="next">LOAD MORE</a>
		<?php
		}else{echo "the end.";}
		?>
	</div>