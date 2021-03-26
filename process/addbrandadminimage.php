<?php
include('../includes/database.php');
//$lastuploaded=$_POST["lastuploaded"];
	$imglink=$_POST["imglink"];
	$orderno=$_POST["orderno"];
	$file_name = basename($_FILES["fileToUpload"]["name"]);
	$target_dir = "../images/admin/";
	$target_file = $target_dir . $file_name;
	//echo "<br>target_file: ".$target_file;
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			//echo "<br>File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			//echo "<br>File is not an image.";
			$uploadOk = 0;
			$uploaderror='invalid';
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		//echo "<br>Sorry, file already exists.";
		$uploadOk = 0;
		$uploaderror='exists';
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		//echo "<br>Sorry, your file is too large.";
		$uploadOk = 0;
		$uploaderror='size';
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		//echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
		$uploaderror='type';
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		//echo "<br>Sorry, your file was not uploaded.";
		$uploaderror='unknown';
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			//echo "<br>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			$uploaderror='0';
			$sql="INSERT INTO llbrandAdminimage (image,secretImg,imagelink,orderno) VALUES ('$file_name',0,'$imglink',$orderno)";
			mysql_query($sql);
		} else {
			//echo "<br>Sorry, there was an error uploading your file.";
			$uploaderror='unknown';
		}
		}
echo "<script type='text/javascript'>window.location.href = 'http://lalanii.com/includes/brandslidermanager.php?message=".$uploaderror."';</script>";	
?>