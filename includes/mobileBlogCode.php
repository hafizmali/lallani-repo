<div class="mobilemargin"></div>
	<?php	
	//echo "<br>SQL:".htmlentities($sqlBLOG);
	
	$resultBLOGM=mysql_query($sqlBLOG);
	if($resultBLOGM){
	$numBLOGM=mysql_num_rows($resultBLOGM);
	//echo "<br>NumRows:".$numBLOGM;
	$BLOGM=0;	
	while ($BLOGM < $numBLOGM) {		
		$blogID=mysql_result($resultBLOGM,$BLOGM,"blogID");
		$blogPage=strtolower(mysql_result($resultBLOGM,$BLOGM,"blogPage"));
		$blogTitle=mysql_result($resultBLOGM,$BLOGM,"blogTitle");		
		$blogDetail=mysql_result($resultBLOGM,$BLOGM,"blogDetail");
		$subcategory=mysql_result($resultBLOGM,$BLOGM,"subcategoryID");
		$authorID=mysql_result($resultBLOGM,$BLOGM,"authorID");
		$stickyBlog=mysql_result($resultBLOGM,$BLOGM,"stickyBlog");
		$secretBlog=mysql_result($resultBLOGM,$BLOGM,"secretBlog");
		$blogBanner=mysql_result($resultBLOGM,$BLOGM,"blogBanner");
		$blogThumb=mysql_result($resultBLOGM,$BLOGM,"blogThumb");
		$blogDate=date("F j, Y",strtotime(mysql_result($resultBLOGM,$BLOGM,"blogDate")));
		$blogAdded=date("m/d/Y",strtotime(mysql_result($resultBLOGM,$BLOGM,"blogAdded")));
		$blogDetailPart=substr(strip_tags($blogDetail),0,250)."...";
		
		$sqlBLOGMA="Select * from llUser where userID=".$authorID;
		$resultBLOGMA=mysql_query($sqlBLOGMA);
		$authorFirstName= @mysql_result($resultBLOGMA,0,"userFirstName");
		$authorLastName= @mysql_result($resultBLOGMA,0,"userLastName");
		
		$sqlBLOGMC="Select count(*) as commentCount from llComment where approved=1 and blogID=".$blogID;
		$resultBLOGMC=mysql_query($sqlBLOGMC);
		$commentCount=mysql_result($resultBLOGMC,0,"commentCount");
		?>
	
	
	<div class="mobilewrapper">
	<ul class="mobileBlog blogs">	
	<li class="blogimage">
		<a href="<?php echo $blogPage; ?>/<?php echo $blogID; ?>/<?php echo preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle)); ?>"><img class="blogBanner" src="<?php echo $blogBanner; ?>" width="790px" height="425px" /></a>
	</li>
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
		
		
		<li class="blogcomments"><span>Comments:</span> <?php echo $commentCount; ?></li>
		
	</ul>
</div>
<?php
++$BLOGM;
	}}
?>

	<div id="loadmore">
<?php 
		//echo "<br>number rows: ".$numBLOGM;
		//echo "<br>number to load: ".$bloglimit;
		if ($numBLOGM==$bloglimit){
		?>
		<a href="http://lalanii.com/process/inclimit.php" class="next">LOAD MORE</a>
		<?php
		}else{echo "the end.";}
		?>

	
	</div>