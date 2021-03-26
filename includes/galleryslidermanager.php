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


if($_POST) {
foreach ($_POST['imageID'] as $imageID) 
{
	//echo $imageID.'---'.$_POST['orderno_'.$imageID].'<br />';
	mysql_query("Update llGalleryAdminimage set orderno='".$_POST['orderno_'.$imageID]."'  where imageID = '".$imageID."'");
//echo "Update llAdminimage set orderno='".$_POST['orderno']."' where imageID = '".$_POST['imageID']."'";
}
}
	?>
	<div id="portalContent">


		<div id="blogadmin">
		<h1 class="impactLabel redbg">Gallery Administrative Image Editor</h1>
        <?php
        $sqlIMGss="Select max(orderno) as mid from llGalleryAdminimage order by imageID asc";
			$resultIMGss=mysql_query($sqlIMGss);
			$mmres = mysql_fetch_array($resultIMGss);
			//$imageID=mysql_result($resultIMGss,$IMG,"imageID");
		?>

		<form action="http://lalanii.com/process/addgalleryadminimage.php" method="post" enctype="multipart/form-data">
			Select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload">	<br />
            Order No (Last <?php echo $mmres['mid']; ?>) <input type="text" name="orderno" id="orderno">	<br />
            <textarea style="width:200px;" name="imglink" id="imglink" placeholder="enter text"></textarea>	<br />			
			<input type="submit" value="Upload Image" name="submit">
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
<form action="http://lalanii.com/includes/galleryslidermanager.php" method="post" name="orderfrm<?php echo $IMG; ?>" >
			<ul id="imglist">
			<?php
			$sqlIMG="Select * from llGalleryAdminimage order by orderno desc";
					$resultIMG=mysql_query($sqlIMG);
					$numIMG=mysql_num_rows($resultIMG);
					$IMG=0;
					while ($IMG < $numIMG) {
					$imageID=mysql_result($resultIMG,$IMG,"imageID");
					$image=mysql_result($resultIMG,$IMG,"image");
					$orderno=mysql_result($resultIMG,$IMG,"orderno");
					?>
					<li style="height:180px;"><img class="selectthisimage" src="http://lalanii.com/images/admin/<? echo $image; ?>" height="100px" /><br><?php echo $image; ?><br><a style="color:red;" href="http://lalanii.com/process/deletegallerylistimage.php?imageID=<?php echo $imageID; ?>" class="error">delete</a><input style="width: 50px;text-align: center;" type="text" name="orderno_<?php echo $imageID; ?>" value="<?php echo $orderno; ?>"><input type="hidden" value="<?php echo $imageID; ?>" name="imageID[]"> <input type="submit" name="upd_btn" value="Update"></li>
					<?php
					++$IMG;
					}?>					
			</ul>
</form>
		</div>
	</div>
</div>



</body>
</html>