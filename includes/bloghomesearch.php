<?php	
error_reporting(0);
	$blogStart=$_GET['blogstart'];
	if(intval($_GET['blogstart'])>0){$startingrow=($_GET['blogstart']);}else{$startingrow=0;}
	$sqlBLOG="Select * from llBlog WHERE blogDate<=NOW() and blogTitle Like '%".$_POST['search']."%'  ORDER BY homepageBlog desc, blogDate desc, Month(blogDate) desc, Year(blogDate) desc";/*limit 10*/
	//echo "<br>SQL:".$sqlBLOG;
	$resultBLOG=mysql_query($sqlBLOG);
	//print_r($resultBLOG);
	$numBLOG=mysql_num_rows($resultBLOG);
	$totalBLOG=$numBLOG;
	//if (!isset($_GET['blogStart'])){$blogStart=0;}else{$blogStart=$_GET['blogStart'];}
	//echo "<br>blogStart:".$blogStart;
	//echo "<br>NumRows:".$numBLOG;
	//echo "<br>StartingRow:".$startingrow;
	$BLOG=$startingrow;	
	$islessthanten=$numBLOG-$blogStart;
	if ($islessthanten<10){$throughrow=$numBLOG;}else{$throughrow=10+$startingrow;}
	
	//echo "<br>islessthanten:".$islessthanten;
	//echo "<br>throughrow:".$throughrow;
	//echo "throughrow: ".$throughrow;
	while ($BLOG < $throughrow) {
		$blogID=mysql_result($resultBLOG,$BLOG,"blogID");
		$blogPage=strtolower(mysql_result($resultBLOG,$BLOG,"blogPage"));
		$blogTitle=mysql_result($resultBLOG,$BLOG,"blogTitle");
		//$blogDetailPart=strip_tags(mysql_result($resultBLOG,$BLOG,"blogDetailPart"));
		$blogDetail=mysql_result($resultBLOG,$BLOG,"blogDetail");
		$subcategoryID=mysql_result($resultBLOG,$BLOG,"subcategoryID");
		$authorID=mysql_result($resultBLOG,$BLOG,"authorID");
		$stickyBlog=mysql_result($resultBLOG,$BLOG,"stickyBlog");
		$homepageBlog=mysql_result($resultBLOG,$BLOG,"homepageBlog");
		$secretBlog=mysql_result($resultBLOG,$BLOG,"secretBlog");
		$blogThumb=mysql_result($resultBLOG,$BLOG,"blogThumb");
		$blogDate=date("F j, Y",strtotime(mysql_result($resultBLOG,$BLOG,"blogDate")));
		$blogAdded=date("m/d/Y",strtotime(mysql_result($resultBLOG,$BLOG,"blogAdded")));
		$blogDetailPart=substr(strip_tags($blogDetail),0,94)."...";
		
		$sqlBLOGA="Select * from llUser where userID=".$authorID;
		$resultBLOGA=mysql_query($sqlBLOGA);	
		$authorFirstName=@mysql_result($resultBLOGA,0,"userFirstName");
		$authorLastName=@mysql_result($resultBLOGA,0,"userLastName");
		
		$sqlBLOGC="Select count(*) as commentCount from llComment where blogID=".$blogID;
		$resultBLOGC=mysql_query($sqlBLOGC);
		$commentCount=@mysql_result($resultBLOGC,0,"commentCount");
		//echo "<br>blogStart-1: ".($blogStart-1);
		//echo "<br>blogStart+11: ".($blogStart+10);
		if (($BLOG>($blogStart-1)) AND ($BLOG<($blogStart+10))){$ulclass="blogs blognum".$BLOG;}else{$ulclass="blogs blognum".$BLOG;$uldisplay=" style='display:none;'";}
		//if ($homepageBlog==1){$ulclass=$ulclass." sticky";}else{$ulclass=$ulclass."";}
		if ($stickyBlog==1){$ulclass=$ulclass." sticky";}else{$ulclass=$ulclass."";}
/*
		$sqlSecretBlog="Select blogID from vwSecretblogs where blogID=".$blogID;
		//echo $sqlSecretBlog;
		$secretBlogResult=mysql_query($sqlSecretBlog);
		if(@mysql_num_rows($secretBlogResult)>0){$issecret="yes";}else{$issecret="nope";}
*/
		//echo "<br>is secret? ".$issecret;
		?>
		
	<ul class="<?php echo $ulclass; ?>">
	<?php 
		$bloghomeclass="";
		if(($issecret=='yes')AND($secrets!=="accessible")AND($viewingmobile=="no")){
			$bloghomeclass="restricted restrictedred loginclick";
			$bloghomehref="#";
		}elseif(($issecret=='yes')AND($secrets!=="accessible")AND($viewingmobile=="yes")){
			$bloghomeclass="restricted restrictedred";
			$bloghomehref="http://lalanii.com/signup.php";
		}elseif(($issecret=='yes')AND($secrets=="accessible")){
			$bloghomeclass="restricted restrictedred";
			$bloghomehref=$blogPage."/".$blogID."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle));
		}else{			
			$bloghomeclass="";
			$bloghomehref=$blogPage."/".$blogID."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle));
		}
	
	?>
		<li class="blogimage">
		<a href="<?php echo $bloghomehref;?>">
			<span class="imgplaceholder" imgvalue="<?php echo $blogThumb; ?>" width="200px" height="175px" style="width:200px;height:175px;" /><?php include'includes/spinner.php';?></span>
		</a>
		</li>
		<li class="blogtitle"><h3><a href="<?php echo $bloghomehref;?>" class="<?php echo $bloghomeclass;?>"><?php echo $blogTitle; ?></a></h3></li>
		<li class="blogauthor">Posted by: <?php echo $authorFirstName; ?> <?php echo $blogDate; ?></li>
		<li class="blogdetail"><?php echo $blogDetailPart;?></li>
		<li class="more">
			<a href="<?php echo $bloghomehref;?>" class="<?php echo $bloghomeclass;?>">read more</a>
			<?php if ($isadmin=="yes"){ ?>
			<a href="javascript:window.open('http://lalanii.com/includes/blogmanager.php?blogID=<?php echo $blogID; ?>','blogmanager<?php echo $blogID; ?>','width=1044,height=700,top=100,left=100')">edit</a>
			<?php } ?>
		</li></li>
		<!--<li class="blogcomments"><span>Comments:</span> <?php //echo $commentCount; ?></li>-->
		<li class="blogtopics">
			<span>Topics:</span>
			<?php 
				$sqlBLOGTop="Select t.topic from llBlogTopic bt join llTopic t on bt.topicID=t.topicID where bt.blogID=".$blogID;
				//echo "<br>num categories: ".$sqlBLOGTop;
				$resultBLOGTop=mysql_query($sqlBLOGTop);
				$numBLOGTop=@mysql_num_rows($resultBLOGTop);
				//echo "<br>num categories: ".$numBLOGTop;
				$BLOGTop=0;	
				while ($BLOGTop < $numBLOGTop) {
				echo mysql_result($resultBLOGTop,$BLOGTop,"topic");
				
				++$BLOGTop;
				if ($BLOGTop==$numBLOGTop){echo "";}else{echo ",&nbsp;";}
				}
			?>
		</li>
		<li class="blogshare">
		<?php include "share.php"; ?>
		</li>
	</ul>
<?php
	++$BLOG;
	}

if($BLOG <= 0) { echo "<h2 style='margin:30px 0px;'>No Posts Found.</h2>"; }

if($BLOG > 0) {
	$nextBlogStart=$blogStart+10;
	$numPages=ceil($totalBLOG/10);
	//echo "<br>numpages: ".$numPages;
	$pageCount=0;
	//echo $blogStart."<br>";
	echo "page number: ";
	while($numPages>$pageCount){
		$pageBlogStart=($pageCount+1)*10;
		//$pageBlogStart=ceil($startingrow/10);
		if((($blogStart+10)/10)==($pageCount+1)){
			$pageclass="lightbluebg";
		}else{
			$pageclass="darkgreybg";
		}
		//echo "<a href='#blogfeed' blogStart='".$pageBlogStart."' class='paginate ".$pageclass."'>".($pageCount+1)."</a>";
		echo "<a href='?blogstart=".($pageBlogStart-10)."#blogfeed' blogStart='".($pageBlogStart-10)."' class='paginate ".$pageclass."'>".($pageCount+1)."</a>";
		++$pageCount;
	}
}
	?>