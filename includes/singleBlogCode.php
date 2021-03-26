<script>
function commentmove(replyID)
{
	//alert(replyID);
//$(".btn").click(function() {
    $("#comsec"+replyID).append($("#formComments"));
	$("#orgfrom").remove();
	document.getElementById("pID").value = replyID;
//});
}
</script>
<style>
.blogcomments ul li.subcomm {
  margin-left: 20px;
  width: 94.5% !important;
}
.blogcomments ul li.subsubcomm {
  margin-left: 40px;
  width: 92% !important;
}
.blogcomments ul li.subsubsubcomm {
  margin-left: 60px;
  width: 88.5% !important;
}
.blogcomments ul li { margin:5px 0px; }
#left_post_link img , #right_post_link img { display:block !important; }
</style>
<?php	
	//echo "<br>SQL:".$sqlBLOG;
	$resultBLOG=mysql_query($sqlBLOG);
	$numBLOG=mysql_num_rows($resultBLOG);
	if ($numBLOG>0){
	//echo "<br>NumRows:".$numBLOG;
		
		$blogID=mysql_result($resultBLOG,$BLOG,"blogID");
		$blogPage=strtolower(mysql_result($resultBLOG,$BLOG,"blogPage"));
		$blogTitle=mysql_result($resultBLOG,$BLOG,"blogTitle");	
$post_banner_link=mysql_result($resultBLOG,$BLOG,"post_banner_link");	
	
		$blogDetail=mysql_result($resultBLOG,$BLOG,"blogDetail");
		$subcategory=mysql_result($resultBLOG,$BLOG,"subcategoryID");
		$authorID=mysql_result($resultBLOG,$BLOG,"authorID");
		$stickyBlog=mysql_result($resultBLOG,$BLOG,"stickyBlog");
		$secretBlog=mysql_result($resultBLOG,$BLOG,"secretBlog");
		$blogBanner=mysql_result($resultBLOG,$BLOG,"blogBanner");
$blog_bg_color=mysql_result($resultBLOG,$BLOG,"blog_bg_color");
$notebook_allow=mysql_result($resultBLOG,$BLOG,"notebook_allow");
		$banner_one=mysql_result($resultBLOG,$BLOG,"banner_one");
		$banner_two=mysql_result($resultBLOG,$BLOG,"banner_two");
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
		
		?>		
		
		<ul class="singleBlog">
		<li class="blogtitle"><h3><?php echo $blogTitle; ?></h3></li>
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
		<li class="blogimage"><a href="<?php if($post_banner_link != ''){ echo $post_banner_link;}else { echo'#';} ?>"><img alt="<?php echo $blogTitle; ?>" title="<?php echo $blogTitle; ?>" class="blogBanner" src="<?php echo $blogBanner; ?>" width="790px" height="425px" /></a></li>
		<li class="blogauthor">Posted by: <?php echo $authorFirstName; ?>, <?php echo $blogDate; ?></li>
		<li class="blogdetail">
			<?php 

				$blogDetail= nl2br($blogDetail);				
				$blogDetail .='<div class="twocolsec"><div class="innsection">'.$banner_one.'</div><div class="innsection">'.$banner_two.'</div></div>';


				echo $blogDetail;

				?>
		</li>



<?php
$recoQuery = mysql_query("Select * from llBlog where blogID='".$blogID."' ");
$recoResult = mysql_fetch_array($recoQuery);



if(($blogPage == 'beauty') || ($blogPage == 'Beauty'))
{
	$recoIds = $recoResult['reco_posts'];
	$nnpage = 'beauty'; 
	$nrblog = 'beauty';
}
else if(($blogPage == 'fashion') || ($blogPage == 'Fashion'))
{
	$recoIds = $recoResult['reco_posts'];
	$nnpage = 'fashion'; 
	$nrblog = 'fashion';
}
else if(($blogPage == 'creatives') || ($blogPage == 'Creatives'))
{
	$recoIds = $recoResult['reco_posts'];
	$nnpage = 'creatives'; 
	$nrblog = 'creative';
}
else if(($blogPage == 'secrets') || ($blogPage == 'Secrets'))
{
	$recoIds = $recoResult['reco_posts'];
	$nnpage = 'secrets'; 
	$nrblog = 'secret';
}	

?>

<?php
if($recoResult['reco_posts'] != ''){
	$bbd .='<div class="fourcolsec"><a class="lastlinks llpinker">RECOMMENDED READS</a>';

	$recoQueryIn = mysql_query("Select * from llBlog where blogID in (".$recoIds.")");
	while($recoResIn = @mysql_fetch_array($recoQueryIn))
	{	
		$bbd .='<div class="fourcolsec reco">';
		$bbd .='<a class="recoreadmore" href="http://lalanii.com/'.$nnpage.'/'.$recoResIn['blogID'].'/"><img class="recothumb" src="'.$recoResIn[blogThumb].'" /></a>';
		$bbd .='<label><a class="recoreadmore" href="http://lalanii.com/'.$nnpage.'/'.$recoResIn['blogID'].'/">'.$recoResIn['blogTitle'].'</a></label>';
		$bbd .='<p>'.substr(strip_tags($recoResIn['blogDetail']),0,105)."...".'</p>';
		$bbd .='<a class="recoreadmore" href="http://lalanii.com/'.$nnpage.'/'.$recoResIn['blogID'].'/">Read More</a>';
		$bbd .='</div>';
	}
	
	$bbd .='</div>';
}
	$bbd .='<div id="bottombbt"><br /><a class="lastlinks pinker" href="http://lalanii.com/signup.php#existing" target="_blank">Like it? Subscribe!</a><br /><a class="lastlinks bluer" href="https://plus.google.com/u/1/b/101293006253647208992/101293006253647208992/about" rel="author" target="_blank">Add Lalanii on Google + </a></div>'; 	
				
				if ($isadmin=="yes"){?>
				<a style="float:right;" href="javascript:window.open('http://lalanii.com/includes/blogmanager.php?blogID=<?php echo $blogID; ?>','blogmanager<?php echo $blogID; ?>','width=1044,height=700,top=100,left=100')">edit</a>
				<?php } 


	echo $bbd;

?>
<li class="blogshare"><?php include "share.php";?></li>
<div class="bottom_ncols">
<?php
  	$adds_query = mysql_query("Select * from footer_adds");
	$adds_res = mysql_fetch_array($adds_query);
  ?>
	<div class="botnth" onclick="return adds_detail('<?php echo $nrblog; ?>_footer_left','custom_add');"><?php if($adds_res[$nrblog.'_add_one'] != ''){ echo trim($adds_res[$nrblog.'_add_one']); }else if($adds_res[$nrblog.'_add_one_img'] != '') { ?><a href="<?php echo trim($adds_res[$nrblog.'_add_one_link']); ?>"><img src="<?php echo "http://lalanii.com/images/adds/".trim($adds_res[$nrblog.'_add_one_img']); ?>"></a><?php } ?></div>
	<div class="botnth midss" onclick="return adds_detail('<?php echo $nrblog; ?>_footer_center','custom_add');"><?php if($adds_res[$nrblog.'_add_two'] != ''){ echo trim($adds_res[$nrblog.'_add_two']); }else if($adds_res[$nrblog.'_add_two_img'] != '') {  ?><a href="<?php echo trim($adds_res[$nrblog.'_add_two_link']); ?>"><img src="<?php echo "http://lalanii.com/images/adds/".trim($adds_res[$nrblog.'_add_two_img']); ?>"></a><?php } ?></div>
	<div class="botnth" onclick="return adds_detail('<?php echo $nrblog; ?>_footer_right','custom_add');"><?php if($adds_res[$nrblog.'_add_three'] != ''){ echo trim($adds_res[$nrblog.'_add_three']); }else if($adds_res[$nrblog.'_add_three_img'] != '') { ?><a href="<?php echo trim($adds_res[$nrblog.'_add_three_link']); ?>"><img src="<?php echo "http://lalanii.com/images/adds/".trim($adds_res[$nrblog.'_add_three_img']); ?>"></a><?php } ?></div>
</div>

           <div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'lalaniis';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
    
    

  


<?php
}else{
	echo '<script>window.location="http://www.lalanii.com/error.php";</script>';
}


if($_SESSION['userType'] == 'user'){
?>
		
<script>
function innewpop() { 
	$('#overlay').fadeIn(500,function(){
            $('#login2').show();
         });
 
         $(".close").on('click', function() {
            $('#login2').hide();
            $('#overlay').fadeOut(500);
         });
	
	}
</script>
<?php } 

if($notebook_allow == '1'){
?>
<style>
body {
    background-image: url(http://lalanii.com/images/general/hiremeBG_tiles.jpg) !important;
    position: relative;
    background-size: 24px !important;

}
#lips { background-image:none !important; }
</style>
<?php
}
else if($blog_bg_color != '')
{
?>
<style>
body {
background-image:none !important;
background-color:<?php echo $blog_bg_color;; ?> !important;
}
#lips { background-image:none !important; }
</style>
<?php } ?>