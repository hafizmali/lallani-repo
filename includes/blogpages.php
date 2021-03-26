<?php
//echo "blogpages are included...";
//echo "<br>referer = ".$_SERVER['HTTP_REFERER']."<br>";
$myreferer = $_SERVER['HTTP_REFERER'];

if ($myreferer!=='http://lalanii.com/process/inclimit.php'){$_SESSION['limit']=7;}
if (isset($_SESSION['limit'])){$bloglimit=$_SESSION['limit'];}else{$bloglimit=7;}
if ($file=="secrets"){$secretAddendum=" or s.secretSubcategory=1";}
if (($isadmin=="yes")OR($isreviewer=="yes")){$future="";$bdotfuture="";}else{$future=" and blogDate<Now()";$bdotfuture=" and blogDate<Now()";}
// CHECK FOR TYPE OF DISPLAY AND FILTER
//echo "isadmin: ".$isadmin;
if($viewingmobile=="yes") /*MOBILE DETECTED IN VALIDATION*/
		{
		//echo "its mobile";
		$mobileBlog="true";
		}else{
		//echo "its desktop";
		$mobileBlog="false";
		}
if (isset($_GET['blogID'])){
		//echo "I have a single blog!";
		$blogClass=" singleBlog";
		$singleBlog="true";		
		$multiBlog="false";
		$blogID=$_GET['blogID'];
		$get_blogpage = mysql_query("Select * from llBlog where blogID=$blogID");
		$get_blogpage_res = mysql_fetch_array($get_blogpage);
		$blogPage_n = $get_blogpage_res['blogPage'];
		
		if($file!=='secrets'){
			$sqlSEX="SELECT b.blogID,b.blogTitle,b.secretBlog,s.secretSubCategory,t.secretTopic FROM llBlog b left join llSubcategory s on b.subcategoryID=s.subcategoryid left join llBlogTopic bt on b.blogID=bt.blogID left join llTopic t on bt.topicID=t.topicID where (b.secretBlog=1 or s.secretSubcategory=1 or secretTopic=1)and b.blogID=".$blogID;
			//echo $sqlSEX;
			$resultSEX=mysql_query($sqlSEX);
			$numSEX=mysql_num_rows($resultSEX);
			//echo $numSEX;
			if ($numSEX>0){
				//echo "its secret!";
				echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/secrets.php?blogID=".$blogID."';</script>";
				}
			}
		
		$sqlBLOG="Select * from llBlog where blogID=".$blogID.$future;
	}else{
		//echo "I have a lotta blogs!";
		$blogClass="";
		$singleBlog="false";		
		$multiBlog="true";		
		
		if (isset($_GET['scid'])) {
			//echo "<br>filtering by subcategory";
		    	//check for secret
		    	$sqlSC="select * from llSubcategory where subcategoryID=".$_GET['scid'];
				//echo $sqlSC;
				$resultSC=mysql_query($sqlSC);
				$secretsubcategory=mysql_result($resultSC,0,"secretsubcategory");
				if (($secretsubcategory==1) AND ($file!=='secrets')){
					//echo "its about sex!";
					echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/secrets.php?scid=".$_GET['scid']."';</script>";
					}

			    $sqlBLOG="Select * from llBlog where subcategoryID=".$_GET['scid'].$future." order by blogDate desc limit ".$bloglimit;
		} elseif (isset($_GET['tid'])) {
			//echo "<br>filtering by topic";
				//check for secret
				$sqlTT="select * from llTopic where topicID=".$_GET['tid'];							
				//echo $sqlTT;
				$resultTT=mysql_query($sqlTT);
				$titletopic=mysql_result($resultTT,0,"topic");
				$secrettopic=mysql_result($resultTT,0,"secrettopic");
				if (($secrettopic==1) AND ($file!=='secrets')){
					//echo "its about sex!";
					echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/secrets.php?tid=".$_GET['tid']."';</script>";
					}
				$sqlBLOG="Select * from llBlog b join llBlogTopic t on b.blogID=t.blogID where t.topicID=".$_GET['tid'].$bdotfuture." order by b.blogDate desc limit ".$bloglimit;
		} elseif (isset($_GET['featured'])) {
			//echo "<br>filtering by featured";
			$sqlBLOG="Select * from llBlog where stickyBlog=1".$future." order by blogDate desc";
			$blogSubMenu="<li><a href='http://lalanii.com/blogs.php?featured=1'>Featured</a></li>";
			$blogSubMenu .="<li><a href='http://lalanii.com/blogs.php'>All Blogs</a></li>";
			$blogSubMenu .="<li><a href='http://lalanii.com/fashion.php'>Fashion</a></li>";
			$blogSubMenu .="<li><a href='http://lalanii.com/beauty.php'>Beauty</a></li>";
			$blogSubMenu .="<li><a href='http://lalanii.com/creatives.php'>Creatives</a></li>";		    
		} elseif ($file=='secrets') {
			//echo "<br>all secrets";
//echo $isreviewer;
			$sqlBLOG="SELECT * FROM vwSecretblogs where 1=1 ".$future." order by blogDate desc limit ".$bloglimit;
			
		} else {
			//echo "<br>all blogs";
			if($secrets=="accessible"){
			$sqlBLOG="Select * from llBlog where blogPage='".$file."'".$future." order by blogDate desc limit ".$bloglimit;
			}else{
			$sqlBLOG="select * from llBlog where blogPage='".$file."'".$future." and (blogID NOT IN (select blogID from vwSecretblogs)) order by blogDate desc limit ".$bloglimit;
			
			
			
			}
		}
	}
//echo $file;


if (!($_GET) AND ($file=="blogs")){
		//echo "get false and is blogs";
		$blogSubMenu="<li><a href='http://lalanii.com/blogs.php?featured=1'>Featured</a></li>";
		$blogSubMenu .="<li><a href='http://lalanii.com/blogs.php'>All Blogs</a></li>";
		$blogSubMenu .="<li><a href='http://lalanii.com/fashion.php'>Fashion</a></li>";
		$blogSubMenu .="<li><a href='http://lalanii.com/beauty.php'>Beauty</a></li>";
		$blogSubMenu .="<li><a href='http://lalanii.com/creatives.php'>Creatives</a></li>"; 
		$sqlBLOG="select * from (select t.topicID,bt.blogID,t.secretTopic from llBlogTopic bt join llTopic t on bt.topicID=t.topicID where t.secretTopic=0) top join llBlog b on top.blogID=b.blogID join llSubcategory s on s.subcategoryID=b.subcategoryID where b.secretBlog=0 and b.blogPage<>'secrets' and s.secretsubcategory=0".$bdotfuture." group by b.blogID limit ".$bloglimit;
	}else{
		//echo "get true or not blogs";
		//$blogSubMenu="";
	}

//	echo "<br>singleBlog: ".$singleBlog;
//	echo "<br>multiBlog: ".$multiBlog;
//	echo "<br>mobileBlog: ".$mobileBlog;
	
	
//echo htmlentities($sqlBLOG);
?>
<!------------         SUB MENU SECTION         ------------>
<div id="blogSubMenuWrap">
<?php 
//echo "select * from llBlog  where blogID = (select max(blogID) from llBlog where blogPage='Fashion' and blogID < $blogID)";
$prevquery = mysql_query("select * from llBlog  where blogID = (select max(blogID) from llBlog where blogPage='".$blogPage_n."' and blogDate<Now() and  blogID < $blogID)");
$prevq_result = @mysql_fetch_array($prevquery);
?>
<a <?php if($prevq_result['blogID'] != ''){ ?> href="http://lalanii.com/<?php echo strtolower($blogPage_n).'/'.$prevq_result['blogID']; ?>/" <?php } else { ?> href="http://lalanii.com" <?php } ?> id="left_post_link"><img src="http://lalanii.com/images/leftarrow.png"></a>
	<ul class="blogSubMenu">
		<?php
			echo $blogSubMenu;
			// DISPLAY EITHER SUBCATEGORIES OR TOPICS, DEPENDING ON PAGE VIEW
			if (isset($_GET['tid'])){
		
			$sqlBLOGHTop="Select * from llTopic";
			$resultBLOGHTop=mysql_query($sqlBLOGHTop);
			$numBLOGHTop=mysql_num_rows($resultBLOGHTop);
			$BLOGHTop=0;	
				while ($BLOGHTop < $numBLOGHTop) {
				$headertopic=mysql_result($resultBLOGHTop,$BLOGHTop,"topic");
				$headertopicID=mysql_result($resultBLOGHTop,$BLOGHTop,"topicID");
				echo "<li class='blogsubmenuitem'><a href='http://lalanii.com/blogs.php?tid=".$headertopicID."'>".$headertopic."</a></li>";
				++$BLOGHTop;
				}
			}else if($_GET['blogID']) {
				$resultBLOGer=mysql_query($sqlBLOG);
				$blogPage=strtolower(mysql_result($resultBLOGer,$BLOG,"blogPage"));
				$subcategory=mysql_result($resultBLOGer,$BLOG,"subcategoryID");
				$getcatnameq = mysql_fetch_array(mysql_query("Select * from llSubcategory where subcategoryID='$subcategory'"));
				echo "<li class='blogsubmenuitem'><a href='http://lalanii.com/".$blogPage.".php?scid=".$subcategory."'>".$getcatnameq['subcategory']."</a></li>";
				
			}else{
			
				//echo "show subcategories";
				$sqlBLGSub="Select * from llSubcategory s join llCategory c on s.categoryID=c.categoryID where s.secretSubcategory=0 and c.category='".$file."'".$secretAddendum." order by s.subcategoryOrder";
				//echo $sqlBLGSub;
				$resultBLGSub=mysql_query($sqlBLGSub);
				$numBLGSub=mysql_num_rows($resultBLGSub);
				$BLGSub=0;
				while ($BLGSub < $numBLGSub) {
				$blogSubCategory=mysql_result($resultBLGSub,$BLGSub,"subcategory");
				$blogSubCategoryID=mysql_result($resultBLGSub,$BLGSub,"subcategoryID");				
				?>
				
				<li class="blogsubmenuitem<?php if ($_GET['scid']==$blogSubCategoryID){echo " active";} ?>"><a href="?scid=<?php echo $blogSubCategoryID; ?>"><?php echo $blogSubCategory; ?></a></li>
				<?php
				++$BLGSub;
				}
			}
		?>
	</ul>
<?php 
$nextquery = mysql_query("select * from llBlog  where blogID = (select min(blogID) from llBlog where blogPage='".$blogPage_n."' and blogDate<Now() and  blogID > $blogID)");
$nextq_result = @mysql_fetch_array($nextquery);
?>
<a <?php if($nextq_result['blogID'] != ''){ ?> href="http://lalanii.com/<?php echo strtolower($blogPage_n).'/'.$nextq_result['blogID']; ?>/" <?php } else { ?> href="http://lalanii.com" <?php } ?> id="right_post_link"><img src="http://lalanii.com/images/rightarrow.png"></a>
</div>
<!------------         /SUB MENU SECTION         ------------>
<div id="blogPageContent">
<!------------------------------------------------------------ MULTIPLE/DESKTOP BLOGS ------------------------------------------------------------->
	<?php if (($multiBlog=="true")AND($mobileBlog=="false")){
	//echo "you are on a PC or Mac and viewing multiple blogs";
	include "multiBlogCode.php";
	}
	//end if multiBlog true and mobile false 
	?>
<!------------------------------------------------------------ MULTIPLE/MOBILE BLOGS ------------------------------------------------------------->
	<?php 
	if (($multiBlog=="true")AND($mobileBlog=="true")){
	//echo "you are on a mobile device and viewing multiple blogs";
	include "mobileBlogCode.php";
	}
	//end if multiBlog true and mobile false 	
	?>
<!------------------------------------------------------------ SINGLE BLOG ------------------------------------------------------------->
	<?php if ($singleBlog=="true"){
	//echo "you are viewing one blog and could be on mobile or desktop - I dont really care!";
	include "singleBlogCode.php";
	}	
	?>
</div>