<?php
session_start();
include('../includes/database.php');
$publishoption=$_POST['publishoption'];
$publishtime=$_POST['publishtime'];
$blogID=$_SESSION['blogID'];
$blogTitle=str_replace("'","\'",$_POST['blogTitle']);
$blogTitle = str_replace('"','\"',$blogTitle);
//$blogTitle=str_replace("-","\-",$blogTitle);
$blogDetail=str_replace("'","\'",$_POST['blogDetail']);
$blogDetailTwo=$_POST['blogDetail2'];
$blogPage=$_POST['blogPage'];
$authorID=$_POST['authorID'];
$stickyBlog=$_POST['stickyBlog'];
if ($stickyBlog==1){$stickyBlog=1;}else{$stickyBlog=0;}
$sneakpeekBlog=$_POST['sneakpeekBlog'];
if ($sneakpeekBlog==1){$sneakpeekBlog=1;}else{$sneakpeekBlog=0;}
$secretBlog=$_POST['secretBlog'];
if ($secretBlog==1){$secretBlog=1;}else{$secretBlog=0;}
$homepageBlog=$_POST['homepageBlog'];
if ($homepageBlog==1){$homepageBlog=1;}else{$homepageBlog=0;}
if ($publishoption=="now"){
	$sqlblogDate=date('Y-m-d H:i:s');
	}else{
	$blogDate=strtotime(str_replace('-', '/', $_POST['blogDate']));
	$sqlblogDate=date('Y-m-d '.$publishtime.':0:0', $blogDate);
	}
$blogAdded=date('Y-m-d H:i:s', time());
$topics=$_POST['topics'];
$blogBanner= $_POST['blogBanner'];
if($_POST['bg_allow'] == 1)
{
$blog_bg_color= $_POST['blog_bg_color'];
}
else
{
$blog_bg_color='';
}

$banner_one= mysql_real_escape_string($_POST['banner_one']);
$banner_two= mysql_real_escape_string($_POST['banner_two']);
$blog_mtitle= mysql_real_escape_string($_POST['blog_mtitle']);
$blog_mpurl= mysql_real_escape_string($_POST['blog_mpurl']);
$blog_mkey= mysql_real_escape_string($_POST['blog_mkey']);
$blog_mdesc= mysql_real_escape_string($_POST['blog_mdesc']);
$post_banner_link= $_POST['post_banner_link'];

$blogThumb=$_POST['blogThumb'];
$subcategoryID=$_POST['subcategoryID'];

$post_to_fb=$_POST['post_to_fb'];
$post_to_afb=$_POST['post_to_afb'];
$post_to_tw=$_POST['post_to_tw'];
$post_to_go=$_POST['post_to_go'];
$post_to_linkin=$_POST['post_to_linkin'];
$post_to_pin=$_POST['post_to_pin'];
$blogemail=$_POST['blogemail'];

$reco_posts = $_POST['reco_posts1'].','.$_POST['reco_posts2'].','.$_POST['reco_posts3'].','.$_POST['reco_posts4'];
$notebook_allow = $_POST['notebook_allow'];

if ($post_to_fb==1){$post_to_fb=1;}else{$post_to_fb=0;}
if ($post_to_afb==1){$post_to_afb=1;}else{$post_to_afb=0;}
if ($post_to_tw==1){$post_to_tw=1;}else{$post_to_tw=0;}
if ($post_to_go==1){$post_to_go=1;}else{$post_to_go=0;}
if ($post_to_linkin==1){$post_to_linkin=1;}else{$post_to_linkin=0;}
if ($post_to_pin==1){$post_to_pin=1;}else{$post_to_pin=0;}
/*
echo "<br>user: ".$_SESSION['userID'];
echo "<br>blogID: ".$blogID;
echo "<br>blogTitle: ".$blogTitle;
echo "<br>blogDetail: ".$blogDetail;
echo "<br>blogDetail2: ".$blogDetailTwo;
echo "<br>blogDate: ".$blogDate;
echo "<br>sqlblogDate: ".$sqlblogDate;
echo "<br>subcategoryID: ".$subcategoryID;
*/

$check="Select * from llBlog where blogID=".$blogID;
$checkresult=mysql_query($check);
$checkone=mysql_num_rows($checkresult);
if($checkone>0){
	
		//echo "<br>there is a result, will update";
		$sql="UPDATE llBlog SET blogTitle='$blogTitle',homepageBlog=$homepageBlog,blogDetail='$blogDetail',blogPage='$blogPage',stickyBlog=$stickyBlog,sneakpeekBlog=$sneakpeekBlog,secretBlog=$secretBlog,authorID=$authorID,userID=".$_SESSION['userID'].",blogDate='$sqlblogDate',blog_bg_color='$blog_bg_color',blogBanner='$blogBanner',blog_mtitle='$blog_mtitle',blog_mdesc='$blog_mdesc',blog_mkey='$blog_mkey',post_banner_link='$post_banner_link',banner_one='$banner_one',banner_two='$banner_two',post_to_fb='$post_to_fb',post_to_afb='$post_to_afb',post_to_tw='$post_to_tw',post_to_go='$post_to_go',post_to_linkin='$post_to_linkin',post_to_pin='$post_to_pin',blogThumb='$blogThumb',subcategoryID='$subcategoryID',blogemail='$blogemail',reco_posts='$reco_posts',notebook_allow='$notebook_allow',blog_mpurl='$blog_mpurlw' where blogID=$blogID";
		mysql_query($sql);
		//echo "<br>sql: ".$sql;

		$DELTOP="Delete from llBlogTopic where blogID=".$blogID;
		//echo "<br>delete query: ".$DELTOP;
		mysql_query($DELTOP);

		if(is_array($topics)) {
			foreach ($topics as $topicID) {
				$TOP="INSERT INTO llBlogTopic (topicID,blogID) VALUES(".$topicID.",".$blogID.")";
				mysql_query($TOP);
				//echo "<br>query executed: ".$TOP;
				//echo "<br>".$topicID."added<br>";
				}
			}
	
	$_SESSION['blogID']=$blogID;	
	}else
	{		
	//echo "<br>there is no result, will add new";
		if($blogTitle != '')
		{
			$chk_posts = @mysql_query("Select * from llBlog where blogTitle='$blogTitle'");
			$chk_nums = @mysql_num_rows($chk_posts);
			
			if($chk_nums <= 0)
			{
				$sql="INSERT INTO llBlog (blogTitle,blogDetail,blogPage,userID,authorID,stickyBlog,sneakpeekBlog,secretBlog,blogDate,blogAdded,blog_bg_color,blogBanner,blogThumb,subcategoryID,homepageBlog,banner_one,banner_two,post_banner_link,blog_mtitle,blog_mdesc,blog_mkey,post_to_fb,post_to_afb,post_to_tw,post_to_go,post_to_linkin,post_to_pin,blogemail,reco_posts,notebook_allow,blog_mpurl) VALUES ('$blogTitle','$blogDetail','$blogPage',".$_SESSION['userID'].",$authorID,$stickyBlog,$sneakpeekBlog,$secretBlog,'$sqlblogDate','$blogAdded','$blog_bg_color','$blogBanner','$blogThumb',$subcategoryID,$homepageBlog,'$banner_one','$banner_two','$post_banner_link','$blog_mtitle','$blog_mdesc','$blog_mkey','$post_to_fb','$post_to_afb','$post_to_tw','$post_to_go','$post_to_linkin','$post_to_pin','$blogemail','$reco_posts','$notebook_allow','$blog_mpurl')";		
				mysql_query($sql); 
			}		
		}
	//echo "<br>sql: ".$sql;
	//echo "Record Added";

	/* $sqlMAX="select max(blogID) as newBlogID from llBlog";
	$resultMAX=mysql_query($sqlMAX); */
	$newblogID=mysql_insert_id();	
	$_SESSION['blogID']=$newblogID;	
	//echo "<br>new BlogID: ".$blogID;

	if (isset($topics))
		{foreach ($topics as $topicID) {
		//echo "if your table has only one field inside:";
		$TOP="INSERT INTO llBlogTopic (topicID,blogID) VALUES(".$topicID.",".$blogID.")";
		mysql_query($TOP);
		//echo "<br>query executed: ".$TOP;
		//echo "<br>".$topicID."added<br>";
		}
		} 
		}


//echo "<br />".$sql;
//echo "Record Updated";
mysql_close();
?>
