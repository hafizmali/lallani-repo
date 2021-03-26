<?php include 'startsession.php';?>
<html>
<head>
<title>Lalanii Rochelle | Admin</title>
<meta name="title" content="Lalanii Rochelle | Admin" />
<meta name="description" content="Lalanii Rochelle | Admin" />
<?php include 'tags.php';?>
<script type="text/javascript" src="http://lalanii.com/scripts/ckeditor/ckeditor.js"></script>

<?php //include 'scripts.php';?>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>

<script async type="text/javascript" src="http://lalanii.com/hireme/wowslider/webproducer/engine1/jquery.js"></script>

<script type="text/javascript" src="http://lalanii.com/scripts/compressed.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	var dd = $('.vticker').easyTicker({
		direction: 'up',
		easing: 'easeInOutBack',
		speed: 'slow',
		interval: 3000,
		height:50,
		visible: 1,
		mousePause: 1,
		controls: {
			up: '.up',
			down: '.down',
			toggle: '.toggle',
			stopText: 'Stop !!!'
		}
	}).data('easyTicker');	
	
	$(".blogtitle").each(function() {
              var original = $(this).html();
              // use .shortnameToImage if only converting shortnames (for slightly better performance)
              var converted = emojione.toImage(original);
              $(this).html(converted);
            });
			$(".blogdetail").each(function() {
              var original = $(this).html();
              // use .shortnameToImage if only converting shortnames (for slightly better performance)
              var converted = emojione.toImage(original);
              $(this).html(converted);
            });






});


</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-62807572-1', 'auto');
  ga('send', 'pageview');
</script>



</head>
<body id="blogeditor">
<div id="main">
	<?php 
	include 'database.php';
	include 'validation.php';
	?>
<div id="portalContent">


	<div id="blogadmin">
	<h1 class="impactLabel bluebg">Blog Manager</h1>
	<span style="display:none;float:right;font-weight:bold;" id="saving">saving...</span>
	<br><br>
	
	<SELECT class="" NAME="selectblog" ID="selectblog" onChange="javascript:location.href = 'http://lalanii.com/includes/blogmanager.php?blogID='+this.value;"> 
	<option selected disabled>click to select blog to edit</option>
	<?php
		$sqlBLGtoE="Select * from llBlog order by blogTitle desc";
		$resultBLGtoE=mysql_query($sqlBLGtoE);
		$numBLGtoE=mysql_num_rows($resultBLGtoE);
		$BLGtoE=0;
		while ($BLGtoE < $numBLGtoE) {
		$blogID=mysql_result($resultBLGtoE,$BLGtoE,"blogID");
		$blogTitle=mysql_result($resultBLGtoE,$BLGtoE,"blogTitle");
		?> 
		<OPTION VALUE="<?php echo $blogID; ?>"><?php echo $blogTitle; ?></OPTION>
		<?php
		++$BLGtoE;
		}
		?>
	</SELECT>
	<br>
	<a href="" class="error">click to clear changes and add new</a>
	<br>
	<br>
	
	
	
	<form class="" accept-charset="UTF-8" name="formBLG" id="formBLG" method="post" action="../process/addupdateblog.php">
		<?php
		$_SESSION['blogID']=$_GET['blogID'];
		$sqlBLG="Select * from llBlog where blogID=".$_SESSION['blogID'];
		//echo $sqlBLG;
		$resultBLG=mysql_query($sqlBLG);
		if ($resultBLG){
			//echo "you got it! good job!";
		
		$numBLG=mysql_num_rows($resultBLG);
		$blogID=mysql_result($resultBLG,0,"blogID");
		$blogPage=strtolower(mysql_result($resultBLG,0,"blogPage"));
		$blogTitle=mysql_result($resultBLG,0,"blogTitle");
		$blogDetail=mysql_result($resultBLG,0,"blogDetail");
		//$blogCategory=mysql_result($resultBLG,0,"blogCategory");
		$authorID=mysql_result($resultBLG,0,"authorID");
		$stickyBlog=mysql_result($resultBLG,0,"stickyBlog");
		$sneakpeekBlog=mysql_result($resultBLG,0,"sneakpeekBlog");
		$secretBlog=mysql_result($resultBLG,0,"secretBlog");
		$homepageBlog=mysql_result($resultBLG,0,"homepageBlog");
		//$imageLink=mysql_result($resultBLG,0,"imageLink");
		$blogBanner=mysql_result($resultBLG,0,"blogBanner");
		$blogBannerOne=mysql_result($resultBLG,0,"banner_one");
		$blogBannerTwo=mysql_result($resultBLG,0,"banner_two");
		$blog_mtitle=mysql_result($resultBLG,0,"blog_mtitle");
		$blog_mkey=mysql_result($resultBLG,0,"blog_mkey");
		$blog_mdesc=mysql_result($resultBLG,0,"blog_mdesc");
		$post_banner_link=mysql_result($resultBLG,0,"post_banner_link");
		
		$blog_bg_color=mysql_result($resultBLG,0,"blog_bg_color");
		$post_to_fb=mysql_result($resultBLG,0,"post_to_fb");
		$post_to_afb=mysql_result($resultBLG,0,"post_to_afb");
		$post_to_tw=mysql_result($resultBLG,0,"post_to_tw");
		$post_to_go=mysql_result($resultBLG,0,"post_to_go");
		$post_to_linkin=mysql_result($resultBLG,0,"post_to_linkin");
		$post_to_pin=mysql_result($resultBLG,0,"post_to_pin");
		$blogemail=mysql_result($resultBLG,0,"blogemail");
		
		$blogThumb=mysql_result($resultBLG,0,"blogThumb");
		$blogDate=date("m/d/Y H:i:s",strtotime(mysql_result($resultBLG,0,"blogDate")));
		$blogEmailed=date("m/d/Y H:i:s",strtotime(mysql_result($resultBLG,0,"blogEmailed")));
		if ($blogEmailed=="11/30/-0001 00:00:00"){
			$blogEmailed="not set";}else{
			$blogEmailed=date("m/d/Y H:i:s",strtotime(mysql_result($resultBLG,0,"blogEmailed")));}
		$subcategoryID=mysql_result($resultBLG,0,"subcategoryID");		
		
		//end if result from blog table
		}else{
			//echo "No blog selected. Select a blog to edit or fill in the data to add a new blog!";
			
		$numBLG=0;
		//$blogID=0;
		$blogPage="";
		$blogTitle="";
		$blogDetail="";
		$authorID=$_SESSION["userID"];
		$stickyBlog="";
		$sneakpeekBlog="";
		$secretBlog="";
		$blogBanner="";
		$blog_mkey="";
		$blog_mdesc="";
		$post_banner_link="";
		$blogThumb="";
		$blogThumb="";
		$blogDate=date("m/d/Y H:i:s",strtotime("+1 day"));
		$subcategoryID=0;
		$post_to_fb=0;
		$post_to_afb=0;
		$post_to_afb=0;
		$post_to_tw=0;
		$post_to_go=0;
		$post_to_linkin=0;
		$post_to_pin=0;
		$blogemail=0;
		$blog_bg_color = '#FFFFFF' ;	
			
			
			}

		
		
		
		?>
		<ul class="blogForm visibleForm">
		
				<li class="blogFormHead"><input type="text" class="blogTitle orange" name="blogTitle" placeholder="Enter New Blog Title!" size="80" value="<? echo $blogTitle; ?>" /></li>		
				<li>emailed: <? echo $blogEmailed; ?></li>		
				<li class="blogFormHead">		
					<textarea id="inputAdd" name="blogDetail" style="width:700px; height:400px"><? echo $blogDetail; ?></textarea>

				<script>
						CKEDITOR.replace( 'inputAdd' );
						CKEDITOR.config.removePlugins = 'about,flash,iframe,forms,stylescombo';						
						CKEDITOR.config.filebrowserImageBrowseUrl= 'http://lalanii.com/includes/imagemanager.php';
						CKEDITOR.config.filebrowserWindowWidth='650';
						CKEDITOR.config.filebrowserWindowHeight='480';				
					</script>


					<li class="blogFormLabel">&nbsp;</li>
				<li class="blogFormBody"><input id="melissatest" type="hidden" size="80" style="border:none;" />&nbsp;</li>
				
				</li>
                
                <li class="blogFormLabel">Meta Title:</li>
				<li class="blogFormBody">
					<input type="text" name="blog_mtitle" id="" value="<?php echo $blog_mtitle; ?>" >					
				</li>
                <li class="blogFormLabel">Meta Keywords:</li>
				<li class="blogFormBody">
					<input type="text" name="blog_mkey" id="" value="<?php echo $blog_mkey; ?>" >					
				</li>
                <li class="blogFormLabel">Meta Description:</li>
				<li class="blogFormBody">
					<input type="text" name="blog_mdesc" id="" value="<?php echo $blog_mdesc; ?>" >					
				</li>
                
                <li class="blogFormLabel">&nbsp;</li>
				<li class="secret blogFormBody"><input type="checkbox" name="post_to_fb" value="1" <?php if ($post_to_fb==1){echo " checked";}?> /> Post to Facebook</li>	
                <li class="blogFormLabel">&nbsp;</li>
				<li class="secret blogFormBody"><input type="checkbox" name="post_to_afb" value="1" <?php if ($post_to_afb==1){echo " checked";}?> /> Post to Author Facebook</li>	
                <li class="blogFormLabel">&nbsp;</li>

				<li class="secret blogFormBody"><input type="checkbox" name="post_to_tw" value="1" <?php if ($post_to_tw==1){echo " checked";}?> /> Post to Twitter</li>	
               <!-- <li class="blogFormLabel">&nbsp;</li>
				<li class="secret blogFormBody"><input type="checkbox" name="post_to_go" value="1" <?php if ($post_to_go==1){echo " checked";}?> /> Post to Google+</li>	-->
                <li class="blogFormLabel">&nbsp;</li>
				<li class="secret blogFormBody"><input type="checkbox" name="post_to_linkin" value="1" <?php if ($post_to_linkin==1){echo " checked";}?> /> Post to LinkedIn</li>
                <!--<li class="blogFormLabel">&nbsp;</li>
				<li class="secret blogFormBody"><input type="checkbox" name="post_to_pin" value="1" <?php if ($post_to_pin==1){echo " checked";}?> /> Post to Pinterest</li>	-->
                
                <li class="blogFormLabel">&nbsp;</li>
				<li class="secret blogFormBody"><input type="checkbox" name="blogemail" value="1" <?php if ($blogemail==1){echo " checked";}?> /> Do Not Send Email</li>	
                
                
				<li class="blogFormLabel">category:</li>
				<li class="blogFormBody">
					<select name="blogPage">
						<option <?php if(strtolower($blogPage)=="beauty"){echo "selected";}?>>Beauty</option>
						<option <?php if(strtolower($blogPage)=="creatives"){echo "selected";}?>>Creatives</option>
						<option <?php if(strtolower($blogPage)=="fashion"){echo "selected";}?>>Fashion</option>
						<option <?php if(strtolower($blogPage)=="secrets"){echo "selected";}?>>Secrets</option>
					</select>					
				</li>
				<li class="blogFormLabel">sub-category:</li>
				<li class="blogFormBody">
					<?php 
					$sqlBSCat2="SELECT * from llSubcategory order by subcategory ASC";
					$resultBSCat2=mysql_query($sqlBSCat2);
					$optionsBSCat2=""; 
					while ($rowBSCat2=mysql_fetch_array($resultBSCat2)) { 

						$idBSCat2=$rowBSCat2["subcategoryID"]; 
						$thingBSCat2=$rowBSCat2["subcategory"]; 
						if ($idBSCat2==$subcategoryID){$selectedBSCat2=" selected";}else{$selectedBSCat2="";}
						$optionsBSCat2.="<OPTION".$selectedBSCat2." VALUE=\"$idBSCat2\">".$thingBSCat2;
					} 
					?> 
					<SELECT NAME="subcategoryID" ID="subcategoryID"> 					
					<?=$optionsBSCat2?> 
					</SELECT>
				</li>			
				<li class="blogFormLabel">publish:</li>
				<li class="blogFormBody input-parent input-container">
					<?php 
						$publishdate=date("m/d/Y",strtotime($blogDate)); 
						$publishtime=date("H",strtotime($blogDate)); 
						
					?>
					<input type="radio" name="publishoption" value="now">now
					<input type="radio" name="publishoption" value="later" checked>as of:
					<input type="text" class="clearText beatpicker-input beatpicker-inputnode" name="blogDate" size="11" value="<? echo $publishdate; ?>" data-beatpicker="true" data-beatpicker-module="footer,icon,clear" data-beatpicker-format="['MM','DD','YYYY'],separator:'/'" />
					<select name="publishtime">
						<option value="01"<?php if($publishtime=="01"){echo " selected";}?>>1AM</option>
						<option value="02"<?php if($publishtime=="02"){echo " selected";}?>>2AM</option>
						<option value="03"<?php if($publishtime=="03"){echo " selected";}?>>3AM</option>
						<option value="04"<?php if($publishtime=="04"){echo " selected";}?>>4AM</option>
						<option value="05"<?php if($publishtime=="05"){echo " selected";}?>>5AM</option>
						<option value="06"<?php if($publishtime=="06"){echo " selected";}?>>6AM</option>
						<option value="07"<?php if($publishtime=="07"){echo " selected";}?>>7AM</option>
						<option value="08"<?php if($publishtime=="08"){echo " selected";}?>>8AM</option>
						<option value="09"<?php if($publishtime=="09"){echo " selected";}?>>9AM</option>
						<option value="10"<?php if($publishtime=="10"){echo " selected";}?>>10AM</option>
						<option value="11"<?php if(($publishtime=="11")OR(!$publishtime)){echo " selected";}?>>11AM</option>
						<option value="12"<?php if($publishtime=="12"){echo " selected";}?>>12AM</option>
						<option value="13"<?php if($publishtime=="13"){echo " selected";}?>>1PM</option>
						<option value="14"<?php if($publishtime=="14"){echo " selected";}?>>2PM</option>
						<option value="15"<?php if($publishtime=="15"){echo " selected";}?>>3PM</option>
						<option value="16"<?php if($publishtime=="16"){echo " selected";}?>>4PM</option>
						<option value="17"<?php if($publishtime=="17"){echo " selected";}?>>5PM</option>
						<option value="18"<?php if($publishtime=="18"){echo " selected";}?>>6PM</option>
						<option value="19"<?php if($publishtime=="19"){echo " selected";}?>>7PM</option>
						<option value="20"<?php if($publishtime=="20"){echo " selected";}?>>8PM</option>
						<option value="21"<?php if($publishtime=="21"){echo " selected";}?>>9PM</option>
						<option value="22"<?php if($publishtime=="22"){echo " selected";}?>>10PM</option>
						<option value="23"<?php if($publishtime=="23"){echo " selected";}?>>11PM</option>
						<option value="24"<?php if($publishtime=="24"){echo " selected";}?>>12AM</option>
						
					</select>
					<!--input type="text" class="clearText beatpicker-input beatpicker-inputnode" name="blogAdded" size="11" value="<? echo $blogExpires; ?>" data-beatpicker="true" data-beatpicker-module="footer,icon,clear" data-beatpicker-format="['MM','DD','YYYY'],separator:'/'" /-->
				</li>
				<li class="blogFormLabel">author:</li>
				<li class="blogFormBody">
				<?php 
					$sqlBA2="SELECT * from llUser where(userType='admin' or userType='editor') order by userFirstName ASC";
					//echo $sqlBA2;
					$resultBA2=mysql_query($sqlBA2); 
					$optionsBA2=""; 
					while ($rowBA2=mysql_fetch_array($resultBA2)) { 

						$idBA2=$rowBA2["userID"]; 
						$thingBA2=$rowBA2["userFirstName"]; 
						if($idBA2==$authorID){$BA2selected=" selected";}else{$BA2selected="";}
						$optionsBA2.="<OPTION VALUE=\"$idBA2\" ".$BA2selected.">".$thingBA2; 
					} 
					?> 
					<SELECT NAME="authorID" ID="authorID"> 
					<?=$optionsBA2?> 
					</SELECT>
				<li class="blogFormLabel">attributes:</li>
                <li class="blogFormBody"><input type="checkbox" name="homepageBlog" value="1" <?php if ($homepageBlog==1){echo " checked";}?> />Post to HomePage</li>
                <li class="blogFormLabel">&nbsp;</li>
				<li class="secret blogFormBody"><input type="checkbox" name="secretBlog" value="1" <?php if ($secretBlog==1){echo " checked";}?> /> secret</li>	
				<li class="blogFormLabel">&nbsp;</li>
				<li class="blogFormBody"><input type="checkbox" name="stickyBlog" value="1" <?php if ($stickyBlog==1){echo " checked";}?> /> featured</li>
				<li class="blogFormLabel">&nbsp;</li>
				<li class="blogFormBody"><input type="checkbox" name="sneakpeekBlog" value="1" <?php if ($sneakpeekBlog==1){echo " checked";}?> /> sneak peek</li>
				<li class="blogFormLabel">topics:</li>
				<li class="blogFormBody">
					<?php
					$sqlTOP2="Select * from llTopic order by topic asc";
					$resultTOP2=mysql_query($sqlTOP2);
					$numTOP2=mysql_num_rows($resultTOP2);
					$TOP2=0;
					while ($TOP2 < $numTOP2) {
					$topicID2=mysql_result($resultTOP2,$TOP2,"topicID");
					$topic2=mysql_result($resultTOP2,$TOP2,"topic");
						$sqlBLGTOP="Select * from llBlogTopic where blogID=".$blogID." and topicID=".$topicID2;
						//echo $sqlBLGTOP;
						$resultBLGTOP=mysql_query($sqlBLGTOP);
						$numBLGTOP=mysql_num_rows($resultBLGTOP);
						if ($numBLGTOP>0){$topicChecked=" checked";}else{$topicChecked="";}
					
					?>
					<input type="checkbox" name="topics[<? echo $topicID2; ?>]" value="<? echo $topicID2; ?>"<? echo $topicChecked; ?> /><? echo $topic2; ?>					
					<?php
					++$TOP2;
					}
					?>
				</li>
				
				<li class="blogFormLabel">&nbsp;</li>
				<li class="blogFormBody">&nbsp;</li>

				<li class="blogFormLabel">thumbnail (home page):</li>

				<li class="blogFormBody">
					<input type="text" size="69" name="blogThumb" id="blogThumb" value="<?php echo $blogThumb; ?>" />
					<a href="javascript:void(window.open('http://lalanii.com/includes/imagemanager.php?sel=thumb','imgeditor','width=650,height=480,top=100,left=100'))" class="next">select</a>
				</li>
				<li class="blogFormLabel">banner (blog page):</li>
				<li class="blogFormBody">
					<input type="text" size="69" name="blogBanner" id="blogBanner" value="<?php echo $blogBanner; ?>" />
					<a href="javascript:void(window.open('http://lalanii.com/includes/imagemanager.php?sel=banner','imgeditor','width=650,height=480,top=100,left=100'))" class="next">select</a>
				</li>
				<li class="blogFormLabel">Post Banner Link:</li>
				<li class="blogFormBody">
					<input type="text" name="post_banner_link" id="" value="<?php echo $post_banner_link; ?>" >					
				</li>
                
                <li class="blogFormLabel">Small Banner 1:</li>
				<li class="blogFormBody">
                	<textarea id="banner_one" name="banner_one"><?php echo $blogBannerOne; ?></textarea>					
				</li>
                <li class="blogFormLabel">Small Banner 2:</li>
				<li class="blogFormBody">
					<textarea id="banner_two" name="banner_two"><?php echo $blogBannerTwo; ?></textarea>
				</li>
				            <li class="blogFormLabel">Background Color:</li>
				<li class="blogFormBody">
					<input class="nin" type="color" placeholder="Color" name="blog_bg_color" value="<?php echo $blog_bg_color; ?>"><input type="checkbox" value='1' name="bg_allow" id="bg_allow" > Enable Color
				</li>

				<li class="blogFormLabel"><input id="copyto" type="hidden"></li>
				<li class="blogFormBody"><h2><a href="javascript:void(window.open('http://lalanii.com/includes/imagemanager.php','imgeditor','width=1044,height=700,top=100,left=100'))">Image Editor</a></h2></li>
				<li class="blogFormBody"><h2><a href="javascript:void(window.open('http://lalanii.com/process/sendblogs.php','sendblogs','width=1044,height=700,top=100,left=100'))">Send Blog Emails Now!</a></h2></li>
				
				<li class="blogFormFoot"><a href="javascript:updateformBLG()" class="next" id="updateformBLG">save</a></li>
				<li class="blogFormFoot"><a href="../process/deleteblog.php?blogID=<?php echo $blogID; ?>" class="delete">delete</a></li>
				
			</ul>
			<input type="hidden" id="sessionblogid" name="blogID" value="<?php echo $_SESSION['blogID'] ?>" />
		</form>

		<script type="text/javascript">
		function updateformBLG(){
			for ( instance in CKEDITOR.instances )
			CKEDITOR.instances[instance].updateElement();
			jQuery("#updateformBLG").html("saving...");
			var form = jQuery("#formBLG");
			var post_url = form.attr('action');
			var post_data = form.serialize();
			$.ajax({
				type: 'POST',
				url: post_url,
				data: post_data,
				dataType: 'json',
				success:function (response) {
					//alert(response);
					jQuery("#saving").fadeIn().delay(1000).fadeOut(300);
					window.opener.location.reload();
					jQuery("#updateformBLG").html("save").delay(5000);
				},
				error: function(xhr,err){
					jQuery("#updateformBLG").addClass("redbg white");
					jQuery("#updateformBLG").html("error saving`").delay(5000);
					/* jQuery("#saving").html("error saving");
					jQuery("#saving").fadeIn().delay(1000).fadeOut(300);
					jQuery("#saving").html("saving..."); */
					//alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
					//alert("responseText: "+xhr.responseText);
				}
			});
				
			//document.formBLG.submit();
			}

/*jQuery(document).ready(function () {
//	window.setInterval(function(){CKEDITOR.replace( '#inputAdd' );}, 1000);
	window.setInterval(function(){
		for ( instance in CKEDITOR.instances )
		CKEDITOR.instances[instance].updateElement();
		var form = jQuery("#formBLG");
		var post_url = form.attr('action');
		var post_data = form.serialize();
		$.ajax({
			type: 'POST',
			url: post_url,
			data: post_data,
			dataType: 'json',
			success:function (response) {
				//alert(response);
				jQuery("#saving").fadeIn().delay(1000).fadeOut(300);
				//jQuery("#sessionblogid").val();
			},
			error: function(xhr,err){
					jQuery("#saving").text("Click on Save!");
					jQuery("#saving").addClass("red");
					jQuery("#saving").fadeIn();
				//alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status);
				//alert("responseText: "+xhr.responseText);
			}
		});
	  //jQuery("#formBLG").ajaxForm({url: 'http://lalanii.com/process/addupdateblog.php', type: 'post'});
	//url: myform.attr('action'),
	}, 10000);
});*/

</script>			


	</div>
	</div>
	<div id="overlay" style="display:none;"></div>
	<div id="selectimg" style="display:none;">
	<ul id="imglist">
			<?php
			$sqlIMG="Select * from llImage order by image asc";
					$resultIMG=mysql_query($sqlIMG);
					$numIMG=mysql_num_rows($resultIMG);
					$IMG=0;
					while ($IMG < $numIMG) {
					$imageID=mysql_result($resultIMG,$IMG,"imageID");
					$image=mysql_result($resultIMG,$IMG,"image");
					?>
					<li><img src="http://lalanii.com/images/blogs/<? echo $image; ?>" height="100px" class="imgclick" /><br><?php echo $image; ?></li>
					<?php
					++$IMG;
					}?>					
			<a href="" class="close">X</a>
			</ul>
	</div>
</div>

</body>
</html>