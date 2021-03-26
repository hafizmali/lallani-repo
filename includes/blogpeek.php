<?php	
	$sqlBLGPEEK="Select b.*,s.subcategory from (select *,max(blogDate) as maxDate from (select * from llBlog where sneakpeekBlog=1 order by stickyBlog desc,blogDate desc) blogsort group by subcategoryID) b join llSubcategory s on b.subcategoryID=s.subcategoryID";
	//$sqlBLGPEEK="Select SUBSTRING(b.blogDetail,1,100) as blogDetailPart,b.*,s.subcategory from (select *,max(blogDate) as maxDate from (select * from llBlog where secretBlog=1 order by stickyBlog desc,blogDate desc) blogsort group by subcategoryID) b join llSubcategory s on b.subcategoryID=s.subcategoryID";
	//echo "<br>SQL:".$sqlBLGPEEK;
	$resultBLGPEEK=mysql_query($sqlBLGPEEK);
	$numBLGPEEK=mysql_num_rows($resultBLGPEEK);
	//echo "<br>NumRows:".$numBLGPEEK;
	$BLGPEEK=0;	
	while ($BLGPEEK < $numBLGPEEK) {		
		$blogID=mysql_result($resultBLGPEEK,$BLGPEEK,"blogID");
		$blogPage=strtolower(mysql_result($resultBLGPEEK,$BLGPEEK,"blogPage"));
		$blogTitle=mysql_result($resultBLGPEEK,$BLGPEEK,"blogTitle");		
		$subcategory=mysql_result($resultBLGPEEK,$BLGPEEK,"subcategory");
		$blogThumb=mysql_result($resultBLGPEEK,$BLGPEEK,"blogThumb");
		$blogDetailPart=substr(strip_tags($blogDetail),0,94)."...";
		?>
	<ul class="blogpeek">
		<?php 
		$blogpeekclass="";
		if(($issecret=='yes')AND($secrets!=="accessible")AND($viewingmobile=="no")){
			$blogpeekclass="restricted restrictedred loginclick";
			$blogpeekhref="#";
		}elseif(($issecret=='yes')AND($secrets!=="accessible")AND($viewingmobile=="yes")){
			$blogpeekclass="restricted restrictedred";
			$blogpeekhref="http://lalanii.com/signup.php";
		}elseif(($issecret=='yes')AND($secrets=="accessible")){
			$blogpeekclass="restricted restrictedred";
			$blogpeekhref=$blogPage."/".$blogID."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle));
		}else{			
			$blogpeekclass="";
			$blogpeekhref=$blogPage."/".$blogID."/".preg_replace('/[^A-Za-z0-9\-]/', '',  str_replace(' ','-',  $blogTitle));
		}
	
	?>
		<li class="blogimage"><img src="<?php echo "http://lalanii.com/image.php?width=200&height=175&image=".$blogThumb; ?>" width="200px" height="175px" /></li>
		<!--li class="blogsubcategory"><?php echo $subcategory; ?></li-->
		<li class="blogtitle"><h3><a href="<?php echo $blogpeekhref; ?>" class="<?php echo $blogpeekclass; ?>"><?php echo $blogTitle; ?></a></h3></li>
	</ul>
<?php
	++$BLGPEEK;
	}
?>