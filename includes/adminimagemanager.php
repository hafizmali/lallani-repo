<?php include 'startsession.php';?>
<html>
<head>
<title>Lalanii Rochelle | Admin</title>
<meta name="title" content="Lalanii Rochelle | Admin" />
<meta name="description" content="Lalanii Rochelle | Admin" />
<?php include 'tags.php';?>
</head>
<body id="imageditor">
<div id="main">
	<?php 
	include 'database.php';
	include 'validation.php';
if($_POST)
{
	mysql_query("Update llAdminimage set orderno='".$_POST['orderno']."' , imagetitle='".$_POST['imagetitle']."' where imageID = '".$_POST['imageID']."'");
//echo "Update llAdminimage set orderno='".$_POST['orderno']."' where imageID = '".$_POST['imageID']."'";
}

if($_GET['delid'])
{
	mysql_query("Update llvideos set video_title='',video_path='' where video_id='".$_GET['delid']."'");
	?>
	<script>
		location.href="http://lalanii.com/includes/adminimagemanager.php?delmsg=1";
	</script>
	<?php
}

	?>
	<div id="portalContent">


		<div id="blogadmin">
		<h1 class="impactLabel redbg">Administrative Image Editor</h1>
		<?php $get_orderquery = mysql_fetch_array(mysql_query("Select max(orderno) as maxorder from llAdminimage where image like '%mainlanding%' ")); ?>

		<form action="http://lalanii.com/process/addadminimage.php" method="post" enctype="multipart/form-data">
			Upload Image:<input type="file" name="fileToUpload" id="fileToUpload"><br />			
			<input type="text" name="imglink" id="imglink" placeholder="enter hyperlink">
			Order No: <input type="text" name="orderno" value="<?php echo $get_orderquery['maxorder']+1; ?>"><input type="submit" value="Upload Image" name="submit">
		</form>

<hr />
<?php 
$getvideo = mysql_query("Select * from llvideos where video_id = '1' ");
$thisvideo = mysql_fetch_array($getvideo);
?>
		<form action="http://lalanii.com/process/addadminimage.php" method="post" enctype="multipart/form-data">
			Upload Video 1: <input type="file" name="videoToUpload" id="videoToUpload"><br />Display Video<input <?php if($thisvideo['video_status'] == 'true'){ ?>checked<?php } ?> name="video_status" type="checkbox" value="true"><input type="text" name="video_title" id="video_title" placeholder="Enter Title" value="<?php echo $thisvideo['video_title']; ?>">
			<input type="submit" value="Update" name="vsubmit"><a href="http://lalanii.com/includes/adminimagemanager.php?delid=1">Delete</a>
		</form>
<hr />
<?php 
$getvideo = mysql_query("Select * from llvideos where video_id = '2' ");
$thisvideo = mysql_fetch_array($getvideo);
?>
		<form action="http://lalanii.com/process/addadminimage.php" method="post" enctype="multipart/form-data">
			Upload Video 2: <input type="file" name="videosToUpload" id="videosToUpload"><br />Display Video<input <?php if($thisvideo['video_status'] == 'true'){ ?>checked<?php } ?> name="video_status" type="checkbox" value="true"><input type="text" name="video_title" id="video_title" placeholder="Enter Title" value="<?php echo $thisvideo['video_title']; ?>">
			<input type="submit" value="Update" name="vvsubmit"><a href="http://lalanii.com/includes/adminimagemanager.php?delid=2">Delete</a>
		</form>

			<div class="error">
			
			<?php
			if($_GET['message']=="0"){echo "the image was uploaded";
				}else{
					if($_GET['message']=="invalid"){echo "Are you sure that was an image file? Try again.";}
					if($_GET['message']=="exists"){echo "Looks like you already uploaded that one.";}
					if($_GET['message']=="size"){echo "That image is too big.!";}
					if($_GET['message']=="type"){echo "Hmmm we don't accept that kind of image.";}
					if($_GET['message']=="unknown"){echo "I don't know what happened, but the image didn't upload.";}
				}
			?>
			</div>
			<ul id="imglist">
			<?php
			$sqlIMG="Select * from llAdminimage where image like '%mainlanding%' order by orderno desc";
					$resultIMG=mysql_query($sqlIMG);
					$numIMG=mysql_num_rows($resultIMG);
					$IMG=0;
					while ($IMG < $numIMG) {
					$imageID=mysql_result($resultIMG,$IMG,"imageID");
					$image=mysql_result($resultIMG,$IMG,"image");
					$orderno=mysql_result($resultIMG,$IMG,"orderno");
					$imagetitle=mysql_result($resultIMG,$IMG,"imagetitle");
					?>
					<li style="height:190px;"><img class="selectthisimage" src="http://lalanii.com/images/admin/<? echo $image; ?>" height="100px" /><br><?php echo $image; ?><br><a style="color:red;" href="http://lalanii.com/process/deleteadminimage.php?imageID=<?php echo $imageID; ?>" class="error">delete</a><br /><form action="http://lalanii.com/includes/adminimagemanager.php" method="post" name="orderfrm<?php echo $IMG; ?>" ><input type="text" placeholder="Enter Title" value="<?php echo $imagetitle; ?>" name="imagetitle"><input style="width: 50px;text-align: center;" type="text" name="orderno" value="<?php echo $orderno; ?>"><input type="hidden" value="<?php echo $imageID; ?>" name="imageID"> <input type="submit" name="upd_btn" value="Update"></form></li>
					<?php
					++$IMG;
					}?>					
			</ul>
		</div>
	</div>
</div>

<SCRIPT LANGUAGE="JavaScript">
function getUrlParam(paramName)
	{
	var reParam = new RegExp('(?:[\?&]|&amp;)' + paramName + '=([^&]+)', 'i') ;
	var match = window.location.search.match(reParam) ;
	return (match && match.length > 1) ? match[1] : '' ;
	}
var funcNum = getUrlParam('CKEditorFuncNum');
var select = getUrlParam('select');
$('.selectthisimage').bind('click', function(e) {	
	$url=$(this).attr("src");
	if(funcNum>0){ 
	//alert(funcNum);
	//alert($url);
	window.opener.CKEDITOR.tools.callFunction(funcNum, $url);
	//WORKS
	//var newPartyName = 'testurl';
	//window.opener.$("#cke_99_textInput").val(newPartyName);
	}else{
	if(select=="thumb"){window.opener.$("#blogThumb").val($url);}
	if(select=="banner"){window.opener.$("#blogBanner").val($url);}
	
	}
	window.close();
});
</SCRIPT>

</body>
</html>